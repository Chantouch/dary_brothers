@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card-box noradius noborder bg-default">
                <i class="fa fa-file-text-o float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                <h1 class="m-b-20 text-white counter">{{ $orders }}</h1>
                <span class="text-white">{{ $newOrders }} New Orders</span>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card-box noradius noborder bg-warning">
                <i class="fa fa-bar-chart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Products</h6>
                <h1 class="m-b-20 text-white counter">{{ $products }}</h1>
                <span class="text-white">{{ $newProducts }} New Products</span>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card-box noradius noborder bg-info">
                <i class="fa fa-user-o float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Customers</h6>
                <h1 class="m-b-20 text-white counter">{{ $customers }}</h1>
                <span class="text-white">{{ $newCustomers }} New Users</span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-users"></i> {{ __('menu.users') }}</h3>
                </div>

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last login at</th>
                            <th>IP Address</th>
                            <th>Joined Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->last_login_at }}</td>
                                <td>{{ $user->last_login_ip }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $users->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-line-chart"></i> Sales each months of year</h3>
                </div>

                <div class="card-body">
                    <canvas id="lineChart" data-url="{{ config('app.url').'/' .app()->getLocale() }}"></canvas>
                </div>
                <div class="card-footer small text-muted">
                    Updated today at {{ \Carbon\Carbon::now()->format('H:i:s') }}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-envelope-o"></i> Latest messages</h3>
                </div>

                <div class="card-body">

                    <div class="widget-messages nicescroll" style="height: 400px;">
                        @if(count($latestMessages))
                            @foreach($latestMessages as $index => $message)
                                <a href="#">
                                    <div class="message-item">
                                        <div class="message-user-img">
                                            <img src="{!! asset('admin/images/avatars/avatar2.png') !!}"
                                                 class="avatar-circle" alt="">
                                        </div>
                                        <p class="message-item-user">{{ $message->name }}</p>
                                        <p class="message-item-msg">{{ $message->message }}</p>
                                        <p class="message-item-date">{{ $message->created_at }}</p>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <a href="#">
                                <div class="message-item">
                                    There is no message yet.
                                </div>
                            </a>
                        @endif
                    </div>

                </div>
                <div class="card-footer small text-muted">
                    Updated today at {{ \Carbon\Carbon::now()->format('H:i:s') }}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection
