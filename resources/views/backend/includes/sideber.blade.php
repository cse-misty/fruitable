<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('index') }}">
                <img alt="image" src="{{asset('backend/assets/img/logo.png')}}" class="header-logo" />
                <span class="logo-name">fruitables</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>

            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Orders -->
            <li class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <i data-feather="shopping-cart" style="stroke: #14f654;"></i>
                    <span class="ms-2">Orders</span>
                </a>
            </li>

            <!-- Reviews -->
            <li class="{{ request()->routeIs('reviews.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('reviews.index') }}">
                    <i data-feather="star" style="stroke: #4114f6;"></i>
                    <span class="ms-2">Reviews</span>
                </a>
            </li>

            <!-- Hero Slider -->
       <li class="{{ request()->routeIs('hero.slider.*') ? 'active' : '' }}">
    <!-- এখানে আইডি হিসেবে ১ পাস করা নিশ্চিত করা হলো -->
    <a class="nav-link" href="{{ route('hero.slider.edit', ['id' => 1]) }}">
        <i data-feather="sliders" style="stroke: #ec6332;"></i>
        <span class="ms-2">Hero Slider</span>
    </a>
</li>


            <!-- Category Dropdown -->
            <li class="dropdown {{ request()->routeIs('categories.*') || request()->routeIs('sub-category.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="grid" style="stroke: #7CC404; width: 15px; height: 15px;"></i>
                    <span>Category</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('categories.index') }}">
                            <i data-feather="list" style="stroke: #c43a04; width: 14px; height: 14px;"></i>
                            <span>Category List</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('sub-category.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('sub-category.index') }}">
                            <i data-feather="layers" style="stroke: #2104c4; width: 14px; height: 14px;"></i>
                            <span>Sub Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Products Dropdown -->
            <li class="dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="shopping-bag" style="stroke: #FFAA1D;"></i>
                    <span>Products</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Product List</a>
                    </li>
                    <li class="{{ request()->routeIs('products.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.create') }}">Add Product</a>
                    </li>
                </ul>
            </li>

            <!-- Services Dropdown -->
            <li class="dropdown {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="briefcase" style="stroke: #0D6EFD;"></i>
                    <span>Services</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('services.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('services.index') }}">Add services</a>
                    </li>
                </ul>
            </li>

            <!-- FAQ Categories Dropdown (💡 ফিক্সড করা হলো) -->
            <li class="dropdown {{ request()->routeIs('faq.*') || request()->routeIs('faq.catagory.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="help-circle" style="stroke: #4dc142; width: 15px; height: 15px;"></i>
                    <span>FAQ Categories</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('faq.catagory.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('faq.catagory.index') }}">
                            <i data-feather="folder" style="stroke: #da6a08; width: 14px; height: 14px;"></i>
                            <span>FAQ Category</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('faq.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('faq.index') }}">
                            <i data-feather="file-text" style="stroke: #4d3acb; width: 14px; height: 14px;"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Web Setting Dropdown -->
            <li class="dropdown {{ request()->routeIs('web_settings.*') || request()->routeIs('contact.index') || request()->routeIs('payment.method') || request()->routeIs('about.us.index') || request()->routeIs('pages.index') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="settings" style="stroke: #e34031; width: 18px; height: 18px;"></i>
                    <span>Web Setting</span>
                </a>

                <ul class="dropdown-menu"
                    style="{{ request()->routeIs('web_settings.*') || request()->routeIs('contact.index') || request()->routeIs('payment.method') || request()->routeIs('about.us.index') || request()->routeIs('pages.index') ? 'display: block;' : 'display: none;' }}">

                    <li class="{{ request()->routeIs('web_settings.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('web_settings.index') }}">
                            <i data-feather="sliders" style="stroke: #14f227; width: 15px; height: 15px;"></i>
                            <span>Setting List</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('contact.index') }}">
                            <i data-feather="mail" style="stroke: #0d6efd; width: 15px; height: 15px;"></i>
                            <span>Contact</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('payment.method') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('payment.method') }}">
                            <i data-feather="credit-card" style="stroke: #198754; width: 15px; height: 15px;"></i>
                            <span>Payment Method</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('about.us.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('about.us.index') }}">
                            <i data-feather="info" style="stroke: #281987; width: 15px; height: 15px;"></i>
                            <span>About Us</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('pages.index') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('pages.index') }}">
                            <i data-feather="shield" style="stroke: #875719; width: 15px; height: 15px;"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>

    <a class="nav-link text-danger fw-bold" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">

        <i data-feather="log-out" style="stroke: #dc3545;"></i>
        <span class="ms-2 text-dark">Logout</span>
    </a>


    <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>



        </ul>
    </aside>
</div>
