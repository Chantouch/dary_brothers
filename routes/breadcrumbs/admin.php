<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;
use App\Models\Product;
use App\Models\Category;
use App\Models\Type;

// Admin > Dashboard
try {
    Breadcrumbs::register('admin.dashboard', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->push('Dashboard', route('admin.dashboard'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Categories
try {
    Breadcrumbs::register('admin.categories.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('fields.attributes.categories.title'), route('admin.categories.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}
// Admin > Dashboard > Categories > Create
try {
    Breadcrumbs::register('admin.categories.create', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.categories.index');
        $breadcrumbs->push(trans('fields.attributes.categories.title'), route('admin.categories.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Categories > Edit
try {
    Breadcrumbs::register('admin.categories.edit', function (BreadcrumbsGenerator $breadcrumbs, Category $category) {
        $breadcrumbs->parent('admin.categories.index');
        $breadcrumbs->push($category->name, route('admin.categories.edit', $category->id));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Type
try {
    Breadcrumbs::register('admin.types.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('fields.attributes.types.title'), route('admin.types.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}
// Admin > Dashboard > Type > Create
try {
    Breadcrumbs::register('admin.types.create', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.types.index');
        $breadcrumbs->push(trans('fields.attributes.types.title'), route('admin.types.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Type > Edit
try {
    Breadcrumbs::register('admin.types.edit', function (BreadcrumbsGenerator $breadcrumbs, Type $type) {
        $breadcrumbs->parent('admin.types.index');
        $breadcrumbs->push($type->name, route('admin.types.edit', $type->id));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Type
try {
    Breadcrumbs::register('admin.products.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('fields.attributes.types.title'), route('admin.products.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}
// Admin > Dashboard > Type > Create
try {
    Breadcrumbs::register('admin.products.create', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.products.index');
        $breadcrumbs->push(trans('fields.attributes.types.title'), route('admin.products.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Type > Edit
try {
    Breadcrumbs::register('admin.products.edit', function (BreadcrumbsGenerator $breadcrumbs, Product $product) {
        $breadcrumbs->parent('admin.products.index');
        $breadcrumbs->push($product->name, route('admin.products.edit', $product->id));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}
