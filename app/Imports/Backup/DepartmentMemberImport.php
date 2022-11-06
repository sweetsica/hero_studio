<?php

namespace App\Imports\Backup;

use App\Models\DepartmentMember;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DepartmentMemberImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $data = $rows->skip(1)->map(function ($item) {
            return [
                'id' => $item[0],
                'department_id' => $item[1],
                'member_id' => $item[2],
                'created_at' => Carbon::parse($item[3]),
                'updated_at' => Carbon::parse($item[4]),
            ];
        })->toArray();

        foreach ($data as $member) {
            $memberRecord = DepartmentMember::where('department_id', $member['department_id'])->where('member_id', $member['member_id'])->first();
            if ($memberRecord !== null) {
                $memberRecord->update($memberRecord);
            } else {
                $memberRecord = DepartmentMember::create($member);
            }
        }
    }
}
