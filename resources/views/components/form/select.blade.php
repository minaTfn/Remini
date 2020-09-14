<div class="form-group">
    {{ Form::label($name, null, ['class' => 'label']) }}
    {{ Form::select($name, $data, $value, array_merge(['class' => 'form-control'], $attributes ?: [])) }}
</div>
