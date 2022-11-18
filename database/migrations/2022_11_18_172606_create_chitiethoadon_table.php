<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiethoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadon', function (Blueprint $table) {
            $table->integer('idhoadon')->index('idhoadon');
            $table->integer('idsanpham')->index('idsanpham');
            $table->string('tensanpham', 300);
            $table->integer('gia');
            $table->integer('soluong');
            $table->integer('giamgia')->nullable();
            $table->string('quatang', 300)->nullable();
            $table->integer('idchitiethoadon')->primary();
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
        Schema::dropIfExists('chitiethoadon');
    }
}
