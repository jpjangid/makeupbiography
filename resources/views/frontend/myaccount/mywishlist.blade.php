@extends('frontend.main.index')

@section('css')
<style>
    .cards {
        /* min-height: 400px;
        max-width: 300px; */
        height: 350px; 
        width: 260px;
        border-radius: 2px;
        box-shadow: 0 1px 4px 0 rgb(0 0 0 / 20%);
        background-color: #fff;
        position: relative;
        margin-bottom: 20px;
        text-align: center;
    }
    .img-edit {
        height: 50%;
        width: 70%;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding-top: 20px;
        padding-bottom: 20px;
        cursor: pointer;
    }
    .card-view {
    display: grid;
    grid-gap: 1rem;
    }

    /* Screen larger than 600px? 2 column */
    @media (min-width: 560px) {
    .card-view { grid-template-columns: repeat(2, 1fr); }
    }

    /* Screen larger than 900px? 3 columns */
    @media (min-width: 900px) {
    .card-view { grid-template-columns: repeat(3, 1fr); }
    }
    .checked
    {
        color: orange;
    }
    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 25px;
        font-weight: bold;
        padding-top: 5px;
        padding-right: 5px;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        border: 1px solid black;
        width: 95px;
        font-size: 11px;
        background-color: white;
        color: black;
        text-align: center;
        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        top: 29px;
        left: 95%;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }

    .bag-btn {
        background-color: #fff;
        border: 0;
        border-top: 1px solid #ebebeb;
        border-radius: 2px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1.8px;
        text-align: center;
        color: #008080;
        padding: 8px 20px;
        height: 50px;
        max-width: initial;
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 0;
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
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-truck'></i> My Orders</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist--edit-account is-active">
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
                                    <i class='fas fa-heart' style="color: #c58c85;"></i> MY WISHLIST
                                    <hr style="width:800px;">
                                </label>
                            </p>
                            <div class="card-view">
                                <div class="cards">
                                    <div class="tooltip"><span class="close">&times;</span>
                                        <span class="tooltiptext">Remove product</span>
                                    </div>
                                    <img src="{{ asset('/images/palette.jpg') }}" class="img-edit" alt="product image">
                                    <strong>Product Name</strong>
                                    <br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star "></span>
                                    <div class="clear"></div>
                                    <span>&#8377;xxx</span>
                                    <div class="clear"></div>
                                    <button type="submit" class="bag-btn">MOVE TO BAG</button>
                                </div> 
                                <div class="cards">
                                    <div class="tooltip"><span class="close">&times;</span>
                                        <span class="tooltiptext">Remove product</span>
                                    </div>
                                    <img src="{{ asset('/images/palette.jpg') }}" class="img-edit" alt="product image">
                                    <strong>Product Name</strong>
                                    <br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <div class="clear"></div>
                                    <span>&#8377;xxx</span>
                                    <div class="clear"></div>
                                    <button type="submit" class="bag-btn">MOVE TO BAG</button>
                                </div> 
                                <div class="cards">
                                    <div class="tooltip"><span class="close">&times;</span>
                                        <span class="tooltiptext">Remove product</span>
                                    </div>
                                    <img src="{{ asset('/images/palette.jpg') }}" class="img-edit" alt="product image">
                                    <strong>Product Name 1234546868-12345678</strong>
                                    <br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <div class="clear"></div>
                                    <span>&#8377;xxx</span>
                                    <div class="clear"></div>
                                    <button type="submit" class="bag-btn">MOVE TO BAG</button>
                                </div> 
                                <div class="cards">
                                    <div class="tooltip"><span class="close">&times;</span>
                                        <span class="tooltiptext">Remove product</span>
                                    </div>
                                    <img src="{{ asset('/images/palette.jpg') }}" class="img-edit" alt="product image">
                                    <strong>Product Name</strong>
                                    <br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <div class="clear"></div>
                                    <span>&#8377;xxx</span>
                                    <div class="clear"></div>
                                    <button type="submit" class="bag-btn">MOVE TO BAG</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.l-inner -->
@endsection