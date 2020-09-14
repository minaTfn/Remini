@if ($errors->form->any())
    <div class="form-group pl-3">
        @foreach($errors->form->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </div>
@endif
