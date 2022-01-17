<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'address' => $this->faker->sentence(10),
            'picture_path' => $this->getUserImg(),
            'role_number' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->freeEmail(),
            'password' =>"12345678",
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function getUserImg(){
        $tempImg = $this->faker->image('public/storage/profiles',360,360,null,false);
        return 'profiles/'.$tempImg;
    }
}
