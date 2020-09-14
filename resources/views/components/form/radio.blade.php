<div class="form-group">
    {{ Form::label($name, null, ['class' => 'label']) }}
    {{ Form::radio($name, $value, array_merge(['class' => 'form-control'], $attributes ?: [])) }}
</div>
