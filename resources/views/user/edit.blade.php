@extends('adminlte::page')
@section('title', 'Users Management')

@section('content_header')
    <h1>Edit User</h1>
@stop
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.edit',$user) }}
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['users.update', $user], 'method'=>'PATCH']) !!}
            @include('user/_form',[
                'user'=> $user ,
                'buttonText'=>'Submit'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
