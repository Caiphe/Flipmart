@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('admin.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Flitmart</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Brand</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="inbox"></i>
                    <span>Category</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}">
                        <a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a>
                    </li>
                    <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}">
                        <a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub-Category</a>
                    </li>
                    <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}">
                        <a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub Sub-Category</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="package"></i>
                    <span>Products</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add.product' ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Products</a></li>
                    <li class="{{ $route == 'manage.product' ? 'active' : '' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Mailbox</span> <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>

                <ul class="treeview-menu">
                    <li><a href=""><i class="ti-more"></i>Inbox</a></li>
                    <li><a href=""><i class="ti-more"></i>Compose</a></li>
                    <li><a href=""><i class="ti-more"></i>Read</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Pages</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="ti-more"></i>Profile</a></li>
                    <li><a href=""><i class="ti-more"></i>Invoice</a></li>
                    <li><a href=""><i class="ti-more"></i>Gallery</a></li>
                    <li><a href=""><i class="ti-more"></i>FAQs</a></li>
                    <li><a href=""><i class="ti-more"></i>Timeline</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="ti-more"></i>Alerts</a></li>
                    <li><a href=""><i class="ti-more"></i>Badge</a></li>
                    <li><a href=""><i class="ti-more"></i>Buttons</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href=""><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href=""><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
