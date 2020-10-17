@extends('adminlte::page')
@section('title', 'Delivery')

@section('content_header')
    <h1>Deliveries</h1>
@stop

@section('content')
    <div class="card shadow-none">
        <div class="card-body">
            <button id="searchAction" class="btn btn-link mb-1 text-green">
                <i class="fas {{ request()->all() ? 'fa-search-minus' : 'fa-search-plus' }}"></i>
                Search ...
            </button>
            <div class="card-header bg-gray-light py-0 mb-2">
                <div class="searchResult pt-2" style="display: {{ request()->all() ? 'block' : 'none' }};">
                    @include('delivery/_search')
                </div>
            </div>
            @if(!$deliveries->isEmpty())
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Request</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Requested</th>
                        <th>Deadline</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveries as $delivery)
                        <tr>
                            <td>{{$delivery->owner->name}}</td>
                            <td>{{$delivery->title}}</td>
                            <td>{{$delivery->origin}}</td>
                            <td>{{$delivery->destination}}</td>
                            <td>{{$delivery->request_date }}</td>
                            <td>{{$delivery->maximum_deadline_for_humans }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-link" href="{{route('deliveries.edit',$delivery)}}">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <form action="{{route('deliveries.destroy',$delivery)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link"
                                                onclick="return confirm('Are you sure you want to delete this item?')"
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
            <div class="row">{{ $deliveries->withQueryString()->links() }}</div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $('#searchAction').on('click', function () {
            $(this).children('.fas').toggleClass(['fa-search-plus', 'fa-search-minus']);
            $('.searchResult').slideToggle();
        });
    </script>
@stop
