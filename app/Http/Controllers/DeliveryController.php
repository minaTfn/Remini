<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeliveryRequest;
use App\Http\Resources\DeliveryCollection;
use App\Http\Resources\Delivery as DeliveryResource;
use App\Http\Requests\ManageDeliveryRequest;
use App\Models\City;
use App\Models\Delivery;
use App\Models\DeliveryFilter;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller {

    private $faLanguage = false;

    /**
     * strip.empty.params middleware : for index route (search form get method) remove all the url params which are empty
     * DeliveryController constructor.
     */
    public function __construct() {
        $this->middleware('strip.empty.params', ['only' => 'index']);
        $this->faLanguage = request()->header('Accept-Language') === 'fa' ? true : false;
    }

    /**
     * @param DeliveryFilter $filters
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DeliveryFilter $filters) {
        return $this->getDeliveriesList($filters);
    }

    public function myDeliveries(DeliveryFilter $filters) {
        $user = auth()->user();
        return $this->getDeliveriesList($filters, $user);
    }

    private function getDeliveriesList($filters, $user = null) {

        $perPage = request()->filled('page_size') ? request()->get('page_size') : 10;
        if ($user) {
            $deliveries = Delivery::with([
                'originCountry:id,title,title_fa',
                'originCity:id,title,country_id',
                'destinationCountry:id,title,title_fa',
                'destinationCity:id,title,country_id',
            ])->where('user_id', $user->id)->latest()->filter($filters)->paginate($perPage);
        } else {
            $deliveries = Delivery::with([
                'originCountry:id,title,title_fa',
                'originCity:id,title,country_id',
                'destinationCountry:id,title,title_fa',
                'destinationCity:id,title,country_id',
                'owner:id,name'
            ])->latest()->filter($filters)->paginate($perPage);
        }


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

        $delivery->contactMethods()->sync($request->contact_method_ids);

        if (request()->wantsJson()) {
            return response()->json([
                "message" => $this->faLanguage ? 'مرسوله با موفقیت ثبت شد' : "delivery added successfully.",
                'data' => new DeliveryResource($delivery),
            ], 201);
        }
    }


    public function show(Delivery $delivery) {

        views($delivery)->record();

        return response()->json([
            'data' => new DeliveryResource($delivery),
        ], 200);
    }

    public function getContactInfo(Delivery $delivery) {
        $delivery->load('owner');
        $contactMethods = $delivery->contactMethods;
        $result = [];
        foreach ($contactMethods as $contactMethod) {
            $result[] = [
                'title' => $contactMethod->title,
                'title_fa' => $contactMethod->title_fa,
                'value' => $delivery->owner[$contactMethod->name]
            ];
        }

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $result,
            ], 200);
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
        $delivery->contactMethods()->sync($request->contact_method_ids);
        $delivery->load('originCity:id,title,country_id');
        $delivery->load('destinationCity:id,title,country_id');
        if (request()->wantsJson()) {
            return response()->json([
                "message" => $this->faLanguage ? 'مرسوله با موفقیت ویرایش شد' : "delivery updated successfully.",
                'data' => new DeliveryResource($delivery),
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
                "message" => $this->faLanguage ? 'مرسوله با موفقیت حذف گردید' : "delivery deleted successfully",
            ], 200);
        }

        return redirect(route('deliveries.index'))->with('success', 'Item Deleted Successfully');

    }
}
