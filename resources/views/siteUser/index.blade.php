@extends('adminlte::page')
@section('title', 'Site Users Management')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
    <div class="card shadow-none">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Deliveries Count</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{ route('deliveries.index', ['owner' => $user->id]) }}">{{$user->deliveries_count}}</a></td>
                        <td>
                            <a class="p-2 badge @if($user->status  == 1) bg-teal @else badge-danger @endif"
                               href="{{route('site-users.updateStatus',$user->id)}}">
                                {{$user->status == 1 ? "Active" : "Inactive"}}
                            </a>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-link" href="{{route('site-users.edit',$user)}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="{{route('site-users.destroy',$user)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link" onclick="return confirm('Are you sure you want to delete this item?')"
                                            type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
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
