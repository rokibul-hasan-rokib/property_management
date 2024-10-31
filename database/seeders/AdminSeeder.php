<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
              "name" => "Admin",
              "email" => "admin@gmail.com",
              "password" => Hash::make(User::DEFAULT_PASSWORD),
              'role' => User::ROLE_ADMIN,
        ];
        $users = User::query()->where('email',$admins['email'])->exists();
        if(!$users){
            User::query()->create($admins);
        }

    }
}