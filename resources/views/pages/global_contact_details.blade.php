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
<script src="{{ asset('js/global_contact.js') }}"></script>
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
@include('sub_views.sidebar')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12 justify-content-center ">
                    <div class="card mt-5">
                        <div class="card-header row mx-2">
                            <div class="col-sm-10 col-md-6">
                                <h2 class="card-title text-center">Contact Details</h2>
                            </div>
                            <div class="col-sm-10 col-md-6 d-flex justify-content-end">

                                {{-- <div class="mr-2">
                                    <a href="{{ url("global_contact/add_to_contact/{$details->id}") }}">
                                        <button class="btn btn-outline-primary btn-xs">
                                            Add To Your Contact
                                        </button>
                                    </a>
                                </div> --}}
                                @can('eligible_to_add',$contact)
                                <div class="mr-2">
                                    <a href="{{ url("global_contact/add_to_contact/{$details->id}") }}">
                                        <button class="btn btn-outline-primary btn-xs">
                                            Add To Your Contact
                                        </button>
                                    </a>
                                </div>
                                @endcan
                                @can('eligible_to_manipulate',$contact)
                                <div class="mr-2">
                                    <button class="btn btn-outline-warning btn-xs edit_global_contact"
                                        value="{{ $details->id }}">
                                        Edit
                                    </button>
                                </div>

                                <div class="mr-2">
                                    <a href="{{ url("global_contact/delete/{$details->id}") }}">
                                        <button class="btn btn-outline-danger btn-xs">
                                            Delete
                                        </button>
                                    </a>
                                </div>
                                @endcan


                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body justify-content-center">
                            <table class="table table-bordered table-responsive">

                                <tbody>
                                    <tr>
                                        <th>Contact ID</th>
                                        <td>{{ $details->id }}</td>

                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $details->name }}</td>

                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $details->email }}</td>

                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $details->phone }}</td>

                                    </tr>
                                    <tr>
                                        <th>Company</th>
                                        <td>{{ $details->company }}</td>

                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $details->address }}</td>

                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $details->gender }}</td>

                                    </tr>
                                    <tr>
                                        <th>Contact Created By</th>
                                        <td>{{ $details->created_by }}</td>

                                    </tr>



                                </tbody>
                            </table>
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
@include('sub_views.edit_global_modal')
@endsection