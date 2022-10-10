<?php

namespace App\Http\Repository;

use App\Models\Member;


class MemberRepository extends BaseRepository
{
    public function __construct(Member $member)
    {
        parent::__construct($member);
    }
}
