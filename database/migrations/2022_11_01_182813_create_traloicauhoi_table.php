<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraloicauhoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traloicauhoi', function (Blueprint $table) {
            $table->integer('idcauhoi')->primary();
            $table->string('noidungcauhoi', 300);
            $table->text('cautraloi')->nullable();
            $table->date('ngaytraloi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traloicauhoi');
    }
}
