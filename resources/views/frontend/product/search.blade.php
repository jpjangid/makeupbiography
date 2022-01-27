@extends('frontend.main.index')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" />
<style>
	.short-description {
		display: block;
		/* or inline-block */
		text-overflow: ellipsis;
		word-wrap: break-word;
		overflow: hidden;
		max-height: 3.6em;
		line-height: 1.8em;
	}

	a>svg {
		height: 20px !important;
		padding-top: 7px;
	}
</style>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
	<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--product-list">
		<div class="c-page-header__wrap">
			<h1 class="c-page-header__title">Search Results</h1>
		</div>
		<nav class="c-breadcrumbs">
			<ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Home" href="{{ url('') }}">
						<span itemprop="name">Home</span>
					</a>
				</li>
            </ol>
		</nav>
	</header>
	<div class="woocommerce-notices-wrapper">
	</div>
	<div class="woocommerce-notices-wrapper">
	</div>
	<!-- Sider filter slider Begin -->

	<div class="l-section l-section--container l-section--top-margin l-section--bottom-margin">
		<div class="l-section__content">
			<div class="">

				<div class="c-product-grid">
					<div class="c-product-grid__wrap c-product-grid__wrap--3-per-row ">
						<div class="c-product-grid__list c-product-grid__list--3-per-row ">
							@foreach($products as $key => $product)
							@php
							$media = $product_medias->where('product_id',$product->id)->first();
							@endphp

							<div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
								<div class="c-product-grid__badges c-badge__list">
								</div>
								<!-- .c-product-grid__badges -->
								<div class="c-product-grid__thumb-wrap">
									<a href="{{ url('products',['product' => $product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
										<img width="460" height="460" src="{{ isset($media->media) ? asset('storage/products/variants/'.$media->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 460px) 100vw, 460px" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
									</a>
									<div class="c-product-grid__thumb-button-list">
										<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $product->id }}-btn h-cb c-product-grid__thumb-button" data-product-id="{{ $product->id }}" data-title="Wishlist">
											<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
											<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
										</button>
									</div>
								</div>
								<!-- .c-product-grid__thumb-wrap -->

								@if($product->status == 1 && $product->flag == 0)
								<button data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $product->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
									<i class="ip-plus c-product-grid__atc-icon"></i>
									<span class="c-product-grid__atc-text">Add to cart</span>
								</button>
								@else
								<a href="" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple" onclick="return false;" data-product_id="{{ $product->id }}" data-product_sku="{{ $product->sku }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
									<i class=" c-product-grid__atc-icon"></i>
									<span class="c-product-grid__atc-text">Currently Unavailable</span>
								</a>
								@endif

								<div class="c-product-grid__details">
									<div class="c-product-grid__title-wrap">
										<a href="{{ url('products',['product' => $product->slug]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
											<h2 class="woocommerce-loop-product__title">{{ $product->item_shade_name }}</h2>
										</a>
										<div class="c-product-grid__short-desc">
											<p class="short-description">{{ $product->short_description }}</p>
										</div>
									</div>
									<!-- .c-product-grid__price-wrap -->
								</div>
								<!-- .c-product-grid__details -->
							</div>

							@endforeach
						</div>
					</div>
				</div>
				<nav class="woocommerce-pagination">
					<ul class='page-numbers'>
						<li>
							<a class="prev page-numbers" href="{{ url('search/result/'.$slug.'?page=1') }}" onclick="return <?php echo $prev; ?>;">
								<i class="ip-menu-left page-numbers__prev-ico"></i>
							</a>
						</li>
						@foreach($no_of_pages as $page)
						<li>
							<a class="page-numbers" href="{{ url('search/result/'.$slug.'?page='.$page) }}">{{ $page }}</a>
						</li>
						@endforeach
						<li>
							<a class="next page-numbers" href="{{ url('search/result/'.$slug.'?page='.$products->lastPage()) }}" onclick="return <?php echo $next; ?>;">
								<i class="ip-menu-right page-numbers__prev-ico"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<!-- Sider filter slider End -->

	<div class="l-section l-section--container entry-content c-product-grid__cat-desc c-product-grid__cat-desc--below">
	</div>
</div>
<!-- /.l-inner -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
@endsection