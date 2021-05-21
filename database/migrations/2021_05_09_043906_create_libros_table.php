<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('titulo');
            $table->string('imagen', 100);
            $table->text('descripcion')->nullable();
            $table->date('publicacion')->nullable()->default(new DateTime());
            $table->integer('cantidad');
            $table->integer('prestados');
            $table->boolean('activo')->default(true);
            $table->string('slug')->unique();

            //relaciones
            $table->integer('autores_id')->unsigned()->nullable();
            $table->integer('editoriales_id')->unsigned()->nullable();
            $table->integer('categorias_id')->unsigned()->nullable();

            $table->foreign('autores_id')->references('_id')->on('autores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('editoriales_id')->references('_id')->on('editoriales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categorias_id')->references('_id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('libros');
    }
}
