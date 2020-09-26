<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class ApiTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param null $user
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    protected function signIn($user = null) {
        $user = $user ?: User::factory()->create();
        $this->actingAs($user);
        return $user;
    }

    /**
     * @param null $attributes
     * @return array
     */
    protected function createUserAttributes($attributes = null){
        $user = $attributes ? User::factory()->raw($attributes) : User::factory()->raw();
        // auto complete password_confirmation when it's not send by attributes
        $attributes && in_array('password_confirmation',$attributes) ?: ($user['password_confirmation'] = $user['password']);
        return $user;
    }
}
