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
    public function just_users_with_role_admin_can_add_deliveries() {
        $adminUser = User::factory()->create(['role' => User::ADMIN]);
        $this->signIn($adminUser);
        $delivery = Delivery::factory()->create(['user_id' => $adminUser->id]);
        $this->assertNull($delivery->owner);
    }

    /**
     * request for delivery contact info
     * @test
     */
    public function it_can_get_delivery_contact_methods() {
        $user = User::factory()->create(['phone' => '+989131549622', 'email' => 'minataftian@gmail.com', 'role' => User::SiteUSER]);
        $delivery = Delivery::factory()
            ->hasContactMethods(1, [
                'name' => 'phone',
                'title' => 'phone',
                'title_fa' => 'تلفن'
            ])
            ->create(['user_id' => $user->id]);

        $this->getJson(route('api.get.contact.info', $delivery))->assertJsonFragment([
            'title' => 'phone',
            'value' => '+989131549622',
        ]);
    }

    /**
     * view delivery page
     * @test
     */
    public function it_can_view_a_delivery() {
        $delivery = Delivery::factory()->create(['description' => 'delivery description']);
        $this->getJson(route('api.deliveries.show', $delivery))->assertJsonFragment([
            'description' => 'delivery description'
        ]);

    }

}
