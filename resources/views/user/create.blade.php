@extends('adminlte::page')
@section('title', 'Users Management')

@section('content_header')
    <h1>Create User</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @php $user = new App\Models\User; $user->status = 0; @endphp
            {!! Form::model($user, ['route' => ['users.store']]) !!}
            @include('user/_form',[
                'user'=> $user ,
                'buttonText'=>'Create User',
                'type'=>'create'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop
