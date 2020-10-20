@php $classes = $errors->form->has("$name") ? "is-invalid form-check-input" : "form-check-input" @endphp
{{ Form::label($label ?: $name, null, ['class' => 'label']) }}
<div class="form-group">
    @foreach($data as $id => $item)
        @php
            $elementId = snake_case($item.$id);
        @endphp
        <div class="form-check form-check-inline">
            {{ Form::checkbox($name, $id,(array_keys($values,$id)), array_merge(['class' => $classes,'id'=>$elementId], $attributes ?: [])) }}
            {{ Form::label($elementId, $item, ['class' => 'form-check-label','for'=>"inlineCheckbox{$id}"]) }}
        </div>
    @endforeach
    @if ($errors->form->has("$name"))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->form->first("$name") }}</strong>
        </span>
    @endif
</div>
