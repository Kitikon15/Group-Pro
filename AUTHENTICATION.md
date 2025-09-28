# Laravel Authentication System Documentation

## Overview
This document explains the authentication system implemented for the admin panel of your Laravel application.

## Components

### 1. LoginController
Located at: `app/Http/Controllers/Auth/LoginController.php`

Handles:
- Displaying the login form
- Processing login requests
- Validating user credentials
- Managing user sessions
- Handling logout functionality

### 2. Middleware
Located at: `app/Http/Middleware/AdminAuth.php`

Protects admin routes by ensuring only authenticated users can access them.

### 3. Routes
Defined in: `routes/web.php`

Key routes:
- `GET /admin/login` - Shows login form
- `POST /admin/login` - Processes login
- `POST /admin/logout` - Processes logout
- `GET /admin/dashboard` - Protected admin dashboard

### 4. Views
- `resources/views/admin/login.blade.php` - Login form with validation
- `resources/views/admin/dashboard.blade.php` - Protected admin dashboard

## How It Works

### Login Process
1. User visits `/admin/login`
2. Enters credentials (email/password)
3. Form submits to `POST /admin/login`
4. LoginController validates input
5. Laravel's Auth facade attempts authentication
6. On success, user is redirected to dashboard
7. On failure, user sees error messages

### Protection
All admin routes are protected by the `admin` middleware which checks if the user is authenticated.

### Logout
1. User clicks "Logout"
2. Form submits to `POST /admin/logout`
3. Session is invalidated
4. User is redirected to login page

## Default Users
After seeding, the database contains:
- Email: `admin@example.com`, Password: `password123`
- Email: `test@example.com`, Password: `password` (default from Laravel)

## Usage Instructions

1. Visit `http://localhost:8000`
2. Click "สมัครเรียน" to register
3. Fill out the application form
4. You'll be automatically redirected to the admin dashboard
5. Use the logout button to end your session

## Recent Improvements

The authentication system has been enhanced with the following improvements:

1. **Seamless Registration Flow**
   - Users are automatically redirected to the admin dashboard after registration
   - No intermediate pages or manual login steps
   - Automatic user creation from application data

2. **Smart Page Redirection**
   - Authenticated users are automatically redirected to the dashboard from any page
   - Consistent user experience across the entire application

3. **Enhanced User Interface**
   - Dynamic menu options based on authentication status
   - Clear visual indicators for logged-in users

## Security Features

- Password hashing using Laravel's built-in hashing
- Session regeneration to prevent fixation attacks
- CSRF protection on forms
- Input validation
- SQL injection prevention through Eloquent ORM
- XSS prevention through Blade templating

## Extending the System

To add more admin users:
```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'New Admin',
    'email' => 'newadmin@example.com',
    'password' => Hash::make('securepassword')
]);
```

## Customization

### Changing Authentication Field
Currently, the system uses email for login. To use username instead:

1. Add a `username` field to the users table:
```php
php artisan make:migration add_username_to_users_table --table=users
```

2. Modify the migration:
```php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->unique()->after('name');
    });
}
```

3. Update the User model:
```php
protected $fillable = [
    'name',
    'username',
    'email',
    'password',
];
```

4. Update LoginController to use username:
```php
$credentials = [
    'username' => $request->username,
    'password' => $request->password,
];
```

## Troubleshooting

### Login Issues
1. Ensure the database is seeded
2. Check that the user exists in the database
3. Verify password is correct
4. Clear browser cookies/cache

### Middleware Issues
1. Ensure middleware is registered in `bootstrap/app.php`
2. Check that routes use the correct middleware name
3. Verify middleware logic in `app/Http/Middleware/AdminAuth.php`

## Testing

The authentication system includes comprehensive tests in `tests/Feature/AdminLoginTest.php`. Run them with:

```bash
php artisan test --filter=AdminLoginTest
```

Tests cover:
- Redirecting unauthenticated users
- Displaying login form
- Authenticating valid users
- Rejecting invalid credentials
- Logging out authenticated users