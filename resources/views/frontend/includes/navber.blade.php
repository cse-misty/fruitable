<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3">
                    <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                    <a href="#" class="text-white">123 Street, New York</a>
                </small>
                <small class="me-3">
                    <i class="fas fa-envelope me-2 text-secondary"></i>
                    <a href="#" class="text-white"> {{ $setting->email_primary ?? '' }}</a>
                </small>
            </div>

            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Refunds</small></a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">

            <!-- Brand -->
            <a href="{{ route('index') }}" class="navbar-brand">
                <h1 class="text-primary display-6">{{ $setting->site_name ?? '' }}</h1>
            </a>

            <!-- Mobile toggle -->
            <button class="navbar-toggler py-2 px-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>

            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">

                <!-- Menu -->
                <div class="navbar-nav mx-auto">

                    <a href="{{ route('index') }}"
                       class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}">
                        Home
                    </a>

                    <a href="{{ route('web.shopping') }}"
                       class="nav-item nav-link {{ request()->routeIs('web.shopping') ? 'active' : '' }}">
                        Shop
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('cart.index') || request()->routeIs('checkout.index') ? 'active' : '' }}" data-bs-toggle="dropdown">
                            Pages
                        </a>

                        <div class="dropdown-menu m-0 bg-secondary rounded-0">

                            <a href="{{ route('cart.index') }}" class="dropdown-item {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                                Cart
                                @if(session()->has('cart') && count(session('cart')) > 0)
                                    <span class="badge bg-danger ms-1">{{ count(session('cart')) }}</span>
                                @endif
                            </a>


                            <a href="{{ route('checkout.index') }}" class="dropdown-item {{ request()->routeIs('checkout.index') ? 'active' : '' }}">
                                Checkout
                            </a>

                            <a href="#" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item">404 Page</a>
                        </div>
                    </div>


                        <a href="{{ route('web.faq') }}"
                       class="nav-item nav-link {{ request()->routeIs('web.faq') ? 'active' : '' }}">
                        FAQ
                    </a>
                        <a href="{{ route('web.contact') }}"
                       class="nav-item nav-link {{ request()->routeIs('web.contact') ? 'active' : '' }}">
                        Contact
                    </a>



                </div>

                <!-- RIGHT SIDE ICONS -->
                <div class="d-flex m-3 me-0">

                    <!-- Search -->
                    <button class="btn border border-secondary btn-md-square rounded-circle bg-white me-3"
                            data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search text-primary"></i>
                    </button>



                    <a href="{{ route('cart.index') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-cart fa-2x"></i>

                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white"
                            style="top:-5px; left:15px; height:20px; width:20px; font-size:12px;">
                            {{ count(session('cart', [])) }}
                        </span>
                    </a>





                    @guest
                        <button
                            class="btn border border-secondary btn-md-square rounded-circle bg-white me-3"
                            onclick="openLoginModal()">

                            <i class="fas fa-user text-primary"></i>

                        </button>
                    @endguest


                    @auth
                    <div class="dropdown">

                    <button class="btn d-flex align-items-center justify-content-center p-0 border-0 shadow-none"
                            data-bs-toggle="dropdown"
                            style="width:40px;height:40px; outline: none; box-shadow: none;">

                        <i class="fas fa-user-circle text-primary" style="font-size: 40px;"></i>

                    </button>



                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                            <li class="px-3 py-3 border-bottom">
                                <div class="fw-bold">
                                    {{ auth()->user()->name }}
                                </div>

                                <small class="text-muted">
                                    {{ auth()->user()->email }}
                                </small>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                href="{{ route('dashboard') }}">

                                    <i class="fas fa-gauge me-2 text-primary"></i>
                                    Dashboard

                                </a>
                            </li>

                                <li>
                                <a class="dropdown-item py-2"
                                href="{{ route('profile.edit') }}">

                                    <i class="fas fa-gauge me-2 text-primary"></i>
                                    Profile

                                </a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button class="dropdown-item text-danger py-2">
                                        <i class="fas fa-right-from-bracket me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
                    @endauth


                </div>

            </div>
        </nav>
    </div>
</div>

<!-- ================= LOGIN MODAL ================= -->

