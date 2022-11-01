<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhgia', function (Blueprint $table) {
            $table->integer('iddanhgia')->primary();
            $table->integer('idsanpham')->index('idsanpham');
            $table->integer('idnguoidung')->index('idnguoidung');
            $table->integer('sodiem');
            $table->string('binhluan', 1000)->nullable();
            $table->date('ngaybinhluan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgia');
    }
}
