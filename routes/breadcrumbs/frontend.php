<?php

// Home
try {
    Breadcrumbs::for('home', function ($trail) {
        $trail->push('Home', route('home'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

// Home > About
try {
    Breadcrumbs::for('about', function ($trail) {
        $trail->parent('home');
        $trail->push('About', route('about'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

// Home > Blog
try {
    Breadcrumbs::for('blog', function ($trail) {
        $trail->parent('home');
        $trail->push('Blog', route('blog'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

// Home > Blog > [Category]
try {
    Breadcrumbs::for('category', function ($trail, $category) {
        $trail->parent('blog');
        $trail->push($category->title, route('category', $category->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

// Home > Blog > [Category] > [Post]
try {
    Breadcrumbs::for('post', function ($trail, $post) {
        $trail->parent('category', $post->category);
        $trail->push($post->title, route('post', $post->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

// Home > User > Request password
try {
    Breadcrumbs::for('password.request', function ($trail) {
        $trail->push('Request reset password', route('password.request'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
// Home > User > Reset password
try {
    Breadcrumbs::for('password.reset', function ($trail, $token) {
        $trail->push('Reset password', route('password.reset', $token));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
