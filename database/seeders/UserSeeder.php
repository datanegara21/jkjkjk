<?php

namespace Database\Seeders;

use App\Models\{User, Profile};
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
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@get.id',
                'role' => '0',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@get.id',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        ];
        foreach ($user as $u){
            User::create($u);
        }
    }
}

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'User',
                'email' => 'user@get.id',
            ], [
                'name' => 'Admin',
                'email' => 'admin@get.id',
            ]
        ];
        foreach ($user as $u){
            Profile::create($u);
        }
    }
}
