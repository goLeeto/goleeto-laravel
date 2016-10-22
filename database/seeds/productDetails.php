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
        DB::table('categorys')->insert([
        	'name' => 'Category 1'
        ]);
        DB::table('categorys')->insert([
            'name' => 'Category 2'
        ]);
        DB::table('categorys')->insert([
            'name' => 'Category 3'
        ]);
        DB::table('categorys')->insert([
            'name' => 'Category 4'
        ]);
        DB::table('categorys')->insert([
            'name' => 'Category 5'
        ]);

    }
}