<div id="loginModal" class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

            <!-- HEADER -->
            <div class="modal-header bg-primary text-white border-0 position-relative justify-content-center">

                <div class="text-center w-100">
                    <h5 class="modal-title fw-bold mb-0">Login</h5>
                    <small class="opacity-75">Please login to continue</small>
                </div>

                <button type="button"
                        class="btn-close btn-close-white position-absolute end-0 me-3"
                        onclick="closeLoginModal()">
                </button>

            </div>

            <!-- BODY -->
            {{-- <div class="modal-body p-4">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email"
                               name="email"
                               class="form-control form-control-lg rounded-3"
                               placeholder="Enter your email"
                               required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control form-control-lg rounded-3"
                               placeholder="Enter your password"
                               required>
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">
                                Remember me
                            </label>
                        </div>

                        <a href="{{ route('password.request') }}"
                           class="text-primary small text-decoration-none">
                            Forgot Password?
                        </a>

                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                            class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                        Login
                    </button>

                </form>

                <!-- Footer -->
                <div class="text-center mt-3">
                    <small class="text-muted">
                        Don’t have an account?
                        <a href="{{ route('register') }}"
                           class="text-primary fw-semibold text-decoration-none">
                            Sign up
                        </a>
                    </small>
                </div>

            </div> --}}

            <div class="modal-body p-4">

    {{-- ================= LOGIN STEP ================= --}}
    <div id="step-login"
         @if(session('admin_password_reset_email')) style="display:none" @endif>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email"
                       class="form-control form-control-lg rounded-3"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password"
                       class="form-control form-control-lg rounded-3"
                       required>
            </div>

            <div class="d-flex justify-content-between mb-3">

                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label small">Remember me</label>
                </div>

                <a href="javascript:void(0)"
                   onclick="showForgotStep()"
                   class="text-primary small text-decoration-none">
                    Forgot Password?
                </a>

            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>

    </div>


    {{-- ================= EMAIL STEP ================= --}}
    <div id="step-email"
         @if(!session('admin_password_reset_email')) style="display:none" @endif>

        <form method="POST" action="{{ route('otp.send') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Enter Email</label>
                <input type="email" name="email"
                       class="form-control form-control-lg rounded-3"
                       required>
            </div>

            <button class="btn btn-primary w-100">Send OTP</button>
        </form>

        <div class="text-center mt-2">
            <a href="javascript:void(0)" onclick="backToLogin()">
                Back to Login
            </a>
        </div>

    </div>


    {{-- ================= OTP STEP ================= --}}
    <div id="step-otp"
         @if(!session('admin_password_reset_email') || session('admin_password_reset_verified'))
             style="display:none"
         @endif>

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            <input type="hidden" name="email"
                   value="{{ session('admin_password_reset_email') }}">

            <div class="mb-3">
                <label class="form-label fw-semibold">Enter OTP</label>
                <input type="text" name="otp"
                       class="form-control form-control-lg rounded-3"
                       required>
            </div>

            <button class="btn btn-primary w-100">Verify OTP</button>
        </form>

    </div>


    {{-- ================= RESET STEP ================= --}}
            <div id="step-reset"
                @if(!session('admin_password_reset_verified'))
                    style="display:none"
                @endif>

                <form method="POST" action="{{ route('password.reset.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <input type="password" name="password"
                            class="form-control form-control-lg rounded-3"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control form-control-lg rounded-3"
                            required>
                    </div>

                    <button class="btn btn-primary w-100">Reset Password</button>
                </form>

            </div>

        </div>

        </div>
    </div>

</div>

<!-- ================= SEARCH MODAL ================= -->
{{-- <div class="modal fade" id="searchModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Search</h6>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="search" class="form-control" placeholder="Search...">
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Search Everything</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- ফর্ম যোগ করা হয়েছে -->
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control" placeholder="Type and press enter..." required value="{{ request('query') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ================= JS ================= -->

<script src="https://jquery.com"></script>

<script>
    let loginModal = null;

    document.addEventListener('DOMContentLoaded', function () {

        loginModal = new bootstrap.Modal(document.getElementById('loginModal'), {
            keyboard: false
        });


        @if(session('admin_password_reset_email') || session('admin_password_reset_verified') || session('open_login'))
            loginModal.show();
        @endif
    });


    function openLoginModal() {
        if (loginModal) {
            loginModal.show();
        }
    }

    function closeLoginModal() {
        if (loginModal) {
            loginModal.hide();
        }
    }

  
    function showForgotStep() {
        document.getElementById('step-login').style.display = 'none';
        document.getElementById('step-email').style.display = 'block';
    }

    function backToLogin() {
        document.getElementById('step-email').style.display = 'none';
        document.getElementById('step-login').style.display = 'block';
    }
</script>



