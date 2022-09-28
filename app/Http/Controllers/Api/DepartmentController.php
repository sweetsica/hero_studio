<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\DepartmentService;

class DepartmentController extends BaseController
{
    public function __construct(DepartmentService $departmentService)
    {
        parent::__construct($departmentService);
    }
}
