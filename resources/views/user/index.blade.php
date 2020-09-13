@extends('adminlte::page')
@section('title', 'Users Management')

@section('content_header')
    <h1>Users</h1>
@stop
@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><label
                                class="badge @if($user->role == 1) badge-primary @endif">{{ $user->getRoleName() }}</label>
                        </td>
                        <td>
                            <a href="{{route('users.updatestatus',$user->id)}}">
                                <label
                                    class="badge @if($user->status  == 1) badge-success @else badge-danger @endif">
                                    {{$user->status == 1 ? "Active" : "Inactive"}}
                                </label>
                            </a>
                        </td>
                        <td class="d-flex">
                            <form action="{{route('users.update',$user)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-link" type="submit"><i class="fas fa-user-edit"></i></button>
                            </form>
                            <form action="{{route('users.destroy',$user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">{{$users->links()}}</div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')

@stop
