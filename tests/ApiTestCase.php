<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class ApiTestCase extends BaseTestCase {
    use CreatesApplication, WithFaker, RefreshDatabase;

    /**
     * @param null $user
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    protected function signIn($user = null) {
        $user = $user ?: User::factory()->create(['role' => User::SiteUSER]);
        $this->actingAs($user, 'api');
        return $user;
    }

    /**
     * attributes of a user model to create new user model, including password confirmation
     * @param null $attributes
     * @return array
     */
    protected function createUserAttributes($attributes = null) {
        $user = $attributes ? User::factory()->raw($attributes) : User::factory()->raw();
        // auto complete password_confirmation when it's not send by attributes
        $attributes && in_array('password_confirmation', $attributes) ?: ($user['password_confirmation'] = $user['password']);
        return $user;
    }


    /**
     * create new user with siteUser role and return the model
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function createNewUser($attributes = []) {

        $user = User::factory()->create(
            array_merge($attributes, ['role' => User::SiteUSER])
        );
        return $user;
    }
}
