<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Check if admin user exists
$user = User::where('email', 'admin@gmail.com')->first();

if ($user) {
    echo "Admin user found:\n";
    echo "ID: " . $user->id . "\n";
    echo "Name: " . $user->name . "\n";
    echo "Email: " . $user->email . "\n";
    echo "Is Admin: " . ($user->is_admin ? 'Yes' : 'No') . "\n";
    
    // Update password to ensure it's 'admin'
    $user->password = Hash::make('admin');
    $user->save();
    
    echo "Password updated successfully.\n";
} else {
    echo "Admin user not found.\n";
    
    // Create the admin user
    $user = User::create([
        'name' => 'Admin User',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin'),
        'is_admin' => true,
    ]);
    
    echo "Admin user created successfully.\n";
    echo "ID: " . $user->id . "\n";
    echo "Name: " . $user->name . "\n";
    echo "Email: " . $user->email . "\n";
}