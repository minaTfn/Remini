<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteUserTest extends TestCase {
    use RefreshDatabase;


    /** @test */
    public function an_admin_user_can_see_list_of_site_users() {
        $this->signIn();
        $this->get(route('site-users.index'))->assertOk();
    }

    /** @test */
    public function an_admin_user_can_change_status_of_site_users() {
        $this->signIn();
        $siteUser = User::factory()->SiteRole()->create(['status' => User::ACTIVE]);
        $this->get(route('site-users.updateStatus', $siteUser))->assertRedirect(route('site-users.index'));
        $this->assertEquals($siteUser->fresh()->status, 0);
    }

    /** @test */
    public function an_admin_user_can_delete_site_users() {
        $this->signIn();

        $siteUser = User::factory()->SiteRole()->create();

        $this->delete(route('site-users.destroy', $siteUser))->assertRedirect(route('site-users.index'));

        $this->assertSoftDeleted('users', ['name' => $siteUser->name]);
    }

    /** @test */
    public function an_admin_user_can_update_site_users() {

        $this->signIn();

        $siteUser = User::factory()->SiteRole()->create();
        $oldData = ['name' => $siteUser->name];

        $this->patch(route('site-users.update', $siteUser), $newData = ['name' => 'changed name'])
            ->assertRedirect(route('site-users.index'));

        $this->get(route('site-users.index'))->assertSeeText('changed name');

        $this->assertDatabaseMissing('users', $oldData);
        $this->assertDatabaseHas('users', $newData);
    }


    /** @test */
    public function unauthenticated_users_cannot_see_list_of_site_users() {

        $siteUser = User::factory()->SiteRole()->create();

        // a guest
        $this->get(route('site-users.index'))->assertRedirect('/login');

        // a site user
        $this->signIn($siteUser);
        $this->get(route('site-users.index'))->assertRedirect('/login');
    }

    /** @test */
    public function unauthenticated_users_cannot_delete_site_users() {

        $siteUser = User::factory()->SiteRole()->create();

        // a guest
        $this->patch(route('site-users.destroy', $siteUser))->assertRedirect('/login');

        // a site user
        $this->signIn($siteUser);
        $this->delete(route('site-users.destroy', $siteUser))->assertRedirect('/login');
    }

    /** @test */
    public function unauthenticated_users_cannot_edit_site_users() {

        $siteUser = User::factory()->SiteRole()->create();

        // a guest
        $this->patch(route('site-users.update', $siteUser))->assertRedirect('/login');

        // a site user
        $this->signIn($siteUser);
        $this->patch(route('site-users.update', $siteUser))->assertRedirect('/login');
    }

    /** @test */
    public function unauthenticated_users_cannot_change_the_status_of_site_users() {
        $siteUser = User::factory()->SiteRole()->create();

        // a guest
        $this->get(route('site-users.updateStatus', $siteUser))->assertRedirect('/login');

        // a site user
        $this->signIn($siteUser);
        $this->get(route('site-users.updateStatus', User::factory()->SiteRole()->create()))->assertRedirect('/login');
    }
}
