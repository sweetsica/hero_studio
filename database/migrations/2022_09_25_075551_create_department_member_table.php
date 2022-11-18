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
        Schema::create('department_member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable();;
            $table->unsignedBigInteger('member_id')->nullable();;
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->nullable()->cascadeOnDelete();;
            $table->foreign('member_id')->references('id')->on('members')->nullable()->cascadeOnDelete();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_user');
    }
};
