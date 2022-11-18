<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->bigIncrements('idnguoidung');
            $table->string('tennguoidung', 120);
            $table->string('tendangnhap', 50);
            $table->string('matkhau', 100);
            $table->date('ngaysinh')->nullable();
            $table->string('gioitinh', 8)->nullable();
            $table->string('email')->nullable();
            $table->string('dienthoai', 11)->nullable();
            $table->string('diachi')->nullable();
            $table->timestamps()->default('current_timestamp()');
            $table->string('phanquyen', 40);
            $table->tinyInteger('trangthai');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
