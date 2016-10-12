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
        DD::table('features')->insert([
        	'name' => 'Category 1',
        	'description' =>'Description 1'
        ],[
        	'name' => 'Category 2',
        	'description' =>'Description 2'
    	],[
        	'name' => 'Category 3',
        	'description' =>'Description 3'
    	],[
        	'name' => 'Category 4',
        	'description' =>'Description 4'
    	],[
        	'name' => 'Category 5',
        	'description' =>'Description 5'
    	]);
    }
}
