<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        //Start User Views
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'general',
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'featured',
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'trending',
        ]);
    }
}