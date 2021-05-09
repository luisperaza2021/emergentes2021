<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            // $table->id();

            //relaciones
            $table->integer('libros_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();

            $table->foreign('libros_id')->references('_id')->on('libros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('_id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('prestamos');
    }
}
