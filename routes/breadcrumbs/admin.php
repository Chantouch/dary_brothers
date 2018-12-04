<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;
use App\Models\Product;
use App\Models\Category;
use App\Models\Type;

// Admin > Home
try {
    Breadcrumbs::register('admin.home', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->push(trans('menu.dashboard'), route('admin.dashboard'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}
// Admin > Dashboard
try {
    Breadcrumbs::register('admin.dashboard', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->push(trans('menu.dashboard'), route('admin.dashboard'));
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

// Admin > Dashboard > Products
try {
    Breadcrumbs::register('admin.products.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('forms.products.list'), route('admin.products.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Products > Create
try {
    Breadcrumbs::register('admin.products.create', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.products.index');
        $breadcrumbs->push(trans('forms.products.create'), route('admin.products.create'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Products > Edit
try {
    Breadcrumbs::register('admin.products.edit', function (BreadcrumbsGenerator $breadcrumbs, Product $product) {
        $breadcrumbs->parent('admin.products.index');
        $breadcrumbs->push(str_limit($product->name, 50), route('admin.products.edit', $product->id));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}


// Admin > Dashboard > Orders
try {
    Breadcrumbs::register('admin.orders.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('fields.attributes.orders.title'), route('admin.orders.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}


// Admin > Dashboard > Users
try {
    Breadcrumbs::register('admin.users.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('fields.attributes.users.title'), route('admin.users.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}


// Admin > Dashboard > Users > Edit
try {
    Breadcrumbs::register('admin.users.edit', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.users.index');
        $breadcrumbs->push(trans('forms.users.edit'), route('admin.users.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}


// Admin > Dashboard > Orders
try {
    Breadcrumbs::register('admin.customers.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('fields.attributes.customers.title'), route('admin.customers.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Sliders
try {
    Breadcrumbs::register('admin.sliders.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('forms.sliders.list'), route('admin.sliders.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Sliders > Create
try {
    Breadcrumbs::register('admin.sliders.create', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.sliders.index');
        $breadcrumbs->push(trans('forms.sliders.create'), route('admin.sliders.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Sliders > Edit
try {
    Breadcrumbs::register('admin.sliders.edit', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.sliders.index');
        $breadcrumbs->push(trans('forms.sliders.edit'), route('admin.sliders.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Settings > List
try {
    Breadcrumbs::register('admin.settings.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('settings.list'), route('admin.settings.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Settings > List
try {
    Breadcrumbs::register('admin.settings.edit', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.settings.index');
        $breadcrumbs->push(trans('settings.edit'), route('admin.settings.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}

// Admin > Dashboard > Contacts > List
try {
    Breadcrumbs::register('admin.contacts.index', function (BreadcrumbsGenerator $breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('contact.title'), route('admin.contacts.index'));
    });
} catch (DuplicateBreadcrumbException $e) {
    throw new $e;
}
