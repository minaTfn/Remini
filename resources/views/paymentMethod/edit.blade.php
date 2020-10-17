@extends('adminlte::page')
@section('title', 'Payment Method')
@section('content_header')
    <h1>Edit Payment Method</h1>
    <span class="font-size-sm ml-2">
        ({{ $paymentMethod->title }})
    </span>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($paymentMethod, ['route' => ['payment-methods.update', $paymentMethod], 'method'=>'PATCH']) !!}
            @include('paymentMethod/_form',[
                'paymentMethod'=> $paymentMethod ,
                'buttonText'=>'Submit'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
