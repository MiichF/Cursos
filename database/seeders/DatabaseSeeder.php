<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Etiqueta;
use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //crear el directorio para las imagenes, si existe la borra y recrea
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');

        //llama los seeders y indica cantidades de creacion
        $this->call(UserSeeder::class);
        Categoria::factory(4)->create();
        Etiqueta::factory(8)->create();
        $this->call(CursoSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
