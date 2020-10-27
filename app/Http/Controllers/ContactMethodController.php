<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageContactMethodRequest;
use App\Models\ContactMethod;

class ContactMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactMethods = ContactMethod::all();
        if (request()->wantsJson()) {
            return response()->json([
                'data' => \App\Http\Resources\ContactMethod::collection($contactMethods),
            ], 200);
        }
        return view('contactMethod.index', compact('contactMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactMethod = new ContactMethod();
        return view('contactMethod.create',compact('contactMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManageContactMethodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageContactMethodRequest $request)
    {
        ContactMethod::create($request->all());
        return redirect(route('contact-methods.index'))->with('success', 'Item Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactMethod $contactMethod
     * @return void
     */
    public function show(ContactMethod $contactMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactMethod  $contactMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactMethod $contactMethod)
    {
        return view('contactMethod.edit', compact('contactMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManageContactMethodRequest $request
     * @param  \App\Models\ContactMethod $contactMethod
     * @return \Illuminate\Http\Response
     */
    public function update(ManageContactMethodRequest $request, ContactMethod $contactMethod)
    {
        $contactMethod->update($request->all());
        return redirect(route('contact-methods.index'))->with('success', 'Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactMethod $contactMethod
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ContactMethod $contactMethod)
    {
        $contactMethod->delete();
        return redirect(route('contact-methods.index'))->with('success', 'Item Deleted Successfully');
    }
}
