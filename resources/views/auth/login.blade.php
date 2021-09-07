@extends('frontend.layouts.app')

@section('title','Login')

@section('css')
<style>

  #customer_login{
    box-shadow: 5px 10px #888888;
  }  

  .text-danger {
      color: red;
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

          <div class="c-login__form js-login-form c-login__form--active">
            <div class="c-login__header para" style="padding: 10px;">-Login-</div>
            <form method="POST" class="c-form" action="{{ route('login') }}" style="width: 100%;">
            @csrf
              <div class="c-form__row fol" style="width: 100%;">

                <input type="email" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text fol" placeholder="Email" name="email" id="email" autocomplete="off" value="{{ old('email') }}" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="c-form__row pass" style="width: 100%">
                <input class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" placeholder="Password" type="password" name="password" id="password" autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="c-form__row c-form__row--inline c-login__remember">
                <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="934c87c088" />
                <input type="hidden" name="_wp_http_referer" value="/luchiana/demo/my-account/" />
                <label class="c-form__label">
                  <input class="c-form__checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                  <i></i>Remember me</label>
              </div>
              <div class="c-form__row">
                <button type="submit" class="c-button c-button--outline c-button--full woocommerce-Button button" name="login" value="Log in">Log in</button>
              </div>
              <div class="c-login__bottom">
                <div class="c-login__lost-password">
                  <a class="c-login__lost-password-link" href="https://parkofideas.com/luchiana/demo/my-account/lost-password/">Forgot password</a>
                </div>
                <a href="{{ url('register') }}" class="c-login__register">Register
                  <i class="ip-menu-right c-login__more-icon"></i>
                </a>
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