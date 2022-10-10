<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\PostService;

class PostController extends BaseController
{
    public function __construct(PostService $postService)
    {
        parent::__construct($postService);
    }
}
