<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes','label']);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'value', 'attributes','label']);
        Form::component('bsPassword', 'components.form.password', ['name', 'value', 'attributes','label']);
        Form::component('bsNumber', 'components.form.number', ['name', 'value', 'attributes','label']);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'value', 'attributes','label']);
        Form::component('bsDate', 'components.form.date', ['name', 'value', 'attributes','label']);
        Form::component('bsRadio', 'components.form.radio', ['name', 'value', 'attributes','label']);
        Form::component('bsSelect', 'components.form.select', ['name', 'data', 'value', 'attributes','label']);
    }
}
