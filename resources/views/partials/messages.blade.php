@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <flash message="{{ session('success') }}"></flash>
@endif

@if (session('warning'))
    <flash status="warning" message="{{ session('warning') }}"></flash>
@endif
