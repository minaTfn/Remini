<?php

namespace Tests\Feature;

use App\Models\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ManagePaymentMethodTest extends TestCase {

    use RefreshDatabase;

    /**
     *  sign in automatically
     */
    public function setUp(): void {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function an_authorized_user_can_see_payment_methods() {

        $paymentMethod = PaymentMethod::factory()->create();

        $this->get(route('payment-methods.index'))
            ->assertOk()
            ->assertSeeText($paymentMethod->title);
    }

    /** @test */
    public function an_authorized_user_can_add_new_payment_method() {

        $title = ['title' => 'test method'];
        $paymentMethod = PaymentMethod::factory()->raw($title);

        $this->post(route('payment-methods.store'), $paymentMethod)
            ->assertRedirect(route('payment-methods.index'));
        $this->assertDatabaseHas('payment_methods', $title);

    }

    /** @test */
    public function an_authorized_user_can_edit_payment_methods() {

        $oldTitle = ['title' => 'test method'];
        $paymentMethod = PaymentMethod::factory()->create($oldTitle);

        $newTitle = ['title' => 'edited test method'];

        $this->patch(route('payment-methods.update', $paymentMethod), $newTitle)
            ->assertRedirect(route('payment-methods.index'));

        $this->assertDatabaseMissing('payment_methods', $oldTitle);
        $this->assertDatabaseHas('payment_methods', $newTitle);

    }

    /** @test */
    public function an_authorized_user_can_delete_payment_methods() {

        $title = ['title' => 'test method'];
        $paymentMethod = PaymentMethod::factory()->create($title);

        $this->delete(route('payment-methods.destroy', $paymentMethod))
            ->assertRedirect(route('payment-methods.index'));

        $this->assertDatabaseMissing('payment_methods', $title);

    }

    /** @test */
    public function guests_cannot_manage_payment_methods() {

        // acting as guest
        Auth::logout();

        $this->get(route('payment-methods.index'))->assertRedirect('login');
        $this->get(route('payment-methods.create'))->assertRedirect('login');
        $paymentMethod = PaymentMethod::factory()->create();
        $this->get(route('payment-methods.edit', $paymentMethod))->assertRedirect('login');
        $this->post(route('payment-methods.store', $paymentMethod->toArray()))->assertRedirect('login');

    }

}
