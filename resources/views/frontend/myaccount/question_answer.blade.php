@extends('frontend.main.index')

@section('css')
<style>
    .card-view
    {
        border-radius: 2px;
        box-shadow: 0 2px 10px 0 rgb(0 0 0 / 10%);
        display: inline-block;
        margin: 15px 20px 25px 0;
        padding: 20px 15px 20px 20px;
        white-space: normal;
        width: 340px;
        min-height: 203px;
        vertical-align: middle;
        position: relative;
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
                            <ul class="c-account__navigation">
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-user-edit'></i> My Dashboard</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wallet">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-wallet'></i> My Wallet</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders--edit-account is-active">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-truck'></i> My Orders</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-heart'></i> My Wishlist</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--address">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-address-card'></i> My Addresses</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--q&a">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-question-circle'></i> Q&A</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--log-out">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-sign-out-alt'></i> Log out</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="c-account__col-content">
                        <form class="woocommerce-EditAccountForm edit-account" action="" method="post">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                <label style="font-size:20px; font-weight:bolder;">
                                    <i class='fas fa-question-circle' style="color: #c58c85;"></i> Q & A
                                    <hr style="width:800px;">
                                </label>
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