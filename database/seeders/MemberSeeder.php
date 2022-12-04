<?php

namespace Database\Seeders;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberInfo = [
            [
                'user_id' => 1,
                'name' => 'Admin',
                'code' => '',
                'date_of_birth' => Carbon::now(),
                'position_id' => 1,
                'special_access' => '1',
                'status' => Member::MEMBER_STATUS['ACTIVE'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
//            [
//                'user_id' => 2,
//                'name' => 'Thành viên KOL',
//                'code' => 'NV2',
//                'date_of_birth' => Carbon::now(),
//                'position_id' => 2,
//                'special_access' => '1',
//                'status' => Member::MEMBER_STATUS['ACTIVE'],
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'user_id' => 3,
//                'name' => 'Thành viên Editor',
//                'code' => 'NV3',
//                'date_of_birth' => Carbon::now(),
//                'position_id' => 3,
//                'special_access' => '0',
//                'status' => Member::MEMBER_STATUS['ACTIVE'],
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'user_id' => 4,
//                'name' => 'Thành viên Designer',
//                'code' => 'NV4',
//                'date_of_birth' => Carbon::now(),
//                'position_id' => 3,
//                'special_access' => '0',
//                'status' => Member::MEMBER_STATUS['ACTIVE'],
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'user_id' => 5,
//                'name' => 'Trưởng phòng Editor',
//                'code' => 'EDITOR_LEAD',
//                'date_of_birth' => Carbon::now(),
//                'position_id' => 1,
//                'special_access' => '0',
//                'status' => Member::MEMBER_STATUS['ACTIVE'],
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'user_id' => 6,
//                'name' => 'Trưởng phòng Designer',
//                'code' => 'DESIGNER_LEAD',
//                'date_of_birth' => Carbon::now(),
//                'position_id' => 1,
//                'special_access' => '0',
//                'status' => Member::MEMBER_STATUS['ACTIVE'],
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
        ];

        Member::insert($memberInfo);
    }
}
