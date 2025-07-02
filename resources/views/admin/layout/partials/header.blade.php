<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-icon d-xl-none">
                <i class="bi bi-list"></i>
            </div>
            <div class="top-navbar-right ms-3 ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            data-bs-toggle="dropdown">
                            <div class="user-setting d-flex align-items-center gap-1">
                                <img src="{{ url('public/admin/assets/images/avatars/avatar-1.png') }}" class="user-img"
                                    alt="">
                                <div class="user-name d-none d-sm-block">{{ Auth()->user()->name }}</div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="get" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item d-flex align-items-center bg-transparent border-0 w-100 p-0">
                                        <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                        <div class="setting-text ms-3"><span>Logout</span></div>
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--end top header-->

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <a href="{{ route('dashboard') }}">
                    <img src="{{ url('public/frontend/img/prowebshop_logo_head.png') }}" class="logo-" alt="logo icon"
                        width="150px">
                </a>
            </div>
            <!-- <div>
                <h4 class="logo-text">Prowebshop</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div> -->
        </div>
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <div class="parent-icon"><i class="bi bi-house-door"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>


            <li class="menu-title">

                <a class="nav-link {{ request()->routeIs(['contact.us.list']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['contact.us.list']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('contact.us.list') }}">
                    <div class="parent-icon">	<i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="menu-title">Contact Us </div>
                </a>
            </li>
            <li class="menu-title">

                <a class="nav-link {{ request()->routeIs(['orders.list']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['orders.list']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('orders.list') }}">
                    <div class="parent-icon"> <i class="bi bi-box-seam me-2"></i>
                    </div>
                    <div class="menu-title">Orders </div>
                </a>
            </li>
            <li class="menu-title">
                {{-- <a
                    class="nav-link {{ request()->routeIs(['blogs', 'create-blog', 'update-blog']) ? 'active' : '' }}"
                    href="{{ route('blogs') }}"> --}}
                <a class="nav-link {{ request()->routeIs(['types', 'addtypes']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['types', 'addtypes']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('types') }}">
                    <div class="parent-icon"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="menu-title">Types</div>
                </a>
            </li>
            <li class="menu-title">
                <a class="nav-link {{ request()->routeIs(['packages', 'addPackages', 'update-package']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['packages', 'addPackages', 'update-package']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('packages') }}">
                    <div class="parent-icon"><i class="bi bi-box"></i></i></div>
                    <div class="menu-title">Add Packages</div>
                </a>
            </li>
            <li class="menu-title">
                {{-- <a
                    class="nav-link {{ request()->routeIs(['blogs', 'create-blog', 'update-blog']) ? 'active' : '' }}"
                    href="{{ route('blogs') }}"> --}}
                <a class="nav-link {{ request()->routeIs(['blogCategorys', 'create-blogCategory']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['blogCategorys', 'create-blogCategory']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('blogCategorys') }}">
                    <div class="parent-icon"><i class="bi bi-grid"></i>
                        </i></div>
                    <div class="menu-title">Blog Category</div>
                </a>
            </li>
            <li class="menu-title">
                {{-- <a
                    class="nav-link {{ request()->routeIs(['blogs', 'create-blog', 'update-blog']) ? 'active' : '' }}"
                    href="{{ route('blogs') }}"> --}}
                <a class="nav-link {{ request()->routeIs(['blogss', 'create-blog']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['blogss', 'create-blog']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('blogss') }}">
                    <div class="parent-icon"><i class="bi bi-book"></i></i></div>
                    <div class="menu-title">Blog</div>
                </a>
            </li>
            <li class="menu-title">
                {{-- <a
                    class="nav-link {{ request()->routeIs(['blogs', 'create-blog', 'update-blog']) ? 'active' : '' }}"
                    href="{{ route('blogs') }}"> --}}
                <a class="nav-link {{ request()->routeIs(['setting']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['setting']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('setting') }}">
                    <div class="parent-icon"><i class="bi bi-gear"></i></div>
                    <div class="menu-title">Setting</div>

                </a>
            </li>

            <li class="menu-title">
                <a class="nav-link {{ request()->routeIs(['logout']) ? 'active' : '' }}"
                    style="{{ request()->routeIs(['logout']) ? 'color: #3461ff0; background-color:  rgba(52, 97, 255, 0.1)' : '' }}"
                    href="{{ route('logout') }}">
                    <div class="parent-icon"><i class="bi bi-box-arrow-right"></i>
                    </div>
                    <div class="menu-title">Logout</div>

                </a>
            </li>

    </aside>
