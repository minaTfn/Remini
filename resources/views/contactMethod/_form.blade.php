@include('partials.formError')

<div>
    {{ Form::token() }}
    {{ Form::bsText('name',null,['autofocus'=>'','required']) }}
    {{ Form::bsText('title',null,['required']) }}
    {{ Form::bsText('title_fa') }}
    {{ Form::bsTextarea('description') }}

    <div class="d-flex align-items-end mt-5">
        {{ Form::submit($buttonText,['class'=>'btn btn-success mr-2']) }}
        {{ link_to_route('contact-methods.index', 'Cancel', '', ['class'=>'btn btn-light border border-secondary']) }}
    </div>

</div>


