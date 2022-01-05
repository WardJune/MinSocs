<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::get()->count();

        return [
            'user_id' => rand(1, $users),
            'content' => $this->faker->sentence(),
        ];
    }
}
