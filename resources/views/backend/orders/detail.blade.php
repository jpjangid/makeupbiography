@extends('backend.layouts.app')

@section('title','Order Detail')

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
                        <h3 class="card-title">Order #{{ $order->order_no }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mb-4">
                                <h4>Order Details</h4>
                                <table class="table table-row-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Ordered Item</th>
                                            <th>Qty.</th>
                                            <th>Item Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->variant->product->name }} - {{ $item->variant->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->variant->sale_price }}</td>
                                            <td>{{ $item->variant->sale_price * $item->quantity }}</td>
                                        </tr>
                                        @endforeach
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
                                            <td>{{ $order->shiprocket_order_id }}</td>
                                            <td>{{ $order->shiprocket_shipment_id }}</td>
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
                                            <th>Billing Address</th>
                                            <th>Shpping Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->billing_name }} ({{$order->billing_mobile}})
                                                {{ $order->billing_address }} {{ $order->billing_city }}
                                                {{ $order->billing_state }} ({{ $order->billing_zip }})
                                            </td>
                                            <td>{{ $order->shipping_name }} ({{$order->shipping_mobile}})
                                                {{ $order->shipping_address }} {{ $order->shipping_city }}
                                                {{ $order->shipping_state }} ({{ $order->shipping_zip }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            <h4>Payment Details</h4>
                            <div class="col-md-12 mb-4">
                                <table class="table table-row-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Payment Mode</th>
                                            <th>Payment Status</th>
                                            <th>TOTAL AMOUNT</th>
                                            <th>Coupon Discount</th>
                                            <th>Shipping Charge</th>
                                            <th>Wallet Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ strtoupper($order->payment_mode) }}</td>
                                            <td>{{ strtoupper($order->payment_status) }}</td>
                                            <td>{{ $order->order_amount }}</td>
                                            <td>{{ $order->coupon_discount }}</td>
                                            <td>{{ $order->service_charge_applied }}</td>
                                            <td>{{ $order->wallet_amount }}</td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td></td>
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
@endsection