@extends('frontend.main.index')

@section('css')
<style>
    .shop {
        color: darkred;
        font-size: 20px;
        padding-left: 230px;
    }
</style>
@endsection

@section('content')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<div class="l-inner">
    <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--wc c-page-header--low">
        <div class="c-page-header__wrap">
            <h1 class="c-page-header__title">My account</h1>
        </div>
        <div class="c-page-header__login-info">
            <span class="c-page-header__login-text">Logged in as
                <span class="c-page-header__login-name">{{ auth()->user()->name }}</span>
            </span>
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
                            <br>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                <i class="fa fa-shopping-cart" style="font-size:100px; padding-left:240px; opacity:0.2;"></i>
                                <label style="font-size:15px; padding-left:240px; padding-top:20px;">No Recent Orders</label>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                <a href="#" class="shop">Start Shopping</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.l-inner -->
@endsection