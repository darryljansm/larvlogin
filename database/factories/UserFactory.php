<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'contact_no' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->unique()->userName,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // or bcrypt('password')
            'created_by' => 1,
            'updated_by' => null,
            'remember_token' => Str::random(10),
        ];
    }
}
