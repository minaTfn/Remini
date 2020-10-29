@extends('adminlte::page')
@section('title', 'Payment Method')

@section('content_header')
    <h1>Payment Methods</h1>
@stop

@section('actions')
    <a href="{{ route('payment-methods.create') }}" class="btn bg-teal btn-sm p-2"><i class="mr-1 fa fa-plus"></i>Create Payment Method</a>
@stop

@section('content')
    <div class="card shadow-none">
        <div class="card-body">
            @if(!$paymentMethods->isEmpty())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Title (fa)</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paymentMethods as $paymentMethod)
                    <tr>
                        <td>{{$paymentMethod->title}}</td>
                        <td>{{$paymentMethod->title_fa}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-link" href="{{route('payment-methods.edit',$paymentMethod)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('payment-methods.destroy',$paymentMethod)}}" method="POST">
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
