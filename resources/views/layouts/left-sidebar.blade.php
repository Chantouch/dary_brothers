<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="{{ set_active($lang.'admin/dashboard') }}"
                       href="{!! route('admin.dashboard') !!}"
                    >
                        <i class="fa fa-fw fa-dashboard"></i><span> {!! __('menu.dashboard') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/categories', Request::is($lang.'admin/categories/*'), $lang.'admin/categories']) }}"
                       href="{!! route('admin.categories.index') !!}"
                    >
                        <i class="fa fa-fw fa-area-chart"> </i>
                        <span> {!! __('menu.categories') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/products', Request::is($lang.'admin/products/*'), $lang.'admin/products']) }}"
                       href="{!! route('admin.products.index') !!}"
                    >
                        <i class="fa fa-fw fa-image"> </i>
                        <span> {!! __('menu.products') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/orders', Request::is($lang.'admin/orders/*'), $lang.'admin/orders']) }}"
                       href="{!! route('admin.orders.index') !!}"
                    >
                        <i class="fa fa-fw fa-table"> </i>
                        <span> {!! __('menu.orders') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/contacts', Request::is($lang.'admin/contacts/*'), $lang.'admin/contacts']) }}"
                       href="{!! route('admin.contacts.index') !!}"
                    >
                        <i class="fa fa-fw fa-pencil"> </i>
                        <span> {!! __('menu.contacts') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/users', Request::is($lang.'admin/users/*'), $lang.'admin/users']) }}"
                       href="{!! route('admin.users.index') !!}"
                    >
                        <i class="fa fa-fw fa-user-circle-o"> </i>
                        <span> {!! __('menu.users') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/customers', Request::is($lang.'admin/customers/*'), $lang.'admin/customers']) }}"
                       href="{!! route('admin.customers.index') !!}"
                    >
                        <i class="fa fa-fw fa-users"> </i>
                        <span> {!! __('menu.customers') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/sliders', Request::is($lang.'admin/sliders/*'), $lang.'admin/sliders']) }}"
                       href="{!! route('admin.sliders.index') !!}"
                    >
                        <i class="fa fa-fw fa-sliders"> </i>
                        <span> {!! __('menu.sliders') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="{{ set_active([$lang.'admin/settings', Request::is($lang.'admin/settings/*'), $lang.'admin/settings']) }}"
                       href="{!! route('admin.settings.index') !!}"
                    >
                        <i class="fa fa-fw fa-cogs"> </i>
                        <span> {!! __('menu.settings') !!} </span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
