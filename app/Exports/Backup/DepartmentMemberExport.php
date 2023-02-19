<?php

namespace App\Exports\Backup;

use App\Models\Department;
use App\Models\DepartmentMember;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class DepartmentMemberExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;

    public function __construct()
    {
        $this->rows = DepartmentMember::query()->get()->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['department_id'],
            $row['member_id'],
            $row['created_at'],
            $row['updated_at'],
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'Department id',
            'Member id',
            'Created at',
            'Updated at',
        ];
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function title(): string
    {
        return 'Department Member';
    }

    public function columnFormats(): array
    {
        return [];
    }
}
