@extends('frontend.main.index')

@section('title', 'Shop')

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

	.price-div {
		/* border-top: 2px solid goldenrod; */
		font-size: 17px;
		font-family: "roboto", sans-serif;
		padding-top: 5px;
		padding-bottom: 5px;
		text-align: center;
		color: white;
		margin-top: 5px;
		background-image: linear-gradient(to bottom, #666362, #413839);
	}

	.c-product-grid__thumb-button-list-shop {
		display: flex;
		justify-content: space-between;
	}

	.c-product-grid__thumb-button-list-shop .discount {
		z-index: 9;
	}

	.c-product-grid__thumb-button-list-shop .discount .c-product-grid__badges-shop .c-badge-shop {
		width: 40px;
		height: 40px;
		border-radius: 100%;
		padding: 0;
		justify-content: center;
		display: flex;
		align-items: center;
		border-radius: 100%;
		padding: 12px 5px;
	}

	.c-badge-shop {
		-webkit-box-flex: 0;
		flex: 0 0 auto;
		display: inline-block;
		text-transform: uppercase;
		color: #FFF;
		font-style: normal;
		font-weight: bold;
		font-size: 10px;
		line-height: 11px;
		letter-spacing: 0.03em;
		text-align: center;
		margin-bottom: 5px;
		border-radius: 100%;
		width: 40px;
		height: 40px;
	}

	.c-badge--sale {
		display: flex;
		align-items: center;
		justify-content: center;
		margin-left: -13px;
		margin-top: -5px;

	}


	.c-product-grid__thumb-button-list-shop .c-wishlist__btn {
		align-items: baseline;
	}

	.c-product-grid__icon-shop {
		position: absolute;
		top: 9px;
	}
</style>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
	<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--product-list">
		<!-- resources/views/frontend/page	 -->
		<div class="c-page-header__wrap">
			<h1 class="c-page-header__title">Shop</h1>
		</div>
		<nav class="c-breadcrumbs">
			<ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Home" href="{{ url('/') }}">
						<span itemprop="name">Home</span>
					</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
					<meta itemprop="position" content="1">
				</li>
				<li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Shop" href="{{ url('shop/all') }}">
						<span itemprop="name">Shop</span>
					</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
					<meta itemprop="position" content="3">
				</li>
				<li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Shop" href="{{ url('shop',$tag) }}">
						<span itemprop="name">{{ strtoupper($tag) }}</span>
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
		<div class="l-section__sidebar">
			<div class="c-sidebar c-shop-sidebar c-shop-sidebar--desktop-filter js-shop-sidebar ">
				<div class="c-shop-sidebar__shadow">
				</div>
				<div class="c-shop-sidebar__wrap js-shop-sidebar-wrap">
					<div class="c-shop-sidebar__buttons">
						<button type="button" class="h-cb h-cb--svg c-shop-sidebar__close js-filter-close-button">
							<i class="ip-close-small c-header__menu-close-svg"></i>
						</button>
					</div>
					<div class="c-shop-sidebar__content c-shop-sidebar__content--desktop-filter js-shop-sidebar-content-desktop">
						<!-- Filter sidebar for computer begin -->
						<form action="{{ url('shop', $tag) }}" method="get" id="categoryPageFrom">
							<input type="text" hidden name="pagination" id="paggination" value="">
							<input type="hidden" id="paginateFrom" name="from" value="{{ $from }}">
							<input type="hidden" id="paginateTo" name="to" value="{{ $to }}">
							<aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
								<div class="widget-title">Price Range : <span id="min_price_filter_text"><br>₹{{ $min_price_filter }}</span> - <span id="max_price_filter_text">₹{{ $max_price_filter }}</span></div>
								<div class="price_slider_wrapper">
									<div id="slider" wire:ignore></div>
								</div>
							</aside>
							<!-- @if(!empty($sub_categories) && count($sub_categories) > 0)
							<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
								<div class="widget-title">Product categories</div>
								<ul class="product-categories">
									@foreach($sub_categories as $pet_cat)
									<li class="cat-item cat-item-50 cat-parent">

										<input type="checkbox" name="filter_category[]" id="filterCategory" class="parent-category filter_category" value="{{$pet_cat->slug}}" {{ !empty($filter_old) && in_array($pet_cat->slug,$filter_old) ? "checked" : "" }}>
										<label for="">{{ $pet_cat->name }}</label>

										@if(!empty($pet_cat->subcategory) && count($pet_cat->subcategory) > 0)
										<ul class='children'>
											@foreach($pet_cat->subcategory as $sub)
											<li class="cat-item cat-item-58 cat-parent">
												<input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$sub->slug}}" {{ !empty($filter_old) && in_array($sub->slug,$filter_old) ? "checked" : "" }}>
												<label for="">{{ $sub->name }}</label>
												@foreach($sub->subcategory as $su)
												<ul class='children' style="margin-left: 15px !important;">
													<li class="cat-item cat-item-50 cat-parent">
														<input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$su->slug}}" {{ !empty($filter_old) && in_array($su->slug,$filter_old) ? "checked" : "" }}>
														<label for="">{{ $su->name }}</label>
													</li>
												</ul>
												@endforeach
											</li>
											@endforeach
										</ul>
										@endif
									</li>
									@endforeach

								</ul>
							</aside>
							@endif -->

							<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
								<div class="widget-title">Product Brands</div>
								<ul class="product-categories">
									@foreach($brands as $brand)
									<li class="cat-item cat-item-50 cat-parent">
										<input type="checkbox" name="filter_brand[]" id="filterBrand" class="filter_brand" value="{{ $brand->id }}" {{ !empty($filter_brands) && count($filter_brands) && in_array($brand->id,$filter_brands) ? "checked" : "" }}>
										<label for="">{{ $brand->name }}</label>
									</li>
									@endforeach
								</ul>
							</aside>


							<aside id="woocommerce_layered_nav-2" style="margin-top: 20px;" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
								<input type="text" name="min_price_filter" id="min_price_filter" value="" hidden>
								<input type="text" name="max_price_filter" id="max_price_filter" value="" hidden>
								<button type="submit" id="filterButton" class="button">Filter</button>
							</aside>

							<!-- Filter sidebar for computer end -->
					</div>
					<div class="c-shop-sidebar__content c-shop-sidebar__content--mobile js-shop-sidebar-content">
						<aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter">
							<!-- <h2 class="widget-title">Price</h2> -->

							<div class="price_slider_wrapper">
								<div class="widget-title">Price Range : <span id="min_price_filter_text"><br>₹{{ $min_price_filter }}</span> - <span id="max_price_filter_text">₹{{ $max_price_filter }}</span></div>
								<!-- <div class="price_slider" style="display:none;">
								</div> -->
								<!-- <div class="price_slider_amount" data-step="10">
									<input type="text" id="min_price" name="min_price" value="20" data-min="20" placeholder="Min price" />
									<input type="text" id="max_price" name="max_price" value="200" data-max="200" placeholder="Max price" />
									<div class="price_label" style="display:none;">Price:
										<span class="from">
										</span>&mdash;
										<span class="to">
										</span>
									</div>
									<input type="hidden" name="set" value="5" />
									<div class="clear">
									</div>
								</div> -->
							</div>
						</aside>
						<!-- <aside id="woocommerce_layered_nav-3" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
							<h2 class="widget-title">Capacity</h2>
							<ul class="woocommerce-widget-layered-nav-list">
								<li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
									<a rel="nofollow" href="https://parkofideas.com/luchiana/demo/shop/?filter_capacity=30ml">30 mL</a>
									<span class="count">(4)</span>
								</li>
								<li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
									<a rel="nofollow" href="https://parkofideas.com/luchiana/demo/shop/?filter_capacity=40ml">40 mL</a>
									<span class="count">(10)</span>
								</li>
								<li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
									<a rel="nofollow" href="https://parkofideas.com/luchiana/demo/shop/?filter_capacity=50ml">50 mL</a>
									<span class="count">(7)</span>
								</li>
							</ul>
						</aside> -->
						<!-- @if(!empty($sub_categories) && count($sub_categories) > 0)
						<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
							<div class="widget-title">Product categories</div>
							<ul class="product-categories">
								@foreach($sub_categories as $pet_cat)
								<li class="cat-item cat-item-50 cat-parent">

									<input type="checkbox" name="filter_category[]" id="filterCategory" class="parent-category filter_category" value="{{$pet_cat->slug}}" {{ !empty($filter_old) && in_array($pet_cat->slug,$filter_old) ? "checked" : "" }}>
									<label for="">{{ $pet_cat->name }}</label>

									@if(!empty($pet_cat->subcategory) && count($pet_cat->subcategory) > 0)
									<ul class='children'>
										@foreach($pet_cat->subcategory as $sub)
										<li class="cat-item cat-item-58 cat-parent">
											<input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$sub->slug}}" {{ !empty($filter_old) && in_array($sub->slug,$filter_old) ? "checked" : "" }}>
											<label for="">{{ $sub->name }}</label>
											@foreach($sub->subcategory as $su)
											<ul class='children' style="margin-left: 15px !important;">
												<li class="cat-item cat-item-50 cat-parent">
													<input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$su->slug}}" {{ !empty($filter_old) && in_array($su->slug,$filter_old) ? "checked" : "" }}>
													<label for="">{{ $su->name }}</label>
												</li>
											</ul>
											@endforeach
										</li>
										@endforeach
									</ul>
									@endif
								</li>
								@endforeach

							</ul>
						</aside>
						@endif -->

						<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
							<div class="widget-title">Product Brands</div>
							<ul class="product-categories">
								@foreach($brands as $brand)
								<li class="cat-item cat-item-50 cat-parent">
									<input type="checkbox" name="filter_brand[]" id="filterBrand" class="filter_brand" value="{{ $brand->id }}" {{ !empty($filter_brands) && count($filter_brands) && in_array($brand->id,$filter_brands) ? "checked" : "" }}>
									<label for="">{{ $brand->name }}</label>
								</li>
								@endforeach
							</ul>
						</aside>
						<div class="price_slider_wrapper my-2" style="text-align: center; margin : 10px 0;">
								<button type="submit" class="button" style="border: none; padding : 5px ; border : 1px solid #000; width:50%; background : #fff; ">Filter</button>
								<input type="hidden" name="set" value="5" />
								<div class="clear">
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="l-section__content">
			<div class="">
				<div class="c-catalog-ordering  c-catalog-ordering--desktop-filter ">
					<div class="c-catalog-ordering__col c-catalog-ordering__col--result">
						<p class="woocommerce-result-count">Showing {{ $from }}&ndash;{{ $to > $total_counts ? $total_counts : $to }} of {{ $total_counts }} results</p>
					</div>
					<div class="c-catalog-ordering__col c-catalog-ordering__col--ordering">
						<select name="orderby" class="orderby" id="orderbyFilter" aria-label="Shop order">
							<option value="" selected='selected'>Default sorting</option>
							<option value="latest" {{ $filter_sorting == "latest" ? "selected" : "" }}>Sort by latest</option>
							<option value="lowtohigh" {{ $filter_sorting == "lowtohigh" ? "selected" : "" }}>Sort by price: low to high</option>
							<option value="hightolow" {{ $filter_sorting == "hightolow" ? "selected" : "" }}>Sort by price: high to low</option>
						</select>
					</div>
					</form>

					<button class="h-cb c-catalog-ordering__filter-show-button js-filter-show-button" type="button">Filter
						<i class="ip-filter c-catalog-ordering__filter-ico"></i>
					</button>
				</div>

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

								@if($product->discount_type == "percentage")
								<div class="c-product-grid__badges c-badge__list">
									@if(!empty($product->label_name))
									<span class="c-badge-shop c-badge--featured">{{ $product->label_name }}</span>
									@endif
									@if(!empty($product->p_discount && $product->p_discount > 0))
									<span class="c-badge-shop c-badge--sale">{{ $product->p_discount }}% OFF</span>
									@elseif($product->discount > 0)
									<span class="c-badge-shop c-badge--sale">{{ $product->discount }}% OFF</span>
									@endif
								</div>
								@endif

								@if($product->discount_type == "flat")
								<div class="c-product-grid__badges c-badge__list">
									@if(!empty($product->label_name))
									<span class="c-badge-shop c-badge--featured">{{ $product->label_name }}</span>
									@endif
									<span class="c-badge-shop c-badge--sale">- &#8377; {{ $product->regular_price - $product->sale_price }}</span>
								</div>
								@endif
								<!-- .c-product-grid__badges -->
								<div class="c-product-grid__thumb-wrap">
									<a href="{{ url('products',['product' => $product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
										<img width="460" height="460" src="{{ isset($media->media) ? asset('storage/products/variants/'.$media->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 460px) 100vw, 460px" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
									</a>
									<div class="c-product-grid__thumb-button-list">
										<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $product->id }}-btn h-cb c-product-grid__thumb-button" data-product-id="{{ $product->id }}" data-title="Wishlist">
											<i class="ip-heart c-product-grid__icon  c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
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
										<a href="{{ url('products',['product' => $product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
											<h2 class="woocommerce-loop-product__title">{{ $product->item_shade_name }}</h2>
										</a>
										<div class="c-product-grid__short-desc">
											<p class="short-description">{{ $product->short_description }}</p>
										</div>
									</div>
									<div class="c-product-grid__price-wrap price-div">
										<span class="price">
											@php
											$discount = $product->regular_price * $product->p_discount/100;
											$dis_amount = $product->regular_price - $discount;
											@endphp

											@if(!empty($product->p_discount))
											@if($product->p_discount > 0)
											<del aria-hidden="true">
												<span class="woocommerce-Price-amount amount">
													<bdi>
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $product->regular_price }}</bdi>
												</span>
											</del>
											@endif
											<ins>
												<span class="woocommerce-Price-amount amount">
													<bdi>
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $dis_amount }}</bdi>
												</span>
											</ins>
											@else
											@if( $product->discount_type != "")
											<del aria-hidden="true">
												<span class="woocommerce-Price-amount amount">
													<bdi>
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $product->regular_price }}</bdi>
												</span>
											</del>
											@endif
											<ins>
												<span class="woocommerce-Price-amount amount">
													<bdi>
														<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $product->sale_price }}</bdi>
												</span>
											</ins>
											@endif
										</span>
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
							<a class="prev page-numbers" href="{{ url('shop/'.$tag.'?page=1') }}{{ !empty($cutsom_url) ? '&'.$cutsom_url : '' }}" onclick="return <?php echo $prev; ?>;">
								<i class="ip-menu-left page-numbers__prev-ico"></i>
							</a>
						</li>
						@foreach($no_of_pages as $page)
						<li>
							<a class="page-numbers" href="{{ url('shop/'.$tag.'?page='.$page) }}{{ !empty($cutsom_url) ? '&'.$cutsom_url : '' }}">{{ $page }}</a>
						</li>
						@endforeach
						<li>
							<a class="next page-numbers" href="{{ url('shop/'.$tag.'?page='.$products->lastPage()) }}{{ !empty($cutsom_url) ? '&'.$cutsom_url : '' }}" onclick="return <?php echo $next; ?>;">
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
<script type="text/javascript">
	let to = '{{ $to }}';
	let totalCount = '{{ $total_counts }}';
	$(document).ready(function() {
		// $(document).on('click','#filterCategory',function(e){
		//   e.preventDefault();
		//   $('#categoryPageFrom').submit();
		// });
		$(document).on('change', '#orderbyFilter', function(e) {
			e.preventDefault();
			if ($('#orderbyFilter').val() != "") {
				$('#categoryPageFrom').submit();
			}
		});

		$(document).on('click', '#filterButton', function(e) {
			e.preventDefault();
			$('#categoryPageFrom').submit();
		});

		var slider = document.getElementById('slider');
		var max_price_filter = "{{ $max_price_filter }}";
		noUiSlider.create(slider, {
			start: ["{{ $min_price_old }}", "{{ $max_price_old }}"],
			connect: true,
			range: {
				'min': 0,
				'max': {
					max_price_filter
				}
			},
			pips: {
				mode: 'steps',
				stepped: true,
				density: 4
			}
		});

		slider.noUiSlider.on('update', function(value) {
			priceChangeFilter(value[0], value[1]);
		});

		function priceChangeFilter(min_price, max_price) {
			$('#min_price_filter_text').text(min_price);
			$('#max_price_filter_text').text(max_price);
			$('#min_price_filter').val(min_price);
			$('#max_price_filter').val(max_price);
		}

		$(document).on('click', '.paginate-previous', function(e) {
			e.preventDefault();
			if ("{{ $from }}" <= 0) {

			} else {
				$('#paginateFrom').val(parseInt($('#paginateFrom').val()) - 10);
				$('#paginateTo').val(parseInt($('#paginateTo').val()) - 10);
				$('#categoryPageFrom').submit();
			}
		});

		$(document).on('click', '.paginate-next', function(e) {
			e.preventDefault();
			if (parseInt(to) > parseInt(totalCount)) {
				console.log();
			} else {
				$('#paginateFrom').val(parseInt($('#paginateFrom').val()) + 10);
				$('#paginateTo').val(parseInt($('#paginateTo').val()) + 10);
				$('#categoryPageFrom').submit();
			}
		});

		// $(document).on('change','.parent-category', function() {
		//   if($(this).is(":checked") == true) {
		//     $(this).parent().css( "background-color", "red" );

		//     $.map( $(this).parent().find('ul .children'), function( val, i ) {
		//       console.log(val);
		//     });   
		//     console.log();
		//   } 

		// });
	});
</script>
@endsection