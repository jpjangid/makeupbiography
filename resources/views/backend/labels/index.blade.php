@extends('backend.layouts.app')

@section('title','Label')

@section('css')
<!-- Status message -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')

<!-- alerts start -->
@if ($message = Session::get('success'))
<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h5 class="mb-1">Success</h5>
        <span>{{ $message }}</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <span class="svg-icon svg-icon-2x svg-icon-light" style="color:white !important"><i class="fas fa-times"></i></i></span>
    </button>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h5 class="mb-1">Danger</h5>
        <span>{{ $message }}</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <span class="svg-icon svg-icon-2x svg-icon-light" style="color:white !important"><i class="fas fa-times"></i></i></span>
    </button>
</div>
@endif
<!-- alerts end -->

<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools mt-4">
                            <a href="{{ url('admin/labels/create') }}" class="btn btn-active-light-primary">
                                + Add Label
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-row-bordered table-hover text-nowrap" id="labelTable">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>Label</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>

@endsection

@section('js')

<!-- Soft Delete -->
<script type="text/javascript">
    var materialTable = $('#labelTable').DataTable({
        processing: true,
        serverSide: true,
        url: "{{ url('admin/labels') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'active', name: 'status'}, 
            {data: 'action', name: 'action'},
        ]
    });
</script> 

<!-- Change Status -->
<script>
    $('.js-switch').change(function() {
        alert("hello");
        var row = $(this).closest('tr');
        let status = row.find('.js-switch').val();
        let labelId = row.find('.label_id').val();
        $.ajax({
            url: "{{ url('admin/labels/update_status') }}",
            type: "POST",
            dataType: "json",
            data: {
                status: status,
                label_id: labelId,
                _token: '{{csrf_token()}}' 
            },
            success: function(data) {
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            }
        });
    });
</script>

@endsection