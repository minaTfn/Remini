<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

class SiteUserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::site()->withCount('deliveries')->orderBy('id')->paginate(10);
        return view('siteUser.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $site_user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $site_user) {
        return view('siteUser.edit', compact('site_user'));
    }

    /**
     * update the status of user from Active to Passive and visa versa.
     *
     * @param User $site_user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateStatus(User $site_user) {
        $site_user->status == 0 ? $site_user->setAsActive() : $site_user->setAsInactive();
        $message = "User status changed successfully";
        return redirect(route('site-users.index'))->with('success', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('siteUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        User::create($request->all());
        return redirect(route('site-users.index'))->with('success', 'Item Created Successfully');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $site_user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $site_user) {
        $site_user->update($request->all());

        return redirect(route('site-users.index'))->with('success', 'Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $site_user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $site_user) {
        $site_user->delete();
        $site_user->deliveries()->delete();
        return redirect(route('site-users.index'))->with('success', 'Item Deleted Successfully');
    }




}
