<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\Cart::factory(15)->create();
        \App\Models\Transaction::factory(15)->create();
        $this->call([
            DetailSeeder::class,
        ]);
    }
}
