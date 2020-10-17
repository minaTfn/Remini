@extends('adminlte::page')
@section('title', 'Payment Method')
@section('content_header')
    <h1>Create Payment Method</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($paymentMethod, ['route' => ['payment-methods.store']]) !!}
            @include('paymentMethod/_form',[
                'paymentMethod'=> $paymentMethod ,
                'buttonText'=>'Create'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
