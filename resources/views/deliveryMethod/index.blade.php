@extends('adminlte::page')
@section('title', 'Delivery Method')

@section('content_header')
    <h1>Delivery Methods</h1>
@stop

@section('actions')
    <a href="{{ route('delivery-methods.create') }}" class="btn bg-teal btn-sm p-2"><i class="mr-1 fa fa-plus"></i>Create Delivery Method</a>
@stop

@section('content')
    <div class="card shadow-none">
        <div class="card-body">
            @if(!$deliveryMethods->isEmpty())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>title</th>
                    <th>title_fa</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deliveryMethods as $deliveryMethod)
                    <tr>
                        <td>{{$deliveryMethod->title}}</td>
                        <td>{{$deliveryMethod->title_fa}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-link" href="{{route('delivery-methods.edit',$deliveryMethod)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('delivery-methods.destroy',$deliveryMethod)}}" method="POST">
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
