<?php

namespace App\Imports\Backup;

use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BackupImport implements WithMultipleSheets, SkipsUnknownSheets
{
    public function sheets(): array
    {
        $sheets = [
            'Users' => new UserImport(),
            'Members' => new MemberImport(),
            'Departments' => new DepartmentImport(),
            'Department Member' => new DepartmentMemberImport(),
        ];

        return $sheets;
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
