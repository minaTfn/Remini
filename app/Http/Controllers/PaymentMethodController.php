<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagePaymentMethodRequest;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('paymentMethod.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentMethod = new PaymentMethod();
        return view('paymentMethod.create',compact('paymentMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManagePaymentMethodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagePaymentMethodRequest $request)
    {
        PaymentMethod::create($request->all());
        return redirect(route('payment-methods.index'))->with('success', 'Item Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod $paymentMethod
     * @return void
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('paymentMethod.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManagePaymentMethodRequest $request
     * @param  \App\Models\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(ManagePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->all());
        return redirect(route('payment-methods.index'))->with('success', 'Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect(route('payment-methods.index'))->with('success', 'Item Deleted Successfully');
    }
}
