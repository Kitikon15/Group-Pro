# Technical Implementation Plan for Missing Functional Requirements

## Overview
This document outlines the technical steps required to implement the missing functional requirements in the WEB-NPRU system.

## FR2: แสดงรายชื่ออาชีพที่สามารถทำได้หลังสำเร็จการศึกษา

### 1. Create Career Model
```bash
php artisan make:model Career -m
```

**Migration Fields:**
- id (auto-increment)
- name (string)
- description (text)
- related_programs (text or JSON)
- image_url (string, nullable)
- status (string)
- timestamps

### 2. Update Career Model
File: `app/Models/Career.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'name',
        'description',
        'related_programs',
        'image_url',
        'status'
    ];
}
```

### 3. Create Admin CRUD Controller
```bash
php artisan make:controller Admin/CareerController --resource
```

### 4. Add Routes
File: `routes/web.php`
```php
// Admin routes for careers
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('careers', Admin\CareerController::class);
});
```

### 5. Create Admin Views
- `resources/views/admin/careers/index.blade.php`
- `resources/views/admin/careers/create.blade.php`
- `resources/views/admin/careers/edit.blade.php`
- `resources/views/admin/careers/show.blade.php`

### 6. Create Public Controller
```bash
php artisan make:controller CareerController
```

### 7. Add Public Routes
File: `routes/web.php`
```php
// Public routes for careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{career}', [CareerController::class, 'show'])->name('careers.show');
```

### 8. Create Public Views
- `resources/views/careers.blade.php` (listing page)
- `resources/views/careers/show.blade.php` (detail page)

## FR4: แสดงรายละเอียดห้องปฏิบัติการ

### 1. Create Laboratory Model
```bash
php artisan make:model Laboratory -m
```

**Migration Fields:**
- id (auto-increment)
- name (string)
- description (text)
- equipment (text)
- image_url (string, nullable)
- status (string)
- timestamps

### 2. Update Laboratory Model
File: `app/Models/Laboratory.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'equipment',
        'image_url',
        'status'
    ];
}
```

### 3. Create Admin CRUD Controller
```bash
php artisan make:controller Admin/LaboratoryController --resource
```

### 4. Add Routes
File: `routes/web.php`
```php
// Admin routes for laboratories
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('laboratories', Admin\LaboratoryController::class);
});
```

### 5. Create Admin Views
- `resources/views/admin/laboratories/index.blade.php`
- `resources/views/admin/laboratories/create.blade.php`
- `resources/views/admin/laboratories/edit.blade.php`
- `resources/views/admin/laboratories/show.blade.php`

### 6. Create Public Controller
```bash
php artisan make:controller LaboratoryController
```

### 7. Add Public Routes
File: `routes/web.php`
```php
// Public routes for laboratories
Route::get('/laboratories', [LaboratoryController::class, 'index'])->name('laboratories.index');
Route::get('/laboratories/{laboratory}', [LaboratoryController::class, 'show'])->name('laboratories.show');
```

### 8. Create Public Views
- `resources/views/laboratories.blade.php` (listing page)
- `resources/views/laboratories/show.blade.php` (detail page)

## FR6: แสดงผลงานของอาจารย์

### 1. Create FacultyAchievement Model
```bash
php artisan make:model FacultyAchievement -m
```

**Migration Fields:**
- id (auto-increment)
- title (string)
- description (text)
- date (date)
- faculty_id (foreign key to personnel)
- image_url (string, nullable)
- status (string)
- timestamps

### 2. Update FacultyAchievement Model
File: `app/Models/FacultyAchievement.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyAchievement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'faculty_id',
        'image_url',
        'status'
    ];
    
    public function faculty()
    {
        return $this->belongsTo(Personnel::class, 'faculty_id');
    }
}
```

### 3. Update Personnel Model
File: `app/Models/Personnel.php`
```php
// Add this relationship method
public function achievements()
{
    return $this->hasMany(FacultyAchievement::class, 'faculty_id');
}
```

### 4. Create Admin CRUD Controller
```bash
php artisan make:controller Admin/FacultyAchievementController --resource
```

### 5. Add Routes
File: `routes/web.php`
```php
// Admin routes for faculty achievements
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('faculty-achievements', Admin\FacultyAchievementController::class);
});
```

### 6. Create Admin Views
- `resources/views/admin/faculty-achievements/index.blade.php`
- `resources/views/admin/faculty-achievements/create.blade.php`
- `resources/views/admin/faculty-achievements/edit.blade.php`
- `resources/views/admin/faculty-achievements/show.blade.php`

## FR7: แสดงผลงานนักศึกษา

### 1. Create StudentAchievement Model
```bash
php artisan make:model StudentAchievement -m
```

**Migration Fields:**
- id (auto-increment)
- title (string)
- description (text)
- date (date)
- student_name (string)
- program (string)
- image_url (string, nullable)
- status (string)
- timestamps

### 2. Update StudentAchievement Model
File: `app/Models/StudentAchievement.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAchievement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'student_name',
        'program',
        'image_url',
        'status'
    ];
}
```

