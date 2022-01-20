<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .card {
            width: 500px;
            text-align: center;
            margin: auto;
            background-image: linear-gradient(to bottom, #008B8B, #20B2AA);
            border: 1px solid #008B8B;
        }

        .inner-card {
            max-width: 450px;
            margin: 20px;
            background-color: #F0FFFF;
            border: 1px solid #008B8B;
            font-family: 'Times New Roman', Times, serif;
        }

        .logo {
            width: 45%;
            text-align: center;
        }

        .order {
            background-color: #20B2AA;
            color: white;
            font-size: 18px;
        }

        .head {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .summary-head {
            font-size: 20px;
        }

        th {
            text-align: left;
        }

        .productTable {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="inner-card">
            <img src="{{ asset('images/mblogo.png') }}" alt="company-logo" class="logo">
            <section class="order">
                <p class="head">{{ strtoupper($status) }}</p>
                <p style="text-align: center; padding-left:20px; padding-right:20px;">{{ $message }}</p>
            </section>
            <p class="summary-head">Order Summary</p>
            @php $image = ''; @endphp
            @foreach($order->items as $key => $item)
            @php $image = isset($image[$key]) ? $image[$key] : ''; @endphp
            <table class="table-sm table-borderless productTable">
                <tr>
                    <td rowspan="12"><img src="{{ asset('storage/products/variants/'.$image) }}" style="float:left; height:60%; width:60%;"></td>
                </tr>
                <tr>
                    <th style="width:35%;">Product</th>
                    <td style="width:35%;">{{ $item->product->item_shade_name }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Quantity</th>
                    <td style="width:35%;">{{ $item->quantity }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Price</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$item->product->regular_price, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Sub Total</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$item->product->regular_price * $item->quantity, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Total Amount</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$item->product->regular_price * $item->quantity, 2, '.', '') }}</td>
                </tr>
            </table>
            <hr>
            @php $image = ''; @endphp
            @endforeach
            <table width="100%" style="margin: 1rem;">
                <tr>
                    <th style="width:35%;">Product Total</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$order->order_amount + $order->discount_applied, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Product Discount</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$order->discount_applied - $order->coupon_discount, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Sub Total</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$order->order_amount, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Coupon Discount</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$order->coupon_discount, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Shipping Charge</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$order->service_charge_applied	, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <th style="width:35%;">Total Amount</th>
                    <td style="width:35%;">&#8377; {{ number_format((float)$order->total_amount	, 2, '.', '') }}</td>
                </tr>
            </table>
            <br>
            <p class="summary-head">Address Details</p>
            <table width="100%" style="border: 1px solid black;">
                <tr>
                    <td><b>Billing</b></td>
                    <td><b>Shipping</b></td>
                </tr>
                <tr>
                    <td>{{ $order->billing_name }}</td>
                    <td>{{ $order->shipping_name }}</td>
                </tr>
                <tr>
                    <td>{{ $order->billing_mobile }}</td>
                    <td>{{ $order->shipping_mobile }}</td>
                </tr>
                <tr>
                    <td>{{ $order->billing_address }}</td>
                    <td>{{ $order->shipping_address }}</td>
                </tr>
                <tr>
                    <td>{{ $order->billing_city }}</td>
                    <td>{{ $order->shipping_city }}</td>
                </tr>
                <tr>
                    <td>{{ $order->billing_state }}</td>
                    <td>{{ $order->shipping_state }}</td>
                </tr>
                <tr>
                    <td>{{ $order->billing_zip }}</td>
                    <td>{{ $order->shipping_zip }}</td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td><b>Payemnt Type</b></td>
                    <td><b>Payment Status</b></td>
                </tr>
                <tr>
                    <td>{{ strtoupper($order->payment_mode) }}</td>
                    <td>{{ strtoupper($order->payment_status) }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>