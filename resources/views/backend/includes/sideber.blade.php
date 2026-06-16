     <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('index') }}"> <img alt="image" src="{{asset('backend/assets/img/logo.png')}}" class="header-logo" /> <span
                class="logo-name">fruitables</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <i data-feather="shopping-cart" style="stroke: #FF5733; width: 18px; height: 18px;"></i>
                    <span class="ms-2">Manage Orders</span>
                </a>
            </li>


            <li class="dropdown {{ request()->routeIs('hero.slider.index.*') ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="sliders" style="stroke: #ec6332;"></i>


                    <span>Hero Slider</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('hero.slider.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('hero.slider.index') }}">
                        Add Hero Slider
                        </a>
                    </li>
                </ul>
            </li>


        <li class="dropdown {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid" style="stroke: #7CC404;"></i><span>Category</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('categories.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.index') }}">Category List</a></li>
                <li class="{{ request()->routeIs('categories.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.create') }}">Add Category</a></li>
            </ul>
        </li>

       <li class="dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="shopping-bag" style="stroke: #FFAA1D;"></i>

                <span>Products</span>
            </a>

            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        Product List
                    </a>
                </li>

                <li class="{{ request()->routeIs('products.create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('products.create') }}">
                        Add Product
                    </a>
                </li>
            </ul>
        </li>

          <li class="dropdown {{ request()->routeIs('services.index.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="briefcase" style="stroke: #0D6EFD;"></i>

                <span>Services</span>
            </a>

            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('services.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('services.index') }}">
                     Add services
                    </a>
                </li>

                {{-- <li class="{{ request()->routeIs('services.create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('services.create') }}">
                         Create services
                    </a>
                </li> --}}
            </ul>
        </li>

        <li class="dropdown {{ request()->routeIs('faq.catagory.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="help-circle" style="stroke: #6F42C1;"></i>

                <span>FAQ Categories</span>
            </a>

            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('faq.catagory.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('faq.catagory.index') }}">
                        FAQ Category
                    </a>
                </li>

                <li class="{{ request()->routeIs('faq.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('faq.index') }}">
                         FAQ
                    </a>
                </li>
            </ul>
        </li>

      <li class="dropdown {{ request()->routeIs('web_settings.index.*', 'web_settings.index', 'contact.index', 'payment.method') ? 'active' : '' }}">
    <a href="#" class="menu-toggle nav-link has-dropdown">
        <i data-feather="settings" style="stroke: #e34031; width: 18px; height: 18px;"></i>
        <span>Web Setting</span>
    </a>

    <ul class="dropdown-menu">
        <!-- 1. Setting List Item -->
        <li class="{{ request()->routeIs('web_settings.index') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('web_settings.index') }}">
                <!-- স্লাইডার বা কনফিগারেশন লিস্ট আইকন -->
                <i data-feather="sliders" style="stroke: #6c757d; width: 15px; height: 15px;"></i>
                <span>Setting List</span>
            </a>
        </li>

        <!-- 2. Contact Item -->
        <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('contact.index') }}">
                <!-- মেইল বা ফোন বুক আইকন -->
                <i data-feather="mail" style="stroke: #0d6efd; width: 15px; height: 15px;"></i>
                <span>Contact</span>
            </a>
        </li>

        <!-- 3. Payment Method Item -->
        <li class="{{ request()->routeIs('payment.method') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('payment.method') }}">
                <!-- ক্রেডিট কার্ড বা পেমেন্ট আইকন -->
                <i data-feather="credit-card" style="stroke: #198754; width: 15px; height: 15px;"></i>
                <span>Payment Method</span>
            </a>
        </li>
    </ul>
</li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Email</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
                <li><a class="nav-link" href="email-compose.html">Compose</a></li>
                <li><a class="nav-link" href="email-read.html">read</a></li>
              </ul>
            </li>


          </ul>
        </aside>
      </div>
