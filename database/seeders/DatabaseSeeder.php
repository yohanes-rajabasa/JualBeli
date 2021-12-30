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
         //\App\Models\User::factory(10)->create();
         DB::table('users')->insert([
            'id' => 3,
            'name' => 'Srina',
            'email' => 'kendrewgw@gmail.com',
            'password' => 'hallo',
            'dob' => '2021-11-10',
            'address' => 'jln kemanggisan',
            'role_number' => 1,
            'picture_path' => 'public/'
            
            
        ]);
    }
}
