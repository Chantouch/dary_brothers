<!-- Left Sidebar -->
<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="active" href="{!! route('admin.dashboard') !!}">
                        <i class="fa fa-fw fa-bars"></i><span> {!! __('menu.dashboard') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{!! route('admin.categories.index') !!}"><i class="fa fa-fw fa-area-chart"> </i>
                        <span> {!! __('menu.categories') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{!! route('admin.types.index') !!}"><i class="fa fa-fw fa-file-text-o"> </i>
                        <span> {!! __('menu.types') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-fw fa-image"> </i>
                        <span> {!! __('menu.products') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{!! route('admin.orders.index') !!}"><i class="fa fa-fw fa-table"> </i>
                        <span> {!! __('menu.orders') !!} </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="javascript: void (0)"><i class="fa fa-fw fa-user-circle-o"></i>
                        <span> User Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li><a href="{{ route('admin.customers.index') }}">Customers</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript: void (0)" class="pro"><i class="fa fa-fw fa-tv"></i>
                        <span> System Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="#">Roles</a></li>
                        <li><a href="#">Permission</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- End Sidebar -->
