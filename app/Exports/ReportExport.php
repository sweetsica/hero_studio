<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromArray;

class ReportExport implements FromArray
{
    public function array(): array
    {
       $data = Task::query()->get()->toArray();

        return $data;
    }
}
