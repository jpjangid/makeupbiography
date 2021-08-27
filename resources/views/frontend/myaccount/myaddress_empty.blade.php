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
    .add-address-btn
    {
        text-align: center;
        background-color: #c58c85;
        border: none;
        color: white;
        cursor: pointer;
        opacity: 0.8;
        margin: 0 auto;
        display: block;
        margin-top: 20px;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
        background-color: #c58c85;
        color: white;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        float: right;
    }
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 60%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist">
                                    <a class="c-account__navigation-link" href="#"><i class='fas fa-heart'></i> My Wishlist</a>
                                </li>
                                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--address--edit-account is-active">
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
                                    <i class='fas fa-address-card' style="color: #c58c85;"></i> MY ADDRESSES
                                    <hr style="width:800px;">
                                </label>
                            </p>
                                <button class="open-button" id="myBtn">
                                    <i class='fas fa-pencil-alt'></i> ADD NEW ADDRESS
                                </button>
                                <div id="myModal" class="modal">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <form action="/action_page.php">
                                            <label for="country" style="padding: 10px;"><b>Select Country</b></label>
                                            <select name="country" id="" style="padding: 10px;">
                                                <option disabled>Select</option>
                                                <option>India</option>
                                            </select>

                                            <label for="name" style="padding: 10px;"><b>Name</b></label>
                                            <input type="text" placeholder="Enter Name" name="name" style="padding: 10px;" required>

                                            <label for="mobile-number" style="padding: 10px;"><b>Mobile Number</b></label>
                                            <input type="number" placeholder="Enter Number" style="padding: 10px;" name="mobile" required>

                                            <label for="postal" style="padding: 10px;"><b>Postal Code</b></label>
                                            <input type="number" placeholder="Enter Postal Code" style="padding: 10px;" name="pincode" required>

                                            <label for="address" style="padding: 10px;"><b>Address</b></label>
                                            <textarea name="addresses" rows="4" cols="50" style="padding: 10px;">
                                            </textarea>

                                            <button type="submit" class="add-address-btn">ADD ADDRESS</button>
                                    </form>
                                    </div>
                                </div>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">                             
                                <div class="card-view">
                                    <label style="font-size:12px; font-weight:bold;">No Address Found</label>
                                </div>
                            </p>
                            <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the button that opens the modal
                                var btn = document.getElementById("myBtn");

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on the button, open the modal
                                btn.onclick = function() {
                                modal.style.display = "block";
                                }

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() {
                                modal.style.display = "none";
                                }

                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.l-inner -->
@endsection