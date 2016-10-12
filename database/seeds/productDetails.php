<?php

use Illuminate\Database\Seeder;

class productDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DD::table('categorys')->insert([
        	'name' => 'Category 1'
        ],[
        	'name' => 'Category 2'
    	],[
        	'name' => 'Category 3'
    	],[
        	'name' => 'Category 4'
    	],[
        	'name' => 'Category 5'
    	]);
    }
}
