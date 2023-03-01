<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportPerSheetAdmin implements FromArray, WithTitle, WithHeadings, ShouldAutoSize, WithMapping
{
    private string $department;
    private array $data;
    private array $headings;
    private array $rowMaps;

    public function __construct(array $data, string $department,array $headings, array $rowMaps)
    {
        $this->data = $data;
        $this->department = $department;
        $this->headings = $headings;
        $this->rowMaps = $rowMaps;
    }

    public function headings(): array
    {
        return $this->headings;
    }

    public function map($row): array
    {
        $data = [];
        foreach ($this->rowMaps as $key => $rowMap) {
            array_push($data, $row[$rowMap]);
        }
        return $data;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->department;
    }

    public function array(): array
    {
        return $this->data;
    }
}
