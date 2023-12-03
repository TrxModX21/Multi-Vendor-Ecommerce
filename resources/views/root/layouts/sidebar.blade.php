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

            {{-- MANAGE ORDER START --}}
            <li
                class="dropdown {{ setActive(['root.order.*', 'root.pending-order', 'root.processed-order', 'root.droppedoff-order', 'root.shipped-order', 'root.out-for-delivery-order', 'root.delivered-order', 'root.canceled-order']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Order</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.order.*']) }}">
                        <a class="nav-link" href="{{ route('root.order.index') }}">All Order</a>
                    </li>
                    <li class="{{ setActive(['root.pending-order']) }}">
                        <a class="nav-link" href="{{ route('root.pending-order') }}">All Pending Orders</a>
                    </li>
                    <li class="{{ setActive(['root.processed-order']) }}">
                        <a class="nav-link" href="{{ route('root.processed-order') }}">All Processed Orders</a>
                    </li>
                    <li class="{{ setActive(['root.droppedoff-order']) }}">
                        <a class="nav-link" href="{{ route('root.droppedoff-order') }}">All Dropped Off Orders</a>
                    </li>
                    <li class="{{ setActive(['root.shipped-order']) }}">
                        <a class="nav-link" href="{{ route('root.shipped-order') }}">All Shipped Orders</a>
                    </li>
                    <li class="{{ setActive(['root.out-for-delivery-order']) }}">
                        <a class="nav-link" href="{{ route('root.out-for-delivery-order') }}">All Out For Delivery
                            Orders</a>
                    </li>
                    <li class="{{ setActive(['root.delivered-order']) }}">
                        <a class="nav-link" href="{{ route('root.delivered-order') }}">All Delivered Orders</a>
                    </li>
                    <li class="{{ setActive(['root.canceled-order']) }}">
                        <a class="nav-link" href="{{ route('root.canceled-order') }}">All Canceled Orders</a>
                    </li>
                </ul>
            </li>
            {{-- MANAGE ORDER END --}}

            {{-- MANAGE PRODUCTS START --}}
            <li
                class="dropdown {{ setActive(['root.brand.*', 'root.products.*', 'root.products-image-gallery.*', 'root.products-variant.*', 'root.products-variant-item.*', 'root.seller-product.*', 'root.seller-pending-product.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Products</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.brand.*']) }}">
                        <a class="nav-link" href="{{ route('root.brand.index') }}">Brands</a>
                    </li>
                    <li
                        class="{{ setActive(['root.products.*', 'root.products-image-gallery.*', 'root.products-variant.*', 'root.products-variant-item.*']) }}">
                        <a class="nav-link" href="{{ route('root.products.index') }}">Products</a>
                    </li>
                    <li class="{{ setActive(['root.seller-product.*']) }}">
                        <a class="nav-link" href="{{ route('root.seller-product.index') }}">Seller Products</a>
                    </li>
                    <li class="{{ setActive(['root.seller-pending-product.*']) }}">
                        <a class="nav-link" href="{{ route('root.seller-pending-product.index') }}">Seller Pending
                            Products</a>
                    </li>
                </ul>
            </li>
            {{-- MANAGE PRODUCTS END --}}

            {{-- MANAGE ECOMERCE START --}}
            <li
                class="dropdown {{ setActive(['root.vendor-profile.*', 'root.flash-sale.*', 'root.coupons.*', 'root.shipping-rule.*', 'root.payment-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>E-Comerce</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['root.flash-sale.*']) }}">
                        <a class="nav-link" href="{{ route('root.flash-sale.index') }}">Flash Sale</a>
                    </li>
                    <li class="{{ setActive(['root.coupons.*']) }}">
                        <a class="nav-link" href="{{ route('root.coupons.index') }}">Coupons</a>
                    </li>
                    <li class="{{ setActive(['root.shipping-rule.*']) }}">
                        <a class="nav-link" href="{{ route('root.shipping-rule.index') }}">Shipping Rule</a>
                    </li>
                    <li class="{{ setActive(['root.vendor-profile.*']) }}">
                        <a class="nav-link" href="{{ route('root.vendor-profile.index') }}">Vendor Profile</a>
                    </li>
                    <li class="{{ setActive(['root.payment-setting.*']) }}">
                        <a class="nav-link" href="{{ route('root.payment-setting.index') }}">Payment Settings</a>
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

            <li><a class="nav-link" href="{{ route('root.settings.index') }}"><i class="far fa-square"></i>
                    <span>Settings</span></a></li>
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
