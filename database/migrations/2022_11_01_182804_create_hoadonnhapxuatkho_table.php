<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonnhapxuatkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonnhapxuatkho', function (Blueprint $table) {
            $table->integer('idhoadonnhapxuatkho')->primary();
            $table->string('tendoitac', 200);
            $table->string('dienthoai', 12);
            $table->string('email', 40);
            $table->string('diachinhapkho', 200);
            $table->string('diachixuatkho', 200);
            $table->date('ngaynhapxuat');
            $table->string('loaihoadon', 10);
            $table->string('trangthai', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonnhapxuatkho');
    }
}
