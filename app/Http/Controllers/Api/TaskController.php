<?php

namespace App\Http\Controllers\Api;


use App\Http\Service\TaskService;

class TaskController extends BaseController
{
    public function __construct(TaskService $taskService)
    {
        parent::__construct($taskService);
    }
}
