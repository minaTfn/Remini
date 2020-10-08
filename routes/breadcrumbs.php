<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});
// Users > Index
Breadcrumbs::for('users', function ($trail) {
    $trail->push('Users', route('users.index'));
});

// Users > Create
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});

// Users > Edit
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->name, route('users.edit', $user));
});


// Deliveries > Index
Breadcrumbs::for('deliveries', function ($trail) {
    $trail->push('Deliveries', route('deliveries.index'));
});

// Deliveries > Edit
Breadcrumbs::for('deliveries.edit', function ($trail, $delivery) {
    $trail->parent('deliveries');
    $trail->push($delivery->title, route('deliveries.edit', $delivery));
});



//// Home > Blog > [Category]
//Breadcrumbs::for('category', function ($trail, $category) {
//    $trail->parent('blog');
//    $trail->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('category', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});
