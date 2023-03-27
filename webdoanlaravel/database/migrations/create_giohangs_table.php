<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiohangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohangs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sanpham_id');
            $table->integer('sanpham_huongvi_id')->nullable();
            $table->integer('sanpham_kichthuoc_id')->nullable();
            $table->integer('soluong');
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
        Schema::dropIfExists('giohangs');
    }
}
