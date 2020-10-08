<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeliveryRequest extends FormRequest {


    /**
     * @var string
     */
    protected $errorBag = 'form';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return Gate::allows('create-delivery');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required|max:250',
            'origin_country_id' => 'required',
            'origin_city_id' => 'required',
            'destination_country_id' => 'required',
            'destination_city_id' => 'required',
            'delivery_method_id' => 'required',
            'payment_method_id' => 'required',
            'description' => 'nullable',
            'user_id' => [
                'required',
                new MatchAuthUser,
            ],
        ];
    }
}
