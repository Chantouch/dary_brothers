<!-- top bar navigation -->
<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="{{ route('admin.home') }}" class="logo">
            <img alt="Logo" src="{!! asset('admin/images/logo.png') !!}"/>
            <span>Admin</span>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-fw fa-language"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">

                    <div class="dropdown-item noti-title">
                        <h5>
                            <small>Change Language</small>
                        </h5>
                    </div>
                    @foreach (config('translatable.locales') as $lang => $language)
                        <a href="{{ route('lang.switch', $lang) }}" class="dropdown-item notify-item {{ set_lang_active($lang) }}">
                            <p class="notify-details ml-0">
                                <b>{{ $language }}</b>
                                <span>{{ $lang }}</span>
                            </p>
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{!! asset('admin/images/avatars/admin.png') !!}" alt="Profile image"
                         class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    @auth
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow">
                                <small>Hello, {{Auth::user()->name}}</small>
                            </h5>
                        </div>
                    @endauth
                    <a href="#" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>

                    @auth
                        <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> <span>{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
<!-- End Navigation -->
