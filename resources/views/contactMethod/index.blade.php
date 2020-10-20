@extends('adminlte::page')
@section('title', 'Contact Method')

@section('content_header')
    <h1>Contact Methods</h1>
@stop

@section('actions')
    <a href="{{ route('contact-methods.create') }}" class="btn bg-teal btn-sm p-2"><i class="mr-1 fa fa-plus"></i>Create Contact Method</a>
@stop

@section('content')
    <div class="card shadow-none">
        <div class="card-body">
            @if(!$contactMethods->isEmpty())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>title</th>
                    <th>title_fa</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactMethods as $contactMethod)
                    <tr>
                        <td>{{$contactMethod->name}}</td>
                        <td>{{$contactMethod->title}}</td>
                        <td>{{$contactMethod->title_fa}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-link" href="{{route('contact-methods.edit',$contactMethod)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('contact-methods.destroy',$contactMethod)}}" method="POST">
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
            @else
                <p>No Item Is Available</p>
            @endif

        </div>
    </div>
@stop
