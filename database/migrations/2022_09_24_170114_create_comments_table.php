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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('pusher')->nullable();//Người gửi bình luận
            $table->string('reciver')->nullable();//Người nhận bình luận
            $table->string('task_id')->nullable();//Id task chứa bình luận
            $table->boolean('status')->nullable();//Trạng thái bình luận
            $table->dateTime('deleted_at')->nullable();//Thời gian xóa bình luận
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
        Schema::dropIfExists('comments');
    }
};
