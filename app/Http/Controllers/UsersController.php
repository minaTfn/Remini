<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::where('id','<>',auth()->id())->orderBy('id')->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * update the status of user from Active to Passive and visa versa.
     *
     * @return
     */
    public function updateStatus(User $user) {
        $user->status == 0 ? $user->setAsActive() : $user->setAsInactive();
        $message = "User status changed successfully";
        return redirect(route('users.index'))->with('success', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        User::create($this->validateRequest($request));
        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {
        $user->update($this->validateRequest($request, $user));

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $this->authorize('deleteItself', $user);
        $user->delete();
        return redirect(route('users.index'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return array
     */
    public function validateRequest(Request $request, User $user = null): array {
        $email = [
            'required',
            'email',
            'max:250',
            $user ? Rule::unique('users', 'email')->ignore($user->id) : Rule::unique('users', 'email')
        ];

        return Validator::make($request->all(), [
            'name' => 'required|max:250',
            'status' => 'boolean',
            'role' => 'digits_between:1,2',
            'email' => $email,
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
        ],['password.regex'=>'The password is weak; use digit, lowercase and uppercase letter'])->validateWithBag('form');

    }

}
