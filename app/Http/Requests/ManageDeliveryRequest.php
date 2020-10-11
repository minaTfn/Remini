<?php

namespace App\Http\Requests;

use App\Rules\MatchAuthUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ManageDeliveryRequest extends FormRequest {

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
        return Gate::allows('manage-delivery', $this->route('delivery'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'sometimes|required|max:250',
            'origin_country_id' => 'sometimes|required',
            'origin_city_id' => 'sometimes|required',
            'destination_country_id' => 'sometimes|required',
            'destination_city_id' => 'sometimes|required',
            'delivery_method_id' => 'sometimes|required',
            'payment_method_id' => 'sometimes|required',
            'description' => 'nullable',
        ];
    }
}
