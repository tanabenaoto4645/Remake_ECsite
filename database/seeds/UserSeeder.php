<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Tanabe Naoto',
            'email' => 'asikan.010@gmail.com',
            'password' => '11111111',
            'admin' => '7'
            ]);
    }
}
