@extends('adminlte::page')
@section('title', 'Delivery Method')
@section('content_header')
    <h1>Edit Delivery Method</h1>
    <span class="font-size-sm ml-2">
        ({{ $deliveryMethod->title }})
    </span>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($deliveryMethod, ['route' => ['delivery-methods.update', $deliveryMethod], 'method'=>'PATCH']) !!}
            @include('deliveryMethod/_form',[
                'deliveryMethod'=> $deliveryMethod ,
                'buttonText'=>'Submit'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
