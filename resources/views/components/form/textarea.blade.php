<div class="form-group">
    {{ Form::label($name, null, ['class' => 'label']) }}
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes ?: [])) }}
</div>
