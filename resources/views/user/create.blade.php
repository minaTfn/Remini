@extends('adminlte::page')
@section('title', 'Users Management')

@section('content_header')
    <h1>Create User</h1>
@stop
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.create') }}
@stop
@section('plugins.Select2', true)
@section('content')
    <div class="card">
        <div class="card-body">
            @php $user = new App\Models\User; $user->status = 0; @endphp
            {!! Form::model($user, ['route' => ['users.store']]) !!}
            @include('user/_form',[
                'user'=>new App\Models\User ,
                'buttonText'=>'Create User',
                'type'=>'create'
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#status').select2();
        });
    </script>
@stop
