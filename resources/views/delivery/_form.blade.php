@include('partials.formError')

<div>
    {{ Form::token() }}
    {{ Form::bsText('title',null,['autofocus'=>'','required']) }}


    <location-component
        :countries-list='@json($countries)'
        country-name="origin_country_id"
        city-name="origin_city_id"
        country-title="Origin Country"
        city-title="Origin City"
        country-value="{{$delivery->origin_country_id}}"
        city-value="{{$delivery->origin_city_id}}"
    ></location-component>

    <location-component
        :countries-list='@json($countries)'
        country-name="destination_country_id"
        city-name="destination_city_id"
        country-title="Destination Country"
        city-title="Destination City"
        country-value="{{$delivery->destination_country_id}}"
        city-value="{{$delivery->destination_city_id}}"
    ></location-component>

    {{ Form::bsRadioGroup('delivery_method_id',$deliveryMethods,$delivery->delivery_method_id,'','Delivery Method') }}

    {{ Form::bsRadioGroup('payment_method_id',$paymentMethods,$delivery->payment_method_id,'','Payment Method') }}

    {{ Form::bsCheckboxGroup('contact_methods[]',$contactMethods,$delivery->contactMethods->pluck('id')->toArray(),'','Contact Methods') }}

    {{ Form::bsDate('maximum_deadline') }}
    <div class="form-group">
        {{ Form::label('description', null, ['class' => 'label']) }}
        {!! $delivery->trix('description') !!}
    </div>

    <div class="d-flex align-items-end mt-5">
        {{ Form::submit($buttonText,['class'=>'btn btn-success mr-2']) }}
        {{ link_to_route('deliveries.index', 'Cancel', '', ['class'=>'btn btn-light border border-secondary']) }}
    </div>

</div>


