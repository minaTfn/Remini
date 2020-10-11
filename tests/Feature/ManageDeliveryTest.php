<?php

namespace Tests\Feature;

use App\Models\Delivery;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageDeliveryTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function an_admin_user_can_see_the_deliveries_created_by_site_users() {
        Delivery::factory()->create(['title' => 'deliveries view test']);
        $this->signIn();
        $this->get(route('deliveries.index'))->assertSeeText('deliveries view test');
    }

    /** @test */
    public function an_admin_user_can_edit_deliveries() {
        $oldTitle = ['title' => 'delivery edit test'];
        $newTitle = ['title' => 'delivery edit test UPDATED'];
        $delivery = Delivery::factory()->create($oldTitle);
        $this->signIn();

        $res = $this->patch(route('deliveries.update', $delivery), $newTitle)
            ->assertRedirect(route('deliveries.index'));
        $this->assertDatabaseMissing('deliveries', $oldTitle);
        $this->assertDatabaseHas('deliveries', $newTitle);
    }
}
