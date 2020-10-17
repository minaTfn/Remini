@extends('adminlte::page')
@section('title', 'Contact Method')
@section('content_header')
    <h1>Edit Contact Method</h1>
    <span class="font-size-sm ml-2">
        ({{ $contactMethod->title }})
    </span>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($contactMethod, ['route' => ['contact-methods.update', $contactMethod], 'method'=>'PATCH']) !!}
            @include('contactMethod/_form',[
                'contactMethod'=> $contactMethod ,
                'buttonText'=>'Submit'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
