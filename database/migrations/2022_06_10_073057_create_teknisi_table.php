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
        Schema::create('teknisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                        ->constrained()
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->string('name', 100);
            $table->string('email');
            $table->string('no_reg', 20);
            $table->string('no_telp', 12);
            $table->string('alamat', 100);
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teknisi');
    }
};
