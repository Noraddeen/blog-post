<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commend' => $this->faker->paragraph(),
            'user_id' => rand(1,intval(User::max('id'))),
            'post_id' => rand(1,intval(Post::max('id'))),
        ];
    }
}
