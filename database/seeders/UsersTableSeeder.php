<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'name'=> 'maneva',
            'email'=>'maneva@gmail.com',
            'password'=>bcrypt('manevamaneva')
        ];

        User::insert($users);
    }
}
