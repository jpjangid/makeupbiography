@extends('backend.layouts.app')

@section('title','Coupon')

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
                            <a href="{{ url('admin/coupons/create') }}" class="btn btn-active-light-primary">
                                + Add Coupon
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-row-bordered table-hover text-nowrap" id="couponTable">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>Coupon Name</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Start Time</th>
                                    <th>Coupon End Time</th>
                                    <th>Days</th>
                                    <th>Created On</th>
                                    <th>Show In Front</th>
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

@endsection('content')

@section('js')

<!-- Soft Delete -->
<script type="text/javascript">
    var couponTable = $('#couponTable').DataTable({
        processing: true,
        serverSide: true,
        url: "{{ url('admin/coupons') }}",
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'code',
                name: 'code'
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'offer_start',
                name: 'offer_start'
            },
            {
                data: 'offer_end',
                name: 'offer_end'
            },
            {
                data: 'days',
                name: 'days'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'active',
                name: 'active'
            },
            {
                data: 'action',
                name: 'action'
            },
        ]
    });
</script>

<!-- Change Status -->
<script>
    $(document).on('change','.show_in_front',function() {
        var row = $(this).closest('tr');
        let show_in_front = row.find('.show_in_front').val();
        let couponId = row.find('.coupon_id').val();
        $.ajax({
            url: "{{ url('admin/coupons/update_status') }}",
            type: "POST",
            dataType: "json",
            data: {
                show_in_front: show_in_front,
                coupon_id: couponId,
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