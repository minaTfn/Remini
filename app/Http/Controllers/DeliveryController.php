<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeliveryRequest;
use App\Http\Resources\DeliveryCollection;
use App\Http\Requests\ManageDeliveryRequest;
use App\Models\City;
use App\Models\Delivery;
use App\Models\DeliveryFilter;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller {

    /**
     * strip.empty.params middleware : for index route (search form get method) remove all the url params which are empty
     * DeliveryController constructor.
     */
    public function __construct() {
        $this->middleware('strip.empty.params', ['only' => 'index']);
    }

    /**
     * @param DeliveryFilter $filters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DeliveryFilter $filters) {

        $perPage = request()->filled('page_size') ? request()->get('page_size') : 10;

        $deliveries = Delivery::with([
            'originCountry:id,title,title_fa',
            'originCity:id,title,country_id',
            'destinationCountry:id,title,title_fa',
            'destinationCity:id,title,country_id',
            'owner:id,name'
        ])->filter($filters)->paginate($perPage);

        if (request()->expectsJson()) {
            return new DeliveryCollection($deliveries);
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery) {

        $originCities = City::where('country_id', $delivery->origin_country_id)->pluck('title', 'id');
        $destinationCities = City::where('country_id', $delivery->destination_country_id)->pluck('title', 'id');
        $deliveryMethods = DB::table('delivery_methods')->pluck('title', 'id');
        $paymentMethods = DB::table('payment_methods')->pluck('title', 'id');
        $contactMethods = DB::table('contact_methods')->pluck('title', 'id');

        return view('delivery.edit',
            compact('delivery', 'originCities', 'destinationCities', 'deliveryMethods', 'paymentMethods', 'contactMethods'));
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
        $delivery->contactMethods()->sync($request->contact_methods);

        if (request()->wantsJson()) {
            return response()->json([
                "message" => "delivery updated successfully.",
                'data' => $delivery,
            ], 201);
        }

        return redirect(route('deliveries.index'))->with('success', 'Item Updated Successfully');
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

        if (request()->wantsJson()) {
            return response()->json([
                "message" => "delivery deleted successfully.",
            ], 204);
        }

        return redirect(route('deliveries.index'))->with('success', 'Item Deleted Successfully');

    }
}
