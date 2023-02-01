@extends('layouts.user_layout')

@section('page_title')
Create New Contact
@endsection

{{-- custom css file --}}
@section('css-scripts')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
{{-- select 2 --}}
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

{{-- custom js scripts --}}
@section('js-scripts')

<!-- Bootstrap -->
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
{{-- select 2 --}}

<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->
<script>


</script>
<script src="{{ asset('js/contact.js') }}"></script>
@endsection
@section('navbar')
@include('sub_views.user_navbar')

@endsection

{{-- main content section start --}}
@section('main_content')
{{-- @php
if(Session::has('errors'){
dd($errors)
})
@endphp --}}
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
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
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('home') }}" id="add_contact" class="nav-link">
                                {{-- <i class="fa-regular fa"></i> --}}
                                your Personal Contact
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
                            <a href="{{ url("/global_contact") }}" class="nav-link">
                                {{-- <i class="fa-regular fa"></i> --}}
                                All Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("global_contact/my_contact") }}" class="nav-link">
                                {{-- <i class="fa-regular fa"></i> --}}
                                Your Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("/global_contact/add_contact") }}" class="nav-link">
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

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">Add Contact To Global Section</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body justify-content-center">
                            <form action="{{  route('global_add_contact') }}" method="post">
                                @csrf

                                <div class="row justify-content-center">
                                    <label for="name" class="col-sm-12 col-md-1 col-form-label">Name</label>

                                    <div class="col-sm-10 col-md-7">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name','global_contact') is-invalid @enderror"
                                            placeholder="Enter user Name" value="{{ old('name') }}" autofocus />
                                        @error('name','global_contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <label for="email" class="col-sm-12 col-md-1 col-form-label">Email</label>
                                    <div class="col-sm-10 col-md-7">
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email','global_contact') is-invalid @enderror"
                                            placeholder="Enter user Email Address" value="{{ old('email') }}"
                                            autofocus />
                                        @error('email','global_contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <label for="phone" class="col-sm-12 col-md-1 col-form-label">Phone</label>
                                    <div class="col-sm-10 col-md-7">
                                        <input type="string" name="phone" id="phone"
                                            class="form-control @error('phone','global_contact') is-invalid @enderror"
                                            placeholder="Enter Contact Number" value="{{ old('phone') }}" autofocus />
                                        @error('phone','global_contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <label for="company" class="col-sm-12 col-md-1 col-form-label">Company</label>
                                    <div class="col-sm-10 col-md-7">
                                        <input type="text" name="company" id="company"
                                            class="form-control @error('company','global_contact') is-invalid @enderror"
                                            placeholder="Enter company Name" value="{{ old('company') }}" autofocus />
                                        @error('company','global_contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <label for="address" class="col-sm-12 col-md-1 col-form-label">Address</label>
                                    <div class="col-sm-10 col-md-7">
                                        <input type="text" name="address" id="address"
                                            class="form-control @error('address','global_contact') is-invalid @enderror"
                                            placeholder="Enter User Address" value="{{ old('address') }}" autofocus />
                                        @error('address','global_contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                        @enderror
                                    </div>
                                </div>

                                <div class="row my-3 justify-content-center">

                                    <div class="form-check col-md-2 col-sm-3 justify-content-center">
                                        <input class="form-check-input gender" type="radio" name="gender" id="male"
                                            value="Male" />
                                        <label class="form-check-label" for="male">male</label>
                                    </div>
                                    <div class="form-check col-sm-3 col-md-1 justify-content-center">
                                        <input class="form-check-input gender" type="radio" name="gender" id="female"
                                            value="Female" />
                                        <label class="form-check-label " for="female">female</label>

                                    </div>
                                    @error('gender','global_contact')
                                    <div class="d-block text-center ">
                                        <p style="color:red ; font-size:13px"> {{ $message }} </p>
                                    </div>

                                    @enderror

                                </div>

                                <div class="row my-3 justify-content-center">
                                    <div class="col-sm-10 col-md-6">
                                        <button class="btn btn-lg btn-primary btn-block" id="global_contact"
                                            type="submit">
                                            Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('modals')
@include('sub_views.add_contact')
@include('sub_views.edit_modal')
@include('sub_views.delete_modal')
@endsection
