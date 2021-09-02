@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Cart</h1>
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
          <a itemprop="item" title="Cart" href="https://parkofideas.com/luchiana/demo/cart/">
            <span itemprop="name">Cart</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  @if ($message = Session::get('success'))
    <div class="woocommerce-notice shown" role="alert">
        <i class="ip-wc-success woocommerce-notice-success-svg"></i>
        {{ $message }}
        <button class="h-cb h-cb--svg woocommerce-notice-close js-notice-close" type="button"><i class="ip-close-small woocommerce-notice-close-svg"></i></button>
    </div>
  @endif
  </div>

  @if(count($cartItems) > 0 || count($cookieCartItems) > 0)
  <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin">
    <div class="l-section__content">
      <div class="woocommerce">
        <div class="c-cart">
          <div class="c-cart__wrap">
            <div class="c-cart__col-1">
              <div class=" js-sticky-sidebar-nearby ">
                <form class="woocommerce-cart-form" action="{{ url('cart/items/update') }}" method="post">
                  @csrf
                  <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents c-cart__shop-table" cellspacing="0">
                    <thead class="c-cart__shop-thead">
                      <tr>
                        <th class="c-cart__shop-th c-cart__shop-th--product-name" colspan="2">Product</th>
                        <th class="c-cart__shop-th c-cart__shop-th--product-quantity">Quantity</th>
                        <th class="c-cart__shop-th c-cart__shop-th--product-subtotal">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody class="c-cart__shop-tbody">
                      <tr class="c-cart__shop-tr c-cart__shop-tr--space">
                        <td colspan="4" class="c-cart__shop-td-space">
                        </td>
                      </tr>
                      @foreach($cartItems as $item)
                      <tr class="c-cart__shop-tr cart_item">
                        <input type="number" name="cart_id[]" value="{{ $item->id }}" hidden>
                        <td class="c-cart__shop-td c-cart__shop-td--product-thumbnail">
                          <a href="{{ url('remove/cart/item',['id'=>$item->id,'variant_id' => $item->product_variant_id]) }}" class="c-cart__shop-remove remove" aria-label="Remove this item" data-product_id="438" data-product_sku="6549845321">
                            <i class="ip-close-small c-cart__shop-remove-icon"></i>
                          </a>
                          <a class="c-cart__thumbnail-link" href="">
                            <img width="115" height="115" src="" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061.jpg 1200w" sizes="(max-width: 115px) 100vw, 115px" />
                          </a>
                        </td>
                        <td class="c-cart__shop-td c-cart__shop-td--product-name" data-title="Product">
                          <a href="">{{ $item->product->name."-".$item->productVariant->name }}</a>
                          <span class="c-cart__item-price">
                            <span class="woocommerce-Price-amount amount">
                              <bdi>
                                <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->productVariant->sale_price }}</bdi>
                            </span>
                          </span>
                        </td>
                        <td class="c-cart__shop-td c-cart__shop-td--product-quantity" data-title="Quantity">
                          <div class="c-product__quantity quantity">
                            <label class="screen-reader-text" for="quantity_611e40a1cb9f6">Airbrush Matte quantity</label>
                            <input type="number" id="quantity_611e40a1cb9f6" class="h-cb c-product__quantity-value qty" step="1" min="0" name="quantity[]" value="{{ $item->quantity }}" title="Qty" placeholder="" inputmode="numeric" />
                            
                            <button class="h-cb c-product__quantity-minus js-quantity-minus" type="button">
                              <i class="ip-minus"></i>
                            </button>
                            <button class="h-cb c-product__quantity-plus js-quantity-plus" type="button">
                              <i class="ip-plus_big"></i>
                            </button>
                          </div>
                        </td>
                        <td class="c-cart__shop-td c-cart__shop-td--product-price c-cart__shop-td--product-subtotal" data-title="Subtotal">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->productVariant->sale_price*$item->quantity }}</bdi>
                          </span>
                        </td>
                      </tr>
                      @endforeach  

                      @foreach($cookieCartItems as $item)
                      <tr class="c-cart__shop-tr cart_item">
                        <input type="number" name="product_id[]" value="{{ $item['product']->id }}" hidden>
                        <input type="number" name="product_variant_id[]" value="{{ $item['product_variant_id'] }}" hidden>
                        <td class="c-cart__shop-td c-cart__shop-td--product-thumbnail">
                          <a href="{{ url('remove/cart/item',['id'=>$item['product']->id]) }}" class="c-cart__shop-remove remove" aria-label="Remove this item" data-product_id="438" data-product_sku="6549845321">
                            <i class="ip-close-small c-cart__shop-remove-icon"></i>
                          </a>
                          <a class="c-cart__thumbnail-link" href="">
                            <img width="115" height="115" src="" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061.jpg 1200w" sizes="(max-width: 115px) 100vw, 115px" />
                          </a>
                        </td>
                        @php 
                          $productVariantName = "";
                          $productVariantSlug = "";
                          $salePrice = 0.00;
                          foreach($item['product']->variants as $var) {
                            if($item['product_variant_id'] == $var->id) {
                              $productVariantSlug = $var->slug;
                              $productVariantName = $var->name;
                              $salePrice = $var->sale_price;
                            }
                          }
                        @endphp
                        <td class="c-cart__shop-td c-cart__shop-td--product-name" data-title="Product">
                          <a href="">{{ $item['product']['name']."-".$productVariantName}}</a>
                          <span class="c-cart__item-price">
                            <span class="woocommerce-Price-amount amount">
                              <bdi>
                                <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $salePrice }}</bdi>
                            </span>
                          </span>
                        </td>
                        <td class="c-cart__shop-td c-cart__shop-td--product-quantity" data-title="Quantity">
                          <div class="c-product__quantity quantity">
                            <label class="screen-reader-text" for="quantity_611e40a1cb9f6">Airbrush Matte quantity</label>
                            <input type="number" id="quantity_611e40a1cb9f6" class="h-cb c-product__quantity-value qty" step="1" min="0" name="quantity[]" value="{{ $item['quantity'] }}" title="Qty" placeholder="" inputmode="numeric" />
                            
                            <button class="h-cb c-product__quantity-minus js-quantity-minus" type="button">
                              <i class="ip-minus"></i>
                            </button>
                            <button class="h-cb c-product__quantity-plus js-quantity-plus" type="button">
                              <i class="ip-plus_big"></i>
                            </button>
                          </div>
                        </td>
                        <td class="c-cart__shop-td c-cart__shop-td--product-price c-cart__shop-td--product-subtotal" data-title="Subtotal">
                          <span class="woocommerce-Price-amount amount">
                            <bdi>
                              <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $salePrice*$item['quantity'] }}</bdi>
                          </span>
                        </td>
                      </tr>
                      @endforeach  
                      
                      <tr class="c-cart__shop-tr c-cart__shop-tr--space">
                        <td colspan="4" class="c-cart__shop-td-space">
                        </td>
                      </tr>
                      <tr class="c-cart__shop-tr c-cart__shop-tr--actions">
                        <td colspan="5" class="c-cart__shop-td c-cart__shop-td--actions">
                          <span class="c-cart__shop-update">
                            <input type="submit" class="c-button c-button--outline c-cart__shop-update-button button" name="update_cart" value="Update cart" />
                          </span>
                          <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="5d80b18e36" />
                          <input type="hidden" name="_wp_http_referer" value="/luchiana/demo/cart/" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
            <div class="c-cart__col-2">
              <div class="cart-collaterals c-cart__collaterals js-sticky-sidebar ">
                <div class="c-cart__totals cart_totals ">
                  <!-- <div class="c-cart__coupon">
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
                  </div> -->
                  <table class="c-cart__totals-table shop_table">
                    <tr class="c-cart__totals-subtotal cart-subtotal">
                      <th class="c-cart__sub-sub-header">Subtotal</th>
                      <td class="c-cart__totals-price" data-title="Subtotal">
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
                    @if($discountPrice > 0)        
                    <tr class="c-cart__totals-subtotal cart-subtotal">
                      <th class="c-cart__sub-sub-header">Discount</th>
                      <td class="c-cart__totals-price" data-title="Subtotal">
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
                    @endif      
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
                      <td class="c-cart__totals-action wc-proceed-to-checkout" colspan="2">
                        <a href="{{ url('checkout') }}" class="c-button c-button--big c-cart__checkout-btn checkout-button button alt wc-forward">Checkout</a>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="c-cart__cross-sell">
        </div>
      </div>
    </div>
  </div>
  @else 
  <div class="l-inner">
    <div class="woocommerce-notices-wrapper">
    </div>
    <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
      <div class="l-section__content">
        <div class="woocommerce">
          <div class="c-cart-empty">
            <div class="c-cart-empty__image-wrap">
              <i class="ip-cart-normal c-cart-empty__icon c-cart-empty__icon--failed"></i>
            </div>
            <h1 class="c-cart-empty__header">Your cart is currently empty</h1>
            <a class="c-button c-button--outline c-cart-empty__backward" href="{{ url('/') }}">Return to shop</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.l-inner -->
  @endif
</div>
<!-- /.l-inner -->
@endsection