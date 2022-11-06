<?php

namespace App\Exports\Backup;

use App\Models\Department;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;

    public function __construct()
    {
        $this->rows = User::query()->get()->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['name'],
            $row['email'],
            $row['email_verified_at'],
            $row['password'],
            $row['created_at'],
            $row['updated_at'],
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'Name',
            'Email',
            'Email Verified At',
            'Password',
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
        return 'Users';
    }

    public function columnFormats(): array
    {
        return [];
    }
}
