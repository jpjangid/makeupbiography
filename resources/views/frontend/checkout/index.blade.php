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
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
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
          <a itemprop="item" title="Checkout" href="https://parkofideas.com/luchiana/demo/checkout/">
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
                          <i></i>Ship to a different address?</h3>
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
                      <button class="c-button--outline c-cart__coupon-apply c-button" id="ip-checkout-apply-coupon-check" name="apply_coupon" type="button">Apply</button>
                    </div>
                    <strong class="text-danger coupon-error"></strong>
                    <input type="text" id="couponCsrfToken" value="{{ csrf_token() }}" hidden>
                  </div>
                  <hr style="width: 100%;color: rgb(236, 236, 236);">
                  <h2>Availabel Coupons</h2>
                  <hr style="width: 100%;color: rgb(236, 236, 236);">
                  @foreach($user_coupons as $ucoupon)
                  <div style="display: flex;flex-direction: row;justify-content: space-between;">
                    <span style="padding: 25px;">{{ $ucoupon->code }}</span><button data-id="{{ $ucoupon->id }}" class="button">Add</button>
                  </div>
                  @endforeach
                </div>

                <div class="c-cart__sub-header" id="order_review_heading">Your order</div>
                <div id="order_review" class="c-cart__review-order woocommerce-checkout-review-order">
                  <table class="c-cart__totals-table shop_table woocommerce-checkout-review-order-table">
                    <thead>
                      <tr>
                        <th class="c-cart__totals-th product-name">Product</th>
                        <th class="c-cart__totals-th c-cart__totals-th--product-total product-total">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="2" class="c-cart__totals-product-space">
                        </td>
                      </tr>
                      @foreach($cartItems as $item)
                      <tr class="c-cart__totals-product cart_item">
                        <td class="c-cart__totals-product-name">{{ $item->product->name."-".$item->productVariant->name }}&nbsp;
                          <strong class="c-cart__totals-product-quantity product-quantity">&times;&nbsp;{{ $item->quantity }}</strong>
                        </td>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->productVariant->sale_price * $item->quantity }}</bdi>
                          </span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2" class="c-cart__totals-space c-cart__totals-space--hr">
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
                        <td colspan="2" class="c-cart__totals-space c-cart__totals-space--hr">
                        </td>
                      </tr>
                      <tr class="cart-subtotal">
                        <th class="c-cart__sub-sub-header">Discount</th>
                        <td class="c-cart__totals-price">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $discountPrice }}</bdi>
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
                              <bdi>
                                <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $totalPrice }}</bdi>
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
                          <input id="payment_method_bacs" type="radio" class="c-cart__payment-method-radio input-radio" name="payment_method" value="bacs" checked='checked' data-order_button_text="" />
                          <i></i>
                        </span>
                        <label class="c-cart__payment-methods-title" for="payment_method_bacs">Direct bank transfer</label>
                        <div class="c-cart__payment-methods-box payment_box payment_method_bacs">
                          <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                      </li>
                      <li class="wc_payment_method payment_method_cod">
                        <span class="c-cart__payment-methods-wrap">
                          <input id="payment_method_cod" type="radio" class="c-cart__payment-method-radio input-radio" name="payment_method" value="cod" data-order_button_text="" />
                          <i></i>
                        </span>
                        <label class="c-cart__payment-methods-title" for="payment_method_cod">Cash on delivery</label>
                        <div class="c-cart__payment-methods-box payment_box payment_method_cod" style="display:none;">
                          <p>Pay with cash upon delivery.</p>
                        </div>
                      </li>
                    </ul>
                    <div class="c-cart__place-order form-row place-order">
                      <noscript>Since your browser does not support JavaScript, or it is disabled, please ensure you click the
                        <em>Update Totals</em>button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                        <br />
                        <button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                      </noscript>
                      <div class="woocommerce-terms-and-conditions-wrapper">
                        <div class="woocommerce-privacy-policy-text">
                          <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our
                            <a href="https://parkofideas.com/luchiana/demo/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                        </div>
                        <div class="woocommerce-terms-and-conditions" style="display: none; max-height: 200px; overflow: auto;">
                          <h3 style="text-align: center">Who we are</h3>
                          <p>
                            <!-- /wp:heading -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>Our website address is:
                            <a href="https://parkofideas.com/luchiana/demo" target="_blank" rel="noopener noreferrer">https://parkofideas.com/luchiana/demo</a>.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:heading -->
                          </p>
                          <h3 style="text-align: center">What personal data
                            <br />we collect</h3>
                          <h5>Comments</h5>
                          <p>
                            <!-- /wp:heading -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:heading {"level":3} -->
                          </p>
                          <h5>Media</h5>
                          <p>
                            <!-- /wp:heading -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:heading {"level":3} -->
                          </p>
                          <h5>Cookies</h5>
                          <p>
                            <!-- /wp:heading -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &#8220;Remember Me&#8221;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:heading {"level":3} -->
                          </p>
                          <h5>Embedded content from other websites</h5>
                          <p>
                            <!-- /wp:heading -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:heading {"level":3} -->
                          </p>
                          <h5>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</h5>
                          <p>
                            <!-- /wp:paragraph -->
                          </p>
                          <p>
                            <!-- wp:paragraph -->
                          </p>
                          <p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>
                          <p>
                            <!-- /wp:heading -->
                          </p>
                        </div>
                        <p class="c-form__terms-and-conditions form-row validate-required">
                          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                            <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms" />
                            <i></i>
                            <span class="woocommerce-terms-and-conditions-checkbox-text">I have read and agree to the website
                              <a href="https://parkofideas.com/luchiana/demo/privacy-policy/" class="woocommerce-terms-and-conditions-link" target="_blank">terms and conditions</a>
                            </span>&nbsp;
                            <span class="required">*</span>
                          </label>
                          <input type="hidden" name="terms-field" value="1" />
                        </p>
                      </div>
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
@endsection