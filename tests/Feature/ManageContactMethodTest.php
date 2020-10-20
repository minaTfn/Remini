<?php

namespace Tests\Feature;

use App\Models\ContactMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ManageContactMethodTest extends TestCase {

    use RefreshDatabase;

    /**
     *  sign in automatically
     */
    public function setUp(): void {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function an_authorized_user_can_see_contact_methods() {

        $contactMethod = ContactMethod::factory()->create();

        $this->get(route('contact-methods.index'))
            ->assertOk()
            ->assertSeeText($contactMethod->title);
    }

    /** @test */
    public function an_authorized_user_can_add_new_contact_method() {

        $title = ['title' => 'test method'];
        $contactMethod = ContactMethod::factory()->raw($title);

        $this->post(route('contact-methods.store'), $contactMethod)
            ->assertRedirect(route('contact-methods.index'));
        $this->assertDatabaseHas('contact_methods', $title);

    }

    /** @test */
    public function an_authorized_user_can_edit_contact_methods() {

        $oldTitle = ['title' => 'test method'];
        $contactMethod = ContactMethod::factory()->create($oldTitle);

        $newTitle = ['title' => 'edited test method'];

        $this->patch(route('contact-methods.update', $contactMethod), $newTitle)
            ->assertRedirect(route('contact-methods.index'));

        $this->assertDatabaseMissing('contact_methods', $oldTitle);
        $this->assertDatabaseHas('contact_methods', $newTitle);

    }

    /** @test */
    public function an_authorized_user_can_delete_contact_methods() {

        $title = ['title' => 'test method'];
        $contactMethod = ContactMethod::factory()->create($title);

        $this->delete(route('contact-methods.destroy', $contactMethod))
            ->assertRedirect(route('contact-methods.index'));

        $this->assertDatabaseMissing('contact_methods', $title);

    }

    /** @test */
    public function guests_cannot_manage_contact_methods() {

        // acting as guest
        Auth::logout();

        $this->get(route('contact-methods.index'))->assertRedirect('login');
        $this->get(route('contact-methods.create'))->assertRedirect('login');
        $contactMethod = ContactMethod::factory()->create();
        $this->get(route('contact-methods.edit', $contactMethod))->assertRedirect('login');
        $this->post(route('contact-methods.store', $contactMethod->toArray()))->assertRedirect('login');

    }

}
