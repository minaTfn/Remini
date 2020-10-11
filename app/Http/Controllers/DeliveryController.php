<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeliveryRequest;
use App\Http\Requests\ManageDeliveryRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\DeliveryMethod;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $deliveries = Delivery::paginate(10);
        return view('delivery.index', compact('deliveries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDeliveryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDeliveryRequest $request) {
        $delivery = auth()->user()->deliveries()->create($request->validated());
        if (request()->wantsJson()) {
            return response()->json([
                "message" => "delivery added successfully.",
                'data' => $delivery,
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery $delivery
     * @return void
     */
    public function show(Delivery $delivery) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery) {

        $originCities = City::with('countries')->where('country_id',$delivery->originCountry->id)->pluck('title','id');
        $destinationCities = City::where('country_id',$delivery->destinationCountry->id)->pluck('title','id');
        $deliveryMethods = DB::table('delivery_methods')->pluck('title','id');
        $paymentMethods = DB::table('payment_methods')->pluck('title','id');

        return view('delivery.edit', compact('delivery', 'originCities', 'destinationCities', 'deliveryMethods', 'paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManageDeliveryRequest $request
     * @param  \App\Models\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(ManageDeliveryRequest $request, Delivery $delivery) {
        $delivery->update($request->all());

        return redirect(route('deliveries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery $delivery
     * @return void
     * @throws \Exception
     */
    public function destroy(Delivery $delivery) {

        $delivery->delete();
        return redirect(route('deliveries.index'))->with('success', 'Item Deleted Successfully');

    }
}
