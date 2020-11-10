<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller {

    private $faLanguage = false;

    /**
     * strip.empty.params middleware : for index route (search form get method) remove all the url params which are empty
     * DeliveryController constructor.
     */
    public function __construct() {
        $this->faLanguage = request()->header('Accept-Language') === 'fa' ? true : false;
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            ContactUs::create($request->all());
            return response()->json([
                "type" => 'success',
                "message" => $this->faLanguage
                    ? 'پیغام شما با موفقیت ثبت شد و به زودی پیگیری خواهد شد.'
                    : "Your message has been successfully registered and will be followed up soon.",
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "type" => 'error',
                "message" => $this->faLanguage
                    ? 'مشکلی در ارتباط رخ داده است.'
                    : "There was a connection problem.",
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs) {
        //
    }

}
