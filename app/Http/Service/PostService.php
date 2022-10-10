<?php

namespace App\Http\Service;

use App\Http\Repository\PostRepository;

class PostService extends BaseService
{
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct($postRepository);
    }
}
