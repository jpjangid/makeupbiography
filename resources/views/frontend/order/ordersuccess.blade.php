@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Order Details</h1>
    </div>
    <nav class="c-breadcrumbs">
      <ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="Home" href="{{ url('') }}">
            <span itemprop="name">Home</span>
          </a>
          <meta itemprop="position" content="1">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white l-section--checkout">
    <div class="l-section__content">
      <div class="woocommerce">
        <div class="c-order">
          <div class="c-order__result">
            <i class="ip-cart-success c-order__result-ico c-order__result-ico--success"></i>
            <div class="c-order__result-message">Thank you. Your order has been received.</div>
          </div>
          <ul class="c-order__details">
            <li class="c-order__details-item c-order__details-item--order">
              <span class="c-order__details-title">Order number:</span>
              <span class="c-order__details-value">{{ $order->order_no }}</span>
            </li>
            <li class="c-order__details-item c-order__details-item--date">
              <span class="c-order__details-title">Date:</span>
              <span class="c-order__details-value">{{ date('M d, Y', strtotime($order->created_at)) }}</span>
            </li>
            <li class="c-order__details-item c-order__details-item--email">
              <span class="c-order__details-title">Email:</span>
              <span class="c-order__details-value">{{ $order->billing_email }}</span>
            </li>
            <li class="c-order__details-item c-order__details-item--total">
              <span class="c-order__details-title">Total:</span>
              <span class="c-order__details-value">
                <span class="woocommerce-Price-amount amount">
                  <bdi>
                    <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $order->total_amount }}</bdi>
                </span>
              </span>
            </li>
            <li class="c-order__details-item c-order__details-item--payment-method">
              <span class="c-order__details-title">Payment method:</span>
              <span class="c-order__details-value">{{ strtoupper($order->payment_mode) }}</span>
            </li>
          </ul>
          <div class="c-order__info">
            <p>Pay with cash upon delivery.</p>
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
                  @foreach($order->items as $item)
                  <tr class="woocommerce-table__line-item order_item">
                    <td class="woocommerce-table__product-name product-name">
                      <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/">{{ $item->product->item_shade_name }}</a>
                      <strong class="product-quantity">&times;&nbsp;{{ $item->quantity }}</strong>
                    </td>
                    <td class="woocommerce-table__product-total product-total">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->sale_price }}</bdi>
                      </span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th scope="row">Subtotal:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $order->order_amount }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Coupon Discount:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $order->coupon_discount }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Shipping:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $order->service_charge_applied }}</span>&nbsp;
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Payment method:</th>
                    <td>{{ strtoupper($order->payment_mode) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Total:</th>
                    <td>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $order->total_amount }}</span>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </section>
            <section class="woocommerce-customer-details">
              <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                  <h2 class="woocommerce-column__title">Billing address</h2>
                  <address>{{ $order->billing_name }}
                    <br />{{ $order->billing_address }}
                    <br />{{ $order->billing_city }}
                    <br />{{ $order->billing_state }} ({{ $order->billing_zip }})
                    <p class="woocommerce-customer-details--phone">{{$order->billing_mobile}}</p>
                    <p class="woocommerce-customer-details--email">{{$order->billing_email}}</p>
                  </address>
                </div>
                <!-- /.col-1 -->
                <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                  <h2 class="woocommerce-column__title">Shipping address</h2>
                  <address>{{ $order->shipping_name }}
                    <br />{{ $order->shipping_address }}
                    <br />{{ $order->shipping_city }}
                    <br />{{ $order->shipping_state }} ({{ $order->shipping_zip }})
                    <p class="woocommerce-customer-details--phone">{{$order->shipping_mobile}}</p>
                    <p class="woocommerce-customer-details--email">{{$order->shipping_email}}</p>
                  </address>
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