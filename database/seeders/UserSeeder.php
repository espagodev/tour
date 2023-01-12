<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'nombres' => 'Edwin Samir',
            'apellidos' => 'Patino Gonzalez',
            'email' => 'patino2908@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('SuperAdmin');

        
    }
}
