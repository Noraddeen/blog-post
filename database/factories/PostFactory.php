<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, (int)DB::table('users')
                ->select('id')
                ->orderBy('id', 'desc')
                ->first()->id),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'published_at'=> $this->faker->dateTime,
            'body' => $this->faker->paragraph,
            'index' => $this->faker->slug,
        ];
    }
}
