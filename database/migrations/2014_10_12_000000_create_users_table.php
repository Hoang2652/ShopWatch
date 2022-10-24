<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->date('ngaysinh');
            $table->string('gioitinh', 8);
            $table->string('email');
            $table->string('dienthoai', 11);
            $table->string('diachi');
            $table->date('ngaydangky')->useCurrent();
            $table->integer('phanquyen');
            $table->boolean('trangthai');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
