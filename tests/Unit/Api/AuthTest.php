<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends ApiTestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_guest_can_register_new_account(){
        $user = $this->createUserAttributes();
        $this->post('api/auth/register',$user)->assertStatus(201);
    }

    /** @test */
    public function it_throws_422_if_data_are_not_valid_for_registering_user(){
        $user = $this->createUserAttributes(['name'=>'']);
        $this->post('api/auth/register',$user)->assertStatus(422);

        $user = User::factory()->raw(['password'=>'Vfrs@41354','password_confirmation'=>'123456']);
        $this->post('api/auth/register',$user)->assertStatus(422);
    }


    /** @test */
    public function a_registered_user_can_login_and_get_token(){

    }
    
    /** @test */
    public function it_can_fetch_current_users_data(){
        
    }
    
    /** @test */
    public function a_user_can_logout(){
        
    }
    
    /** @test */
    public function user_can_verify_their_email(){
        
    }
    
    /** @test */
    public function verification_email_can_be_resent(){
        
    }
    
    /** @test */
    public function a_token_can_be_refreshed(){
        
    }

}
