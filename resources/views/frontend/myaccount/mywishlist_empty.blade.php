@extends('frontend.main.index')

@section('css')
<style>
    .shop
    {
        color: darkred;
        font-size:20px;
        padding-left:140px;
    }
    .image-empty-wishlist
    {
        height: 50%;
        width: 50%;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection

@section('content')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<div class="l-inner">
    <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
        <div class="c-page-header__wrap">
            <h1 class="c-page-header__title">My account</h1>
        </div>
        <div class="c-page-header__login-info">
            <span class="c-page-header__login-text">Logged in as
                <span class="c-page-header__login-name">xyz</span>
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
                                    <i class='fas fa-heart' style="color: #c58c85;"></i> MY WISHLIST
                                    <hr style="width:800px;">
                                </label>
                            </p>
                            <div class="clear">
                            </div>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">                           
                                <img src="{{ asset('/images/empty-wishlist.jpg') }}" alt="empty-wishlist" class="image-empty-wishlist">
                            </p>
                            <div class="clear">
                            </div>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">                    
                                <label style="font-size:15px; text-align:center;">No items in the Wishlist</label>
                            </p>
                            <div class="clear">
                            </div>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">                             
                                <label style="font-size:13px; text-align:center;">Save your favourite beauty items here</label>
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