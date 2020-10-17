{!! Form::open(['route' => 'deliveries.index', 'method'=>'GET','id'=>'search-form']) !!}
<div class="row">
    <div class="col-md-6">{{ Form::bsText('title',request()->input('title'),['placeholder'=>'Search a title...']) }}</div>
    <div class="col-md-6">
        <ajax-select2
            api="{{ route('api.get.users') }}"
            api-selected="{{ request()->filled('owner') ? route('api.get.user',request()->input('owner')) : '' }}"
            selected="{{ request()->input('owner') }}"
            placeholder="Search a username..."
            title="Owner"
            input-name="owner">
        </ajax-select2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <select2
            :options='@json($countries)'
            selected="{{ request()->input('fromCountry') }}"
            placeholder="Select a Country..."
            title="Origin Country"
            input-name="fromCountry">
        </select2>
    </div>
    <div class="col-md-6">
        <select2
            :options='@json($countries)'
            selected="{{ request()->input('toCountry') }}"
            placeholder="Select a Country..."
            title="Destination Country"
            input-name="toCountry">
        </select2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        {{ Form::bsDate('requestDate', request()->input('requestDate'), '','Request Date') }}
    </div>
    <div class="col-md-6">
        {{ Form::bsDate('deadlineDate',request()->input('deadlineDate') ,'','Deadline Date') }}
    </div>
</div>

<div class="d-flex align-items-end mt-1 mb-5">
    {{ Form::submit('Search',['class'=>'btn btn-success mr-2']) }}
    {{ link_to_route('deliveries.index', 'Reset', '', ['class'=>'btn btn-light border border-secondary']) }}
</div>
{!! Form::close() !!}




