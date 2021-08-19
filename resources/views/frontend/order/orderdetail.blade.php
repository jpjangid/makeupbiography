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
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders is-active">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/orders/">Orders</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/downloads/">Downloads</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-address/">Addresses</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-account/">Account details</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="c-account__col-content">
            <p>Order #
              <mark class="order-number">2531</mark>was placed on
              <mark class="order-date">August 19, 2021</mark>and is currently
              <mark class="order-status">Processing</mark>.</p>
            <section class="woocommerce-order-details">
              <h2 class="woocommerce-order-details__title">Order details</h2>
              <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                <thead>
                  <tr>
                    <th class="woocommerce-table__product-name product-name">Product</th>
                    <th class="woocommerce-table__product-table product-total">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="woocommerce-table__line-item order_item">
                    <td class="woocommerce-table__product-name product-name">
                      <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/">Airbrush Matte</a>
                      <strong class="product-quantity">&times;&nbsp;2</strong>
                    </td>
                    <td class="woocommerce-table__product-total product-total">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>80.00</bdi>
                      </span>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th scope="row">Subtotal:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#036;</span>80.00</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Shipping:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#036;</span>30.00</span>&nbsp;
                      <small class="shipped_via">via Flat rate</small>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Payment method:</th>
                    <td>Cash on delivery</td>
                  </tr>
                  <tr>
                    <th scope="row">Total:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#036;</span>110.00</span>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </section>
            <section class="woocommerce-customer-details">
              <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                  <h2 class="woocommerce-column__title">Billing address</h2>
                  <address>xyz xyz
                    <br />ascasc
                    <br />ascas
                    <br />ddd
                    <br />sdvsdv Victoria 313002
                    <p class="woocommerce-customer-details--phone">1234567890</p>
                    <p class="woocommerce-customer-details--email">xyz@gmail.com</p>
                  </address>
                </div>
                <!-- /.col-1 -->
                <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                  <h2 class="woocommerce-column__title">Shipping address</h2>
                  <address>xyz xyz
                    <br />ascasc
                    <br />ascas
                    <br />ddd
                    <br />sdvsdv Victoria 313002</address>
                </div>
                <!-- /.col-2 -->
              </section>
              <!-- /.col2-set -->
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection