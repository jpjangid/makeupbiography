@extends('frontend.main.index')

@section('title','Checkout')

@section('css')
<style>
  small .list-address {
    line-height: 1.5em;
    height: 2em;
    overflow: hidden;
  }

  .button {
    background-color: #3B9C9C !important;
    color: white !important;
    margin: 20px;
  }
</style>
@endsection

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--wc c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Checkout</h1>
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
          <a itemprop="item" title="Checkout" href="{{ url('checkout') }}">
            <span itemprop="name">Checkout</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white l-section--checkout">
    <div class="l-section__content">
      <div class="woocommerce">
        <form method="post" class="c-cart c-cart--checkout checkout woocommerce-checkout" action="#">
          <div class="c-cart__wrap">
            <div class="c-cart__col-1 c-cart__col-1--checkout">
              <div class=" js-sticky-sidebar-nearby ">
                <div class="c-cart__customer-details" id="customer_details">
                  <div class="col-1">
                    <h2 class="c-cart__header">Checkout</h2>
                    @foreach($locations as $location)
                    <input type="radio" class="addressSelect" name="addressSelect" style="opacity: 1 !important;margin:10px !important;"><small class="list-address">{{ implode(' ', array_slice(str_word_count($location->address,1), 0, 10)) }}</small>,<small>{{$location->state}}</small>,<small>{{$location->city}}</small><br>
                    @endforeach
                    <button class="button button-add-new-address">Add New Address</button>
                  </div>
                  <hr class="col-1 add-new-address-show" style="display: none;">
                  <div class="col-1 add-new-address-show" style="display: none;">
                    <div class="c-cart__form c-cart__form--billing-fields woocommerce-billing-fields">
                      <h3 class="c-cart__header">Billing details</h3>
                      <div class="c-cart__billing-fields woocommerce-billing-fields__field-wrapper">
                        <p class="form-row form-row-first validate-required" data-priority="10">
                          <label for="billing_name" class="">Name&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_name" id="billing_name" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-first validate-required" data-priority="10">
                          <label for="billing_email" class="">Email&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-first validate-required" data-priority="10">
                          <label for="billing_mobile" class="">Mobile No&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text number" name="billing_mobile" id="billing_email" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-first validate-required" data-priority="10">
                          <label for="billing_address" class="">Address&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text number" name="billing_address" id="billing_address" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-first validate-required" data-priority="10">
                          <label for="billing_postcode" class="">Postcode&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text number" name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-first validate-required" data-priority="10">
                          <label for="billing_landmark" class="">Landmark&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text number" name="billing_landmark" id="billing_landmark" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 add-new-address-show" style="display: none;">
                    <div class="c-cart__form c-cart__form--shipping-fields woocommerce-shipping-fields">
                      <label for="ship-to-different-address-checkbox" class="checkbox">
                        <h3 id="ship-to-different-address">
                          <input id="ship-to-different-address-checkbox" class="input-checkbox" type="checkbox" name="ship_to_different_address" value="1" />
                          <i></i>Ship to a different address?
                        </h3>
                      </label>
                      <div class="shipping_address" style="display: none;">
                        <div class="c-cart__shipping-fields woocommerce-shipping-fields__field-wrapper">
                          <p class="form-row form-row-first validate-required" data-priority="10">
                            <label for="shipping_name" class="">Name&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_name" id="shipping_name" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-first validate-required" data-priority="10">
                            <label for="shipping_email" class="">Email&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="email" class="input-text " name="shipping_email" id="shipping_email" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-first validate-required" data-priority="10">
                            <label for="shipping_mobile" class="">Mobile No&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text number" name="shipping_mobile" id="shipping_mobile" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-first validate-required" data-priority="10">
                            <label for="shipping_address" class="">Address&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text number" name="shipping_address" id="shipping_address" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-first validate-required" data-priority="10">
                            <label for="shipping_postcode" class="">Postcode&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text number" name="shipping_postcode" id="shipping_postcode" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-first validate-required" data-priority="10">
                            <label for="shipping_landmark" class="">Landmark&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text number" name="shipping_landmark" id="shipping_landmark" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="c-cart__form c-cart__form--additional-fields woocommerce-additional-fields">
                      <div class="c-cart__additional-fields woocommerce-additional-fields__field-wrapper">
                        <p class="form-row notes" id="order_comments_field" data-priority="">
                          <label for="order_comments" class="">Order notes&nbsp;
                            <span class="optional">(optional)</span>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5">
                            </textarea>
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="c-cart__col-2">
              <div class="c-cart__collaterals collaterals checkout-collaterals js-sticky-sidebar ">
                <div class="c-cart__coupon">
                  <a href="#" class="js-cart-coupon">
                    <div class="c-cart__coupon-header">Coupon code
                      <i class="ip-down_arrow c-cart__select-icon"></i>
                    </div>
                  </a>
                  <div class="c-cart__coupon-from-wrap c-cart__coupon-from-wrap--opened">
                    <div class="c-cart__coupon-form">
                      <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" />
                      <button class="c-button--outline c-cart__coupon-apply c-button" id="apply_coupon" type="button">Apply</button>
                    </div>
                    <strong class="text-danger coupon-error"></strong>
                    <input type="text" id="couponCsrfToken" value="{{ csrf_token() }}" hidden>
                  </div>
                  <hr style="width: 100%;color: rgb(236, 236, 236);">
                  <h2>Availabel Coupons</h2>
                  <hr style="width: 100%;color: rgb(236, 236, 236);">
                  @foreach($user_coupons as $coupon)
                  <div style="display: flex;flex-direction: row;justify-content: space-between;">
                    <span style="padding: 25px;">{{ $coupon['code'] }}</span>
                    <span style="padding: 25px;">{{ $coupon['disc_type'] != 'amount' ? $coupon['discount'].'%' : '&#8377;'.$coupon['discount'] }} off</span>
                    <span style="padding: 25px;">
                      <input type="radio" class="coupon_radio" onclick="coupon_applied('<?php echo $coupon['code']; ?>')">
                    </span>
                  </div>
                  @endforeach
                </div>

                <div class="c-cart__sub-header" id="order_review_heading">Your order</div>
                <div id="order_review" class="c-cart__review-order woocommerce-checkout-review-order">
                  <table class="c-cart__totals-table shop_table woocommerce-checkout-review-order-table">
                    <thead>
                      <tr>
                        <th class="c-cart__totals-th product-name">Product</th>
                        <th class="c-cart__totals-th c-cart__totals-th--product-total product-total">Price</th>
                      </tr>
                    </thead>
                    <tbody id="product_tbody">
                      @php $regular_price = 0; @endphp
                      @foreach($cartItems as $key => $item)
                      <tr class="c-cart__totals-product cart_item">
                        <td class="c-cart__totals-product-name">{{ $item->product->name."-".$item->productVariant->name }}&nbsp;
                          <strong class="c-cart__totals-product-quantity product-quantity">&times;&nbsp;{{ $item->quantity }}</strong>
                        </td>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span><input type="text" name="sale_price" class="sale_price" value="{{ $item->productVariant->sale_price * $item->quantity }}" readonly></bdi>
                            <p>&#8377;{{ $item->productVariant->regular_price * $item->quantity }}</p>
                            <p>&#8377;{{ $product_dis[$key] }}</p>
                          </span>
                        </td>
                      </tr>
                      @php $regular_price += $item->productVariant->regular_price * $item->quantity; @endphp
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr class="cart-subtotal">
                        <th class="c-cart__sub-sub-header">MRP</th>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $regular_price }}</bdi>
                          </span>
                        </td>
                      </tr>
                      <tr class="cart-subtotal">
                        <th class="c-cart__sub-sub-header">Product Discount</th>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $discountPrice }}</bdi>
                          </span>
                        </td>
                      </tr>
                      <tr class="cart-subtotal">
                        <th class="c-cart__sub-sub-header">Subtotal</th>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $subtotal }}</bdi>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th class="c-cart__sub-sub-header">Coupon Discount</th>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi id="coupon_dis">
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>
                              {{ $coupon_dis }}
                            </bdi>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th class="c-cart__sub-sub-header">Shipping Charge</th>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi id="shipping_chrg">
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>
                              100
                            </bdi>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="c-cart__totals-space c-cart__totals-space--hr">
                        </td>
                      </tr>
                      <!-- <tr class="woocommerce-shipping-totals shipping">
                        <td class="c-cart__totals-td" data-title="Shipping" colspan="2">
                          <div class="c-cart__sub-header">Shipping</div>
                          <ul id="shipping_method" class="c-cart__shipping-methods woocommerce-shipping-methods">
                            <li class="c-cart__shipping-methods-item">
                              <span class="c-cart__shipping-methods-wrap">
                                <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method" checked='checked' />
                                <i></i>
                              </span>
                              <label class="c-cart__shipping-methods-label" for="shipping_method_0_flat_rate1">Flat rate:
                                <span class="woocommerce-Price-amount amount">
                                  <bdi>
                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>30.00</bdi>
                                </span>
                              </label>
                            </li>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="c-cart__totals-space c-cart__totals-space--hr">
                        </td>
                      </tr> -->
                      <tr class="order-total">
                        <th class="c-cart__sub-sub-header">Total</th>
                        <td class="c-cart__totals-price c-cart__totals-price--total" data-title="Total">
                          <strong>
                            <span class="woocommerce-Price-amount amount">
                              <bdi id="total_price">
                                <span class="woocommerce-Price-currencySymbol">&#8377;</span>
                                {{ $totalPrice + 100 }}
                              </bdi>
                            </span>
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="c-cart__totals-space c-cart__totals-space--hr">
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                  <div id="payment" class="woocommerce-checkout-payment">
                    <div class="c-cart__sub-header">Payment Method</div>
                    <ul class="c-cart__payment-methods wc_payment_methods payment_methods methods">
                      <li class="wc_payment_method payment_method_bacs">
                        <span class="c-cart__payment-methods-wrap">
                          <input id="payment_method" type="radio" class="c-cart__payment-method-radio input-radio" name="payment_method" value="online" checked='checked' data-order_button_text="" />
                          <i></i>
                        </span>
                        <label class="c-cart__payment-methods-title" for="payment_method_bacs">Online Payment</label>
                      </li>
                      <li class="wc_payment_method payment_method_cod">
                        <span class="c-cart__payment-methods-wrap">
                          <input id="payment_method" type="radio" class="c-cart__payment-method-radio input-radio" name="payment_method" value="cod" data-order_button_text="" />
                          <i></i>
                        </span>
                        <label class="c-cart__payment-methods-title" for="payment_method_cod">Cash on delivery</label>
                      </li>
                    </ul>
                    <div class="c-cart__place-order form-row place-order">
                      <noscript>Since your browser does not support JavaScript, or it is disabled, please ensure you click the
                        <em>Update Totals</em>button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                        <br />
                        <button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                      </noscript>
                      <button type="submit" class="c-button c-button--big c-cart__place-order-btn button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                      <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="71dca3f0ec" />
                      <input type="hidden" name="_wp_http_referer" value="/luchiana/demo/checkout/" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection

@section('js')
<script type='text/javascript' src='{{ asset("js/validation.js") }}' id='preloaded-modules-js'></script>
<script type='text/javascript' src='{{ asset("js/checkout.js") }}' id='preloaded-modules-js'></script>

<script>
  function coupon_applied(code) {
    $('#coupon_code').val(code);
  }

  $(document).on('click', '#apply_coupon', function() {
    var code = $('#coupon_code').val();
    $.ajax({
      url: "{{url('checkout/apply_coupon')}}",
      type: "POST",
      data: {
        coupon_code: code,
        _token: '{{csrf_token()}}'
      },
      dataType: 'json',
      success: function(data) {
        if (data['status'] == '200') {
          $('#coupon_dis').empty();
          $('#total_price').empty();
          $('#product_tbody').empty();
          var html = '';
          $('#coupon_dis').html('<span class="woocommerce-Price-currencySymbol">&#8377;</span>' + data[0][0]['coupon_disc']);
          $('#total_price').html('<span class="woocommerce-Price-currencySymbol">&#8377;</span>' + data[0][0]['total']);
          $.each(data[0][0]['checkout_items'], function(index, value) {
            html += `
                        <tr class="c-cart__totals-product cart_item">
                          <td class="c-cart__totals-product-name">` + value[0]['product_name'] + `&nbsp;
                            <strong class="c-cart__totals-product-quantity product-quantity">&times;&nbsp;` + value[0]['qty'] + `</strong>
                          </td>
                          <td class="c-cart__totals-price">
                            <span class="woocommerce-Price-amount amount">
                              <bdi>
                                <span class="woocommerce-Price-currencySymbol">&#8377;</span><input type="text" name="sale_price" class="sale_price" value="` + value[0]['sale'] + `" readonly></bdi>
                              <p>&#8377;` + value[0]['regular'] + `</p>
                              <p>&#8377;` + value[0]['total_disc'] + `</p>
                            </span>
                          </td>
                        </tr>`;
          });
          $('#product_tbody').html(html);
        } else {
          toastr.options.closeButton = true;
          toastr.options.closeMethod = 'fadeOut';
          toastr.options.closeDuration = 100;
          toastr.success(data.message);
        }
      }
    });
  });

  $(document).on('click', '#payment_method', function() {
    var payment_mode = $("input[name=payment_method]:checked").val();
    if (payment_mode == "online") {
      rzp.open();
      e.preventDefault();
    } else {
      $("#checkout-form").submit();
    }
  });
</script>
<script type="text/javascript">
  $(document).on('keyup','#shipping_postcode',function(){
    alert("hello");
    $('#state').val('');
    $('#city').val('');
    var pincode = $(this).val();
    $.ajax({
        type:'GET',
        url: '{{ url("my-address/create") }}',
        data: {pincode:pincode},
        success:function(data) {
            if(data.location != "") {
              $('#state').val(data.location.state);
              $('#city').val(data.location.city);
            }
        }
    });
  });
</script>
@endsection