### 3. Create Admin CRUD Controller
```bash
php artisan make:controller Admin/StudentAchievementController --resource
```

### 4. Add Routes
File: `routes/web.php`
```php
// Admin routes for student achievements
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('student-achievements', Admin\StudentAchievementController::class);
});
```

### 5. Create Admin Views
- `resources/views/admin/student-achievements/index.blade.php`
- `resources/views/admin/student-achievements/create.blade.php`
- `resources/views/admin/student-achievements/edit.blade.php`
- `resources/views/admin/student-achievements/show.blade.php`

## FR8: แสดงข้อมูลศิษย์เก่า

### 1. Create Alumni Model
```bash
php artisan make:model Alumni -m
```

**Migration Fields:**
- id (auto-increment)
- name (string)
- graduation_year (integer)
- current_position (string)
- bio (text)
- email (string, nullable)
- phone (string, nullable)
- image_url (string, nullable)
- status (string)
- timestamps

### 2. Update Alumni Model
File: `app/Models/Alumni.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'name',
        'graduation_year',
        'current_position',
        'bio',
        'email',
        'phone',
        'image_url',
        'status'
    ];
}
```

### 3. Create Admin CRUD Controller
```bash
php artisan make:controller Admin/AlumniController --resource
```

### 4. Add Routes
File: `routes/web.php`
```php
// Admin routes for alumni
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('alumni', Admin\AlumniController::class);
});
```

### 5. Create Admin Views
- `resources/views/admin/alumni/index.blade.php`
- `resources/views/admin/alumni/create.blade.php`
- `resources/views/admin/alumni/edit.blade.php`
- `resources/views/admin/alumni/show.blade.php`

### 6. Create Public Controller
```bash
php artisan make:controller AlumniController
```

### 7. Add Public Routes
File: `routes/web.php`
```php
// Public routes for alumni
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/alumni/{alumnus}', [AlumniController::class, 'show'])->name('alumni.show');
```

### 8. Create Public Views
- `resources/views/alumni.blade.php` (listing page)
- `resources/views/alumni/show.blade.php` (detail page)

## FR9: แสดงวิดีโอแนะนำหลักสูตร

### 1. Create Video Model
```bash
php artisan make:model Video -m
```

**Migration Fields:**
- id (auto-increment)
- title (string)
- description (text)
- embed_code (text)
- course_id (foreign key to courses, nullable)
- thumbnail_url (string, nullable)
- status (string)
- timestamps

### 2. Update Video Model
File: `app/Models/Video.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'description',
        'embed_code',
        'course_id',
        'thumbnail_url',
        'status'
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
```

### 3. Update Course Model
File: `app/Models/Course.php`
```php
// Add this relationship method
public function videos()
{
    return $this->hasMany(Video::class);
}
```

### 4. Create Admin CRUD Controller
```bash
php artisan make:controller Admin/VideoController --resource
```

### 5. Add Routes
File: `routes/web.php`
```php
// Admin routes for videos
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('videos', Admin\VideoController::class);
});
```

### 6. Create Admin Views
- `resources/views/admin/videos/index.blade.php`
- `resources/views/admin/videos/create.blade.php`
- `resources/views/admin/videos/edit.blade.php`
- `resources/views/admin/videos/show.blade.php`

### 7. Create Public Controller
```bash
php artisan make:controller VideoController
```

### 8. Add Public Routes
File: `routes/web.php`
```php
// Public routes for videos
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
```

### 9. Create Public Views
- `resources/views/videos.blade.php` (listing page)
- `resources/views/videos/show.blade.php` (detail/embed page)

## FR10 Enhancement: Image Support for All Content Types

### 1. Update Existing Models
Add image_url field to:
- Course model
- News model
- (Already exists in Personnel model)

### 2. Create Image Management System
- Add image upload functionality to all admin forms
- Implement image validation and storage
- Add image display in public views

## Implementation Timeline

### Week 1-2: Foundation Models
- Create Career, Laboratory, and Video models
- Implement basic admin CRUD interfaces
- Create public controllers and routes

### Week 3-4: Achievement and Alumni Models
- Create FacultyAchievement, StudentAchievement, and Alumni models
- Implement admin CRUD interfaces
- Create public views for all new content types

### Week 5-6: Enhancement and Integration
- Add image support to all models
- Enhance existing views with new functionality
- Implement cohesive navigation system

### Week 7-8: Testing and Refinement
- Test all new functionality
- Fix any issues
- Optimize performance
- Add documentation

## Required Skills
- Laravel development
- PHP programming
- Database design
- HTML/CSS/JavaScript
- Blade templating
- RESTful API concepts
- Image handling in web applications

## Dependencies
- Existing Laravel framework
- Database system (MySQL/PostgreSQL)
- File storage system for images
- Web server (Apache/Nginx)

## Testing Requirements
- Unit tests for all new models
- Feature tests for CRUD operations
- Browser testing for all public views
- Performance testing for image loading
- Security testing for file uploads