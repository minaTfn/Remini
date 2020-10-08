<?php

namespace Tests\Unit\Api;

use App\Models\Delivery;
use App\Models\User;
use Tests\ApiTestCase;

class DeliveryTest extends ApiTestCase {
    /** @test */
    public function a_user_can_add_new_delivery() {
        $user = $this->signIn();

        $user->addDelivery(Delivery::factory()->raw($attributes = ['description' => 'test description', 'title' => 'title test']));
        $this->assertCount(1, $user->deliveries);
        $this->assertDatabaseHas('deliveries', $attributes);
    }

    /** @test */
    public function it_belongs_to_an_owner() {
        $delivery = Delivery::factory()->create();
        $this->assertInstanceOf(User::class, $delivery->owner);
    }

    /** @test */
    public function just_users_with_role_3_can_add_deliveries() {
        $adminUser = User::factory()->create(['role' => User::ADMIN]);
        $this->signIn($adminUser);
        $delivery = Delivery::factory()->create(['user_id' => $adminUser->id]);
        $this->assertNull($delivery->owner);
    }


}
