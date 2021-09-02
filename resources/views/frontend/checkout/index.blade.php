@extends('frontend.main.index')

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
        <form name="checkout" method="post" class="c-cart c-cart--checkout checkout woocommerce-checkout" action="https://parkofideas.com/luchiana/demo/checkout/" enctype="multipart/form-data">
          <div class="c-cart__wrap">
            <div class="c-cart__col-1 c-cart__col-1--checkout">
              <div class=" js-sticky-sidebar-nearby ">
                <div class="c-cart__customer-details" id="customer_details">
                  <div class="col-1">
                    <div class="c-cart__form c-cart__form--billing-fields woocommerce-billing-fields">
                      <h3 class="c-cart__header">Billing details</h3>
                      <div class="c-cart__billing-fields woocommerce-billing-fields__field-wrapper">
                        <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                          <label for="billing_first_name" class="">First name&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                          <label for="billing_last_name" class="">Last name&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                          <label for="billing_company" class="">Company name&nbsp;
                            <span class="optional">(optional)</span>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
                          <label for="billing_country" class="">Country / Region&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <select name="billing_country" id="billing_country" class="country_to_state country_select " autocomplete="country" data-placeholder="Select a country / region&hellip;" data-label="Country / Region">
                              <option value="">Select a country / region&hellip;</option>
                              <option value="AF">Afghanistan</option>
                              <option value="AX">Åland Islands</option>
                            </select>
                            <noscript>
                              <button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button>
                            </noscript>
                          </span>
                        </p>
                        <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                          <label for="billing_address_1" class="">Street address&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
                          <label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;
                            <span class="optional">(optional)</span>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
                          <label for="billing_city" class="">Suburb&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide address-field validate-required validate-state" id="billing_state_field" data-priority="80">
                          <label for="billing_state" class="">State&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <select name="billing_state" id="billing_state" class="state_select " autocomplete="address-level1" data-placeholder="Select an option&hellip;" data-input-classes="" data-label="State">
                              <option value="">Select an option&hellip;</option>
                              <option value="ACT">Australian Capital Territory</option>
                              <option value="NSW">New South Wales</option>
                              <option value="NT">Northern Territory</option>
                              <option value="QLD">Queensland</option>
                              <option value="SA">South Australia</option>
                              <option value="TAS">Tasmania</option>
                              <option value="VIC" selected='selected'>Victoria</option>
                              <option value="WA">Western Australia</option>
                            </select>
                          </span>
                        </p>
                        <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90">
                          <label for="billing_postcode" class="">Postcode&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                          <label for="billing_phone" class="">Phone&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel" />
                          </span>
                        </p>
                        <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                          <label for="billing_email" class="">Email address&nbsp;
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                            <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="xyz@gmail.com" autocomplete="email username" />
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="c-cart__form c-cart__form--shipping-fields woocommerce-shipping-fields">
                      <label for="ship-to-different-address-checkbox" class="checkbox">
                        <h3 id="ship-to-different-address">
                          <input id="ship-to-different-address-checkbox" class="input-checkbox" type="checkbox" name="ship_to_different_address" value="1" />
                          <i></i>Ship to a different address?</h3>
                      </label>
                      <div class="shipping_address">
                        <div class="c-cart__shipping-fields woocommerce-shipping-fields__field-wrapper">
                          <p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10">
                            <label for="shipping_first_name" class="">First name&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder="" value="" autocomplete="given-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
                            <label for="shipping_last_name" class="">Last name&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name" />
                            </span>
                          </p>
                          <p class="form-row form-row-wide" id="shipping_company_field" data-priority="30">
                            <label for="shipping_company" class="">Company name&nbsp;
                              <span class="optional">(optional)</span>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_company" id="shipping_company" placeholder="" value="" autocomplete="organization" />
                            </span>
                          </p>
                          <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field" data-priority="40">
                            <label for="shipping_country" class="">Country / Region&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <select name="shipping_country" id="shipping_country" class="country_to_state country_select " autocomplete="country" data-placeholder="Select a country / region&hellip;" data-label="Country / Region">
                                <option value="">Select a country / region&hellip;</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                              </select>
                              <noscript>
                                <button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button>
                              </noscript>
                            </span>
                          </p>
                          <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
                            <label for="shipping_address_1" class="">Street address&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" />
                            </span>
                          </p>
                          <p class="form-row form-row-wide address-field" id="shipping_address_2_field" data-priority="60">
                            <label for="shipping_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;
                              <span class="optional">(optional)</span>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2" />
                            </span>
                          </p>
                          <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70">
                            <label for="shipping_city" class="">Suburb&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_city" id="shipping_city" placeholder="" value="" autocomplete="address-level2" />
                            </span>
                          </p>
                          <p class="form-row form-row-wide address-field validate-required validate-state" id="shipping_state_field" data-priority="80">
                            <label for="shipping_state" class="">State&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <select name="shipping_state" id="shipping_state" class="state_select " autocomplete="address-level1" data-placeholder="Select an option&hellip;" data-input-classes="" data-label="State">
                                <option value="">Select an option&hellip;</option>
                                <option value="ACT">Australian Capital Territory</option>
                                <option value="NSW">New South Wales</option>
                                <option value="NT">Northern Territory</option>
                                <option value="QLD">Queensland</option>
                                <option value="SA">South Australia</option>
                                <option value="TAS">Tasmania</option>
                                <option value="VIC" selected='selected'>Victoria</option>
                                <option value="WA">Western Australia</option>
                              </select>
                            </span>
                          </p>
                          <p class="form-row form-row-wide address-field validate-required validate-postcode" id="shipping_postcode_field" data-priority="90">
                            <label for="shipping_postcode" class="">Postcode&nbsp;
                              <abbr class="required" title="required">*</abbr>
                            </label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="" value="" autocomplete="postal-code" />
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
                  <div class="c-cart__coupon-from-wrap">
                    <div class="c-cart__coupon-form">
                      <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" />
                      <button class="c-button--outline c-cart__coupon-apply c-button" id="ip-checkout-apply-coupon" name="apply_coupon" type="button">Apply</button>
                    </div>
                  </div>
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