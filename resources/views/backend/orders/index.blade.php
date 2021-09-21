@extends('backend.layouts.app')

@section('title','Orders')

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
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-row-bordered table-hover text-nowrap" id="orderTable">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Total Amount</th>
                                    <th>Order Date</th>
                                    <th>Special Requirement</th>
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

@endsection('content')

@section('js')

<!-- Soft Delete -->
<script type="text/javascript">
    var orderTable = $('#orderTable').DataTable({
        processing: true,
        serverSide: true,
        url: "{{ url('admin/orders') }}",
        columns: [{
                data: 'orderno',
                name: 'orderno'
            },
            {
                data: 'client',
                name: 'client'
            },
            {
                data: 'order_status',
                name: 'order_status'
            },
            {
                data: 'payment_status',
                name: 'payment_status'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'order_comments',
                name: 'order_comments'
            },
        ]
    });
</script>
@endsection