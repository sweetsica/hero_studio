<?php

namespace App\Exports\Backup;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class CategoryExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;

    public function __construct()
    {
        $this->rows = Category::query()->get()->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['name'],
            $row['created_at'],
            $row['updated_at'],
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
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
        return 'Category';
    }

    public function columnFormats(): array
    {
        return [];
    }
}
