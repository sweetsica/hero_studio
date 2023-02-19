<?php

namespace App\Exports\Backup;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class DepartmentsExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;

    public function __construct()
    {
        $this->rows = Department::query()->get()->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['name'],
            $row['description'],
            $row['department_head_id'],
            $row['status'],
            $row['deleted_at'],
            $row['created_at'],
            $row['updated_at'],
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'Name',
            'Description',
            'Department Head Id',
            'Status',
            'Deleted At',
            'Created At',
            'Updated At',
        ];
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function title(): string
    {
        return 'Departments';
    }

    public function columnFormats(): array
    {
        return [];
    }
}
