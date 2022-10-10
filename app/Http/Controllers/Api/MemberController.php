<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\MemberService;

class MemberController extends BaseController
{
    public function __construct(MemberService $memberService)
    {
        parent::__construct($memberService);
    }
}
