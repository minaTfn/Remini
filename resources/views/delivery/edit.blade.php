@extends('adminlte::page')
@section('title', 'Delivery')
@section('js')
    @trixassets
@stop
@section('content_header')
    <h1>Edit Delivery</h1>
    <span class="font-size-sm ml-2">
        (Owner : {{ $delivery->owner->name }})
    </span>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($delivery, ['route' => ['deliveries.update', $delivery], 'method'=>'PATCH']) !!}
            @include('delivery/_form',[
                'delivery'=> $delivery ,
                'buttonText'=>'Submit'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
