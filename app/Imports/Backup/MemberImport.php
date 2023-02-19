<?php

namespace App\Imports\Backup;

use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MemberImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $data = $rows->skip(1)->map(function($item) {
            return [
                'id' => $item[0],
                'user_id' => $item[1],
                'name' => $item[2],
                'code' => $item[3],
                'special_access' => $item[4],
                'date_of_birth' => $item[5],
                'status' => $item[6],
                'created_at' => Carbon::parse($item[7]),
                'updated_at' => Carbon::parse($item[8]),
            ];
        })->toArray();

        foreach ($data as $member) {
            $memberRecord = Member::where('user_id',$member['user_id'])->first();
            if ($memberRecord !== null) {
                $memberRecord->id = $member['id'];
                $memberRecord->user_id = $member['user_id'];
                $memberRecord->name = $member['name'];
                $memberRecord->code = $member['code'];
                $memberRecord->special_access = $member['special_access'] == 1 ? true : false;
                $memberRecord->user_id = $member['user_id'];
                $memberRecord->date_of_birth = $member['date_of_birth'];
                $memberRecord->status = $member['status'];
                $memberRecord->created_at = $member['created_at'];
                $memberRecord->updated_at = $member['updated_at'];
            } else {
                $memberRecord = Member::create($member);
            }
        }
    }
}
