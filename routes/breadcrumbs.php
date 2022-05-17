<?php

Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Dashboard', route('home'));
});
// representativ breadcrumbs
Breadcrumbs::for('admin.auth.representativ.index', function ($trail) {
    $trail->push(__('Representativ Management'), route('admin.auth.representativ.index'));
});

Breadcrumbs::for('admin.auth.representativ.create', function ($trail) {
    $trail->parent('admin.auth.representativ.index');
    $trail->push('Representativ Create', route('admin.auth.representativ.create'));
});

Breadcrumbs::for('admin.auth.representativ.edit', function ($trail, $id) {
    $trail->parent('admin.auth.representativ.index');
    $trail->push('Representativ Edit', route('admin.auth.representativ.edit', $id));
});

Breadcrumbs::for('admin.auth.representativ.show', function ($trail, $id) {
    $trail->parent('admin.auth.representativ.index');
    $trail->push('Representativ View', route('admin.auth.representativ.show', $id));
});

