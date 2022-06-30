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
        Schema::create('komponens', function (Blueprint $table) {
            $table->id();
            $table->string('komponen');
            $table->string('harga');
            $table->integer('stock');
            $table->string('image');
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
            $table->unsignedBigInteger('sparepart_id');
            $table->foreign('sparepart_id')
                        ->references('id')
                        ->on('spareparts')
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
        Schema::dropIfExists('komponens');
    }
};
