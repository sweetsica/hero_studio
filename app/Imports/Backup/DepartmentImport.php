<?php

namespace App\Imports\Backup;

use App\Models\Department;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DepartmentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $data = $rows->skip(1)->map(function($item) {
            return [
                'id' => $item[0],
                'name' => $item[1],
                'description' => $item[2],
                'department_head_id' => $item[3],
                'status' => $item[4],
                'deleted_at' => Carbon::parse($item[5]),
                'created_at' => Carbon::parse($item[6]),
                'updated_at' => Carbon::parse($item[7]),
            ];
        })->toArray();

        foreach ($data as $department) {
            $departmentRecord = Department::where('id',$department['id'])->first();
            if ($departmentRecord !== null) {
                $departmentRecord->id = $department['id'];
                $departmentRecord->name = $department['name'];
                $departmentRecord->code = $department['description'];
                $departmentRecord->department_head_id = $department['department_head_id'];
                $departmentRecord->status = $department['status'];
                $departmentRecord->deleted_at = $department['deleted_at'];
                $departmentRecord->created_at = $department['created_at'];
                $departmentRecord->updated_at = $department['updated_at'];
            } else {
                $departmentRecord = Department::create($department);
            }
        }
    }
}
