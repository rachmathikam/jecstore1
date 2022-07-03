<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('kerusakan');
            $table->string('keterangan');
            // $table->string('gambar');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                        ->references('id')
                        ->on('brands')
                        ->onUpdate('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                        ->references('id')
                        ->on('type_device')
                        ->onUpdate('cascade');
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
        Schema::dropIfExists('layanans');
    }
};
