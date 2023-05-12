<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        (new Post)->latest()->get();
        (new Post)->latest()->take(1)->get();
        return [
            'name' => $this->faker->text(50),
            'slug' => $this->faker->slug(),
        ];
    }
}
