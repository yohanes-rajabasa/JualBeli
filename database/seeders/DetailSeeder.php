<?php

namespace Database\Seeders;

use App\Models\Detail;
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
            Detail::create([
                'qty' => rand(1,10),
                'product_id' => rand(1,20),
                'transaction_id' => $transactionId,
            ]);
        }
    }
}
