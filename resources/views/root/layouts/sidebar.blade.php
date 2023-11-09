<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('root.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Starter</li>

            {{-- MANAGE CATEGORIES START --}}
            <li class="dropdown {{ setActive(['root.category.*', 'root.sub-category.*', 'root.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.category.*']) }}">
                        <a class="nav-link" href="{{ route('root.category.index') }}">Category</a>
                    </li>
                    <li class="{{ setActive(['root.sub-category.*']) }}">
                        <a class="nav-link" href="{{ route('root.sub-category.index') }}">Sub Category</a>
                    </li>
                    <li class="{{ setActive(['root.child-category.*']) }}">
                        <a class="nav-link" href="{{ route('root.child-category.index') }}">Child Category</a>
                    </li>
                </ul>
            </li>
            {{-- MANAGE CATEGORIES END --}}

            {{-- MANAGE PRODUCTS START --}}
            <li class="dropdown {{ setActive(['root.brand.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Products</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.brand.*']) }}">
                        <a class="nav-link" href="{{ route('root.brand.index') }}">Brands</a>
                    </li>
                    <li class="{{ setActive(['root.brand.*']) }}">
                        <a class="nav-link" href="{{ route('root.brand.index') }}">Products</a>
                    </li>
                </ul>
            </li>
            {{-- MANAGE PRODUCTS END --}}

            {{-- MANAGE ECOMERCE START --}}
            <li class="dropdown {{ setActive(['root.vendor-profile.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>E-Comerce</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.vendor-profile.*']) }}">
                        <a class="nav-link" href="{{ route('root.vendor-profile.index') }}">Vendor Profile</a>
                    </li>
                </ul>
            </li>
            {{-- MANAGE WEBSITE END --}}

            {{-- MANAGE WEBSITE START --}}
            <li class="dropdown {{ setActive(['root.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Website</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.slider.*']) }}">
                        <a class="nav-link" href="{{ route('root.slider.index') }}">Slider</a>
                    </li>
                </ul>
            </li>
            {{-- MANAGE WEBSITE END --}}

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li> --}}

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                        Page</span></a></li> --}}
        </ul>
    </aside>
</div>
