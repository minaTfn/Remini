@extends('adminlte::page')
@section('title', 'Site Users Management')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($site_user, ['route' => ['site-users.update', $site_user], 'method'=>'PATCH']) !!}
            @include('siteUser/_form',[
                'user'=> $site_user ,
                'buttonText'=>'Submit'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
