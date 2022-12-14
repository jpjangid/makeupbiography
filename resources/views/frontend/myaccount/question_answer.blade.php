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
        width: 540px;
        min-height: 103px;
        vertical-align: middle;
        position: relative;
    }
    .ask
    {
        width: 100%;
        height: auto;
        resize: none;
        overflow: auto;
        line-height: 24px;
        font-size: 16px;
        font-weight: 600;
        color: #3f414d;
        padding: 2px 10px 0;
        outline: none;
        border-radius: 0;
        border-width: 0px 0px 1px;
        border-bottom-color: #e1e1e1;
    }
    .post-btn
    {
        border-radius: 16px;
        text-align: center;
        background-color: #c58c85;
        border: none;
        color: white;
        cursor: pointer;
        opacity: 0.8;
        margin-top: 20px;
        float: right;
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
                                    <i class='fas fa-question-circle' style="color: #c58c85;"></i> Q & A
                                    <hr style="width:800px;">
                                </label>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                <label style="font-size:20px; text-align:center;">
                                    There are no questions yet.
                                </label>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">                             
                                <div class="card-view">
                                    <label style="font-size:15px; font-weight:bold;">Hi xyz</label>
                                    <textarea placeholder="What is your question?" class="ask"></textarea>
                                    <button type="submit" class="post-btn">Post</button>
                                </div>
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