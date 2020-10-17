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

// Delivery Methods > Index
Breadcrumbs::for('delivery-methods', function (Trail $trail) {
    $trail->push('Delivery Methods', route('delivery-methods.index'));
});

// Delivery Methods > Edit
Breadcrumbs::for('delivery-methods.edit', function (Trail $trail, $deliveryMethod) {
    $trail->parent('delivery-methods');
    $trail->push($deliveryMethod->title, route('delivery-methods.edit', $deliveryMethod));
});

// Delivery Methods > Create
Breadcrumbs::for('delivery-methods.create', function (Trail $trail) {
    $trail->parent('delivery-methods');
    $trail->push('Create', route('delivery-methods.create'));
});


// Payment Methods > Index
Breadcrumbs::for('payment-methods', function (Trail $trail) {
    $trail->push('Payment Methods', route('payment-methods.index'));
});

// Payment Methods > Edit
Breadcrumbs::for('payment-methods.edit', function (Trail $trail, $paymentMethod) {
    $trail->parent('payment-methods');
    $trail->push($paymentMethod->title, route('payment-methods.edit', $paymentMethod));
});

// Payment Methods > Create
Breadcrumbs::for('payment-methods.create', function (Trail $trail) {
    $trail->parent('payment-methods');
    $trail->push('Create', route('payment-methods.create'));
});
