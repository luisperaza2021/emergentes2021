<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Categoria::create(["nombre" => "Terror"]);
        Categoria::create(["nombre" => "Biografica"]);
        Categoria::create(["nombre" => "Novela"]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'rol' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'Luis Peraza',
            'email' => 'luis@fake.com',
            'password' => bcrypt('12345678'),
        ]);


        Autor::factory(10)->create();
        Editorial::factory(5)->create();
        Libro::factory(100)->create();
    }
}
