<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaispsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisps', function (Blueprint $table) {
            $table->id();
            $table->string('tenloai');
            $table->string('slug');
            $table->longText('mota');
            $table->string('hinhanh')->nullable();
            $table->string('meta_tieude');
            $table->string('meta_keyword');
            $table->mediumText('meta_mota');
            $table->tinyInteger('trangthai')->default('0')->comment('0=visible,1=hidden');
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
        Schema::dropIfExists('loaisps');
    }
}
