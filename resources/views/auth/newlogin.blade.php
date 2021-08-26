@extends('frontend.layouts.app')

@section('css')
<style>
  .para {

    font-family: rtrim;
  }

  .cap {

    background: -webkit-linear-gradient(#d2b48c, white);
  }

  .pass {

    padding-top: 25px;
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
            <form class="c-form" method="post" style="width: 100%;">
              <div class="c-form__row fol" style="width: 100%;">

                <input type="text" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text fol" placeholder="Username" name="username" id="username" autocomplete="off" value="" />

              </div>
              <div class="c-form__row pass" style="width: 100%">
                <input class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" placeholder="Password" type="password" name="password" id="password" autocomplete="current-password" />
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
                <a href="" onclick="return false;" class="c-login__register js-login-form-toggle">Register
                  <i class="ip-menu-right c-login__more-icon"></i>
                </a>
              </div>
            </form>
          </div>
          <div class="c-login__form js-register-form">
            <div class="c-login__header para">-Register-</div>
            <form method="post" class="c-form">
              <div class="c-form__row">

                <input type="text" placeholder="First Name" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="first name" id="reg_first_name" autocomplete="firstname" value="" />
              </div>
              <div class="c-form__row pass">

                <input type="text" placeholder="Last Name" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="last name" id="reg_last_name" autocomplete="lastname" value="" />
              </div>

              <div class="c-form__row pass">

                <input type="text" placeholder="Phnoe No." class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="phone no" id="reg_phone_no" autocomplete="phoneno" value="" />
              </div>
              <div class="c-form__row pass">

                <input type="email" placeholder="Email address" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="" />
              </div>
              <div class="c-form__row pass">

                <input type="password" placeholder="Password" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="password" id="password" autocomplete="password" value="" />
              </div>
              <div class="c-form__row pass">

                <input type="password" placeholder="Re-enter Password" class="c-form__input c-form__input--full c-form__input--fill woocommerce-Input woocommerce-Input--text input-text" name="repassword" id="repassword" autocomplete="repassword" value="" />
              </div>

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
                <a href="" onclick="return false;" class="c-login__register js-login-form-toggle">Login
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