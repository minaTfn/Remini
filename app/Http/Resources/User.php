<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class User extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        $email = Auth::user() ? Auth::user()->email : '';
        return [
            'name' => $this->name,
            'email' => $this->when(Auth::id() === $this->id, $email),
            'email_verified' => !!$this->email_verified_at,
        ];
    }
}
