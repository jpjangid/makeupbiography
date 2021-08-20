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
            <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
              <thead>
                <tr>
                  <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                    <span class="nobr">Order</span>
                  </th>
                  <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date">
                    <span class="nobr">Date</span>
                  </th>
                  <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                    <span class="nobr">Status</span>
                  </th>
                  <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total">
                    <span class="nobr">Total</span>
                  </th>
                  <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">
                    <span class="nobr">Actions</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                  <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                    <a href="https://parkofideas.com/luchiana/demo/my-account/view-order/2531/">#2531</a>
                  </td>
                  <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                    <time datetime="2021-08-19T15:27:54+00:00">August 19, 2021</time>
                  </td>
                  <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">Processing</td>
                  <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol">&#036;</span>110.00</span>for 2 items</td>
                  <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                    <a href="https://parkofideas.com/luchiana/demo/my-account/view-order/2531/" class="woocommerce-button button view">View</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection