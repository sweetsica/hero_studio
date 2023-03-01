<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table('tasks')
        ->where('status_code', '=', 3)
        ->update(['tasks.completed_at' => DB::raw('tasks.updated_at')]);
    }
};
