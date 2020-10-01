<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserTest extends ApiTestCase {
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_guest_can_register_new_account() {
        $user = $this->createUserAttributes();
        $this->postJson(route('api.register'), $user)->assertStatus(201);
    }

    /** @test */
    public function it_throws_422_if_data_are_not_valid_for_registering_user() {
        $user = $this->createUserAttributes(['name' => '']);
        $this->postJson(route('api.register'), $user)->assertStatus(422)->assertJsonValidationErrors(['name']);

        $user = User::factory()->raw(['password' => 'Vfrs@41354', 'password_confirmation' => '123456']);
        $this->postJson(route('api.register'), $user)->assertStatus(422)->assertJsonValidationErrors(['password']);
    }


    /** @test */
    public function a_registered_user_can_login_and_get_token() {

        $user = User::factory()->create(['name' => 'mina', 'password' => Hash::make($password = 'Fer@1245Rd')]);

        $this->postJson(route('api.login'), ['email' => $user->email, 'password' => $password])
            ->assertStatus(200)
            ->assertJsonStructure([
                'token', 'token_type', 'expires_in', 'user'
            ])
            ->assertJsonPath('user.email', $user->email);
    }

    /** @test */
    public function users_can_see_their_profile_with_the_given_token() {
        $user = $this->createNewUser();
        $this->signIn($user);

        $this->getJson(route('api.user.profile'))
            ->assertOk()
            ->assertJson([
                "data" => [
                    'email' => $user->email,
                    'name' => $user->name,
                ]
            ]);
    }

    /** @test */
    public function logged_in_users_can_see_their_profile() {
        $loggedInUser = $this->signIn();
        $this->getJson(route('api.user.profile'))
            ->assertOk()
            ->assertJson(
                [
                    "data" => [
                        'email' => $loggedInUser->email,
                        'name' => $loggedInUser->name,
                    ]
                ]);
    }

    /** @test */
    public function a_user_can_logout() {
        $loggedInUser = $this->signIn();
        $token = JWTAuth::fromUser($loggedInUser);
        $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->postJson(route('api.logout'))
            ->assertOk()
            ->assertJson([
                'message' => 'User successfully signed out',
            ]);
    }

    /** @test */
    public function a_confirmation_email_is_sent_to_registered_user() {

        Event::fake();
        $user = $this->createUserAttributes();
        $this->postJson(route('register'), $user)->assertStatus(201);

        Event::assertDispatched(Registered::class);

    }

    /** @test */
    public function users_can_change_their_password_with_valid_old_password() {
        $old_password = 'passWord123';

        $user = $this->createNewUser(['password' => Hash::make($old_password)]);
        $this->signIn($user);
        $attributed = ['old_password' => $old_password, 'password' => 'passWord1234', 'password_confirmation' => 'passWord1234'];
        $this->postJson(route('change.password'), $attributed)->assertOk();
    }

    /** @test */
    public function users_cannot_change_their_password_without_valid_old_password() {
        $this->signIn();
        $attributed = ['old_password' => 'someWrongPassword123', 'password' => 'passWord1234', 'password_confirmation' => 'passWord1234'];
        $this->postJson(route('change.password'), $attributed)
            ->assertJsonFragment(['old_password' => ['The current Password is not correct.']]);
    }

    /** @test */
    public function quests_may_not_edit_other_users_profile(){
        $this->putJson(route('api.edit.profile'))->assertStatus(401);
    }

    /** @test */
    public function users_can_edit_their_profile(){
        $this->signIn();

        $this->putJson(route('api.edit.profile'),$data = ['name'=>'Mina Daei']);
        $this->assertDatabaseHas('users', $data);
    }

    /** @test */
    public function users_cannot_change_their_email(){
        $this->signIn();

        $this->putJson(route('api.edit.profile'),$data = ['email'=>'test@example.com']);
        $this->assertDatabaseMissing('users', $data);
    }



}
