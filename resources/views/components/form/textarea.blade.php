@php $classes = $errors->form->has("$name") ? "is-invalid form-control" : "form-control" @endphp
<div class="form-group">
    {{ Form::label($label ?: $name, null, ['class' => 'label']) }}
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes ?: [])) }}
    @if ($errors->form->has("$name"))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->form->first("$name") }}</strong>
        </span>
    @endif
</div>
