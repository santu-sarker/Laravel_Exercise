@extends('layouts.user_layout')

@section('page_title')
Home Page
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
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
{{-- select 2 --}}
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
{{-- select 2 --}}

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
    var contact_table = $("#contact_datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-8:eq(0)');

  });

  @if (Session::has('msg'))
        let type="{{ Session::get('type')}}";
        switch(type){
            case 'success':
                toastr.success("{{ Session::get('msg') }}");
                break;
            case 'warning':
                toastr.error("{{ Session::get('msg') }}");
                break;

            case 'info':
                toastr.info("{{ Session::get('msg') }}");
                break;
        }

  @endif
  @if (Session::has('errors'))
  let msg_data = "{{ Session::get('errors') }}";
      console.log(msg_data);
  @endif

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
@include('sub_views.sidebar')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">All Contact Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="contact_datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        {{-- giving each td a class so that it will be easy to find td on edit modal tr
                                        row --}}
                                        <td class="id">{{ $contact->contact_id }}</td>
                                        <td class="name">{{ $contact->name }}</td>
                                        <td class="email">{{ $contact->email }}</td>
                                        <td class="phone">{{ $contact->phone }}</td>
                                        <td class="company">{{ $contact->company }}</td>
                                        <td class="gender">{{ $contact->gender }}</td>
                                        <td class="address">{{ $contact->address }}</td>
                                        <td><button class="btn btn-outline-warning btn-xs edit_contact"
                                                value="{{ $contact->contact_id }}">Edit</button></td>
                                        {{-- <td>
                                            @can('delete' , App\Models\Contact::class)
                                            <button class="btn btn-outline-danger btn-xs delete_contact"
                                                value="{{$contact->contact_id}}">Delete</button>
                                            @endcan

                                        </td> --}}
                                        <td> <button class="btn btn-outline-danger btn-xs delete_contact"
                                                value="{{$contact->contact_id}}">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach



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
@endsection