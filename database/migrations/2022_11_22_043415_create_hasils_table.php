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
        Schema::create('hasil', function (Blueprint $table) {
            $table->id();
            $table->double('Si', 15, 8)->nullable();
            $table->double('Ki', 15, 8)->nullable();
            $table->integer('Rank')->unsigned()->nullable();
            $table->unsignedBigInteger('id_nilai');
            $table->foreign('id_nilai')->references('id')->on('nilai')->onDelete('cascade');
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
        Schema::dropIfExists('hasil');
    }
};
