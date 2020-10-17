@extends('adminlte::page')
@section('title', 'Delivery Method')
@section('content_header')
    <h1>Create Delivery Method</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($deliveryMethod, ['route' => ['delivery-methods.store']]) !!}
            @include('deliveryMethod/_form',[
                'deliveryMethod'=> $deliveryMethod ,
                'buttonText'=>'Create'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
