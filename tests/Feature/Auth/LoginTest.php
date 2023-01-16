<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/console/login');

        $response->assertSuccessful();
        $response->assertViewIs('console.login');
    }

    public function test_user_cannot_view_login_form_when_authenticated()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/console/login');

        $response->assertRedirect('/console/dashboard');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'ILikeTesting'),
        ]);

        $response = $this->post('/console/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/console/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('ILikeTesting'),
        ]);

        $response = $this->from('/console/login')->post('/console/login', [
            'email' => $user->email,
            'password' => 'IDontLikeTesting',
        ]);

        $response->assertRedirect('/console/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
