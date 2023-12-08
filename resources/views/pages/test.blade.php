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
<link rel="stylesheet" href="./css/admin_dashboard.css">
<!-- DataTables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

<!-- Toastr -->
<link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">

{{-- custom css file --}}
<link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">


@endsection

{{-- custom js scripts --}}
@section('js-scripts')

<!-- Bootstrap -->
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
{{-- <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> --}}
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
{{-- <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
{{-- select 2 --}}

<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->
<script src="{{ asset('js/server_side_operation.js') }}"></script>
<script>
    var load_table =  $(function () {
    $("#contact_datatable").DataTable({
        // dom: 'Blfrtip',
        "responsive": true,
    //   "responsive": true, "lengthChange": false, "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": '{{ url('/server_side') }}',
        "columns": [
            {data: 'id' , name: 'id'},
            {data: 'name' , name:'name',searchable:true},
            {data: 'email' , name:'email',searchable:true,orderable:false},
            {data: 'phone' , name:'phone',searchable:true,orderable:false},
            {data: 'company' , name:'company',searchable:true},
            {data: 'gender' , name:'gender',orderable:false},
            {data: 'address' , name:'address',orderable:false},
            {data: 'delete' , name:'delete',orderable:false},
            // {
            //     orderable:true,
            //     searchable:true
            // }

        ],
        columnDefs:[{
            "targets": [7],
            // "searchable": false,
            // visible: true
            className: 'text-center'
        }]
        ,
        language:{
            processing: ` <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                        </div>`,
                        /*

                       */
        }

    });

  });

//   ----------------

//   ----------------
  @if (Session::has('msg'))
        let type="{{ Session::get('type')}}";
        switch(type){
            case 'success':
                toastr.success("{{ Session::get('msg') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('msg') }}");
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
<script src="{{ asset('js/dashboard_edit.js') }}"></script>
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
                                        <th>Delete</th>
                                        {{-- <th>Edit</th>
                                        <th>Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

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