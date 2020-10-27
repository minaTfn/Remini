<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Delivery extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */

    public function toArray($request) {
        return [
            'slug'=>$this->slug,
            'title'=>$this->title,
            'description'=>$this->description,
            'origin' => new City($this->originCity),
            'destination' => new City($this->destinationCity),
            'owner' => new User($this->owner),
            'delivery_method' => new DeliveryMethod($this->deliveryMethod),
            'payment_method' => new PaymentMethod($this->paymentMethod),
            'contact_methods' => $this->contactMethods,
            'request_date' => $this->request_date,
            'fa_request_date' => $this->fa_request_date,
            'deadline_date' => optional($this->maximum_deadline)->format('Y-m-d'),
        ];
    }
}
