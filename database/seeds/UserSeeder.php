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
            'email' => 'nrebuilding.remakestore@gmail.com',
            'password' => '$2y$10$iL9JDj82IOOm8in/T7PZs.vzN9S.TyNmIjA50VzhqQAklVMWc7/N6',
            'admin' => '7'
            ]);
        
        User::create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => '$2y$10$Rg0WwIXZPJrX1VrB2CdGEux4xsMpRypNoRMPwyzbtLlGi3GvSfbje',
            'admin' => '1'
            ]);
    }
}
