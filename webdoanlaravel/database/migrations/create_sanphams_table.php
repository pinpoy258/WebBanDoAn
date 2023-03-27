<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loaisp_id');
            $table->string('tensanpham');
            $table->string('slug');
            $table->string('nhacungcap')->nullable();
            $table->mediumText('small_mota')->nullable();
            $table->longText('mota')->nullable();

            $table->integer('original_gia');
            $table->integer('selling_gia');
            $table->integer('soluong');
            $table->tinyInteger('banchay')->default('0')->comment('1=banchay,0=khong-banchay');
            $table->tinyInteger('noibat')->default('0')->comment('1=noibat,0=khong-noibat');
            $table->tinyInteger('trangthai')->default('0')->comment('1=hidden,0=visible');

            $table->string('meta_tieude')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_mota')->nullable();

            $table->foreign('loaisp_id')->references('id')->on('loaisps')->onDelete('cascade');
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
        Schema::dropIfExists('sanphams');
    }
}
