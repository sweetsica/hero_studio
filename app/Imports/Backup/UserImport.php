<?php

namespace App\Imports\Backup;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $data = $rows->skip(1)->map(function($item) {
            return [
                'id' => $item[0],
                'name' => $item[1],
                'email' => $item[2],
                'password' => $item[4],
                'created_at' => Carbon::parse($item[5]),
                'updated_at' => Carbon::parse($item[6])
            ];
        })->toArray();

        foreach ($data as $user) {
            $userRecord = User::where('id', $user['id'])->first();
            if ($userRecord !== null) {
                $userRecord->update($user);
            } else {
                $userRecord = User::create($user);
            }
        }
    }
}
