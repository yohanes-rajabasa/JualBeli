<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1 ; $i <= 15 ; $i++){
            $insertTimes = rand(1,3);
            $this->insertData($insertTimes,$i);
        }
    }

    public function insertData($insertTimes, $transactionId){
        for($i = 1 ; $i <= $insertTimes ; $i++){
            $productId = rand(1,20);
            $productData = Product::where('id','=',$productId)->first();
            $rndQty = rand(1,$productData->stock);

            Detail::create([
                'qty' => $rndQty,
                'product_id' => $productId,
                'transaction_id' => $transactionId,
            ]);

            // decrement stock of product
            $productQtyTemp = $productData->stock - $rndQty;
            if($productQtyTemp < 0) $productQtyTemp = 0;
            $productData->stock = $productQtyTemp;
            $productData->save();
        }
    }
}
