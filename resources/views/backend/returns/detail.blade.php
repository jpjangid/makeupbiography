@extends('backend.layouts.app')

@section('css')
<!-- Status message -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('title','Return Detail')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Return Order #{{ $return_order->return_no }}</h3>
                        <a href="{{ url('admin/returns') }}" class="btn btn-warning btn-sm" style="height: 3rem;width: 6rem;margin-top: 1rem;padding: 1rem;">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h4>Order Status</h4>
                                <input type="hidden" value="{{ $return_order->id }}" id="return_order_id">
                                <select class="form-select form-select-solid" id="status">
                                    <option value="Pending" {{ $return_order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Return Approved" {{ $return_order->status == 'Return Approved' ? 'selected' : '' }}>Return Approved</option>
                                    <option value="Exchange Initiated" {{ $return_order->status == 'Exchange Initiated' ? 'selected' : '' }}>Exchange Initiated</option>
                                    <option value="Exchange Approved" {{ $return_order->status == 'Exchange Approved' ? 'selected' : '' }}>Exchange Approved</option>
                                    <option value="Exchange Completed" {{ $return_order->status == 'Exchange Completed' ? 'selected' : '' }}>Exchange Completed</option>
                                    <option value="Return/Exchange Rejected" {{ $return_order->status == 'Return/Exchange Rejected' ? 'selected' : '' }}>Return/Exchange Rejected</option>
                                    <option value="Refund Completed Via Acc" {{ $return_order->status == 'Refund Completed Via Acc' ? 'selected' : '' }}>Refund Completed Via Acc</option>
                                    <option value="Refund Completed Via Voucher" {{ $return_order->status == 'Refund Completed Via Voucher' ? 'selected' : '' }}>Refund Completed Via Voucher</option>
                                    @if(empty($order->shiprocket_order_id) && empty($order->shiprocket_shipment_id))
                                        <option value="Cancel Approved" {{ $return_order->status == 'Cancel Approved' ? 'selected' : '' }}>Cancel Approved</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4>Payment Status</h4>
                                <input type="text" class="form-control form-control-solid" value="{{ $order->payment_status == 'success' ? 'Success' : 'Pending' }}" disabled>
                            </div>
                            <div class="col-md-12 mb-4">
                                <h4>Item Details</h4>
                                <table class="table table-row-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Ordered Item</th>
                                            <th>Qty.</th>
                                            <th>Item Price</th>
                                            <th>Amount</th>
                                            <th>Reason</th>
                                            <th>Description</th>
                                            <th>Return Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ asset('storage/products/variants/'.$image) }}" alt="{{ $image }}" style="height: 5rem;"></td>
                                            <td>{{ $return_order->variant->product->name }} - {{ $return_order->variant->name }}</td>
                                            <td>{{ $return_order->quantity }}</td>
                                            <td>{{ number_format((float)$return_order->variant->sale_price, 2, '.', '') }}</td>
                                            <td>{{ number_format((float)$return_order->variant->sale_price * $return_order->quantity, 2, '.', '') }}</td>
                                            <td>{{ $return_order->reason }}</td>
                                            <td>{{ $return_order->description }}</td>
                                            <td>{{ number_format((float)$total, 2, '.', '') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            <h4>Shiprocket Tracking Details</h4>
                            <div class="col-md-12 mb-4">
                                <table class="table table-row-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Shipment ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $return_order->shiprocket_order_id }}</td>
                                            <td>{{ $return_order->shiprocket_shipment_id }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            <h4>Address Information</h4>
                            <div class="col-md-12 mb-4">
                                <table class="table table-row-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Shpping Address</th>
                                            <th>Billing Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $return_order->order->shipping_name }} ({{$return_order->order->shipping_mobile}}),
                                                {{ $return_order->order->shipping_address }}, {{ $return_order->order->shipping_city }},
                                                {{ $return_order->order->shipping_state }} ({{ $return_order->order->shipping_zip }})
                                            </td>
                                            <td>{{ $return_order->order->billing_name }} ({{$return_order->order->billing_mobile}}),
                                                {{ $return_order->order->billing_address }}, {{ $return_order->order->billing_city }},
                                                {{ $return_order->order->billing_state }} ({{ $return_order->order->billing_zip }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--/.col (left) -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('js')
<script>
    $(document).on('change', '#status', function() {
        var status = $('#status').val();
        var id = $('#return_order_id').val();
        $.ajax({
            url: "{{ url('admin/returns/update') }}",
            type: "POST",
            dataType: "json",
            data: {
                status: status,
                id: id,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                location.reload();
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);

            }
        });
    });
</script>
@endsection