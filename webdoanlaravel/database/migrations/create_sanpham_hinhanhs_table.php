<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamHinhanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_hinhanhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanpham_id');
            $table->string('hinhanh');
            $table->foreign('sanpham_id')->references('id')->on('sanphams')->onDelete('cascade');
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
        Schema::dropIfExists('sanpham_hinhanhs');
    }
}
