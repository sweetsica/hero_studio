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
        Schema::create('task_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('member_id')->nullable(); // member phu trach
            $table->unsignedBigInteger('creator_id')->nullable(); // người tạo
            $table->unsignedBigInteger('department_id')->nullable();  // task cua department nao
            $table->text('content')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->integer('status_code')->default(\App\Models\Task::TASK_STATUS['SENT']);

            $table->string('type')->default('Normal');


            $table->string('product_name')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_length')->nullable();
            $table->integer('product_rate')->nullable();

            $table->string('source')->nullable();
            $table->string('url_source')->nullable();

            $table->text('url_others')->nullable();
            $table->dateTime('completed_at')->nullable();

            $table->timestamps();


            $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
            $table->foreign('creator_id')->references('id')->on('members')->cascadeOnDelete();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_accounts');
    }
};
