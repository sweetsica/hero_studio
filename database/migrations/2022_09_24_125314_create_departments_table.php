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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();//Mã phòng
            $table->string('name')->nullable();//Tên phòng
            $table->string('desciption')->nullable();//Mô tả phòng
            $table->integer('status')->default('1');//Trạng thái phòng
            $table->dateTime('deleted_at')->nullable();//Thời gian xóa phòng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
