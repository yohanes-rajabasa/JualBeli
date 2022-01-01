<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->word(3,true),
            'price' => $this->faker->numberBetween(100000,500000),
            'desc' => $this->faker->sentence(8),
            'stock' => $this->faker->numberBetween(10,20),
            'picture_path' => $this->faker->imageUrl(360, 360, 'products', true),
            'user_id' => $this->getUserId(),
        ];
    }

    public function getUserId(){
        $userData = User::where('role_number','=',2)->get();
        $userDataCount = User::where('role_number','=',2)->count();
        $arrayUserId = array();
        for($i = 0 ; $i < $userDataCount ; $i++){
            array_push($arrayUserId,$userData[$i]->id);
        }
        $randomUserId = $this->faker->randomElement($arrayUserId);
        return $randomUserId;
    }
}
