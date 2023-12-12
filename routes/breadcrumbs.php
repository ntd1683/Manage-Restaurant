<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('index'), ['icon' => 'home']);
});

// Home > Blog
Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Cart', route('cart'), ['icon' => 'cart']);
});

//Admin
Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin.index'), ['icon' => 'circle-user']);
});

Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Home', route('admin.index'), ['icon' => 'home']);
});

Breadcrumbs::for('admin.setting', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Setting', route('admin.setting'), ['icon' => 'settings']);
});
