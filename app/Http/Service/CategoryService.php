<?php

namespace App\Http\Service;

use App\Http\Repository\DepartmentRepository;

class CategoryService extends BaseService
{
    public function __construct(DepartmentRepository $categoryRepository)
    {
        parent::__construct($categoryRepository);
    }
}
