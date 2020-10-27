<?php

namespace Database\Factories;

use App\Models\ContactMethod;
use App\Models\Delivery;
use App\Models\DeliveryContactMethod;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeliveryContactMethodFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryContactMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'delivery_id' => Delivery::factory(),
            'contact_method_id' => ContactMethod::factory(),
        ];
    }
}
