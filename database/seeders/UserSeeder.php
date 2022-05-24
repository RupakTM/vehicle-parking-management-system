<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name'=> 'Admin Bahadur',
            'email'=> 'admin@gmail.com',
            'password'=>Hash::make('Admin123#'),
            'status' => true,
            'created_by' => 1
        ]);
        User::create([
            'name' => 'Ram Bahadur',
            'email' => 'ram@gmail.com',
            'password' => Hash::make('R@m123'),
            'created_by' => 1
        ]);
    }
}
