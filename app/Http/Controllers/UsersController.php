<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::admin()->where('id','<>',auth()->id())->orderBy('id')->paginate(10);
        return view('user.index', compact('users'));
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
     * update the status of user from Active to Passive and visa versa.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        User::create($request->all());
        return redirect(route('users.index'))->with('success', 'Item Created Successfully');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user) {
        $user->update($request->all());

        return redirect(route('users.index'))->with('success', 'Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $user) {
        $this->authorize('deleteItself', $user);
        $user->delete();
        return redirect(route('users.index'))->with('success', 'Item Deleted Successfully');
    }

}
