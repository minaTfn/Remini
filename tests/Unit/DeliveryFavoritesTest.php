<?php

namespace Tests\Feature;

use App\Models\Delivery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApiTestCase;

class DeliveryFavoritesTest extends ApiTestCase {
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply() {
        $this->signIn();

        $delivery = Delivery::factory()->create();

        $delivery->favoriteToggle();

        $this->assertCount(1, $delivery->favorites);
    }

    /** @test */
    public function an_authenticated_user_can_unfavorite_a_reply() {

        $this->signIn();

        $delivery = Delivery::factory()->create();

        $delivery->favoriteToggle();

        $this->assertCount(1, $delivery->favorites);

        $delivery->favoriteToggle();

        $this->assertCount(0, $delivery->refresh()->favorites);
    }

}
