<?php

namespace Tests\Feature;

use App\Models\Delivery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApiTestCase;

class FavoritesTest extends ApiTestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_can_not_favorite_anything()
    {
        $this->postJson('deliveries/1/favorites')->assertStatus(404);
    }

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();

        $delivery = Delivery::factory()->create();

        $this->postJson(route('api.favorite',$delivery));

        $this->assertCount(1, $delivery->favorites);
    }

    /** @test */
    public function an_authenticated_user_can_unfavorite_a_reply()
    {

        $this->signIn();

        $delivery = Delivery::factory()->create();

        $this->postJson(route('api.favorite',$delivery));

        $this->assertCount(1, $delivery->favorites);

        $this->postJson(route('api.favorite',$delivery));

        $this->assertCount(0, $delivery->refresh()->favorites);
    }

}
