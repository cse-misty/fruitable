<div class="container-fluid fixed-top">
<div class="container topbar bg-primary d-none d-lg-block">
    <div class="d-flex justify-content-between">
        <div class="top-info ps-2">
   
            <small class="me-3">
                <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                <a href="{{ $setting->google_map_url ?? '#' }}" target="_blank" class="text-white">
                    {{ $setting->address ?? '123 Street, New York' }}
                </a>
            </small>


            <small class="me-3">
                <i class="fas fa-envelope me-2 text-secondary"></i>
                <a href="mailto:{{ $setting->email_primary ?? 'info@example.com' }}" class="text-white">
                    {{ $setting->email_primary ?? 'info@example.com' }}
                </a>
            </small>
        </div>

        <div class="top-link pe-2">

            <a href="{{ route('page.show', 'privacy-policy') }}" class="text-white">
                <small class="text-white mx-2">{{ __('Privacy Policy') }}</small>
            </a>/

            <a href="{{ route('page.show', 'return-policy') }}" class="text-white">
                <small class="text-white mx-2">{{ __('Terms') }}</small>
            </a>/

            <a href="{{ route('page.show', 'terms-conditions') }}" class="text-white">
                <small class="text-white ms-2">{{ __('Refunds') }}</small>
            </a>
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
                         {{ __('Home') }}
                    </a>

                    <a href="{{ route('web.shopping') }}"
                       class="nav-item nav-link {{ request()->routeIs('web.shopping') ? 'active' : '' }}">
                        {{ __('Shop') }}
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('cart.index') || request()->routeIs('checkout.index') ? 'active' : '' }}" data-bs-toggle="dropdown">
                            {{ __('Pages') }}
                        </a>

                        <div class="dropdown-menu m-0 bg-secondary rounded-0">

                            <a href="{{ route('cart.index') }}" class="dropdown-item {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                                {{ __('Cart') }}
                                @if(session()->has('cart') && count(session('cart')) > 0)
                                    <span class="badge bg-danger ms-1">{{ count(session('cart')) }}</span>
                                @endif
                            </a>


                            <a href="{{ route('checkout.index') }}" class="dropdown-item {{ request()->routeIs('checkout.index') ? 'active' : '' }}">
                                {{ __('Checkout') }}
                            </a>

                            <a href="#" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item">404 Page</a>
                        </div>
                    </div>


                        <a href="{{ route('web.faq') }}"
                       class="nav-item nav-link {{ request()->routeIs('web.faq') ? 'active' : '' }}">
                        {{ __('FAQ') }}
                    </a>
                        <a href="{{ route('web.contact') }}"
                       class="nav-item nav-link {{ request()->routeIs('web.contact') ? 'active' : '' }}">
                        {{ __('Contact') }}
                    </a>





                </div>
                <div class="language-switcher me-3">
                    @if(App::isLocale('bn'))

                        <a href="{{ route('lang.switch', 'en') }}" class="btn btn-sm btn-outline-dark fw-bold"> বাংলা</a>
                    @else

                        <a href="{{ route('lang.switch', 'bn') }}" class="btn btn-sm btn-outline-success fw-bold">English</a>
                    @endif
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

                    @auth
                        @php

                            $wishlistCount = \App\Models\Wishlist::where('user_id', auth()->id())->count();
                        @endphp

                        <a href="{{ route('wishlist.index') }}" class="position-relative me-4 my-auto">

                            <i class="bi bi-heart fs-4 text-primary"></i>


                            @if($wishlistCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">
                                    {{ $wishlistCount }}
                                </span>
                            @endif
                        </a>
                    @else

                        <a href="{{ route('login') }}" class="position-relative me-4 my-auto">
                            <i class="bi bi-heart fs-4 text-primary"></i>
                        </a>
                    @endauth




@if ($errors->any())
    <div class="alert alert-danger p-2 small m-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
                                       <i class="fas fa-sign-out-alt me-2"></i>
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
<div id="loginModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

            <!-- HEADER -->
            <div class="modal-header bg-primary text-white border-0 position-relative justify-content-center">
                <div class="text-center w-100">
                    <h5 class="modal-title fw-bold mb-0">Login</h5>
                    <small class="opacity-75">Please login to continue</small>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" onclick="closeLoginModal()"></button>
            </div>

            <div class="modal-body p-4">

                {{-- ================= LOGIN STEP ================= --}}
                <div id="step-login" style="{{ session('admin_password_reset_email') ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="modal_email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" id="modal_email" class="form-control form-control-lg rounded-3" required autocomplete="username">
                        </div>

                        <div class="mb-3">
                            <label for="modal_password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" id="modal_password" class="form-control form-control-lg rounded-3" required autocomplete="current-password">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="rememberMe" class="form-check-input">
                                <label class="form-check-label small" for="rememberMe">Remember me</label>
                            </div>
                            <a href="javascript:void(0)" onclick="showForgotStep()" class="text-primary small text-decoration-none">
                                Forgot Password?
                            </a>
                        </div>

                        <!-- type="submit" নিশ্চিত করা হয়েছে যেন ফর্ম সাবমিট হয় -->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Login</button>

                        <!-- demo credential section -->
                        <div class="mt-4 border-top pt-3 text-center bg-light p-3 rounded-3">
                            <small class="text-muted d-block mb-2 fw-bold">Don’t have an account? Sign Up</small>

                            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded border mx-auto" style="max-width: 350px;">
                                <div class="text-start small text-dark lh-sm">
                                    <p class="text-primary mb-1 fw-bold">Demo User Credentials</p>
                                    <div><strong>Email:</strong> <span id="demoEmailText">{{ env('DEMO_USER_EMAIL', 'user@example.com') }}</span></div>
                                    <div><strong>Pass:</strong> <span id="demoPasswordText">{{ env('DEMO_USER_PASSWORD', 'password123') }}</span></div>
                                </div>

                                <button type="button" class="btn btn-outline-primary px-3 py-2 fw-bold" id="copyAllDemoBtn" title="Copy & Fill Credentials">
                                    <i class="fas fa-copy me-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- ================= EMAIL STEP ================= --}}
                <div id="step-email" style="{{ !session('admin_password_reset_email') ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('otp.send') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Enter Email</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-3" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Send OTP</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="javascript:void(0)" onclick="backToLogin()" class="text-decoration-none small">Back to Login</a>
                    </div>
                </div>

                {{-- ================= OTP STEP ================= --}}
                <div id="step-otp" style="{{ (!session('admin_password_reset_email') || session('admin_password_reset_verified')) ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('otp.verify') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ session('admin_password_reset_email') }}">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Enter OTP</label>
                            <input type="text" name="otp" class="form-control form-control-lg rounded-3" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Verify OTP</button>
                    </form>
                </div>

                {{-- ================= RESET STEP ================= --}}
                <div id="step-reset" style="{{ !session('admin_password_reset_verified') ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('password.reset.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-3" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Reset Password</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ================= SEARCH MODAL ================= -->


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
<script>

    let loginModal = null;

    document.addEventListener('DOMContentLoaded', function () {


        const modalElement = document.getElementById('loginModal');
        if (modalElement) {
            loginModal = new bootstrap.Modal(modalElement, {
                keyboard: false
            });
        }


        @if(session('admin_password_reset_email') || session('admin_password_reset_verified') || session('open_login'))
            if (loginModal) {
                loginModal.show();
            }
        @endif

           let copyAllBtn = document.getElementById('copyAllDemoBtn');
        if (copyAllBtn) {
            copyAllBtn.addEventListener('click', function(e) {
                e.preventDefault();


                let emailText = document.getElementById('demoEmailText').innerText.trim();
                let passwordText = document.getElementById('demoPasswordText').innerText.trim();


                let emailField = document.getElementById('modal_email');
                let passwordField = document.getElementById('modal_password');

                if (emailField && passwordField) {
                    emailField.value = emailText;
                    passwordField.value = passwordText;
                } else {
                    console.error("Target input fields not found! Make sure id='modal_email' and id='modal_password' are added to inputs.");
                }


                let combinedText = "Email: " + emailText + "\nPassword: " + passwordText;
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(combinedText);
                } else {
                    let textArea = document.createElement("textarea");
                    textArea.value = combinedText;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                }


                let originalIcon = copyAllBtn.innerHTML;
                copyAllBtn.innerHTML = '<i class="fas fa-check text-white"></i>';
                copyAllBtn.classList.remove('btn-outline-primary');
                copyAllBtn.classList.add('btn-success');

                setTimeout(() => {
                    copyAllBtn.innerHTML = originalIcon;
                    copyAllBtn.classList.remove('btn-success');
                    copyAllBtn.classList.add('btn-outline-primary');
                }, 2000);
            });
        }
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







