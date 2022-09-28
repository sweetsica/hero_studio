<?php

namespace App\Http\Repository;

use App\Models\Department;


class DepartmentRepository extends BaseRepository
{
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }
}
