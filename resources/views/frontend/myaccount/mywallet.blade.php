@extends('frontend.main.index')

@section('css')
<style>
    table
    {
        width: 80%;
    }
    .history
    {
        color: #c58c85;
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
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wallet--edit-account is-active">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-wallet'></i> My Wallet</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
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
                                    <i class='fas fa-wallet' style="color: #c58c85;"></i> MAKEUP BIOGRAPHY WALLET
                                </label>
                                <label style="padding-left: 25px;">A pouch you carry to shop Beauty</label>
                                <hr style="width:800px;">
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                <label style="font-size:15px;">
                                    <strong>Wallet Balance</strong>
                                </label>
                                 <p style="color: #c58c85; font-size:15px;">&#8377;0</p>
                            </p>
                            <div class="clear">
                            </div>
                            <hr style="width:450px;">
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <table>
                                    <tr>
                                        <td>M B CASH</td>
                                        <td>&#8377;0</td>
                                        <td><a href="#" class="history">History</a></td>
                                    </tr>
                                    <tr>
                                        <td>REWARD POINTS</td>
                                        <td>&#8377;0</td>
                                        <td><a href="#" class="history">History</a></td>
                                    </tr>
                                </table>
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