<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loginTest extends TestCase
{
    use RefreshDatabase;

    protected function successfulLoginRoute()
    {
        return route('dashboard');
    }

    protected function loginGetRoute()
    {
        return route('login');
    }

    protected function loginPostRoute()
    {
        return route('login.store');
    }

    protected function guestMiddlewareRoute()
    {
        return route('dashboard');
    }

    public function testUserCanViewLoginForm()
    {
        $response = $this->get($this->loginGetRoute());

        $response->assertSuccessful();

        $response->assertViewIs('auth.login');
    }

    public function testUserCantSeeLoginFormWhenAuthenticated()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get($this->loginGetRoute());

        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserCanLoginWithCorrectData()
    {
        $user = User::factory()->create([
            'email' => 'dan@nba.com',
            'password' =>bcrypt($password = 'password')
        ]);

        $response = $this->post($this->loginPostRoute(),[
            'email' => $user->email,
            'password' => $password
        ]);

        $response->assertRedirect($this->successfulLoginRoute());

        $this->assertAuthenticatedAs($user);
    }

    public function testUserCantLoginWithInCorrectPassword()
    {
        $user = User::factory()->create([
            'password' =>bcrypt($password = 'password')
        ]);

        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => 'passwords'
        ]);

        $response->assertRedirect($this->loginGetRoute());

        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCantLoginWhenThisLoginDoesntExist()
    {
        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => 'dan@nba.net',
            'password' => '123456789'
        ]);

        $response->assertRedirect($this->loginGetRoute());

        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));

        $this->assertFalse(session()->hasOldInput('password'));

        $this->assertGuest();
    }
}
