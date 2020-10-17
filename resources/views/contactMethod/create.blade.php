@extends('adminlte::page')
@section('title', 'Contact Method')
@section('content_header')
    <h1>Create Contact Method</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($contactMethod, ['route' => ['contact-methods.store']]) !!}
            @include('contactMethod/_form',[
                'contactMethod'=> $contactMethod ,
                'buttonText'=>'Create'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
