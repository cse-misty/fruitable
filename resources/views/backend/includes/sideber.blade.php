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
        <li class="dropdown {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Category</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('categories.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.index') }}">Category List</a></li>
                <li class="{{ request()->routeIs('categories.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.create') }}">Add Category</a></li>
            </ul>
            </li>

       <li class="dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="command"></i>
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

        <li class="dropdown {{ request()->routeIs('faq.catagory.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="command"></i>
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

        <li class="dropdown {{ request()->routeIs('web_settings.index.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown">
                <i data-feather="command"></i>
                <span>Web Setting</span>
            </a>

            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('web_settings.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('web_settings.index') }}">
                       Setting List
                    </a>
                </li>

                <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact.index') }}">
                         Contact
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
