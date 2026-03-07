<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\KecamatanSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed kecamatans for the Mahasiswa registration form
        $this->call([KecamatanSeeder::class]);
        $desaSeeder = 'Database\\Seeders\\DesaSeeder';
        if (class_exists($desaSeeder)) {
            $this->call([$desaSeeder]);
        }

        // Default users for local development
        $this->call([\Database\Seeders\MarketingUserSeeder::class]);
        $this->call([\Database\Seeders\AdminUserSeeder::class]);
    }
}
