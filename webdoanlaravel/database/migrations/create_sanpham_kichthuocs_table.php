<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamKichthuocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_kichthuocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanpham_id');
            $table->unsignedBigInteger('kichthuoc_id')->nullable();
            $table->integer('soluong');
            $table->foreign('sanpham_id')->references('id')->on('sanphams')->onDelete('cascade');
            $table->foreign('kichthuoc_id')->references('id')->on('kichthuocs')->onDelete('set null');
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
        Schema::dropIfExists('sanpham_kichthuocs');
    }
}
