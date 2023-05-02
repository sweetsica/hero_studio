<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $params['department_head_id'] = 1;
        $params['name'] = \App\Models\Department::DEPARTMENT_ACCOUNT;

        \App\Models\Department::create($params);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Department::where('name', '=', \App\Models\Department::DEPARTMENT_ACCOUNT)->delete();
    }
};
