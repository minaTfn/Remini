<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;


    /**
     * Indicate that the user is suspended.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function SiteRole()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => User::SiteUSER,
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'role' => User::ADMIN,
            'status' => User::ACTIVE,
            'password' => Hash::make('Hyt@#1234'),
            'remember_token' => Str::random(10),
        ];
    }
}
