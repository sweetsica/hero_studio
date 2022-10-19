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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('subject');
            $table->text('content');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('thumbnail');
            $table->text('link_video');
            $table->text('link_driver');
            $table->unsignedBigInteger('member_id')->nullable();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('category_id')->references('id')->on('categories');

//            $table->string('author')->nullable();//Tên tác giả bài viết
//            $table->string('title')->nullable();
//            $table->string('thumb')->nullable();//Ảnh bài viết
//            $table->text('content')->nullable();//Nội dung bài viết

            $table->boolean('status')->default('1');//Trạng thái bài viết
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
        Schema::dropIfExists('posts');
    }
};
