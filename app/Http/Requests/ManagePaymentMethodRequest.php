<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagePaymentMethodRequest extends FormRequest {

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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'sometimes|required|max:250|min:3',
            'title_fa' => 'nullable|max:250|min:3',
            'description' => 'nullable',
        ];
    }
}
