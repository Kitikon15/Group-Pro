<?php
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Update the admin password
$user = DB::table('users')->where('email', 'admin@gmail.com')->first();

if ($user) {
    DB::table('users')
        ->where('email', 'admin@gmail.com')
        ->update(['password' => Hash::make('admin')]);
    
    echo "Password updated successfully for admin@gmail.com\n";
} else {
    echo "User admin@gmail.com not found\n";
}