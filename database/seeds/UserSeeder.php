<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        //Start User Views
        DB::table('users')->insert([
            'id' => '1',
            'first_name' => 'Tom',
            'last_name' => 'Hardy',
            'email' => 'test1@task.com',
            'password' => '$2y$10$OJlGOBM7eRqnFB33SeiTSunlj02LMyo8IlCwKJ4R3KSitY.BzOK0K'
        ]);

        //Start User Views
        DB::table('users')->insert([
            'id' => '2',
            'first_name' => 'Lisa',
            'last_name' => 'McCarthy',
            'email' => 'test2@task.com',
            'password' => '$2y$10$OJlGOBM7eRqnFB33SeiTSunlj02LMyo8IlCwKJ4R3KSitY.BzOK0K'
        ]);
    }
}