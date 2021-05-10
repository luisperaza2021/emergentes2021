<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titulo = $this->faker->sentence;

        return [
            "titulo" => $titulo,
            "imagen" => "259-641x1024.jpg",
            "descripcion" => $this->faker->paragraph,
            "publicacion" => $this->faker->dateTimeThisDecade(),
            "cantidad" => $this->faker->numberBetween(0, 100),
            "slug" => Str::slug($titulo, '-'),
            "activo" => true,

            //relaciones
            "autores_id" => Autor::all()->random()->_id,
            "editoriales_id" => Editorial::all()->random()->_id,
            "categorias_id" => Categoria::all()->random()->_id,
        ];
    }
}
