<?php

namespace Tests\Feature;

use App\Models\Delivery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageDeliveryTest extends TestCase {
    use RefreshDatabase;

    /**
     *  sign in automatically
     */
    public function setUp(): void {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function an_admin_user_can_see_the_deliveries_created_by_site_users() {
        Delivery::factory()->create(['title' => 'deliveries view test']);
        $this->get(route('deliveries.index'))->assertSeeText('deliveries view test');
    }

    /** @test */
    public function an_admin_user_can_edit_deliveries() {
        $oldTitle = ['title' => 'delivery edit test'];
        $newTitle = ['title' => 'delivery edit test UPDATED'];
        $delivery = Delivery::factory()->create($oldTitle);

        $this->patch(route('deliveries.update', $delivery), $newTitle)
            ->assertRedirect(route('deliveries.index'));
        $this->assertDatabaseMissing('deliveries', $oldTitle);
        $this->assertDatabaseHas('deliveries', $newTitle);
    }

    /** @test */
    public function users_can_search_deliveries_by_their_owners() {

        $deliveryOfUser1 = Delivery::factory()->create();
        $deliveryOfUser2 = Delivery::factory()->create();

        $this->get(route('deliveries.index', ['owner' => $deliveryOfUser1->owner->id]))->assertSeeText($deliveryOfUser1->title);
        $this->get(route('deliveries.index', ['owner' => $deliveryOfUser1->owner->id]))->assertDontSeeText($deliveryOfUser2->title);

    }

    /** @test */
    public function users_can_search_deliveries_by_their_origin() {

        $fromIran = Delivery::factory()->create();
        $fromGermany = Delivery::factory()->create();

        $this->get(route('deliveries.index', ['fromCountry' => $fromIran->originCountry->id]))->assertSeeText($fromIran->title);
        $this->get(route('deliveries.index', ['fromCountry' => $fromIran->originCountry->id]))->assertDontSeeText($fromGermany->title);

    }

    /** @test */
    public function users_can_search_deliveries_by_their_destination() {

        $toIran = Delivery::factory()->create();
        $toGermany = Delivery::factory()->create();

        $this->get(route('deliveries.index', ['toCountry' => $toIran->destinationCountry->id]))->assertSeeText($toIran->title);
        $this->get(route('deliveries.index', ['toCountry' => $toIran->destinationCountry->id]))->assertDontSeeText($toGermany->title);

    }


    /** @test */
    public function users_can_search_deliveries_by_their_title() {

        $toIran = Delivery::factory()->create();
        $toGermany = Delivery::factory()->create();

        $this->get(route('deliveries.index', ['toCountry' => $toIran->destinationCountry->id]))->assertSeeText($toIran->title);
        $this->get(route('deliveries.index', ['toCountry' => $toIran->destinationCountry->id]))->assertDontSeeText($toGermany->title);

    }


}
