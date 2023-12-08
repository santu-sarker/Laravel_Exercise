<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Entertech BD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>


            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link ">

                        <p>
                            My Contact
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" id="add_contact" class="nav-link">
                                {{-- <i class="fa-regular fa"></i> --}}
                                Add Contact
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">
                            <a href="{{ url('home') }}" id="add_contact"
                                class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                                {{-- <i class="fa-regular fa"></i> --}}
                                your Personal Contact
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/server_side') }}" id="add_contact"
                                class="nav-link {{ Request::is('server_side') ? 'active' : '' }}">
                                {{-- {{ (request()->is('/server_side*')) ? 'active' : 'not aactice' }} --}}

                                {{-- <i class="fa-regular fa"></i> --}}
                                Sever Side Rendering
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link ">

                        <p>
                            Global Contact
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url("/global_contact") }}"
                                class="nav-link {{ Request::is('global_contact') ? 'active' : '' }}">
                                {{-- <i class="fa-regular fa"></i> --}}
                                All Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("global_contact/my_contact") }}"
                                class="nav-link {{ Request::is('global_contact/my_contact') ? 'active' : '' }}">
                                {{-- <i class="fa-regular fa"></i> --}}
                                Your Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("/global_contact/add_contact") }}"
                                class="nav-link {{ Request::is('global_contact/add_contact') ? 'active' : '' }}">
                                {{-- <i class="fa-regular fa"></i> --}}
                                Create New
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>