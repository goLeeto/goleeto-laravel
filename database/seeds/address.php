<?php

use Illuminate\Database\Seeder;

class address extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
        	'Country' => 'No Country',
        	'City' => 'No City',
        	'Street' => 'No Street',
        	'Zip' => '00000000'
        ]);
    }
}
