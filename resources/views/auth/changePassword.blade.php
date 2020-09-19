@extends('adminlte::page')
@section('title', 'Users Management')

@section('content_header')
    <h1>Change Password</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['changePassword.store']]) !!}
            <div>
                {{ Form::token() }}
                {{ Form::bsText('email',auth()->user()->email, ['disabled' => 'disabled']) }}
                {{ Form::bsPassword('old-password','','','Current Password') }}
                {{ Form::bsPassword('password','','','New Password') }}
                {{ Form::bsPassword('password_confirmation','','','New Password Confirmation') }}
                <div class="d-flex align-items-end mt-5">
                    {{ Form::submit('Change Password',['class'=>'btn btn-success mr-2']) }}
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
