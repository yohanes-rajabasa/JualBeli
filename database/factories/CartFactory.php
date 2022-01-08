<?php

namespace Database\Factories;

use App\Models\Product;
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
        $product_id_temp = $this->faker->unique()->numberBetween(1,20);
        $product_id_stock = $this->getStockBasedProduct($product_id_temp);

        return [
            //
            'user_id' => $this->getUserId(),
            'product_id' => $product_id_temp,
            'qty' => $this->faker->numberBetween(1,$product_id_stock),
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

    public function getStockBasedProduct($product_id){
        $productData = Product::where('id','=',$product_id)->first();
        return $productData->stock;
    }
}
