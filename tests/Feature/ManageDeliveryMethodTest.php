<?php

namespace Tests\Feature;

use App\Models\DeliveryMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ManageDeliveryMethodTest extends TestCase {

    use RefreshDatabase;

    /**
     *  sign in automatically
     */
    public function setUp(): void {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function an_authorized_user_can_see_delivery_methods() {

        $deliveryMethod = DeliveryMethod::factory()->create();

        $this->get(route('delivery-methods.index'))
            ->assertOk()
            ->assertSeeText($deliveryMethod->title);
    }

    /** @test */
    public function an_authorized_user_can_add_new_delivery_method() {

        $title = ['title' => 'test method'];
        $deliveryMethod = DeliveryMethod::factory()->raw($title);

        $this->post(route('delivery-methods.store'), $deliveryMethod)
            ->assertRedirect(route('delivery-methods.index'));
        $this->assertDatabaseHas('delivery_methods', $title);

    }

    /** @test */
    public function an_authorized_user_can_edit_delivery_methods() {

        $oldTitle = ['title' => 'test method'];
        $deliveryMethod = DeliveryMethod::factory()->create($oldTitle);

        $newTitle = ['title' => 'edited test method'];

        $this->patch(route('delivery-methods.update', $deliveryMethod), $newTitle)
            ->assertRedirect(route('delivery-methods.index'));

        $this->assertDatabaseMissing('delivery_methods', $oldTitle);
        $this->assertDatabaseHas('delivery_methods', $newTitle);

    }

    /** @test */
    public function an_authorized_user_can_delete_delivery_methods() {

        $title = ['title' => 'test method'];
        $deliveryMethod = DeliveryMethod::factory()->create($title);

        $this->delete(route('delivery-methods.destroy', $deliveryMethod))
            ->assertRedirect(route('delivery-methods.index'));

        $this->assertDatabaseMissing('delivery_methods', $title);

    }

    /** @test */
    public function guests_cannot_manage_delivery_methods() {

        // acting as guest
        Auth::logout();

        $this->get(route('delivery-methods.index'))->assertRedirect('login');
        $this->get(route('delivery-methods.create'))->assertRedirect('login');
        $deliveryMethod = DeliveryMethod::factory()->create();
        $this->get(route('delivery-methods.edit', $deliveryMethod))->assertRedirect('login');
        $this->post(route('delivery-methods.store', $deliveryMethod->toArray()))->assertRedirect('login');

    }

}
