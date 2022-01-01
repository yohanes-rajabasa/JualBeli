<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
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
            'transaction_date' => $this->faker->date(),
            'user_id' => $this->getUserId(),
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
