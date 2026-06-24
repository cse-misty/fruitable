@extends('frontend.layouts')
@section('content')

<div class="container" style="padding-top: 200px;">

    <!-- Page Header -->
    <div class="mb-4">
        <h2 class="fw-bold">My Dashboard</h2>
        <p class="text-muted">Manage your orders, addresses, and preferences</p>
    </div>

    <div class="row">

        <!-- LEFT SIDEBAR -->
        <div class="col-md-4">

            <div class="card border-0 shadow-sm p-4 text-center">

                {{-- <img src="{{ asset('storage/'.$user->image) }}"
                     class="rounded-circle mx-auto mb-3"
                     width="100"
                     height="100"> --}}
                     <img src="{{ asset('backend/assets/img/blog/profile.jpg') }}"
                     class="rounded-circle mx-auto mb-3"
                     width="100"
                     height="100">

                <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
                <small class="text-muted">{{ $user->email }}</small>

                <div class="mt-3">
                    <span class="badge bg-dark"> Premium Member</span>
                </div>
            </div>

            <!-- Menu -->
            <div class="card border-0 shadow-sm mt-3 p-3">
                 <a href="{{ route('profile.edit') }}"
                    class="d-block p-2 text-decoration-none {{ request()->routeIs('profile.edit') ? 'text-primary fw-bold' : 'text-dark' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Overview
                    </a>

                   <a href="{{ route('order.history') }}"
                    class="d-block p-2 text-decoration-none {{ request()->routeIs('orders.*') ? 'bg-primary text-white' : 'text-dark' }}">
                        <i class="bi bi-bag-check me-2"></i> My Orders
                    </a>

                    <a href="#"
                    class="d-block p-2 text-decoration-none {{ request()->routeIs('addresses.*') ? 'text-primary fw-bold' : 'text-dark' }}">
                        <i class="bi bi-geo-alt me-2"></i> Addresses
                    </a>

                    <a href="{{ route('wishlist.index') }}"
                    class="d-block p-2 text-decoration-none {{ request()->routeIs('Wishlist.*') ? 'text-primary fw-bold' : 'text-dark' }}">
                        <i class="bi bi-heart me-2"></i> Wishlist
                    </a>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="dropdown-item text-danger py-2">
                             <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>

            </div>

        </div>

        <!-- RIGHT CONTENT -->
        <div class="col-md-8">

            <div class="card border-0 shadow-sm p-4">

                <h5 class="mb-4 fw-bold">Account Setting</h5>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>

                  <div class="mb-3">
                        <label>Email Address</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                    </div>

                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" value="{{ $user->phone ?? '' }}" name="phone">
                    </div>

                   <button type="submit" class="btn btn-success w-100">
                        Save Changes
                    </button>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
