<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;

// Account > Login
try {
    Breadcrumbs::register('login', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->push('Login', route('login'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}