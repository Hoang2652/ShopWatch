<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitrikhohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitrikhohang', function (Blueprint $table) {
            $table->integer('idvitrikhohang')->primary();
            $table->string('tenvitrikhohang', 50);
            $table->integer('idkhohang')->index('idkhohang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vitrikhohang');
    }
}
