<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamdecuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphamdecu', function (Blueprint $table) {
            $table->integer('idsanphamdecu');
            $table->string('tensanphamdecu', 100);
            $table->integer('idsanpham')->index('idsanpham');
            
            $table->primary(['idsanphamdecu', 'idsanpham']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphamdecu');
    }
}
