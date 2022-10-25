<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //guarda la imagen en una url en la direccion public/storage/cursos/ + nombreImagen.jpg
        return [
            'url' => 'cursos/' . $this->faker->image('public/storage/cursos', 640, 480, null, false)
        ];
    }
}
