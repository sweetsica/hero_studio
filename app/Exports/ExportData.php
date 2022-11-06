<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportData implements FromArray,WithHeadings, WithTitle, ShouldAutoSize,WithMapping
{
    protected $data;
    protected $headings;
    protected $rowMaps;
    protected $title;

    public function __construct($params) {
        $this->title = $params['title'];
        $this->headings = $params['headings'];
        $this->rowMaps = $params['rowMaps'];
        $this->data = $params['data'];
    }


    public function array(): array
    {
       return $this->data;
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
    public function title(): string
    {
        return $this->title;
    }
}
