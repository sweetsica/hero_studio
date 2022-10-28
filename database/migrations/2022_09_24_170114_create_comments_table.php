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
            $table->unsignedBigInteger('member_id'); //Người gửi bình luận
            $table->unsignedBigInteger('task_id'); //Id task chứa bình luận
            $table->text('content');
            $table->string('type')->default('text');
            $table->string('media_type')->nullable();
            $table->boolean('status')->nullable(); //Trạng thái bình luận
            $table->dateTime('deleted_at')->nullable(); //Thời gian xóa bình luận
            $table->timestamps();

//            $table->foreign('member_id')->references('id')->on('members');
//            $table->foreign('task_id')->references('id')->on('tasks');
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
