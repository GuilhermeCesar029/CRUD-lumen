<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'use_name' => $this->faker->name,
            'use_email' => $this->faker->unique()->safeEmail,
            'use_password' => $this->faker->unique()->password(),
        ];
    }
}
