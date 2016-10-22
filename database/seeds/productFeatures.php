<?php

use Illuminate\Database\Seeder;

class productFeatures extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
        	'name' => 'Feature 1',
        	'description' =>'Description 1'
        ]);
        DB::table('features')->insert([
        	'name' => 'Feature 2',
        	'description' =>'Description 2'
    	]);
        DB::table('features')->insert([
        	'name' => 'Feature 3',
        	'description' =>'Description 3'
    	]);
        DB::table('features')->insert([
        	'name' => 'Feature 4',
        	'description' =>'Description 4'
    	]);
        DB::table('features')->insert([
        	'name' => 'Feature 5',
        	'description' =>'Description 5'
    	]);
    }
}
