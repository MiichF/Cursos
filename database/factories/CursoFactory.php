<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        //declaramos la variable nombre
        $name = $this->faker->unique()->word(20);
        //asignamos a la tabla con sus respectios valores
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            //se pone aleatoriamente 1 o 2
            'status' => $this->faker->randomElement([1,2]),
            //llave foraneas aleatorias a otro existente
            'user_id' => User::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id

        ];
    }
}
