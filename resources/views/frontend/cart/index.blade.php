@extends('frontend.main.index')

@section('content')
@php
use App\Models\ProductMedia;
@endphp
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
										@php
										$product_image = "";
										if(ProductMedia::where('product_id',$item->product_id)->where('flag',0)->orderby('sequence','asc')->first()) {
										$pro_img = ProductMedia::where(['product_id' => $item->product_id,
										'media_type' => 'image'])->orderby('sequence','asc')->first();
										$product_image = asset('storage/products/variants/'.$pro_img->media);
										}
										$discount = $item->regular_price * $item->p_discount/100;
										$discount_amt = $item->regular_price - $discount;
										@endphp
										@if(!empty($item->product))
										<tr class="c-cart__shop-tr cart_item">
											<input type="number" name="cart_id[]" value="{{ $item->id }}" hidden>
											<td class="c-cart__shop-td c-cart__shop-td--product-thumbnail">
												<a href="{{ url('remove/cart/item',['id'=>$item->id]) }}" class="c-cart__shop-remove remove" aria-label="Remove this item" data-product_id="438" data-product_sku="6549845321">
													<i class="ip-close-small c-cart__shop-remove-icon"></i>
												</a>
												<a class="c-cart__thumbnail-link" href="">
													<img width="115" height="115" src="{{ $product_image }}" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" loading="lazy" srcset="{{ $product_image }}" sizes="(max-width: 115px) 100vw, 115px" />
												</a>
											</td>
											<td class="c-cart__shop-td c-cart__shop-td--product-name" data-title="Product">
												<a href="">{{ $item->product->item_shade_name }}</a>
												<span class="c-cart__item-price">
													<span class="woocommerce-Price-amount amount">
														<bdi>
															@if(!empty($item->p_discount))
															<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $discount_amt }}</bdi>
														@else
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->product->sale_price }}</bdi>
														@endif
													</span>
												</span>
											</td>
											<td class="c-cart__shop-td c-cart__shop-td--product-quantity" data-title="Quantity">
												<div class="c-product__quantity quantity">
													<label class="screen-reader-text" for="quantity_611e40a1cb9f6">Airbrush Matte quantity</label>
													<input type="number" id="quantity_611e40a1cb9f6" class="h-cb c-product__quantity-value qty" step="1" min="0" name="quantity[]" value="{{ $item->quantity }}" title="Qty" placeholder="" inputmode="numeric" />
													<input type="hidden" name="cart_id" value="{{ $item->id }}" />
													<input type="hidden" name="update_url" value="{{ route('cartItemUpdate') }}" />
													<button class="h-cb c-product__quantity-minus js-quantity-minus1" type="button">
														<i class="ip-minus"></i>
													</button>
													<button class="h-cb c-product__quantity-plus js-quantity-plus1" type="button">
														<i class="ip-plus_big"></i>
													</button>
												</div>
											</td>
											<td class="c-cart__shop-td c-cart__shop-td--product-price c-cart__shop-td--product-subtotal" data-title="Subtotal">
												<span class="woocommerce-Price-amount amount">
													<!-- <bdi>
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->product->sale_price*$item->quantity }}</bdi> -->
													<!-- @php
													$dis_calculate =$item->product->regular_price * $item->p_discount /100;
													$dis_amount = $item->product->regular_price - $dis_calculate;
													@endphp -->
													@if(!empty($item->p_discount))
													<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $discount_amt * $item->quantity }}
													@else
													<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $item->sale_price*$item->quantity }}
													@endif</bdi>
												</span>
											</td>
										</tr>
										@endif
										@endforeach

										@foreach($cookieCartItems as $item)
										@php
										$p_dis = $item['product']->p_discount;
										$productName = "";
										$productSlug = "";
										$salePrice = 0.00;
										$productSlug = $item['product']->slug;
										$productName = $item['product']->name;
										$salePrice = $item['product']->sale_price;
										$productId = $item['product']->id;

										$product_image = "";
										if(ProductMedia::where(['product_id' => $productId, 'media_type' => 'image'])->where('flag',0)->orderby('sequence','asc')->first()) {
										$pro_img = ProductMedia::where(['product_id' => $productId, 'media_type' => 'image'])->orderby('sequence','asc')->first();
										$product_image = asset('storage/products/variants/'.$pro_img->media);
										}
										@endphp
										<tr class="c-cart__shop-tr cart_item">
											<input type="number" name="product_id[]" value="{{ $item['product']->id }}" hidden>
											<td class="c-cart__shop-td c-cart__shop-td--product-thumbnail">
												<a href="{{ url('remove/cart/item',['id'=>$item['product']->id]) }}" class="c-cart__shop-remove remove" aria-label="Remove this item" data-product_id="{{$item['product']->id}}" data-product_sku="{{$item['product']->sku}}">
													<i class="ip-close-small c-cart__shop-remove-icon"></i>
												</a>
												<a class="c-cart__thumbnail-link" href="">
													<img width="115" height="115" src="{{ $product_image }}" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" loading="lazy" srcset="{{ $product_image }}" sizes="(max-width: 115px) 100vw, 115px" />
												</a>
											</td>

											<td class="c-cart__shop-td c-cart__shop-td--product-name" data-title="Product">
												<a href="">{{ $item['product']['item_shade_name']}}</a>
												<span class="c-cart__item-price">
													<span class="woocommerce-Price-amount amount">
														<bdi>
															@php
															$dis_calculate =$item['product']->regular_price * $p_dis /100;
															$dis_amount = $item['product']->regular_price - $dis_calculate;
															@endphp
															@if(!empty($p_dis))
															<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $dis_amount }}
															@else
															<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $salePrice }}
															@endif
														</bdi>
													</span>
												</span>
											</td>
											<td class="c-cart__shop-td c-cart__shop-td--product-quantity" data-title="Quantity">
												<div class="c-product__quantity quantity">
													<label class="screen-reader-text" for="quantity_611e40a1cb9f6">Airbrush Matte quantity</label>
													<input type="number" id="quantity_611e40a1cb9f6" class="h-cb c-product__quantity-value qty" step="1" min="0" name="quantity[]" value="{{ $item['quantity'] }}" title="Qty" placeholder="" inputmode="numeric" />
													<input type="hidden" name="product_id" value="{{ $item['product']->id }}" />
													<button class="h-cb c-product__quantity-minus js-quantity-minus2" type="button">
														<i class="ip-minus"></i>
													</button>
													<button class="h-cb c-product__quantity-plus js-quantity-plus2" type="button">
														<i class="ip-plus_big"></i>
													</button>
												</div>
											</td>
											<td class="c-cart__shop-td c-cart__shop-td--product-price c-cart__shop-td--product-subtotal" data-title="Subtotal">
												<span class="woocommerce-Price-amount amount">
													<bdi>

														@php
														$dis_calculate =$item['product']->regular_price * $p_dis /100;
														$dis_amount = $item['product']->regular_price - $dis_calculate;
														@endphp
														@if(!empty($p_dis))
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $dis_amount*$item['quantity'] }}
														@else
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $salePrice*$item['quantity'] }}
														@endif</bdi>
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

												</span>
												<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="5d80b18e36" />
												<input type="hidden" name="_wp_http_referer" value="/luchiana/demo/cart/" />
											</td>
										</tr>
									</tbody>
								</table>
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

