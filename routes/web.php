<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PersonnelController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('index');
})->name('home');

// Direct index route without authentication redirect
Route::get('/index', function () {
    // Fetch published news from the database
    $news = \App\Models\News::where('status', 'เผยแพร่')
        ->orderBy('publish_date', 'desc')
        ->limit(3)
        ->get();
    
    return view('index', compact('news'));
})->name('index');

Route::get('/welcome', function (\Illuminate\Http\Request $request) {
    // Check if user is already logged in as admin
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    
    return view('welcome');
});

// User login routes
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    // Validate the input
    $request->validate([
        'email' => 'required|email',
    ], [
        'email.required' => 'กรุณากรอกอีเมล',
        'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
    ]);

    // Find user by email
    $user = User::where('email', $request->email)->first();

    // If user exists, log them in
    if ($user) {
        // Log in the user
        Auth::login($user);
        
        // Regenerate session to prevent session fixation
        $request->session()->regenerate();
        
        // Check if user is admin
        if ($user->is_admin) {
            return redirect()->intended(route('admin.dashboard'));
        }
        
        // Redirect to admission page for regular users
        return redirect()->intended(route('admission'));
    }

    // If user doesn't exist, redirect to application page with error
    return redirect()->route('application')->withErrors([
        'email' => 'ไม่พบผู้ใช้ด้วยอีเมลนี้ โปรดสมัครเรียนก่อนเข้าสู่ระบบ',
    ]);
})->name('login.submit');

// User logout route
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    
    // Invalidate the session
    $request->session()->invalidate();
    
    // Regenerate CSRF token
    $request->session()->regenerateToken();
    
    return redirect()->route('index');
})->name('logout');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Admission route
Route::get('/admission', function () {
    // Check if user has already applied
    $hasApplied = session('has_applied', false);
    return view('admission', ['hasApplied' => $hasApplied]);
})->name('admission');

// Post-registration route - redirect to admission page
Route::get('/post-registration', function () {
    // Set session to indicate user has applied
    session(['has_applied' => true]);
    // Redirect to admission page
    return redirect()->route('admission');
})->name('post.registration');

// Application routes
Route::get('/application', function () {
    return view('application');
})->name('application');

