<?php

namespace App\Http\Service;

use App\Http\Repository\CategoryRepository;

class CategoryService extends BaseService
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct($categoryRepository);
    }
}
