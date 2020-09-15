<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_set_as_inactive(){
        $this->signIn();
        $user = User::factory()->create();
        $user->setAsInactive();
        $user->refresh();
        $this->assertEquals($user->status,User::INACTIVE);

    }
    /** @test */
    public function it_can_set_as_active(){
        $this->signIn();
        $user = User::factory()->create(['status'=>User::INACTIVE]);
        $user->setAsActive();
        $user->refresh();
        $this->assertEquals($user->status,User::ACTIVE);

    }
}