Route::post('/application', function (\Illuminate\Http\Request $request) {
    // This is a placeholder for actual application processing logic
    // In a real application, you would save the data to database here
    
    // For demo purposes, create an admin user from the application data
    $userData = [
        'name' => $request->input('first_name', 'Admin User') . ' ' . $request->input('last_name', ''),
        'email' => $request->input('email', 'admin@example.com'),
        'password' => Hash::make('password123'), // Default password for demo
        'is_admin' => false, // Regular users are not admins by default
    ];
    
    // Check if user already exists
    $user = User::where('email', $userData['email'])->first();
    if (!$user) {
        $user = User::create($userData);
    }
    
    // Log in the user
    Auth::login($user);
    
    // Store application data in session for demo purposes
    $applicationData = [
        'title' => $request->input('title'),
        'gender' => $request->input('gender'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'id_card' => $request->input('id_card'),
        'birth_date' => $request->input('birth_date'),
        'address' => $request->input('address'),
        'province' => $request->input('province'),
        'postal_code' => $request->input('postal_code'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'education_level' => $request->input('education_level'),
        'school_name' => $request->input('school_name'),
        'gpa' => $request->input('gpa'),
        'graduation_year' => $request->input('graduation_year'),
        'faculty' => $request->input('faculty'),
        'program' => $request->input('program'),
    ];
    
    session(['application_data' => $applicationData]);
    session(['has_applied' => true]);
    
    // Redirect to admission page with success message
    return redirect()->route('admission')->with('success', 'สมัครเรียนสำเร็จ! ระบบได้รับใบสมัครของคุณแล้ว');
})->name('application.submit');

// Application edit routes
Route::get('/application/edit', function () {
    $applicationData = session('application_data', []);
    return view('application-edit', ['applicationData' => $applicationData]);
})->name('application.edit');

Route::put('/application', function (\Illuminate\Http\Request $request) {
    // Update application data in session for demo purposes
    $applicationData = [
        'title' => $request->input('title'),
        'gender' => $request->input('gender'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'id_card' => $request->input('id_card'),
        'birth_date' => $request->input('birth_date'),
        'address' => $request->input('address'),
        'province' => $request->input('province'),
        'postal_code' => $request->input('postal_code'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'education_level' => $request->input('education_level'),
        'school_name' => $request->input('school_name'),
        'gpa' => $request->input('gpa'),
        'graduation_year' => $request->input('graduation_year'),
        'faculty' => $request->input('faculty'),
        'program' => $request->input('program'),
    ];
    
    session(['application_data' => $applicationData]);
    
    // Redirect to admission page with success message
    return redirect()->route('admission')->with('success', 'อัปเดตข้อมูลการสมัครเรียบร้อยแล้ว!');
})->name('application.update');

Route::get('/application/success', function () {
    return view('application-success');
})->name('application.success');

Route::get('/application/success/simple', function () {
    return view('application-success-simple');
})->name('application.success.simple');

// Admin authentication routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin resource routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Admission report route - integrated into admin system
    Route::get('/admin/admission-report', function () {
        // Sample data for demonstration
        $applicants = [
            [
                'id' => 1,
                'title' => 'นาย',
                'firstName' => 'สมชาย',
                'lastName' => 'ใจดี',
                'gender' => 'ชาย',
                'idCard' => '1-2345-67890-12-3',
                'birthDate' => '15/05/2540',
                'address' => '123 ถนนสุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพฯ 10110',
                'province' => 'กรุงเทพฯ',
                'postalCode' => '10110',
                'phone' => '081-234-5678',
                'email' => 'somchai@example.com',
                'educationLevel' => 'ม.6',
                'schoolName' => 'โรงเรียนสาธิตมหาวิทยาลัยราชภัฏนครปฐม',
                'gpa' => '3.75',
                'graduationYear' => '2567',
                'faculty' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
                'program' => 'วิศวกรรมซอฟต์แวร์',
                'status' => 'อนุมัติ',
                'applicationDate' => '15/08/2568'
            ],
            [
                'id' => 2,
                'title' => 'นางสาว',
                'firstName' => 'สุนิสา',
                'lastName' => 'รักเรียน',
                'gender' => 'หญิง',
                'idCard' => '2-3456-78901-23-4',
                'birthDate' => '22/08/2541',
                'address' => '456 หมู่ 7 ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000',
                'province' => 'นครปฐม',
                'postalCode' => '73000',
                'phone' => '082-345-6789',
                'email' => 'sunisa@example.com',
                'educationLevel' => 'ปวส.',
                'schoolName' => 'วิทยาลัยเทคนิคนครปฐม',
                'gpa' => '3.50',
                'graduationYear' => '2567',
                'faculty' => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
                'program' => 'ภาษาอังกฤษ',
                'status' => 'รอการตรวจสอบ',
                'applicationDate' => '16/08/2568'
            ],
            [
                'id' => 3,
                'title' => 'นาย',
                'firstName' => 'วินัย',
                'lastName' => 'พรหมมา',
                'gender' => 'ชาย',
                'idCard' => '3-4567-89012-34-5',
                'birthDate' => '10/12/2540',
                'address' => '789 ซอยรัชดา แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10320',
                'province' => 'กรุงเทพฯ',
                'postalCode' => '10320',
                'phone' => '083-456-7890',
                'email' => 'winai@example.com',
                'educationLevel' => 'ม.6',
                'schoolName' => 'โรงเรียนปทุมวิไล',
                'gpa' => '3.20',
                'graduationYear' => '2567',
                'faculty' => 'คณะวิทยาการจัดการ',
                'program' => 'การตลาด',
                'status' => 'อนุมัติ',
                'applicationDate' => '16/08/2568'
            ],
            [
                'id' => 4,
                'title' => 'นางสาว',
                'firstName' => 'จิตรา',
                'lastName' => 'แสงสว่าง',
                'gender' => 'หญิง',
                'idCard' => '4-5678-90123-45-6',
                'birthDate' => '05/03/2542',
                'address' => '321 หมู่ 5 ตำบลสนามจันทร์ อำเภอเมือง จังหวัดนครปฐม 73000',
                'province' => 'นครปฐม',
                'postalCode' => '73000',
                'phone' => '084-567-8901',
                'email' => 'jittra@example.com',
                'educationLevel' => 'ปวช.',
                'schoolName' => 'วิทยาลัยสารพัดช่างนครปฐม',
                'gpa' => '2.80',
                'graduationYear' => '2567',
                'faculty' => 'คณะพยาบาลศาสตร์',
                'program' => 'พยาบาลศาสตร์',
                'status' => 'ปฏิเสธ',
                'applicationDate' => '17/08/2568'
            ],
            [
                'id' => 5,
                'title' => 'นาย',
                'firstName' => 'ธนากร',
                'lastName' => 'ศรีสุข',
                'gender' => 'ชาย',
                'idCard' => '5-6789-01234-56-7',
                'birthDate' => '18/07/2541',
                'address' => '654 ถนนเพชรเกษม แขวงบางแค เขตบางแค กรุงเทพฯ 10160',
                'province' => 'กรุงเทพฯ',
                'postalCode' => '10160',
                'phone' => '085-678-9012',
                'email' => 'thanakorn@example.com',
                'educationLevel' => 'ม.6',
                'schoolName' => 'โรงเรียนบ้านใหม่',
                'gpa' => '3.60',
                'graduationYear' => '2567',
                'faculty' => 'คณะครุศาสตร์',
                'program' => 'การสอนคณิตศาสตร์',
                'status' => 'รอการตรวจสอบ',
                'applicationDate' => '17/08/2568'
            ],
            [
                'id' => 6,
                'title' => 'นางสาว',
                'firstName' => 'นภาวรรณ',
                'lastName' => 'แก้วใส',
                'gender' => 'หญิง',
                'idCard' => '6-7890-12345-67-8',
                'birthDate' => '30/11/2541',
                'address' => '987 หมู่ 3 ตำบลลำพยา อำเภอเมือง จังหวัดนครปฐม 73000',
                'province' => 'นครปฐม',
                'postalCode' => '73000',
                'phone' => '086-789-0123',
                'email' => 'naphawan@example.com',
                'educationLevel' => 'ปวส.',
                'schoolName' => 'วิทยาลัยเทคนิคพุทธมณฑล',
                'gpa' => '3.90',
                'graduationYear' => '2567',
                'faculty' => 'คณะศิลปกรรมศาสตร์',
                'program' => 'ดนตรี',
                'status' => 'อนุมัติ',
                'applicationDate' => '18/08/2568'
            ]
        ];
        
        return view('admin.admission-report-admin', compact('applicants'));
    })->name('admin.admission.report')->middleware('admin');
    
    // Admission report update route for admin
    Route::put('/admin/admission-report', function (\Illuminate\Http\Request $request) {
        // In a real application, you would save the data to database here
        // For this example, we'll just return a success response
        
        // Get the updated data from the request
        $totalApplicants = $request->input('total_applicants');
        $pendingApplicants = $request->input('pending_applicants');
        $approvedApplicants = $request->input('approved_applicants');
        $rejectedApplicants = $request->input('rejected_applicants');
        $applicants = $request->input('applicants', []);
        
        // Process and save the data (in a real app, you would save to database)
        // For now, we'll just return a success response
        
        return redirect()->route('admin.admission.report')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
    })->name('admin.admission.report.update')->middleware('admin');
    
    Route::resource('admin/news', NewsController::class)->names([
        'index' => 'admin.news.index',
        'create' => 'admin.news.create',
        'store' => 'admin.news.store',
        'show' => 'admin.news.show',
        'edit' => 'admin.news.edit',
        'update' => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
    ]);
    
    Route::resource('admin/courses', CourseController::class)->names([
        'index' => 'admin.courses.index',
        'create' => 'admin.courses.create',
        'store' => 'admin.courses.store',
        'show' => 'admin.courses.show',
        'edit' => 'admin.courses.edit',
        'update' => 'admin.courses.update',
        'destroy' => 'admin.courses.destroy',
    ]);
    
    Route::resource('admin/personnels', PersonnelController::class)->names([
        'index' => 'admin.personnels.index',
        'create' => 'admin.personnels.create',
        'store' => 'admin.personnels.store',
        'show' => 'admin.personnels.show',
        'edit' => 'admin.personnels.edit',
        'update' => 'admin.personnels.update',
        'destroy' => 'admin.personnels.destroy',
    ]);
    
    Route::resource('admin/settings', SettingController::class)->names([
        'index' => 'admin.settings.index',
        'create' => 'admin.settings.create',
        'store' => 'admin.settings.store',
        'show' => 'admin.settings.show',
        'edit' => 'admin.settings.edit',
        'update' => 'admin.settings.update',
        'destroy' => 'admin.settings.destroy',
    ]);
    
    // Custom pages routes
    Route::get('/admin/custom/add', function () {
        return view('admin.custom.add-data');
    })->name('admin.custom.add');
    
    Route::get('/admin/custom/list', function () {
        return view('admin.custom.list-data');
    })->name('admin.custom.list');
});

// Clear application status (for testing)
Route::get('/clear-application', function () {
    session()->forget('has_applied');
    return redirect()->route('admission');
})->name('clear.application');

// Standalone admission report route (outside admin middleware)
Route::get('/admission-report', function () {
    // Sample data for demonstration
    $applicants = [
        [
            'id' => 1,
            'title' => 'นาย',
            'firstName' => 'สมชาย',
            'lastName' => 'ใจดี',
            'gender' => 'ชาย',
            'idCard' => '1-2345-67890-12-3',
            'birthDate' => '15/05/2540',
            'address' => '123 ถนนสุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพฯ 10110',
            'province' => 'กรุงเทพฯ',
            'postalCode' => '10110',
            'phone' => '081-234-5678',
            'email' => 'somchai@example.com',
            'educationLevel' => 'ม.6',
            'schoolName' => 'โรงเรียนสาธิตมหาวิทยาลัยราชภัฏนครปฐม',
            'gpa' => '3.75',
            'graduationYear' => '2567',
            'faculty' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
            'program' => 'วิศวกรรมซอฟต์แวร์',
            'status' => 'อนุมัติ',
            'applicationDate' => '15/08/2568'
        ],
        [
            'id' => 2,
            'title' => 'นางสาว',
            'firstName' => 'สุนิสา',
            'lastName' => 'รักเรียน',
            'gender' => 'หญิง',
            'idCard' => '2-3456-78901-23-4',
            'birthDate' => '22/08/2541',
            'address' => '456 หมู่ 7 ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000',
            'province' => 'นครปฐม',
            'postalCode' => '73000',
            'phone' => '082-345-6789',
            'email' => 'sunisa@example.com',
            'educationLevel' => 'ปวส.',
            'schoolName' => 'วิทยาลัยเทคนิคนครปฐม',
            'gpa' => '3.50',
            'graduationYear' => '2567',
            'faculty' => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
            'program' => 'ภาษาอังกฤษ',
            'status' => 'รอการตรวจสอบ',
            'applicationDate' => '16/08/2568'
        ],
        [
            'id' => 3,
            'title' => 'นาย',
            'firstName' => 'วินัย',
            'lastName' => 'พรหมมา',
            'gender' => 'ชาย',
            'idCard' => '3-4567-89012-34-5',
            'birthDate' => '10/12/2540',
            'address' => '789 ซอยรัชดา แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10320',
            'province' => 'กรุงเทพฯ',
            'postalCode' => '10320',
            'phone' => '083-456-7890',
            'email' => 'winai@example.com',
            'educationLevel' => 'ม.6',
            'schoolName' => 'โรงเรียนปทุมวิไล',
            'gpa' => '3.20',
            'graduationYear' => '2567',
            'faculty' => 'คณะวิทยาการจัดการ',
            'program' => 'การตลาด',
            'status' => 'อนุมัติ',
            'applicationDate' => '16/08/2568'
        ],
        [
            'id' => 4,
            'title' => 'นางสาว',
            'firstName' => 'จิตรา',
            'lastName' => 'แสงสว่าง',
            'gender' => 'หญิง',
            'idCard' => '4-5678-90123-45-6',
            'birthDate' => '05/03/2542',
            'address' => '321 หมู่ 5 ตำบลสนามจันทร์ อำเภอเมือง จังหวัดนครปฐม 73000',
            'province' => 'นครปฐม',
            'postalCode' => '73000',
            'phone' => '084-567-8901',
            'email' => 'jittra@example.com',
            'educationLevel' => 'ปวช.',
            'schoolName' => 'วิทยาลัยสารพัดช่างนครปฐม',
            'gpa' => '2.80',
            'graduationYear' => '2567',
            'faculty' => 'คณะพยาบาลศาสตร์',
            'program' => 'พยาบาลศาสตร์',
            'status' => 'ปฏิเสธ',
            'applicationDate' => '17/08/2568'
        ],
        [
            'id' => 5,
            'title' => 'นาย',
            'firstName' => 'ธนากร',
            'lastName' => 'ศรีสุข',
            'gender' => 'ชาย',
            'idCard' => '5-6789-01234-56-7',
            'birthDate' => '18/07/2541',
            'address' => '654 ถนนเพชรเกษม แขวงบางแค เขตบางแค กรุงเทพฯ 10160',
            'province' => 'กรุงเทพฯ',
            'postalCode' => '10160',
            'phone' => '085-678-9012',
            'email' => 'thanakorn@example.com',
            'educationLevel' => 'ม.6',
            'schoolName' => 'โรงเรียนบ้านใหม่',
            'gpa' => '3.60',
            'graduationYear' => '2567',
            'faculty' => 'คณะครุศาสตร์',
            'program' => 'การสอนคณิตศาสตร์',
            'status' => 'รอการตรวจสอบ',
            'applicationDate' => '17/08/2568'
        ],
        [
            'id' => 6,
            'title' => 'นางสาว',
            'firstName' => 'นภาวรรณ',
            'lastName' => 'แก้วใส',
            'gender' => 'หญิง',
            'idCard' => '6-7890-12345-67-8',
            'birthDate' => '30/11/2541',
            'address' => '987 หมู่ 3 ตำบลลำพยา อำเภอเมือง จังหวัดนครปฐม 73000',
            'province' => 'นครปฐม',
            'postalCode' => '73000',
            'phone' => '086-789-0123',
            'email' => 'naphawan@example.com',
            'educationLevel' => 'ปวส.',
            'schoolName' => 'วิทยาลัยเทคนิคพุทธมณฑล',
            'gpa' => '3.90',
            'graduationYear' => '2567',
            'faculty' => 'คณะศิลปกรรมศาสตร์',
            'program' => 'ดนตรี',
            'status' => 'อนุมัติ',
            'applicationDate' => '18/08/2568'
        ]
    ];
    
    return view('admission-report', compact('applicants'));
})->name('admission.report');

// Faculty and program quota information route
Route::get('/faculty-program-quotas', function () {
    // Faculty and program quota data
    $facultyPrograms = [
        [
            'faculty' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
            'programs' => [
                ['name' => 'วิศวกรรมซอฟต์แวร์', 'quota' => 60, 'registered' => 45],
                ['name' => 'วิทยาการคอมพิวเตอร์', 'quota' => 60, 'registered' => 52],
                ['name' => 'เทคโนโลยีสารสนเทศ', 'quota' => 60, 'registered' => 48],
                ['name' => 'วิทยาศาสตร์สิ่งแวดล้อม', 'quota' => 40, 'registered' => 32],
                ['name' => 'ฟิสิกส์', 'quota' => 30, 'registered' => 25],
                ['name' => 'เคมี', 'quota' => 30, 'registered' => 28],
                ['name' => 'ชีววิทยา', 'quota' => 30, 'registered' => 22],
                ['name' => 'คณิตศาสตร์', 'quota' => 30, 'registered' => 20],
            ]
        ],
        [
            'faculty' => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
            'programs' => [
                ['name' => 'ภาษาไทย', 'quota' => 40, 'registered' => 35],
                ['name' => 'ภาษาอังกฤษ', 'quota' => 60, 'registered' => 55],
                ['name' => 'ภาษาจีน', 'quota' => 30, 'registered' => 25],
                ['name' => 'ประวัติศาสตร์', 'quota' => 25, 'registered' => 20],
                ['name' => 'ภูมิศาสตร์', 'quota' => 25, 'registered' => 18],
                ['name' => 'รัฐศาสตร์การปกครอง', 'quota' => 30, 'registered' => 22],
                ['name' => 'สังคมวิทยา', 'quota' => 30, 'registered' => 24],
                ['name' => 'จิตวิทยา', 'quota' => 35, 'registered' => 30],
            ]
        ],
        [
            'faculty' => 'คณะครุศาสตร์',
            'programs' => [
                ['name' => 'การสอนภาษาอังกฤษ', 'quota' => 40, 'registered' => 32],
                ['name' => 'การสอนคณิตศาสตร์', 'quota' => 30, 'registered' => 25],
                ['name' => 'การสอนวิทยาศาสตร์', 'quota' => 30, 'registered' => 28],
                ['name' => 'การสอนสังคมศึกษา', 'quota' => 30, 'registered' => 24],
                ['name' => 'การสอนภาษาไทย', 'quota' => 30, 'registered' => 26],
            ]
        ],
        [
            'faculty' => 'คณะวิทยาการจัดการ',
            'programs' => [
                ['name' => 'การจัดการ', 'quota' => 50, 'registered' => 42],
                ['name' => 'การตลาด', 'quota' => 40, 'registered' => 35],
                ['name' => 'บัญชี', 'quota' => 50, 'registered' => 45],
                ['name' => 'การเงิน', 'quota' => 40, 'registered' => 33],
                ['name' => 'คอมพิวเตอร์ธุรกิจ', 'quota' => 40, 'registered' => 36],
            ]
        ],
        [
            'faculty' => 'คณะศิลปกรรมศาสตร์',
            'programs' => [
                ['name' => 'ศิลปกรรม', 'quota' => 35, 'registered' => 28],
                ['name' => 'การออกแบบ', 'quota' => 35, 'registered' => 30],
                ['name' => 'ดนตรี', 'quota' => 25, 'registered' => 20],
                ['name' => 'การแสดง', 'quota' => 25, 'registered' => 18],
            ]
        ],
        [
            'faculty' => 'คณะพยาบาลศาสตร์',
            'programs' => [
                ['name' => 'พยาบาลศาสตร์', 'quota' => 80, 'registered' => 72],
            ]
        ],
    ];
    
    return view('faculty-program-quotas', compact('facultyPrograms'));
})->name('faculty.program.quotas');

// Faculty and program quota information route for admin
Route::get('/admin/faculty-program-quotas', function () {
    // Faculty and program quota data
    $facultyPrograms = [
        [
            'faculty' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
            'programs' => [
                ['name' => 'วิศวกรรมซอฟต์แวร์', 'quota' => 60, 'registered' => 45],
                ['name' => 'วิทยาการคอมพิวเตอร์', 'quota' => 60, 'registered' => 52],
                ['name' => 'เทคโนโลยีสารสนเทศ', 'quota' => 60, 'registered' => 48],
                ['name' => 'วิทยาศาสตร์สิ่งแวดล้อม', 'quota' => 40, 'registered' => 32],
                ['name' => 'ฟิสิกส์', 'quota' => 30, 'registered' => 25],
                ['name' => 'เคมี', 'quota' => 30, 'registered' => 28],
                ['name' => 'ชีววิทยา', 'quota' => 30, 'registered' => 22],
                ['name' => 'คณิตศาสตร์', 'quota' => 30, 'registered' => 20],
            ]
        ],
        [
            'faculty' => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
            'programs' => [
                ['name' => 'ภาษาไทย', 'quota' => 40, 'registered' => 35],
                ['name' => 'ภาษาอังกฤษ', 'quota' => 60, 'registered' => 55],
                ['name' => 'ภาษาจีน', 'quota' => 30, 'registered' => 25],
                ['name' => 'ประวัติศาสตร์', 'quota' => 25, 'registered' => 20],
                ['name' => 'ภูมิศาสตร์', 'quota' => 25, 'registered' => 18],
                ['name' => 'รัฐศาสตร์การปกครอง', 'quota' => 30, 'registered' => 22],
                ['name' => 'สังคมวิทยา', 'quota' => 30, 'registered' => 24],
                ['name' => 'จิตวิทยา', 'quota' => 35, 'registered' => 30],
            ]
        ],
        [
            'faculty' => 'คณะครุศาสตร์',
            'programs' => [
                ['name' => 'การสอนภาษาอังกฤษ', 'quota' => 40, 'registered' => 32],
                ['name' => 'การสอนคณิตศาสตร์', 'quota' => 30, 'registered' => 25],
                ['name' => 'การสอนวิทยาศาสตร์', 'quota' => 30, 'registered' => 28],
                ['name' => 'การสอนสังคมศึกษา', 'quota' => 30, 'registered' => 24],
                ['name' => 'การสอนภาษาไทย', 'quota' => 30, 'registered' => 26],
            ]
        ],
        [
            'faculty' => 'คณะวิทยาการจัดการ',
            'programs' => [
                ['name' => 'การจัดการ', 'quota' => 50, 'registered' => 42],
                ['name' => 'การตลาด', 'quota' => 40, 'registered' => 35],
                ['name' => 'บัญชี', 'quota' => 50, 'registered' => 45],
                ['name' => 'การเงิน', 'quota' => 40, 'registered' => 33],
                ['name' => 'คอมพิวเตอร์ธุรกิจ', 'quota' => 40, 'registered' => 36],
            ]
        ],
        [
            'faculty' => 'คณะศิลปกรรมศาสตร์',
            'programs' => [
                ['name' => 'ศิลปกรรม', 'quota' => 35, 'registered' => 28],
                ['name' => 'การออกแบบ', 'quota' => 35, 'registered' => 30],
                ['name' => 'ดนตรี', 'quota' => 25, 'registered' => 20],
                ['name' => 'การแสดง', 'quota' => 25, 'registered' => 18],
            ]
        ],
        [
            'faculty' => 'คณะพยาบาลศาสตร์',
            'programs' => [
                ['name' => 'พยาบาลศาสตร์', 'quota' => 80, 'registered' => 72],
            ]
        ],
    ];
    
    return view('admin.faculty-program-quotas', compact('facultyPrograms'));
})->name('admin.faculty.program.quotas')->middleware('admin');

// Faculty and program quota update route for admin
Route::put('/admin/faculty-program-quotas', function (\Illuminate\Http\Request $request) {
    // In a real application, you would save the data to database here
    // For this example, we'll just return a success response
    
    // Get the updated faculty and program data from the request
    $facultyPrograms = $request->input('faculties', []);
    
    // Process and save the data (in a real app, you would save to database)
    // For now, we'll just return a success response
    
    return redirect()->route('admin.faculty.program.quotas')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
})->name('admin.faculty.program.quotas.update')->middleware('admin');

// Application process route
Route::get('/application-process', function () {
    // Application process steps
    $steps = [
        [
            'number' => 1,
            'title' => 'ตรวจสอบคุณสมบัติและหลักสูตร',
            'description' => 'ตรวจสอบคุณสมบัติการสมัครและเลือกหลักสูตรที่สนใจจากคณะต่างๆ ของมหาวิทยาลัยราชภัฏนครปฐม',
            'details' => [
                'สำเร็จการศึกษาชั้นมัธยมศึกษาตอนปลาย (ม.6) หรือประกาศนียบัตรวิชาชีพ (ปวช.) หรือประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)',
                'มีผลการเรียนเฉลี่ยสะสมไม่ต่ำกว่า 2.00',
                'ไม่เป็นผู้ที่ถูกถอดถอนจากสถานศึกษาของรัฐหรือเอกชนด้วยเหตุการกระทำผิดวินัยจนยังไม่หมดระยะเวลาที่กำหนด',
                'ไม่เป็นบุคคลไร้ความสามารถ หรือบุคคลเสมือนไร้ความสามารถ หรือบุคคลล้มละลาย ซึ่งยังไม่ได้รับการฟื้นฟูกิจการ',
                'ไม่เป็นผู้ที่อยู่ในระหว่างถูกเพิกถอนสิทธิหรือสิทธิเสียโดยคำสั่งของศาล',
                'ไม่เป็นโรคจิตหรือจิตฟั่นเฟือน หรือป่วยเป็นโรคเรื้อน วัณโรค หรือโรคติดต่ออันตราย หรือพิการทางร่างกายอย่างถาวรจนไม่สามารถปฏิบัติหน้าที่ได้'
            ]
        ],
        [
            'number' => 2,
            'title' => 'เตรียมเอกสารที่จำเป็น',
            'description' => 'รวบรวมเอกสารที่จำเป็นสำหรับการสมัครตามที่มหาวิทยาลัยกำหนด',
            'details' => [
                'ใบสมัครเข้าศึกษา (กรอกออนไลน์หรือยื่นที่มหาวิทยาลัย)',
                'สำเนาบัตรประชาชน จำนวน 2 ฉบับ',
                'สำเนาทะเบียนบ้าน จำนวน 1 ฉบับ',
                'รูปถ่ายหน้าตรง ขนาด 1 นิ้ว จำนวน 2 ใบ',
                'ใบรับรองผลการศึกษา (ปพ.1 หรือ ปพ.7) จำนวน 1 ฉบับ',
                'ใบแสดงผลการเรียน (ปพ.7) จำนวน 1 ฉบับ',
                'สำเนาเกียรติบัตร (ถ้ามี) จำนวน 1 ฉบับ',
                'ใบรับรองแพทย์ (ถ้ามีความพิการหรือโรคประจำตัว)'
            ]
        ],
        [
            'number' => 3,
            'title' => 'สมัครเข้าศึกษา',
            'description' => 'ดำเนินการสมัครเข้าศึกษาผ่านระบบออนไลน์หรือยื่นเอกสารที่มหาวิทยาลัย',
            'details' => [
                'เข้าไปที่เว็บไซต์ของมหาวิทยาลัยราชภัฏนครปฐม',
                'เลือกเมนู "สมัครเรียน" หรือ "รับสมัครนักศึกษาใหม่"',
                'กรอกข้อมูลส่วนตัวและข้อมูลการศึกษา',
                'เลือกคณะและสาขาวิชาที่สนใจ',
                'อัปโหลดเอกสารที่จำเป็นหรือยื่นเอกสารที่มหาวิทยาลัย',
                'ยืนยันข้อมูลและส่งใบสมัคร'
            ]
        ],
        [
            'number' => 4,
            'title' => 'ตรวจสอบสถานะการสมัคร',
            'description' => 'ติดตามสถานะการสมัครผ่านระบบออนไลน์หรือรอการติดต่อจากมหาวิทยาลัย',
            'details' => [
                'ตรวจสอบอีเมลหรือระบบออนไลน์เพื่อยืนยันการได้รับใบสมัคร',
                'รอการตรวจสอบข้อมูลจากเจ้าหน้าที่',
                'ตรวจสอบวันนัดหมายสัมภาษณ์ (ถ้ามี)'
            ]
        ],
        [
            'number' => 5,
            'title' => 'สัมภาษณ์ (ถ้ามี)',
            'description' => 'เข้าร่วมสัมภาษณ์ตามวันและเวลาที่มหาวิทยาลัยกำหนด',
            'details' => [
                'เตรียมตัวให้พร้อมสำหรับการสัมภาษณ์',
                'แต่งกายสุภาพและตรงต่อเวลา',
                'นำเอกสารต้นฉบับเพื่อประกอบการตรวจสอบ',
                'ตอบคำถามอย่างสุภาพและจริงใจ'
            ]
        ],
        [
            'number' => 6,
            'title' => 'ประกาศผลการรับสมัคร',
            'description' => 'รอประกาศผลการรับสมัครผ่านเว็บไซต์หรืออีเมล',
            'details' => [
                'ตรวจสอบผลการรับสมัครผ่านเว็บไซต์ของมหาวิทยาลัย',
                'หากผ่านการคัดเลือก ให้ดำเนินการตามขั้นตอนต่อไป',
                'หากไม่ผ่าน สามารถสมัครรอบถัดไปได้'
            ]
        ],
        [
            'number' => 7,
            'title' => 'ชำระค่าธรรมเนียมและลงทะเบียน',
            'description' => 'ชำระค่าธรรมเนียมการศึกษาและดำเนินการลงทะเบียนเรียน',
            'details' => [
                'ชำระค่าธรรมเนียมการศึกษาตามที่มหาวิทยาลัยกำหนด',
                'ลงทะเบียนรายวิชาที่จะศึกษา',
                'รับเอกสารและอุปกรณ์การเรียน',
                'เข้าร่วมกิจกรรมปฐมนิเทศน์นักศึกษาใหม่'
            ]
        ]
    ];
    
    return view('application-process', compact('steps'));
})->name('application.process');

// Application process route for admin
Route::get('/admin/application-process', function () {
    // Application process steps
    $steps = [
        [
            'number' => 1,
            'title' => 'ตรวจสอบคุณสมบัติและหลักสูตร',
            'description' => 'ตรวจสอบคุณสมบัติการสมัครและเลือกหลักสูตรที่สนใจจากคณะต่างๆ ของมหาวิทยาลัยราชภัฏนครปฐม',
            'details' => [
                'สำเร็จการศึกษาชั้นมัธยมศึกษาตอนปลาย (ม.6) หรือประกาศนียบัตรวิชาชีพ (ปวช.) หรือประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)',
                'มีผลการเรียนเฉลี่ยสะสมไม่ต่ำกว่า 2.00',
                'ไม่เป็นผู้ที่ถูกถอดถอนจากสถานศึกษาของรัฐหรือเอกชนด้วยเหตุการกระทำผิดวินัยจนยังไม่หมดระยะเวลาที่กำหนด',
                'ไม่เป็นบุคคลไร้ความสามารถ หรือบุคคลเสมือนไร้ความสามารถ หรือบุคคลล้มละลาย ซึ่งยังไม่ได้รับการฟื้นฟูกิจการ',
                'ไม่เป็นผู้ที่อยู่ในระหว่างถูกเพิกถอนสิทธิหรือสิทธิเสียโดยคำสั่งของศาล',
                'ไม่เป็นโรคจิตหรือจิตฟั่นเฟือน หรือป่วยเป็นโรคเรื้อน วัณโรค หรือโรคติดต่ออันตราย หรือพิการทางร่างกายอย่างถาวรจนไม่สามารถปฏิบัติหน้าที่ได้'
            ]
        ],
        [
            'number' => 2,
            'title' => 'เตรียมเอกสารที่จำเป็น',
            'description' => 'รวบรวมเอกสารที่จำเป็นสำหรับการสมัครตามที่มหาวิทยาลัยกำหนด',
            'details' => [
                'ใบสมัครเข้าศึกษา (กรอกออนไลน์หรือยื่นที่มหาวิทยาลัย)',
                'สำเนาบัตรประชาชน จำนวน 2 ฉบับ',
                'สำเนาทะเบียนบ้าน จำนวน 1 ฉบับ',
                'รูปถ่ายหน้าตรง ขนาด 1 นิ้ว จำนวน 2 ใบ',
                'ใบรับรองผลการศึกษา (ปพ.1 หรือ ปพ.7) จำนวน 1 ฉบับ',
                'ใบแสดงผลการเรียน (ปพ.7) จำนวน 1 ฉบับ',
                'สำเนาเกียรติบัตร (ถ้ามี) จำนวน 1 ฉบับ',
                'ใบรับรองแพทย์ (ถ้ามีความพิการหรือโรคประจำตัว)'
            ]
        ],
        [
            'number' => 3,
            'title' => 'สมัครเข้าศึกษา',
            'description' => 'ดำเนินการสมัครเข้าศึกษาผ่านระบบออนไลน์หรือยื่นเอกสารที่มหาวิทยาลัย',
            'details' => [
                'เข้าไปที่เว็บไซต์ของมหาวิทยาลัยราชภัฏนครปฐม',
                'เลือกเมนู "สมัครเรียน" หรือ "รับสมัครนักศึกษาใหม่"',
                'กรอกข้อมูลส่วนตัวและข้อมูลการศึกษา',
                'เลือกคณะและสาขาวิชาที่สนใจ',
                'อัปโหลดเอกสารที่จำเป็นหรือยื่นเอกสารที่มหาวิทยาลัย',
                'ยืนยันข้อมูลและส่งใบสมัคร'
            ]
        ],
        [
            'number' => 4,
            'title' => 'ตรวจสอบสถานะการสมัคร',
            'description' => 'ติดตามสถานะการสมัครผ่านระบบออนไลน์หรือรอการติดต่อจากมหาวิทยาลัย',
            'details' => [
                'ตรวจสอบอีเมลหรือระบบออนไลน์เพื่อยืนยันการได้รับใบสมัคร',
                'รอการตรวจสอบข้อมูลจากเจ้าหน้าที่',
                'ตรวจสอบวันนัดหมายสัมภาษณ์ (ถ้ามี)'
            ]
        ],
        [
            'number' => 5,
            'title' => 'สัมภาษณ์ (ถ้ามี)',
            'description' => 'เข้าร่วมสัมภาษณ์ตามวันและเวลาที่มหาวิทยาลัยกำหนด',
            'details' => [
                'เตรียมตัวให้พร้อมสำหรับการสัมภาษณ์',
                'แต่งกายสุภาพและตรงต่อเวลา',
                'นำเอกสารต้นฉบับเพื่อประกอบการตรวจสอบ',
                'ตอบคำถามอย่างสุภาพและจริงใจ'
            ]
        ],
        [
            'number' => 6,
            'title' => 'ประกาศผลการรับสมัคร',
            'description' => 'รอประกาศผลการรับสมัครผ่านเว็บไซต์หรืออีเมล',
            'details' => [
                'ตรวจสอบผลการรับสมัครผ่านเว็บไซต์ของมหาวิทยาลัย',
                'หากผ่านการคัดเลือก ให้ดำเนินการตามขั้นตอนต่อไป',
                'หากไม่ผ่าน สามารถสมัครรอบถัดไปได้'
            ]
        ],
        [
            'number' => 7,
            'title' => 'ชำระค่าธรรมเนียมและลงทะเบียน',
            'description' => 'ชำระค่าธรรมเนียมการศึกษาและดำเนินการลงทะเบียนเรียน',
            'details' => [
                'ชำระค่าธรรมเนียมการศึกษาตามที่มหาวิทยาลัยกำหนด',
                'ลงทะเบียนรายวิชาที่จะศึกษา',
                'รับเอกสารและอุปกรณ์การเรียน',
                'เข้าร่วมกิจกรรมปฐมนิเทศน์นักศึกษาใหม่'
            ]
        ]
    ];
    
    return view('admin.application-process', compact('steps'));
})->name('admin.application.process')->middleware('admin');

// Application process update route for admin
Route::put('/admin/application-process', function (\Illuminate\Http\Request $request) {
    // In a real application, you would save the data to database here
    // For this example, we'll just return a success response
    
    // Get the updated steps from the request
    $steps = $request->input('steps', []);
    
    // Get the contact information
    $contact = $request->input('contact', []);
    
    // Process and save the data (in a real app, you would save to database)
    // For now, we'll just return a success response
    
    return redirect()->route('admin.application.process')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
})->name('admin.application.process.update')->middleware('admin');

// Generic data management routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/data', [App\Http\Controllers\Admin\GenericDataController::class, 'index'])->name('admin.generic.data.index');
    Route::get('/admin/data/create', [App\Http\Controllers\Admin\GenericDataController::class, 'create'])->name('admin.generic.data.create');
    Route::post('/admin/data', [App\Http\Controllers\Admin\GenericDataController::class, 'store'])->name('admin.generic.data.store');
    Route::get('/admin/data/{id}/edit', [App\Http\Controllers\Admin\GenericDataController::class, 'edit'])->name('admin.generic.data.edit');
    Route::put('/admin/data/{id}', [App\Http\Controllers\Admin\GenericDataController::class, 'update'])->name('admin.generic.data.update');
    Route::delete('/admin/data/{id}', [App\Http\Controllers\Admin\GenericDataController::class, 'destroy'])->name('admin.generic.data.destroy');
});
