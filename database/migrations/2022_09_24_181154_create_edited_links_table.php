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
        Schema::create('edited_links', function (Blueprint $table) {
            $table->id();
            $table->string('type');//Loại phương tiện kết quả sau khi sửa
            $table->string('url');//Đường dẫn phương tiện kết quả sau khi sửa
            $table->integer('thumb');//Media id ảnh bìa phương tiện kết quả sau khi sửa
            $table->boolean('status');//Trạng thái phương tiện kết quả sau khi sửa
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
        Schema::dropIfExists('edited_links');
    }
};
