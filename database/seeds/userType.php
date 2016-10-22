<?php

use Illuminate\Database\Seeder;

class userType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('userTypes')->insert([
        	'type' => 'Admin',
        ]);
        DB::table('userTypes')->insert([
        	'type' => 'Seller'
        ]);
        DB::table('userTypes')->insert([
        	'type' => 'Buyer'
        ]);
    }
}
