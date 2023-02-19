<?php

namespace App\Exports\Backup;

use App\Models\Category;
use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class MemberExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;

    public function __construct()
    {
        $this->rows = Member::query()->get()->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['user_id'],
            $row['name'],
            $row['code'],
            $row['special_access'],
            $row['date_of_birth'],
            $row['status'],
            $row['created_at'],
            $row['updated_at'],
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'User Id',
            'Name',
            'Code',
            'Special Access',
            'Date of Birth',
            'Status',
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
        return 'Members';
    }

    public function columnFormats(): array
    {
        return [];
    }
}
