<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Card</title>
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
            padding: 20px;
            background-color: #F0FFFF;
            border: 1px solid #008B8B;
            font-family: 'Times New Roman', Times, serif;
        }

        .head-line {
            font-size: 15px;
            text-align: center;
        }

        .offer {
            font-size: 35px;
            text-transform: uppercase;
            color: white;
            text-align: center;
            background-color: #43BFC7;
            padding: 10px;
        }

        .promo {
            text-transform: uppercase;
            font-size: 30px;
            color: white;
            background-color: #008B8B;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }

        .foot-line {
            font-size: 15px;
            text-align: center;
        }

        .btn {
            color: white;
            background-color: #20B2AA;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.7;
        }

        .image-section {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            background-color: #20B2AA;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="inner-card">
            <img src="MB-Logo.png" alt="company-logo" style="width:45%; text-align: center;">
            <p class="head-line">We are happy to see you. You will be the first to know about latest trends, new arrivals and exclusive offers.</p>
            <p class="offer">ENJOY {{ $offer }}% OFF</p>
            <p class="coupon-text-top">Here is a coupon code just for you!</p>
            <span class="promo">code: {{ $coupon_code }}</span>
            <p class="coupon-text-bottom">Expires in {{ $days }} days from receipt of this email</p>
            <p style="font-size: 30px; text-transform: uppercase; color: #008B8B;">Now that we're friends</p>
            <span>We'd love to address you by name, send you special birthday surprises and keep you updated on happenings.</span>
            <br><br>
            <form action="{{ url('checkout/coupon/apply') }}" method="get">
                <input type="hidden" name="_code" value="{{ $coupon_code }}" hidden>
                <input type="submit" value="Shop Now" class="btn">
            </form>
            <p class="foot-line">Your cart is misses you..Complete your purchase!!</p>
        </div>
    </div>
</body>

</html>