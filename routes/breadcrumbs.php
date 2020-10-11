<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

// Home
Breadcrumbs::for('home', function (Trail $trail) {
    $trail->push('Home', route('home'));
});
// Users > Index
Breadcrumbs::for('users', function (Trail $trail) {
    $trail->push('Users', route('users.index'));
});

// Users > Create
Breadcrumbs::for('users.create', function (Trail $trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});

// Users > Edit
Breadcrumbs::for('users.edit', function (Trail $trail, $user) {
    $trail->parent('users');
    $trail->push($user->name, route('users.edit', $user));
});


// Deliveries > Index
Breadcrumbs::for('deliveries', function (Trail $trail) {
    $trail->push('Deliveries', route('deliveries.index'));
});

// Deliveries > Edit
Breadcrumbs::for('deliveries.edit', function (Trail $trail, $delivery) {
    $trail->parent('deliveries');
    $trail->push($delivery->title, route('deliveries.edit', $delivery));
});
