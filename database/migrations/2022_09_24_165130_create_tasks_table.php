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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('member_id'); // member phu trach
            $table->unsignedBigInteger('department_id');  // task cua department nao
            $table->text('content');
            $table->dateTime('deadline');
            $table->integer('status_code'); // 4 trang thai , SENT , INPROGRESS, REVIEW, DONE

            $table->string('product_name');
            $table->string('product_description');

            $table->string('url_source');

            $table->string('url_fanpage');
            $table->string('url_facebook');
            $table->string('url_youtube');
            $table->string('url_tiktok');
            $table->text('url_others');

            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