@section('js')
<script>
	$(document).on('click', ".js-quantity-minus1", function(e) {
		e.preventDefault();
		var $button = $(this);
		var cartId = $button.parent().find("input[name='cart_id']").val();
		var url1 = $button.parent().find("input[name='update_url']").val();
		var $input = $(this).parent().find('input[type=number]');
		if ($input.val() > 1) {
			var quantity = $input.val().trim();
			var min = $input.attr('min');
			quantity--;
			if (quantity < (min !== '' ? min : 1)) {
				quantity = (min !== '' ? min : 1);
			}
			$input.val(quantity);
			var newVal = quantity;
			$.ajax({
				type: 'post',
				url: url1,
				data: {
					_token: "{{ csrf_token() }}",
					cart_id: cartId,
					qty: newVal
				},
				dataType: 'JSON',
				success: function(result) {
					location.reload();
				}
			});
			$input.trigger('change');
		}
	})
	$(document).on('click', ".js-quantity-plus1", function(e) {
		e.preventDefault();
		var $button = $(this);
		var cartId = $button.parent().find("input[name='cart_id']").val();
		var url1 = $button.parent().find("input[name='update_url']").val();
		var $input = $(this).parent().find('input[type=number]');
		var quantity = $input.val().trim();
		var max = $input.attr('max');
		quantity++;
		if ((max !== '') && (quantity > max)) {
			quantity = max;
		}
		if (quantity > 0) {
			$.ajax({
				type: 'post',
				url: url1,
				data: {
					_token: "{{ csrf_token() }}",
					cart_id: cartId,
					qty: quantity
				},
				dataType: 'JSON',
				success: function(result) {
					location.reload();
				}
			});
			$input.val(quantity);
			$input.trigger('change');
		}
	})

	$(document).on('click', ".js-quantity-minus2", function(e) {
		e.preventDefault();
		var $button = $(this);
		var productId = $button.parent().find("input[name='product_id']").val();
		var productId = $button.parent().find("input[name='product_id']").val();
		var url1 = "{{ route('cartItemUpdate') }}";
		var $input = $(this).parent().find('input[type=number]');

		if ($input.val() > 1) {
			var quantity = $input.val().trim();
			var min = $input.attr('min');
			quantity--;
			if (quantity < (min !== '' ? min : 1)) {
				quantity = (min !== '' ? min : 1);
			}
			$input.val(quantity);
			var newVal = quantity;
			$.ajax({
				type: 'post',
				url: url1,
				data: {
					_token: "{{ csrf_token() }}",
					product_id: productId,
					qty: newVal,
					product_id: productId
				},
				dataType: 'JSON',
				success: function(result) {
					location.reload();
				}
			});
			$input.trigger('change');
		}
	})
	$(document).on('click', ".js-quantity-plus2", function(e) {
		e.preventDefault();
		var $button = $(this);
		var productId = $button.parent().find("input[name='product_id']").val();
		var productId = $button.parent().find("input[name='product_id']").val();
		var url1 = "{{ route('cartItemUpdate') }}";
		var $input = $(this).parent().find('input[type=number]');
		var quantity = $input.val().trim();
		var max = $input.attr('max');
		quantity++;
		if ((max !== '') && (quantity > max)) {
			quantity = max;
		}
		if (quantity > 0) {
			$.ajax({
				type: 'post',
				url: url1,
				data: {
					_token: "{{ csrf_token() }}",
					product_id: productId,
					qty: quantity,
					product_id: productId
				},
				dataType: 'JSON',
				success: function(result) {
					location.reload();
				}
			});
			$input.val(quantity);
			$input.trigger('change');
		}
	})
</script>
@endsection