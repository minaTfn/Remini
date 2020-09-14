<div class="form-group">
    {{ Form::label($name, null, ['class' => 'label']) }}
    {{ Form::date($name, $value = \Carbon\Carbon::now(), array_merge(['class' => 'form-control'], $attributes ?: [])) }}
</div>
