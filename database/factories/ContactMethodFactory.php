<?php

namespace Database\Factories;

use App\Models\ContactMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMethodFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name' => 'before',
            'title' => 'Before',
            'title_fa' => 'قبل از دریافت کالا',
            'description' => '',
        ];
    }
}
