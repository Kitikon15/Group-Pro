<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_guests_from_dashboard_to_login()
    {
        $response = $this->get('/admin/dashboard');
        
        $response->assertRedirect('/admin/login');
    }

    /** @test */
    public function it_displays_login_form()
    {
        $response = $this->get('/admin/login');
        
        $response->assertStatus(200);
        $response->assertSee('เข้าสู่ระบบ Admin');
    }

    /** @test */
    public function it_authenticates_valid_users()
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/admin/login', [
            'username' => 'admin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_does_not_authenticate_invalid_credentials()
    {
        $response = $this->post('/admin/login', [
            'username' => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }

    /** @test */
    public function it_logs_out_authenticated_users()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }
}