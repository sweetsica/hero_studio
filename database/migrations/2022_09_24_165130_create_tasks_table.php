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
            $table->string('code')->nullable();//Mã đầu việc
            $table->string('name')->nullable();//Tên đầu việc
            $table->text('description')->nullable();//Mô tả đầu việc
            $table->text('type')->nullable();//Loại đầu việc
            $table->string('source_link')->nullable();//Link nguồn đầu việc
            $table->string('edited_link_id')->nullable();//Link sản phẩm đầu việc up fanpage
            $table->string('from')->nullable();//User_id người gửi
            $table->string('to')->nullable();//User_id người nhận
            $table->dateTime('endtime')->nullable();//Hạn hoàn thành
            $table->integer('status')->default('1');//"0": Hủy, "1": Đã giao, "2": Đang thực hiện, "3": Đang phê duyệt,"4": Cần sửa, "5": Đã hoàn thành
            $table->dateTime('deleted_at')->nullable();//Thời gian xóa task
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
        Schema::dropIfExists('tasks');
    }
};
