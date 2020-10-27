<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

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
     * @param User|null $user
     * @return array
     */
    public function rules() {

        return [
            'name' => 'sometimes|required|max:250',
            'status' => 'boolean',
            'role' => 'digits_between:1,2',
            'email' => [
                'sometimes',
                'required',
                'email',
                'max:250',
                $this->user ? Rule::unique('users', 'email')->ignore($this->user->id) : Rule::unique('users', 'email')
            ],
            'phone' => 'sometimes|required|string|min:10|max:16',
            'old_password' => ['sometimes','required',new MatchOldPassword],
            'password' => [
                'sometimes',
                'required',
                'string',
                'confirmed',
                'min:6',
                'regex:/[a-z]/',      // must contain at least one  lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
            ]
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'password.regex' => 'The password is weak; use digit, lowercase and uppercase letter',
            'password.confirmed' => 'The password confirmation does not match'
        ];
    }


}
