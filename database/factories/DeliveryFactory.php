<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Delivery;
use App\Models\DeliveryMethod;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class DeliveryFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Delivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $origin_city = $this->getCity();
        $destination_city = $this->getCity();

        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'description' => $this->faker->sentence,
            'user_id' => $this->getUser()->id,
            'origin_city_id' => $origin_city->id,
            'origin_country_id' => $origin_city->country_id,
            'destination_country_id' => $destination_city->country_id,
            'destination_city_id' => $destination_city->id,
            'delivery_method_id' => $this->getDeliveryMethod()->id,
            'payment_method_id' => $this->getPaymentMethod()->id,
        ];
    }

    /**
     * if it's not a Test get the city from available cities
     * @return array
     */
    private function getCity() {
        if (!App::runningUnitTests()) {
            $cities = City::all();
            return $cities->random();

        }
        return City::factory()->create();
    }

    /**
     * if it's not a Test get the delivery methods from available delivery methods
     * @return array
     */
    private function getDeliveryMethod() {

        if (!App::runningUnitTests()) {
            $deliveryMethods = DeliveryMethod::all();
            return $deliveryMethods->random();
        }

        return DeliveryMethod::factory()->create();
    }

    /**
     * if it's not a Test get the Payment methods from available Payment methods
     * @return array
     */
    private function getPaymentMethod() {

        if (!App::runningUnitTests()) {
            $paymentMethods = PaymentMethod::all();
            return $paymentMethods->random();
        }

        return PaymentMethod::factory()->create();
    }

    /**
     * if it's not a Test get the user from available users
     * @return array
     */
    private function getUser() {
        
        if (!App::runningUnitTests()) {
            $users = User::where('role', '=', User::SiteUSER)->get();
            return $users->random();

        }
        return User::factory(['role' => User::SiteUSER])->create();
    }
}
