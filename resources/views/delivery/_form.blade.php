@include('partials.formError')

<div>
    {{ Form::token() }}
    {{ Form::bsText('title',null,['autofocus'=>'']) }}


    <div class="panel-body">




        {!! Form::bsSelect('origin_country_id', $countries, null,  ['v-model'=>'country', '@change'=>'WhenCountryHasBeenSelected' ,'class'=>'form-control']) !!}

        <div v-show="CountrySelected">
            {!! Form::bsSelect('origin_city_id',$originCities, null) !!}

            {{--Selected @{{ $data | json }}--}}

        </div>
    </div>



    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}
            {{--{{ Form::bsSelect('origin_country_id',$countries) }}--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
            {{--{{ Form::bsSelect('origin_city_id',$originCities) }}--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-md-6">
            {{ Form::bsSelect('destination_country_id',$countries) }}
        </div>
        <div class="col-md-6">
            {{ Form::bsSelect('destination_city_id',$destinationCities) }}
        </div>
    </div>
    {{ Form::bsSelect('delivery_method_id',$deliveryMethods) }}
    {{ Form::bsSelect('payment_method_id',$paymentMethods) }}
    {{ Form::bsTextarea('description') }}
    <div class="d-flex align-items-end mt-5">
        {{ Form::submit($buttonText,['class'=>'btn btn-success mr-2']) }}
        {{ link_to_route('deliveries.index', 'Cancel', '', ['class'=>'btn btn-light border border-secondary']) }}
    </div>

</div>



