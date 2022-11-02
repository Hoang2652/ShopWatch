<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotro', function (Blueprint $table) {
            $table->integer('idhotro')->primary();
            $table->string('chude');
            $table->text('noidung');
            $table->string('hoten', 50);
            $table->integer('dienthoai');
            $table->string('email');
            $table->timestamps()->default('current_timestamp()');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotro');
    }
}
