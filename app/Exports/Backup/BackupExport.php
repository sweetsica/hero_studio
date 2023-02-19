<?php

namespace App\Exports\Backup;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BackupExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [
            new DepartmentsExport(),
            new UserExport(),
            new MemberExport(),
            new DepartmentMemberExport(),
        ];

        return $sheets;
    }
}
