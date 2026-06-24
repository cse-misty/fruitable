@extends('backend.dashboard')
@section('content')
    <section class="section">
          <div class="row ">
            <!-- ১. CATEGORIES CARD -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                         <h2 class="mb-3 font-18">
                                            {{ $categoriesCount ?? 0 }}
                                        </h2>
                                        <h5 class="font-15">Categories</h5>

                                        <p class="mb-0">
                                            <span class="col-green">Live</span> Updates
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img d-flex align-items-center justify-content-center" style="height: 90px; width: 100%; overflow: hidden;">
                                        @if(isset($category) && $category->thumbnail)
                                            <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="category image" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('backend/assets/img/banner/5.png') }}" alt="default banner" style="width: 100%; height: 100%; object-fit: contain;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ২. TOTAL ORDERS CARD -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h2 class="mb-3 font-18">{{ $orders_count ?? 0 }}</h2>
                                        <h5 class="font-15">Total Orders</h5>

                                        <p class="mb-0">
                                            <span class="col-green">Live</span> Updates
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img d-flex align-items-center justify-content-center" style="height: 90px; width: 100%; overflow: hidden;">
                                        <img src="{{ asset('backend/assets/img/banner/6.png') }}" alt="order banner" style="width: 100%; height: 100%; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ৩. TOTAL PRODUCTS CARD -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                         <h2 class="mb-3 font-18">{{ $totalProducts ?? 0 }}</h2>
                                        <h5 class="font-15">Total Products</h5>

                                        <p class="mb-0">
                                            <span class="col-green">Live</span> in Database
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img d-flex align-items-center justify-content-center" style="height: 90px; width: 100%; overflow: hidden;">
                                        <img src="{{ asset('backend/assets/img/banner/7.png') }}" alt="product banner" style="width: 100%; height: 100%; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ৪. REVENUE CARD -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                         <h2 class="mb-3 font-18">
                                            {{ format_price($totalRevenue ?? 0, 2) }}
                                        </h2>
                                        <h5 class="font-15">Revenue</h5>

                                        <p class="mb-0">
                                            <span class="col-green">Live</span> Earnings
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img d-flex align-items-center justify-content-center" style="height: 90px; width: 100%; overflow: hidden;">
                                        <img src="{{ asset('backend/assets/img/banner/4.png') }}" alt="revenue banner" style="width: 100%; height: 100%; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Orders</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.orders.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search Order ID...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th>Payment Method</th>
                                        <th>Customer</th>
                                        <th>Order Progress</th>
                                        <th>Order Date</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentOrders as $index => $order)
                                        <tr>

                                            <td class="text-center font-weight-bold">
                                                #{{ $order->id }}
                                            </td>
                                            <td>
                                                <span class="text-uppercase fw-bold">{{ $order->payment_method ?? 'COD' }}</span>
                                            </td>

                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0">
                                                    <li class="team-member team-member-sm">
                                                        <img class="rounded-circle"
                                                            src="{{ (isset($order->user) && $order->user->image) ? asset('storage/'.$order->user->image) : asset('backend/assets/img/users/user-'.(($index % 5) + 1).'.png') }}"
                                                            alt="user"
                                                            data-toggle="tooltip"
                                                            title="{{ $order->user->name ?? 'Guest' }}"
                                                            data-original-title="{{ $order->user->name ?? 'Guest' }}">
                                                    </li>
                                                    <li class="d-inline-block align-middle ml-2">
                                                        <span class="font-13 text-muted">{{ Str::limit($order->user->name ?? 'Guest Customer', 15) }}</span>
                                                    </li>
                                                </ul>
                                            </td>

                                        <td class="align-middle">
                                                @php

                                                    if ($order->status == 'pending') {
                                                        $percent = '25%';
                                                        $bgClass = 'bg-warning';
                                                        $statusText = 'Pending';
                                                    } elseif ($order->status == 'processing') {
                                                        $percent = '60%';
                                                        $bgClass = 'bg-info';
                                                        $statusText = 'Processing';
                                                    } elseif ($order->status == 'completed' || $order->status == 'success') {
                                                        $percent = '100%';
                                                        $bgClass = 'bg-success';
                                                        $statusText = 'Completed';
                                                    } else {
                                                        $percent = '0%';
                                                        $bgClass = 'bg-danger';
                                                        $statusText = 'Cancelled';
                                                    }
                                                @endphp


                                                <div class="progress-text">{{ $percent }} ({{ $statusText }})</div>
                                                <div class="progress" data-height="6" style="height: 6px;">
                                                    <div class="progress-bar {{ $bgClass }}" data-width="{{ $percent }}" style="width: {{ $percent }};"></div>
                                                </div>
                                            </td>


                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>

                                            <td class="text-dark fw-bold">
                                                {{ format_price($order->total_amount ?? 0, 2) }}
                                            </td>

                                        <td>

                                            @if($order->status == 'pending')
                                                <div class="badge badge-warning text-capitalize">{{ $order->status }}</div>
                                            @elseif($order->status == 'processing')
                                                <div class="badge badge-danger text-capitalize">{{ $order->status }}</div>
                                            @elseif($order->status == 'completed' || $order->status == 'success')
                                                <div class="badge badge-success text-capitalize">{{ $order->status }}</div>
                                            @else

                                                <div class="badge badge-secondary text-capitalize">{{ $order->status ?? 'Unknown' }}</div>
                                            @endif
                                        </td>

                                            <td>
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4 text-muted">No recent orders found in database.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <!-- ১. PRODUCT REVIEWS / CUSTOMER FEEDBACK -->
            <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Reviews</h4>
                        <div class="card-header-form">
                            <a href="#" class="btn btn-sm btn-outline-primary">Manage Reviews</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($recentReviews as $index => $review)
                            <div class="support-ticket media pb-1 mb-3">

                                <img src="{{ (isset($review->user) && $review->user->avatar) ? asset('storage/'.$review->user->avatar) : asset('backend/assets/img/users/user-'.(($index % 5) + 1).'.png') }}" class="user-img mr-2" alt="user">
                                <div class="media-body ml-3">

                                    <div class="badge badge-pill badge-warning mb-1 float-right">
                                        <i class="fas fa-star me-1"></i> {{ $review->rating ?? '5' }} ★
                                    </div>
                                    <span class="font-weight-bold text-primary">#{{ $review->id }}</span>
                                    <a href="javascript:void(0)" class="ml-2 font-weight-bold text-dark">
                                        {{ $review->product->name ?? 'Fruit Item' }}
                                    </a>
                                    <p class="my-1 text-muted">{{ Str::limit($review->review_comment ?? $review->comment ?? 'Excellent quality fruits!', 70) }}</p>
                                    <small class="text-muted">Reviewed by <span class="font-weight-bold font-13 text-dark">{{ $review->user->name ?? 'Anonymous' }}</span>
                                        &nbsp;&nbsp; - {{ $review->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @empty

                            <div class="support-ticket media pb-1 mb-3">
                                <img src="{{ asset('backend/assets/img/users/user-1.png') }}" class="user-img mr-2" alt="">
                                <div class="media-body ml-3">
                                    <div class="badge badge-pill badge-success mb-1 float-right">Organic</div>
                                    <span class="font-weight-bold">#89754</span>
                                    <a href="javascript:void(0)" class="ml-2 font-weight-bold text-dark">Fresh Mangoes</a>
                                    <p class="my-1 text-muted">The mangoes were incredibly sweet and fresh. Highly recommended!</p>
                                    <small class="text-muted">Created by <span class="font-weight-bold font-13 text-dark">John Doe</span> &nbsp;&nbsp; - Just now</small>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <a href="javascript:void(0)" class="card-footer card-link text-center small">View All Reviews</a>
                </div>
            </div>

            <!-- ২. RECENT PAYMENTS TABLE -->
            <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Payments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Client Name</th>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentPayments as $payment)
                                        <tr>
                                            <td class="font-weight-bold">#{{ $payment->id }}</td>
                                            <td>{{ $payment->user->name ?? 'Guest Customer' }}</td>
                                            <td>{{ $payment->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <span class="badge badge-light text-uppercase font-12">
                                                    {{ $payment->payment_method ?? 'COD' }}
                                                </span>
                                            </td>
                                            <td class="text-success font-weight-bold">
                                                {{ format_price($payment->total_amount ?? 0, 2) }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">No payments recorded yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




</section>
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Select Layout</h6>
            <div class="selectgroup layout-color w-50">
                <label class="selectgroup-item">
                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                <span class="selectgroup-button">Light</span>
                </label>
                <label class="selectgroup-item">
                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                <span class="selectgroup-button">Dark</span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Sidebar Color</h6>
            <div class="selectgroup selectgroup-pills sidebar-color">
                <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                </label>
                <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Color Theme</h6>
            <div class="theme-setting-options">
                <ul class="choose-theme list-unstyled mb-0">
                <li title="white" class="active">
                    <div class="white"></div>
                </li>
                <li title="cyan">
                    <div class="cyan"></div>
                </li>
                <li title="black">
                    <div class="black"></div>
                </li>
                <li title="purple">
                    <div class="purple"></div>
                </li>
                <li title="orange">
                    <div class="orange"></div>
                </li>
                <li title="green">
                    <div class="green"></div>
                </li>
                <li title="red">
                    <div class="red"></div>
                </li>
                </ul>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <div class="theme-setting-options">
                <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                    id="mini_sidebar_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Mini Sidebar</span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <div class="theme-setting-options">
                <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                    id="sticky_header_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Sticky Header</span>
                </label>
            </div>
            </div>
            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                <i class="fas fa-undo"></i> Restore Default
            </a>
            </div>
        </div>
        </div>
    </div>
@endsection
