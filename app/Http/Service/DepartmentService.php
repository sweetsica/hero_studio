<?php

namespace App\Http\Service;

use App\Http\Repository\DepartmentRepository;

class DepartmentService extends BaseService
{

    public function __construct(DepartmentRepository $departmentRepository)
    {
        parent::__construct($departmentRepository);
    }

    public function assignMember($params) {
        return $this->repository->assignMember($params['member_id'], $params['department_id']);
    }

    public function removeMember($params) {
        return $this->repository->removeMember($params['member_id'], $params['department_id']);
    }
}
