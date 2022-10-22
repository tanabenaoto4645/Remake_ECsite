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
            'name' => 'Test User',
            'email' => 'testUser@example.com',
            'password' => '$2y$10$jjP0rXKMEUaPie9nH7chCOzAEmlIXEzxDSvu54VzzjGbFDP2KVl2a',
            'admin' => '7'
            ]);
    }
}
