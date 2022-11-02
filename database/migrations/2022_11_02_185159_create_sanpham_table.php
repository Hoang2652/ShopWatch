<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->integer('idsanpham')->primary();
            $table->string('tensanpham', 100);
            $table->string('loaisanpham', 5)->nullable();
            $table->string('hinhanh')->nullable();
            $table->text('mota')->nullable();
            $table->string('xuatxu', 300)->nullable();
            $table->integer('baohanh')->nullable();
            $table->text('chitiet')->nullable();
            $table->integer('soluong');
            $table->integer('daban');
            $table->integer('gia');
            $table->integer('iddanhmuc')->nullable()->index('iddanhmuc');
            $table->integer('giamgia')->nullable()->comment("giảm theo phần trăm");
            $table->integer('quatang')->nullable()->comment("chứa idsanpham sẽ tặng");
            $table->integer('soluongkhuyenmai')->nullable()->comment("số lượng sản phẩm sẽ khuyến mãi");
            $table->timestamps()->default('current_timestamp()');
            $table->integer('trangthai');
            $table->integer('idhoadonnhapxuatkho')->nullable();
            $table->integer('idkhohang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
