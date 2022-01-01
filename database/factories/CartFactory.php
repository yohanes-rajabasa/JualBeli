<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
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
            'user_id' => $this->getUserId(),
            'product_id' => $this->faker->unique()->numberBetween(1,20),
            'qty' => $this->faker->numberBetween(1,20),
        ];
    }

    public function getUserId(){
        $userData = User::where('role_number','=',1)->get();
        $userDataCount = User::where('role_number','=',1)->count();
        $arrayUserId = array();
        for($i = 0 ; $i < $userDataCount ; $i++){
            array_push($arrayUserId,$userData[$i]->id);
        }
        $randomUserId = $this->faker->randomElement($arrayUserId);
        return $randomUserId;
    }
}
