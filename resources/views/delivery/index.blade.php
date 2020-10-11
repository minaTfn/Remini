@extends('adminlte::page')
@section('title', 'Users Management')

@section('content_header')
    <h1>Deliveries</h1>
@stop

@section('content')
    <div class="card shadow-none">
        <div class="card-body">
            @if(!$deliveries->isEmpty())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Request</th>
                    <th>Origin City</th>
                    <th>Destination City</th>
                    <th>Request Date</th>
                    <th>Maximum Deadline</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deliveries as $delivery)
                    <tr>
                        <td>{{$delivery->owner->name}}</td>
                        <td>{{$delivery->title}}</td>
                        <td>{{$delivery->originCountry->title.' '.$delivery->originCity->title}}</td>
                        <td>{{$delivery->destinationCountry->title.' '. $delivery->destinationCity->title }}</td>
                        <td>{{$delivery->created_at }}</td>
                        <td>{{$delivery->created_at }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-link" href="{{route('deliveries.edit',$delivery)}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="{{route('deliveries.destroy',$delivery)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link" onclick="return confirm('Are you sure?')"
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
        <div class="card-footer">
            <div class="row">{{$deliveries->links()}}</div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')

@stop
