<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Service\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct($categoryService);
    }
}
