@extends('frontend.main.index')

@section('css')
<style>
    @media screen and (min-width: 600px) {
        .card-view {
            border-radius: 2px;
            box-shadow: 0 2px 10px 0 rgb(0 0 0 / 10%);
            display: inline-block;
            margin: 15px 20px 25px 0;
            padding: 20px 15px 20px 20px;
            white-space: normal;
            width: 800px;
            min-height: 40%;
            vertical-align: middle;
            cursor: pointer;
        }

        .card-view:hover {
            cursor: pointer;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    }

    .table {
        height: auto;
        width: auto;
        text-align: top;
        table-layout: fixed;
    }

    td {
        width: 25%;
        vertical-align: top;
        text-align: center;
    }

    .checked {
        color: orange;
    }
</style>
@endsection

@section('content')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="l-inner">
    <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--wc c-page-header--low">
        <div class="c-page-header__wrap">
            <h1 class="c-page-header__title">My account</h1>
        </div>
        <div class="c-page-header__login-info">
            <span class="c-page-header__login-text">Logged in as
                <span class="c-page-header__login-name">xyz</span>
            </span>
            <a class="c-page-header__logout" href="https://parkofideas.com/luchiana/demo/my-account/customer-logout/?_wpnonce=c22e1eb537">Logout
                <i class="ip-menu-right c-page-header__logout-icon"></i>
            </a>
        </div>
    </header>
    <div class="woocommerce-notices-wrapper">
    </div>
    <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
        <div class="l-section__content">
            <div class="woocommerce">
                <div class="c-account">
                    <div class="c-account__col-menu">
                        <nav>
                            @include('frontend.myaccount.sidebar')
                        </nav>
                    </div>
                    <div class="c-account__col-content">
                        <form class="woocommerce-EditAccountForm edit-account" action="" method="post">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                <label style="font-size:20px; font-weight:bolder;">
                                    <i class='fas fa-truck' style="color: #c58c85;"></i> MY ORDERS
                                    <hr style="width:800px;">
                                </label>
                            </p>
                            @foreach($orders as $order)
                            <a href="{{ url('detail',$order->order_no) }}">
                                <div class="card-view">
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">Order Summary</td>
                                        </tr>
                                        <tr>
                                            <td>Name: {{ $order->user->name }}</td>
                                            <td>Order Number: {{ strtoupper($order->order_no) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Order Date: {{ date('d-m-Y h:i A', strtotime($order->created_at)) }}</td>
                                            <td>Order Status: {{ strtoupper($order->order_status) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Menthod: {{ strtoupper($order->payment_mode) }}</td>
                                            <td>Total: &#8377;{{ $order->total_amount }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.l-inner -->
@endsection