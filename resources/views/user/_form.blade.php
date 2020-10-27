@include('partials.formError')

<div>
    {{ Form::token() }}
    {{ Form::bsText('name',null,['autofocus'=>'']) }}
    {{ Form::bsText('email') }}
    {{ Form::bsText('phone') }}
    @if(isset($type) && $type == 'create')
        {{ Form::bsPassword('password') }}
        {{ Form::bsPassword('password_confirmation') }}
    @endif
    {{ Form::bsSelect('status',['0'=>'Inactive','1'=>'Active']) }}
    {{ Form::bsSelect('role',['1'=>'Admin','2'=>'User']) }}
    <div class="d-flex align-items-end mt-5">
        {{ Form::submit($buttonText,['class'=>'btn btn-success mr-2']) }}
        {{ link_to_route('users.index', 'Cancel', '', ['class'=>'btn btn-light border border-secondary']) }}
    </div>

</div>



