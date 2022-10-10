<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends BaseController
{
    public function __construct(DepartmentService $departmentService)
    {
       $this->service = $departmentService;
    }

    public function assignMember(Request $request) {
        return $this->service->assignMember($request->only(['member_id', 'department_id']));
    }

    public function removeMember(Request $request) {
        return $this->service->removeMember($request->only(['member_id', 'department_id']));
    }
}
