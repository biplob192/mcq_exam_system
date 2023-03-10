<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'MASUD RANA',
            'email' => 'admin@gmail.com',
            'mobile' => '01725361208',
            // 'password' => bcrypt('password'),
            'password' => bcrypt('P@ssw0rd'),
            // 'user_type' => 1,
        ];

        User::create($user);
    }
}
