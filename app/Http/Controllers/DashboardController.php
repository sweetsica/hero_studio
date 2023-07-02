<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function rankingUser(Request $request)
    {
        $sortBy = $request->get('type', 'last_month_tasks_avg_product_rate');
        $monthYear  = $request->get('month', null);
        $departmentId  = $request->get('departmentId', null);

        $time = Carbon::now();
        if(isset($monthYear)) {
            try {
                $time = Carbon::parse($monthYear);
            } catch (\Exception $exception) {}
        }
        $authUserDepartmentMembers = collect(Auth::user()->departments)->map(function ($item) {
            return $item->members;
        })->flatten(1)->pluck('id')->toArray();


        $highestProductRankingMember = Member::query();
        if($departmentId) {
            $highestProductRankingMember = $highestProductRankingMember->whereHas('departments', function ($q) use ($departmentId) {
                return $q->where('departments.id', $departmentId);
            });
        }

        $highestProductRankingMember = $highestProductRankingMember
            ->with('user')
            ->get()
            ->filter(function ($item) use ($authUserDepartmentMembers) {
                // Chỉ thống kê các editor ( aka người nhận task )
                // Only summarize editor role
                if ($item->user->getRoleNames()[0] !== Role::ROLE_EDITOR) {
                    return false;
                }

                if (Auth::user()->getRoleNames()[0] === Role::ROLE_COF) {
                    return in_array($item->id, $authUserDepartmentMembers);
                }

                return true;
            })
            ->map(function ($item) use ($time) {

                $lastMonthTasks = $item->editorTaskByMonth($time->month, $time->year);
                $lastMonthDoneTasks = $item->editorTaskDoneByMonth($time->month, $time->year);

                $item['last_month_tasks_avg_product_rate'] = $lastMonthTasks->count() ? $lastMonthTasks->avg('product_rate') : 0;
                $item['last_month_done_tasks_count'] = $lastMonthDoneTasks->count();
                $item['last_month_tasks_count'] = $lastMonthTasks->count();
                $item['last_month_tasks_total_length'] = $lastMonthTasks->count() ? $lastMonthTasks->sum('product_length') : 0;

                return $item;
            })->sortByDesc($sortBy)->values();
        $passingData['highestProductRankingMember'] = $highestProductRankingMember;
        $passingData['sortBy'] = $sortBy;
        $passingData['month'] = $time->format('Y-m');
        return view('user-list', $passingData);
    }

    public function index(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date)->startOfDay() : Carbon::now()->startOfDay();
        $endDate = $request->end_date ? Carbon::parse($request->end_date)->startOfDay() : Carbon::now()->startOfDay()->addDays(1);

        $userRole = Auth::user()->getRoleNames()[0];
        $departmentId = $request->input('department_id');

        $params['startDate'] = $startDate;
        $params['endDate'] = $endDate;
        $params['userRole'] = $userRole;
        $params['departmentId'] = $departmentId;

        $highestProductRankingMember = Member::query()
            ->get()->map(function ($item) {
                $lastMonthTasks = $item->lastMonthTasks();
                $lastMonthDoneTasks = $item->lastMonthDoneTasks();

                $item['last_month_tasks_avg_product_rate'] = $lastMonthTasks->count() ? $lastMonthTasks->avg('product_rate') : 0;
                $item['last_month_done_tasks_count'] = $lastMonthDoneTasks->count();
                $item['last_month_tasks_count'] = $lastMonthTasks->count();

                return $item;
            })->sortByDesc('last_month_tasks_avg_product_rate')->take(5);

        if ($params['userRole'] === Role::ROLE_COF || $params['userRole'] === Role::ROLE_SUPER_ADMIN) {
            $totalTask = $this->getTotalTask($params);

            $data['groupTaskByMember'] = $this->groupDataByMember($totalTask);
            $data['groupTaskByDepartment'] = $this->groupDataByDepartment($totalTask);

            $startDate = ($params['startDate'])->format('Y-m-d');
            $endDate = ($params['endDate'])->format('Y-m-d');

            $passingData = [
                'data' => $data,
                'startDate' => $startDate,
                'endDate' => $endDate
            ];

        } else {
            $totalTask = $this->formatDataReturn($this->getTotalTask($params), $params);
            $totalDoneTask = $this->formatDataReturn($this->getDoneTask($params), $params);
            $totalRedoTask = $this->formatDataReturn($this->getRedoTask($params), $params);
            $totalTaskLength = $this->formatDataReturn($this->getRedoTask($params), $params, true);

            $startDate = ($params['startDate'])->format('Y-m-d');
            $endDate = ($params['endDate'])->format('Y-m-d');

            $passingData = [
                'totalTask' => $totalTask,
                'totalDoneTask' => $totalDoneTask,
                'totalRedoTask' => $totalRedoTask,
                'totalTaskLength' => $totalTaskLength,
                'startDate' => $startDate,
                'endDate' => $endDate
            ];

        }
        $passingData['highestProductRankingMember'] = $highestProductRankingMember;
        $taskQuery = Task::query()->select(DB::raw("DATE_FORMAT(created_at,'%d-%M-%Y') as created_at"));
        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $taskQuery = $taskQuery->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $taskQuery = $taskQuery->where('member_id', '=', Auth::user()->member->id);
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $taskQuery = $taskQuery->whereIn('department_id', $authUserDepartments);
        }
        $weekMap = [
            0 => 'SUN',
            1 => 'MON',
            2 => 'TUE',
            3 => 'WED',
            4 => 'THU',
            5 => 'FRI',
            6 => 'SAT',
        ];
        $newData = $taskQuery->whereNotNull('member_id')->orderBy('created_at', 'asc')->whereDate('created_at', '>', now()->subMonths())->get()->groupBy('created_at');
        $formatMapWithKey = $newData->mapWithKeys(function ($item, $key) use ($weekMap) {
            $formattedKey = Carbon::parse($key)->dayOfWeek;

            return [
                $key => [
                    'format' => $weekMap[$formattedKey],
                    'value' => collect($item)->count(),
                ]
            ];
        });
        for ($i = 0; $i < 7; $i++) {
            $todayCarbon = Carbon::now()->subDays($i);
            $today = $todayCarbon->format('Y-m-d 00:00:00');

            $dummyValue = [
                'format' => $weekMap[$todayCarbon->dayOfWeek],
                'value' => 0,
            ];
            $formatMapWithKey[$today] = isset($formatMapWithKey[$today]) ? $formatMapWithKey[$today] : $dummyValue;
        }
        $formatMapWithKey = $formatMapWithKey->sortBy(function ($value, $key) {
            return $key;
        });

        $passingData['tasks']['value'] = $formatMapWithKey->map(function ($item) {
            return $item['value'];
        })->values()->toArray();
        $passingData['tasks']['format'] = $formatMapWithKey->map(function ($item) {
            return $item['format'];
        })->values()->toArray();


        $department = Department::with(['tasks' => function ($query) {
            $query->select(['id', 'department_id', 'product_length', 'name', DB::raw("DATE_FORMAT(created_at,'%Y-%m') as month")])->whereDate('tasks.created_at', '>', now()->subDays(7));
        }])->get();

        $departmentTask = $department->map(function ($department) {
            $department->tasks = $department->tasks->groupBy('month')->toArray();
            return $department;
        });

        $departmentTasks = $departmentTask->map(function ($item) {
            $taskData = [];
            $taskDataObject = [];
            $date = Carbon::now();
            for ($i = 1; $i <= 12; $i++) {
                $dateFormat = $date->format('Y-m');
                $taskData[] = isset($item->tasks[$dateFormat]) ? count(collect($item->tasks[$dateFormat])) : 0;
                // this to checking data start right position
                $taskDataObject[$dateFormat] = isset($item->tasks[$dateFormat]) ? count(collect($item->tasks[$dateFormat])) : 0;
                $date->subMonths(1);
            }

            return [
                'department_name' => $item->name,
                'tasks' => array_reverse($taskData),
            ];
        });

        $departmentTaskLength = $departmentTask->map(function ($item) {
            $taskData = [];
            $taskDataObject = [];
            $date = Carbon::now();
            for ($i = 1; $i <= 12; $i++) {
                $dateFormat = $date->format('Y-m');
                $taskData[] = isset($item->tasks[$dateFormat]) ? collect($item->tasks[$dateFormat])->sum('product_length') : 0;
                // this to checking data start right position
                $taskDataObject[$dateFormat] = isset($item->tasks[$dateFormat]) ? collect($item->tasks[$dateFormat])->sum('product_length') : 0;
                $date->subMonths(1);
            }

            return [
                'department_name' => $item->name,
                'tasks' => array_reverse($taskData),
            ];
        });

        $departmentTaskDoneQueryData = Department::with(['tasks' => function ($query) {
            $query->select(['id', 'department_id', 'product_length', 'name', DB::raw("DATE_FORMAT(created_at,'%Y-%m') as month")])
                ->whereDate('tasks.created_at', '>', now()->subYears())
                ->where('tasks.status_code', Task::TASK_STATUS['DONE']);
        }])->get()->map(function ($department) {
            $department->tasks = $department->tasks->groupBy('month')->toArray();
            return $department;
        });

        $departmentDoneTask = $departmentTaskDoneQueryData->map(function ($item) {
            $taskData = [];
            $taskDataObject = [];
            $date = Carbon::now();
            for ($i = 1; $i <= 12; $i++) {
                $dateFormat = $date->format('Y-m');
                $taskData[] = isset($item->tasks[$dateFormat]) ? count(collect($item->tasks[$dateFormat])) : 0;
                // this to checking data start right position
                $taskDataObject[$dateFormat] = isset($item->tasks[$dateFormat]) ? count(collect($item->tasks[$dateFormat])) : 0;
                $date->subMonths(1);
            }

            return [
                'department_name' => $item->name,
                'tasks' => array_reverse($taskData),
            ];
        });

        $departmentTaskDoneLength = $departmentTaskDoneQueryData->map(function ($item) {
            $taskData = [];
            $taskDataObject = [];
            $date = Carbon::now();
            for ($i = 1; $i <= 12; $i++) {
                $dateFormat = $date->format('Y-m');
                $taskData[] = isset($item->tasks[$dateFormat]) ? collect($item->tasks[$dateFormat])->sum('product_length') : 0;
                // this to checking data start right position
                $taskDataObject[$dateFormat] = isset($item->tasks[$dateFormat]) ? collect($item->tasks[$dateFormat])->sum('product_length') : 0;
                $date->subMonths(1);
            }

            return [
                'department_name' => $item->name,
                'tasks' => array_reverse($taskData),
            ];
        });


        $passingData['departmentTasks'] = $departmentTasks;
        $passingData['departmentDoneTasks'] = $departmentDoneTask;
        $passingData['departmentTaskLength'] = $departmentTaskLength;
        $passingData['departmentTaskDoneLength'] = $departmentTaskDoneLength;
        $passingData['selectedDepartmentId'] = $departmentId;

        $date = Carbon::now();
        $arrayDate = [];
        for ($i = 1; $i <= 12; $i++) {
            $dateFormat = $date->format('m/Y');
            array_push($arrayDate, $dateFormat);
            $date->subMonths(1);
        }
        $passingData['arrayDate'] = array_reverse($arrayDate);

        $passingData['departments'] = Department::query()->where('department_head_id', Auth::user()->member->id)->get();
        if (Auth::user()->getRoleNames()[0] === Role::ROLE_SUPER_ADMIN) {
            $passingData['departments'] = Department::query()->get();
        }

        return view('admin-template.page.dashboard.index', $passingData);
    }

    public function departmentInformation(Request $request) {
        $departmentId = $request->department_id;
        $type = $request->type;

        $department = Department::with(['tasks' => function ($query) {
            $query->select(['id', 'department_id', 'product_length', 'product_rate', 'name', DB::raw("DATE_FORMAT(created_at,'%Y-%m') as month")])
                ->whereDate('tasks.created_at', '>', now()->subYears());
        }])->find($departmentId);
        $department->tasks = $department->tasks->groupBy('month')->toArray();


        $departmentTask = [];
        $departmentTaskObject = [];
        $date = Carbon::now();
        for ($i = 1; $i <= 12; $i++) {
            $dateFormat = $date->format('Y-m');
            $departmentTask[] = isset($department->tasks[$dateFormat]) ? $this->formatTask(collect($department->tasks[$dateFormat]), $type) : 0;
            // this to checking data start right position
            $departmentTaskObject[$dateFormat] = isset($department->tasks[$dateFormat]) ? collect($department->tasks[$dateFormat])->sum('product_length') : 0;
            $date->subMonths(1);
        }
        $arrayDate = [];
        for ($i = 1; $i <= 12; $i++) {
            $dateFormat = $date->format('m/Y');
            array_push($arrayDate, $dateFormat);
            $date->subMonths(1);
        }

        $data =  [
            'department_name' => $department->name,
            'tasks' => array_reverse($departmentTask),
            'arrayDate' => array_reverse($arrayDate),
            'unit' => $this->getUnit($type),
            'chartId' => sprintf('chart-%s', $type),
        ];


        return view('admin-template.page.dashboard.department-information', $data);
    }

    public function dailyTask(Request $request) {
        $departmentId = $request->department_id;
        $taskQuery = Task::query()->select(DB::raw("DATE_FORMAT(created_at,'%d-%M-%Y') as created_at"))->where('department_id', $departmentId);

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $taskQuery = $taskQuery->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $taskQuery = $taskQuery->where('member_id', '=', Auth::user()->member->id);
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $taskQuery = $taskQuery->whereIn('department_id', $authUserDepartments);
        }
        $weekMap = [
            0 => 'SUN',
            1 => 'MON',
            2 => 'TUE',
            3 => 'WED',
            4 => 'THU',
            5 => 'FRI',
            6 => 'SAT',
        ];
        $newData = $taskQuery->orderBy('created_at', 'asc')->whereDate('created_at', '>', now()->subMonths())->get()->groupBy('created_at');
        $formatMapWithKey = $newData->mapWithKeys(function ($item, $key) use ($weekMap) {
            $formattedKey = Carbon::parse($key)->dayOfWeek;

            return [
                $key => [
                    'format' => $weekMap[$formattedKey],
                    'value' => collect($item)->count(),
                ]
            ];
        });
        for ($i = 0; $i < 7; $i++) {
            $todayCarbon = Carbon::now()->subDays($i);
            $today = $todayCarbon->format('Y-m-d 00:00:00');

            $dummyValue = [
                'format' => $weekMap[$todayCarbon->dayOfWeek],
                'value' => 0,
            ];
            $formatMapWithKey[$today] = isset($formatMapWithKey[$today]) ? $formatMapWithKey[$today] : $dummyValue;
        }
        $formatMapWithKey = $formatMapWithKey->sortBy(function ($value, $key) {
            return $key;
        });

        $data['tasks']['value'] = $formatMapWithKey->map(function ($item) {
            return $item['value'];
        })->values()->toArray();
        $data['tasks']['format'] = $formatMapWithKey->map(function ($item) {
            return $item['format'];
        })->values()->toArray();

        return view('admin-template.page.dashboard.daily-task', $data);
    }

    public function getUnit($type) {
        if ($type === 'stars') {
            return 'stars';
        }
        if ($type === 'durations') {
            return 'minutes';
        }

        return 'yêu cầu';
    }

    public function formatTask($collection, $type) {
        if ($type === 'stars') {
            return $collection->sum('product_rate');
        }
        if ($type === 'durations') {
            return $collection->sum('product_length');
        }

        return $collection->count();
    }

    public function groupDataByDepartment($totalTask)
    {
        return $totalTask->groupBy('department_id')->map(function ($item, $key) {
            $department = Department::find($key);

            $taskDone = $item->filter(function ($i) {
                return $i->status_code === Task::TASK_STATUS['DONE'];
            })->count();
            $taskRedo = $item->filter(function ($i) {
                return $i->status_code === Task::TASK_STATUS['REDO'];
            })->count();

            return [
                'name' => $department->name,
                'number_of_tasks' => $item->count(),
                'number_of_done_tasks' => $taskDone,
                'number_of_redo_tasks' => $taskRedo,
                'total_product_length' => $item->sum('product_length')
            ];
        });
    }

    public function groupDataByMember($totalTask)
    {
        $tasks = [];
        foreach ($totalTask as $task) {
            if (!$task->member_id) {
                continue;
            }

            if (!isset($tasks[$task->member_id])) {
                $tasks[$task->member_id] = [];
            }

            array_push($tasks[$task->member_id], $task);
        }
        $tasks = collect($tasks)
            ->map(function ($item, $key) {
                $task = collect($item);
                $member = Member::find($key);

                $groupTask = $task->groupBy('type');
                $groupTaskNormal = isset($groupTask['Normal']) ? $groupTask['Normal']->count() : 0;
                $groupTaskSponsor = isset($groupTask['Sponsor']) ? $groupTask['Sponsor']->count() : 0;
                $groupTaskShort = isset($groupTask['Short']) ? $groupTask['Short']->count() : 0;


                $taskDone = $task->filter(function ($i) {
                    return $i->status_code === Task::TASK_STATUS['DONE'];
                });



                $groupTaskDone = $taskDone->groupBy('type');
                $groupTaskDoneNormal = isset($groupTaskDone['Normal']) ? $groupTaskDone['Normal']->count() : 0;
                $groupTaskDoneSponsor = isset($groupTaskDone['Sponsor']) ? $groupTaskDone['Sponsor']->count() : 0;
                $groupTaskDoneShort = isset($groupTaskDone['Short']) ? $groupTaskDone['Short']->count() : 0;

                $taskRedo = $task->filter(function ($i) {
                    return $i->status_code === Task::TASK_STATUS['REDO'];
                });

                $groupTaskUndo = $taskRedo->groupBy('type');
                $groupTaskUndoNormal = isset($groupTaskUndo['Normal']) ? $groupTaskUndo['Normal']->count() : 0;
                $groupTaskUndoSponsor = isset($groupTaskUndo['Sponsor']) ? $groupTaskUndo['Sponsor']->count() : 0;
                $groupTaskUndoShort = isset($groupTaskUndo['Short']) ? $groupTaskUndo['Short']->count() : 0;

                $params = [
                    'name' => $member->name,
                    'number_of_tasks' => $task->count(),
                    'number_of_done_tasks' => $taskDone->count(),
                    'number_of_undo_tasks' => $taskRedo->count(),
                    'total_product_length' => $task->sum('product_length'),


                    'group_task_normal' => $groupTaskNormal,
                    'group_task_sponsor' => $groupTaskSponsor,
                    'group_task_short' => $groupTaskShort,


                    'group_task_done_normal' => $groupTaskDoneNormal,
                    'group_task_done_sponsor' => $groupTaskDoneSponsor,
                    'group_task_done_short' => $groupTaskDoneShort,


                    'group_task_undo_normal' => $groupTaskUndoNormal,
                    'group_task_undo_sponsor' => $groupTaskUndoSponsor,
                    'group_task_undo_short' => $groupTaskUndoShort,
                ];

                $params['total_product_normal_length']  = isset($groupTask['Normal']) ?  $groupTask['Normal']->sum('product_length') : 0;
                $params['total_product_sponsor_length']  = isset($groupTask['Sponsor']) ?  $groupTask['Sponsor']->sum('product_length') : 0;
                $params['total_product_short_length']  = isset($groupTask['Short']) ?  $groupTask['Short']->sum('product_length') : 0;

                return $params;
            });

        return $tasks;
    }


    public function filterByDate($query, $params)
    {
        if (isset($params['startDate']) && isset($params['endDate'])) {
            $query = $query->whereBetween('created_at', [$params['startDate'], $params['endDate']]);
        }

        return $query;
    }

    public function filterByDepartment($query, $params)
    {
        if (isset($params['departmentId'])) {
            $query = $query->where('department_id', $params['departmentId']);
        }

        return $query;
    }

    public function filterByRole($query, $params)
    {
        if ($params['userRole'] === Role::ROLE_EDITOR) {
            $query = $query->where('member_id', '=', Auth::id());
        } elseif ($params['userRole'] === Role::ROLE_KOLS) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if ($params['userRole'] === Role::ROLE_COF) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }
        return $query;
    }

    public function filterByStatus($query, $status = null)
    {
        if ($status) {
            $query = $query->where('status_code', '=', $status);
        }

        return $query;
    }

    public function formatDataReturn($data, $params, $isSumProductLength = false)
    {
        if ($params['userRole'] === Role::ROLE_EDITOR || $params['userRole'] === Role::ROLE_KOLS) {
            return $isSumProductLength ? $data->sum('product_length') : $data->count();
        }

        return $data;
    }

    public function getTotalTask($params)
    {
        $query = Task::query();

        // Lọc theo trạng thái
        $query = $this->filterByStatus($query);

        // Lọc theo ngày
        $query = $this->filterByDate($query, $params);

        // Lọc theo role
        $query = $this->filterByRole($query, $params);

        // Lọc theo department
        $query = $this->filterByDepartment($query, $params);

        return $query->get();
    }

    public function getDoneTask($params)
    {

        $query = Task::query();

        // Lọc theo trạng thái
        $query = $this->filterByStatus($query, Task::TASK_STATUS['DONE']);

        // Lọc theo ngày
        $query = $this->filterByDate($query, $params);

        // Lọc theo role
        $query = $this->filterByRole($query, $params);

        return $query->get();
    }

    public function getRedoTask($params)
    {
        $query = Task::query();

        // Lọc theo trạng thái
        $query = $this->filterByStatus($query, Task::TASK_STATUS['REDO']);

        // Lọc theo ngày
        $query = $this->filterByDate($query, $params);

        // Lọc theo role
        $query = $this->filterByRole($query, $params);

        return $query->get();
    }

    public function getTotalTaskLength($params)
    {
        $query = Task::query();

        // Lọc theo trạng thái
        $query = $this->filterByStatus($query, Task::TASK_STATUS['REDO']);

        // Lọc theo ngày
        $query = $this->filterByDate($query, $params);

        // Lọc theo role
        $query = $this->filterByRole($query, $params);

        return $this->formatDataReturn($query->get(), $params, true);
    }
}
