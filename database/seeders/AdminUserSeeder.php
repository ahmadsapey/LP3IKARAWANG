<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@gmail.com';

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => $email,
                'password' => Hash::make('123456'),
                'is_admin' => true,
                'is_marketing' => false,
            ]
        );

        $this->command->info("Admin user ensured: {$email}");
    }
}
