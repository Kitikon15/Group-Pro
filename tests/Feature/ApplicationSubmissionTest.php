<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicationSubmissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_dashboard_after_application_submission()
    {
        $response = $this->post('/application', [
            'fullname' => 'John Doe',
            'email' => 'john@example.com',
            'title' => 'Mr.',
            'id_card' => '1234567890123',
            'birthdate' => '1990-01-01',
            'address' => '123 Main St',
            'phone' => '0812345678',
            'school' => 'Test School',
            'graduation_year' => '2020',
            'gpa' => '3.50'
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();
    }

    /** @test */
    public function it_creates_user_from_application_data()
    {
        $this->post('/application', [
            'fullname' => 'Jane Smith',
            'email' => 'jane@example.com',
            'title' => 'Ms.',
            'id_card' => '1234567890124',
            'birthdate' => '1995-05-15',
            'address' => '456 Oak Ave',
            'phone' => '0812345679',
            'school' => 'Another School',
            'graduation_year' => '2021',
            'gpa' => '3.75'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com'
        ]);
    }

    /** @test */
    public function it_does_not_create_duplicate_users()
    {
        // Create a user first
        $user = User::create([
            'name' => 'Existing User',
            'email' => 'existing@example.com',
            'password' => bcrypt('password123')
        ]);

        // Try to create the same user through application
        $this->post('/application', [
            'fullname' => 'Existing User',
            'email' => 'existing@example.com',
            'title' => 'Mr.',
            'id_card' => '1234567890125',
            'birthdate' => '1992-03-10',
            'address' => '789 Pine St',
            'phone' => '0812345680',
            'school' => 'Third School',
            'graduation_year' => '2019',
            'gpa' => '3.25'
        ]);

        // Check that only one user exists with this email
        $this->assertEquals(1, User::where('email', 'existing@example.com')->count());
    }

    /** @test */
    public function it_redirects_authenticated_users_to_dashboard_from_main_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertRedirect('/admin/dashboard');
    }

    /** @test */
    public function it_redirects_authenticated_users_to_dashboard_from_admission_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admission');

        $response->assertRedirect('/admin/dashboard');
    }
}