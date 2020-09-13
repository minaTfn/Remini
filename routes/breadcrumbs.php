<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('users.index'));
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
