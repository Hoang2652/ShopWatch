<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiethoadonnhapxuatkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadonnhapxuatkho', function (Blueprint $table) {
            $table->integer('idauto')->primary();
            $table->integer('idhoadonnhapxuatkho')->index('idhoadonnhapxuatkho');
            $table->string('idsanpham', 11)->index('idsanpham');
            $table->string('tensanpham', 200);
            $table->integer('soluong');
            $table->string('donvi', 10);
            $table->integer('dongia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiethoadonnhapxuatkho');
    }
}
