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
            $table->string('author')->nullable();//Tên tác giả bài viết
            $table->string('thumb')->nullable();//Ảnh bài viết
            $table->string('category')->nullable();//Danh mục bài viết
            $table->text('content')->nullable();//Nội dung bài viết
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
