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
            width:45%; 
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
            text-align:left;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="inner-card">
            <img src="MB-Logo.png" alt="company-logo" class="logo">
            <section class="order">
                <p class="head">Order Delivered!!</p>
                <p>XYZ, Thank You for your order.</p>
                <p style="text-align: center; padding-left:20px; padding-right:20px;">Your order has been delivered. You can find your purchase information below.</p>
            </section>
            <p class="summary-head">Order Summary</p>
                <table class="table-sm table-borderless">
                    <tr>
                        <td rowspan="10"><img src="palette.jpg" style="float:left; height:60%; width:60%;"></td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Product</th>
                        <td style="width:30%;">Makeup Palette</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Quantity</th>
                        <td style="width:30%;">1</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Price</th>
                        <td style="width:30%;">&#8377; 399.0</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Sub Total</th>
                        <td style="width:30%;">&#8377; 399.0</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">GST</th>
                        <td style="width:30%;">&#8377; 15.0</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Total Amount</th>
                        <td style="width:30%;">&#8377; 414.0</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Sub Total</th>
                        <td style="width:30%;">&#8377; 399.0</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">GST</th>
                        <td style="width:30%;">&#8377; 15.0</td>
                    </tr>
                    <tr>
                        <th style="width:30%;">Total Amount</th>
                        <td style="width:30%;">&#8377; 414.0</td>
                    </tr>
                </table>
                <br>
                <p class="summary-head">Address Details</p>
        </div>
    </div>
</body>
</html>