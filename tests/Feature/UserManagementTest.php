<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserManagementTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function an_admin_user_can_create_new_user() {
        $this->signIn();
        $newUser = User::factory()->raw();
        $this->post(route('users.store'), $newUser)->assertRedirect(route('users.index'));
    }

    /** @test */
    public function a_normal_user_cannot_manage_users() {
        $this->signIn($user = User::factory()->create(['role' => User::USER]));

        $newUser = User::factory()->create();

        $this->get(route('users.index'))->assertStatus(403);
        $this->delete(route('users.destroy', $newUser))->assertStatus(403);
        $this->patch(route('users.update', $newUser))->assertStatus(403);
        $this->post(route('users.store', $newUser))->assertStatus(403);
    }

    /** @test */
    public function an_inactive_user_cannot_login_to_the_system() {
        $user = User::factory()->create(['status' => User::INACTIVE]);
        $this->post('/login', $user->toArray())->assertSessionHasErrors();
        $this->get(route('users.index'))->assertRedirect(route('login'));
    }

    /** @test */
    public function an_admin_user_cannot_delete_their_own_user() {
        $admin = User::factory()->create();
        $this->signIn($admin);
        $this->delete(route('users.destroy', $admin))->assertStatus(403);

    }

    /** @test */
    public function guests_cannot_manage_users() {
        $this->get(route('users.index'))->assertRedirect('login');
        $this->get(route('users.create'))->assertRedirect('login');
        $user = User::factory()->create();
        $this->get(route('users.edit', $user))->assertRedirect('login');
        $this->post(route('users.store', $user->toArray()))->assertRedirect('login');
    }

    /** @test */
    public function an_admin_user_can_edit_a_user() {
        $this->signIn();
        $newUser = User::factory()->create();
        $this->patch(route('users.update', $newUser), $attributes = ['name' => 'changed', 'email' => 'changed@example.com', 'role' => 2])
            ->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', $attributes);
    }

    /** @test */
    public function creating_a_user_requires_a_name() {
        $this->signIn();
        $attributes = User::factory()->raw(['name' => '']);
        $this->post(route('users.store'), $attributes)->assertSessionHasErrors('name', '', 'form');
    }

    /** @test */
    public function creating_a_user_requires_an_email() {
        $this->signIn();
        $attributes = User::factory()->raw(['email' => '']);
        $this->post(route('users.store'), $attributes)->assertSessionHasErrors('email', '', 'form');
    }

    /** @test */
    public function creating_a_user_requires_a_unique_email() {
        $this->signIn();
        $attributes = User::factory()->raw(['email' => auth()->user()->email]);
        $this->post(route('users.store'), $attributes)->assertSessionHasErrors('email', '', 'form');
    }

    /** @test */
    public function creating_a_user_requires_a_strong_password() {
        $this->signIn();
        $attributes = User::factory()->raw(['password' => '12345678']);
        $this->post(route('users.store'), $attributes)->assertSessionHasErrors('password', '', 'form');
    }

    /** @test */
    public function admin_can_change_users_status() {
        $this->signIn();
        $newUser = User::factory()->create(['status' => User::ACTIVE]);
        $this->get(route('users.updateStatus', $newUser));

        $newUser->refresh();
        $this->assertEquals($newUser->status, User::INACTIVE);
    }

    /** @test */
    public function a_not_verified_user_cannot_access_any_thing_after_login() {
        $user = User::factory()->create(['email_verified_at' => null]);
        $this->signIn($user);
        $this->get(route('home'))->assertRedirect(route('verification.notice'));
        $this->get(route('users.index'))->assertRedirect(route('verification.notice'));
    }

}
