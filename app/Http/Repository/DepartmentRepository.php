<?php

namespace App\Http\Repository;

use App\Models\Department;


class DepartmentRepository extends BaseRepository
{
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }

    public function assignMember($memberId, $departmentId) {
        $department = $this->getById($departmentId);
        $department->members()->sync($memberId, false);

        return $department->members;
    }

    public function removeMember($memberId, $departmentId) {
        $department = $this->getById($departmentId);
        $department->members()->detach($memberId);

        return $department->members;
    }
}
