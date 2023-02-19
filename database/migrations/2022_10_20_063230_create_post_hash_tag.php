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
        Schema::create('post_hash_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hash_tag_id');
            $table->unsignedBigInteger('post_id');

            $table->foreign('hash_tag_id')->references('id')->on('hash_tags')->cascadeOnDelete();;
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();;
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
        Schema::dropIfExists('post_hash_tag');
    }
};
