<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        //Start User Views
        DB::table('articles')->insert([
            'id' => '1',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '1',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '2',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '1',
            'created_by' => '2',
        ]);

        DB::table('articles')->insert([
            'id' => '3',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '3',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '4',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '2',
            'created_by' => '2',
        ]);

        DB::table('articles')->insert([
            'id' => '5',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '3',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '6',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '3',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '7',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '1',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '8',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '1',
            'created_by' => '2',
        ]);

        DB::table('articles')->insert([
            'id' => '9',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '3',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '10',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '2',
            'created_by' => '2',
        ]);

        DB::table('articles')->insert([
            'id' => '11',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '3',
            'created_by' => '1',
        ]);

        DB::table('articles')->insert([
            'id' => '12',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.Lorem Ipsum is simply dummy text of the printing and typesetting  scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.',
            'category_id' => '3',
            'created_by' => '1',
        ]);
    }
}