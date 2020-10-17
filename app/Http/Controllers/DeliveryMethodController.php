<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageDeliveryMethodRequest;
use App\Models\DeliveryMethod;

class DeliveryMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryMethods = DeliveryMethod::all();
        return view('deliveryMethod.index', compact('deliveryMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deliveryMethod = new DeliveryMethod();
        return view('deliveryMethod.create',compact('deliveryMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManageDeliveryMethodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageDeliveryMethodRequest $request)
    {
        DeliveryMethod::create($request->all());
        return redirect(route('delivery-methods.index'))->with('success', 'Item Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryMethod $deliveryMethod
     * @return void
     */
    public function show(DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryMethod  $deliveryMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryMethod $deliveryMethod)
    {
        return view('deliveryMethod.edit', compact('deliveryMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManageDeliveryMethodRequest $request
     * @param  \App\Models\DeliveryMethod $deliveryMethod
     * @return \Illuminate\Http\Response
     */
    public function update(ManageDeliveryMethodRequest $request, DeliveryMethod $deliveryMethod)
    {
        $deliveryMethod->update($request->all());
        return redirect(route('delivery-methods.index'))->with('success', 'Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryMethod $deliveryMethod
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DeliveryMethod $deliveryMethod)
    {
        $deliveryMethod->delete();
        return redirect(route('delivery-methods.index'))->with('success', 'Item Deleted Successfully');
    }
}
