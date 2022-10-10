<?php

namespace App\Http\Service;

use App\Http\Repository\MemberRepository;

class MemberService extends BaseService
{
    public function __construct(MemberRepository $memberRepository)
    {
        parent::__construct($memberRepository);
    }
}
