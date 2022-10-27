<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date)->startOfDay() : Carbon::now()->startOfDay();
        $endDate = $request->end_date ? Carbon::parse($request->end_date)->startOfDay() : Carbon::now()->startOfDay()->addDays(1);

        $userRole = Auth::user()->getRoleNames()[0];
//        $userId = Auth::id();
//
//        $userRole = Role::ROLE_KOLS;
//        $userId = 4;

        $params['startDate'] = $startDate;
        $params['endDate'] = $endDate;
        $params['userRole'] = $userRole;

        if ($params['userRole'] === Role::ROLE_COF || $params['userRole'] === Role::ROLE_SUPER_ADMIN) {
            return $this->returnViewAdminCof($params);
        } else {
            return $this->returnViewEditorKol($params);
        }
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
            if (!isset($tasks[$task->member_id])) {
                $tasks[$task->member_id] = [];
            }

            array_push($tasks[$task->member_id], $task);
            if ($task->creator_id != $task->member_id) {
                if (!isset($tasks[$task->creator_id])) {
                    $tasks[$task->creator_id] = [];
                }
                array_push($tasks[$task->creator_id], $task);
            }
        }
        $tasks = collect($tasks)
            ->map(function ($item, $key) {
                $item = collect($item);
                $member = Member::find($key);
                $taskDone = $item->filter(function ($i) {
                    return $i->status_code === Task::TASK_STATUS['DONE'];
                })->count();
                $taskRedo = $item->filter(function ($i) {
                    return $i->status_code === Task::TASK_STATUS['REDO'];
                })->count();

                return [
                    'name' => $member->name,
                    'number_of_tasks' => $item->count(),
                    'number_of_done_tasks' => $taskDone,
                    'number_of_redo_tasks' => $taskRedo,
                    'total_product_length' => $item->sum('product_length')
                ];
            });
        return $tasks;
    }

    public function returnViewAdminCof($params)
    {
        // By member
        $totalTask = $this->getTotalTask($params);
        $totalDoneTask = $this->getDoneTask($params);
        $totalRedoTask = $this->getRedoTask($params);
        $totalTaskLength = $this->getRedoTask($params);

        $data['groupTaskByMember'] = $this->groupDataByMember($totalTask);
        $data['groupTaskByDepartment'] = $this->groupDataByDepartment($totalTask);

        $startDate = ($params['startDate'])->format('Y-m-d');
        $endDate = ($params['endDate'])->format('Y-m-d');
        return view('admin-template.page.dashboard.index', compact('data', 'startDate', 'endDate'));
    }

    public function groupData()
    {

    }

    public function returnViewEditorKol($params)
    {
        $totalTask = $this->formatDataReturn($this->getTotalTask($params), $params);
        $totalDoneTask = $this->formatDataReturn($this->getDoneTask($params), $params);
        $totalRedoTask = $this->formatDataReturn($this->getRedoTask($params), $params);
        $totalTaskLength = $this->formatDataReturn($this->getRedoTask($params), $params, true);

        $startDate = ($params['startDate'])->format('Y-m-d');
        $endDate = ($params['endDate'])->format('Y-m-d');
        return view('admin-template.page.dashboard.index', compact('totalTask', 'totalDoneTask', 'totalRedoTask', 'totalTaskLength', 'startDate', 'endDate'));
    }

    public function filterByDate($query, $params)
    {
        if (isset($params['startDate']) && isset($params['endDate'])) {
            $query = $query->whereBetween('created_at', [$params['startDate'], $params['endDate']]);
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
