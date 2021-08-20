@extends('frontend.main.index')

@section('content')
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
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/">Dashboard</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/orders/">Orders</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/downloads/">Downloads</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address is-active">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-address/">Addresses</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-account/">Account details</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="c-account__col-content">
            <p>The following addresses will be used on the checkout page by default.</p>
            <div class="u-columns woocommerce-Addresses col2-set addresses">
              <div class="u-column1 col-1 woocommerce-Address">
                <header class="woocommerce-Address-title title">
                  <h3>Billing address</h3>
                  <a href="https://parkofideas.com/luchiana/demo/my-account/edit-address/billing/" class="edit">Edit</a>
                </header>
                <address>xyz xyz
                  <br />ascasc
                  <br />ascas
                  <br />ddd
                  <br />sdvsdv Victoria 313002</address>
              </div>
              <div class="u-column2 col-2 woocommerce-Address">
                <header class="woocommerce-Address-title title">
                  <h3>Shipping address</h3>
                  <a href="https://parkofideas.com/luchiana/demo/my-account/edit-address/shipping/" class="edit">Edit</a>
                </header>
                <address>xyz xyz
                  <br />ascasc
                  <br />ascas
                  <br />ddd
                  <br />sdvsdv Victoria 313002</address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection