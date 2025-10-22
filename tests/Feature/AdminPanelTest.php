<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_view_applications_index()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        // Create some applications
        Application::factory()->count(3)->create();

        // Acting as admin
        $response = $this->actingAs($admin)
                         ->get(route('admin.applications.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.applications.index');
        $response->assertViewHas('applications');
    }

    /** @test */
    public function admin_can_create_application()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        // Data for new application
        $applicationData = [
            'title' => 'นาย',
            'gender' => 'ชาย',
            'first_name' => 'สมชาย',
            'last_name' => 'ทดสอบ',
            'id_card' => '1234567890123',
            'birth_date' => '1990-01-01',
            'address' => '123 ถนนทดสอบ แขวงทดสอบ เขตทดสอบ กรุงเทพฯ 10110',
            'province' => 'กรุงเทพฯ',
            'postal_code' => '10110',
            'phone' => '0812345678',
            'email' => 'somchai@test.com',
            'education_level' => 'ม.6',
            'school_name' => 'โรงเรียนทดสอบ',
            'gpa' => '3.50',
            'graduation_year' => '2024',
            'faculty' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
            'program' => 'วิศวกรรมซอฟต์แวร์',
            'status' => 'pending',
        ];

        // Acting as admin
        $response = $this->actingAs($admin)
                         ->post(route('admin.applications.store'), $applicationData);

        $response->assertStatus(302); // Redirect after successful creation
        $this->assertDatabaseHas('applications', [
            'first_name' => 'สมชาย',
            'last_name' => 'ทดสอบ',
            'email' => 'somchai@test.com',
        ]);
    }

    /** @test */
    public function admin_can_update_application_status()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        // Create an application
        $application = Application::factory()->create([
            'status' => 'pending',
        ]);

        // Update status
        $response = $this->actingAs($admin)
                         ->put(route('admin.applications.updateStatus', $application), [
                             'status' => 'approved',
                             'admin_notes' => 'ผ่านการตรวจสอบคุณสมบัติ',
                         ]);

        $response->assertStatus(302); // Redirect after successful update
        $this->assertDatabaseHas('applications', [
            'id' => $application->id,
            'status' => 'approved',
            'admin_notes' => 'ผ่านการตรวจสอบคุณสมบัติ',
        ]);
    }
}