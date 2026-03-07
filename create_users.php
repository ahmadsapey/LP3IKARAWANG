<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Membuat user Admin
$adminUser = \App\Models\User::updateOrCreate(
    ['email' => 'admin@gmail.com'],
    [
        'name' => 'Admin',
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'is_admin' => 1,
        'is_marketing' => 0,
    ]
);

echo "User Admin berhasil dibuat:\n";
echo "Email: " . $adminUser->email . "\n";
echo "Password: 123456\n\n";

// Membuat user Marketing
$marketingUser = \App\Models\User::updateOrCreate(
    ['email' => 'marketing@gmail.com'],
    [
        'name' => 'Marketing',
        'username' => 'marketing',
        'email' => 'marketing@gmail.com',
        'password' => bcrypt('123456'),
        'is_admin' => 0,
        'is_marketing' => 1,
    ]
);

echo "User Marketing berhasil dibuat:\n";
echo "Email: " . $marketingUser->email . "\n";
echo "Password: 123456\n";
