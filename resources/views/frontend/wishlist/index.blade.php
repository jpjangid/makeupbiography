@extends('frontend.main.index')

@section('title','Wishlist')

@section('content')
<div class="l-inner">
	<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--wc c-page-header--low">
		<div class="c-page-header__wrap">
			<h1 class="c-page-header__title">Wishlist</h1>
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
					<a itemprop="item" title="Wishlist" href="https://parkofideas.com/luchiana/demo/wishlist/">
						<span itemprop="name">Wishlist</span>
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
	<div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin">
		@if(count($favorites) > 0)
		<div class="l-section__content">
			<div class="c-wishlist js-wishlist">
				<table class="c-wishlist__shop-table c-wishlist__table js-wishlist-table">
					<thead class="c-wishlist__shop-thead">
						<tr>
							<th class="c-wishlist__shop-th c-wishlist__shop-th--product-name" colspan="2">
								<span>Product</span>
							</th>
							<th class="c-wishlist__shop-th c-wishlist__shop-th--product-price">
								<span>Price</span>
							</th>
							<!-- <th class="c-wishlist__shop-th c-wishlist__shop-th--product-stock">
								<span>Stock Status</span>
							</th> -->
							<th class="c-wishlist__shop-th c-wishlist__shop-th--product-actions">
							</th>
						</tr>
					</thead>
					<tbody class="c-wishlist__shop-tbody">
						<tr class="c-wishlist__shop-tr c-wishlist__shop-tr--space">
							<td colspan="5" class="c-wishlist__shop-td-space">
							</td>
						</tr>

						@foreach($favorites as $favorite)
						<tr class="c-wishlist__shop-tr" data-product-id="438">
							<td class="c-wishlist__shop-td c-wishlist__shop-td--product-thumbnail">
								<a href="{{ url('wishlist/delete',$favorite->product_id) }}" class="c-wishlist__shop-remove" title="Remove">
									<i class="ip-close-small c-wishlist__shop-remove-icon"></i>
								</a>
								<a class="c-wishlist__thumbnail-link" href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/">
									<img width="115" height="115" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061.jpg 1200w" sizes="(max-width: 115px) 100vw, 115px" />
								</a>
							</td>
							<td class="c-wishlist__shop-td c-wishlist__shop-td--product-name c-wishlist__shop-td--product-normal">
								<a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/">{{ $favorite->product->item_shade_name }}</a>
							</td>
							<td class="c-wishlist__shop-td c-wishlist__shop-td--product-price">
								<span class="price">
									<!-- <del aria-hidden="true">
										<span class="woocommerce-Price-amount amount">
										<bdi>
											<span class="woocommerce-Price-currencySymbol">&#8377;</span></bdi>
										</span>
									</del> -->
									<ins>
										<span class="woocommerce-Price-amount amount">
											<bdi>
												<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $favorite->product->sale_price }}</bdi>
										</span>
									</ins>
								</span>
							</td>
							<!-- <td class="c-wishlist__shop-td c-wishlist__shop-td--product-stock">
								<span class="c-stock c-stock--in-stock in-stock">In stock</span>
							</td> -->
							<td class="c-wishlist__shop-td c-wishlist__shop-td--product-actions">
								<div class="c-wishlist__button-wrap">
									<form action="{{ url('wishlist/add/to/cart') }}" method="post">
										@csrf
										<input type="text" name="wishlistId" value="{{ $favorite->id }}" hidden>
										<button type="submit" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button" rel="nofollow">
											<i class="ip-plus c-product-grid__atc-icon"></i>
											<span class="c-product-grid__atc-text">Add to cart</span>
										</button>
									</from>
									<div class="c-quantity js-product-grid-quantity">
									</div>
									<span class="added_to_cart h-hidden">
									</span>
								</div>
							</td>
						</tr>
						@endforeach

						<tr class="c-wishlist__shop-tr c-wishlist__shop-tr--space">
							<td colspan="5" class="c-wishlist__shop-td-space">
							</td>
						</tr>
					</tbody>
				</table>
				<div class="c-wishlist__share">
					<div class="c-wishlist__share-col-1">
						<span class="c-wishlist__share-title">Share Link:</span>
						<input class="h-cb c-wishlist__share-link js-wishlist-share-link" readonly type="text" value="https://parkofideas.com/luchiana/demo/wishlist/?ip_wishlist_share=438,504" />
					</div>
					<div class="c-wishlist__share-col-2">
						<span class="c-wishlist__share-title">Share Wishlist:</span>
						<span class="c-post-share">
							<a class="c-post-share__link" target="_blank" href="//www.facebook.com/sharer.php?u=https://parkofideas.com/luchiana/demo/wishlist/?ip_wishlist_share=438,504" title="Share on Facebook">
								<i class="ip-facebook c-post-share__icon c-post-share__icon--facebook"></i>
							</a>
							<a class="c-post-share__link" target="_blank" href="//twitter.com/share?url=https://parkofideas.com/luchiana/demo/wishlist/?ip_wishlist_share=438,504" title="Share on Twitter">
								<i class="ip-twitter c-post-share__icon c-post-share__icon--twitter"></i>
							</a>
							<a class="c-post-share__link" target="_blank" href="//pinterest.com/pin/create/button/?url=https://parkofideas.com/luchiana/demo/wishlist/?ip_wishlist_share=438,504&amp;description=Wishlist" title="Pin on Pinterest">
								<i class="ip-pinterest c-post-share__icon c-post-share__icon--pinterest"></i>
							</a>
							<a class="c-post-share__link" target="_blank" href="whatsapp://send?text=https://parkofideas.com/luchiana/demo/wishlist/?ip_wishlist_share=438,504" title="Share on Whatsapp" data-action="share/whatsapp/share">
								<i class="ip-whatsapp c-post-share__icon c-post-share__icon--whatsapp"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
			<div class="c-cart-empty js-wishlist-empty  h-hidden">
				<div class="c-cart-empty__image-wrap">
					<i class="ip-wishlist-empty c-cart-empty__icon c-cart-empty__icon--failed"></i>
				</div>
				<h1 class="c-cart-empty__header">Your wishlist is currently empty</h1>
				<p class="c-cart-empty__note">Click the
					<i class="ip-wishlist c-cart-empty__wishlist"></i>icons to add products
				</p>
				<a class="c-button c-button--outline c-cart-empty__backward" href="https://parkofideas.com/luchiana/demo/shop/">Return to shop</a>
			</div>
		</div>
		@else
		<div class="l-section__content">
			<div class="c-cart-empty js-wishlist-empty ">
				<div class="c-cart-empty__image-wrap">
					<i class="ip-wishlist-empty c-cart-empty__icon c-cart-empty__icon--failed"></i>
				</div>
				<h1 class="c-cart-empty__header">Your wishlist is currently empty</h1>
				<p class="c-cart-empty__note">Click the
					<i class="ip-wishlist c-cart-empty__wishlist"></i>icons to add products
				</p>
				<a class="c-button c-button--outline c-cart-empty__backward" href="{{ url('/') }}">Return to shop</a>
			</div>
		</div>
		@endif
	</div>
</div>
<!-- /.l-inner -->
@endsection