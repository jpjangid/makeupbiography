@extends('frontend.layouts.app')

@section('title','Register')

@section('css')
<style>
  #customer_login{
    /* box-shadow: 5px 10px #888888; */
    border : 1px solid #dedede;
		border-radius : 5px;
    padding: 30px;
  }  

  .c-login__register{
    font-weight : 400;
    font-size : 15px;
  }

 strong {
    color: red;
 }

 .l-section__content{
  margin : 0 20px;
 }

 input::placeholder{
  color : #9c9898!important;
  font-weight : 200;
 }

 input {
  color:#000;
  font-weight : 400!important;
 }
</style>
@endsection

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">My account</h1>
    </div>
    <nav class="c-breadcrumbs">
      <ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="Home" href="https://parkofideas.com/luchiana/demo/">
            <span itemprop="name">Home</span>
          </a>
          <!--
						-->
          <i class="ip-breadcrumb c-breadcrumbs__separator">
            <!-- -->
          </i>
          <meta itemprop="position" content="1">
        </li>
        <li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="My account" href="https://parkofideas.com/luchiana/demo/my-account/">
            <span itemprop="name">My account</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
    <div class="l-section__content">
      <div class="woocommerce">
        <div class="c-login cap" id="customer_login">

          <div class="c-login__form js-register-form c-login__form--active">
            <div class="c-login__header para">-Register-</div>
            <form class="c-form" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="c-form__row">
                <input type="text" placeholder="Name" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="name" id="name" autocomplete="name" value="{{ old('name') }}" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="c-form__row pass">
                <input type="number" placeholder="Mobile No." class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="mobile" id="reg_mobile_no" autocomplete="mobile" value="{{ old('mobile') }}" />
                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="c-form__row pass">

                <input type="email" placeholder="Email address" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="{{ old('email') }}" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="c-form__row pass">

                <input type="password" placeholder="Password" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="password" id="password" autocomplete="password" value="{{ old('password') }}" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="c-form__row pass">

                <input type="password" placeholder="Re-enter Password" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="password_confirmation" id="confirm" autocomplete="confirm" value="" />
              </div>

              <div style="font-weight : 400;">
              <div class="c-form__row">A password will be sent to your email address.</div>
              <div class="woocommerce-privacy-policy-text">
                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our
                  <a href="https://parkofideas.com/luchiana/demo/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.
                </p>
              </div>
              <div class="c-form__row" style="padding: 1px;">
                <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="732270f602" />
                <input type="hidden" name="_wp_http_referer" value="/luchiana/demo/my-account/" />
                <button type="submit" class="c-button c-button--outline c-button--full woocommerce-Button button" name="register" value="Register">Register</button>
              </div>
              <div class="c-login__bottom">
                <div>
                </div>
                <a href="{{ url('login') }}" class="c-login__register" style="text-decoration:underline;">Login
                  <i class="ip-menu-right c-login__more-icon"></i>
                </a>
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