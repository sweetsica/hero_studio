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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->integer('status')->default(\App\Models\Member::MEMBER_STATUS['ACTIVE']); // 0 DEACTIVATE , 1 ACTIVE

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
