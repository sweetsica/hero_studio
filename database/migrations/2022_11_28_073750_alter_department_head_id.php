<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['department_head_id']);
        });

         Schema::table('departments', function (Blueprint $table) {
            $table->foreign('department_head_id')
                ->references('id')->on('members')
                ->onDelete('cascade');
        });
    }

    public function down() {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['department_head_id']);
            $table->foreign('department_head_id')
                ->references('id')->on('members');
        });
    }
};
