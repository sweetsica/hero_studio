<?php

namespace App\Exports\Backup;

use App\Models\Comment;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class CommentsExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    protected $rows;

    public function __construct()
    {
        $this->rows = Comment::query()->get()->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['member_id'],
            $row['task_id'],
            $row['content'],
            $row['type'],
            $row['media_type'],
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
            'Member id',
            'Task id',
            'Content',
            'Type',
            'Media type',
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
        return 'Comment';
    }

    public function columnFormats(): array
    {
        return [];
    }
}
