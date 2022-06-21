@extends('frontend.layouts.app')

@section('css')
<style>
	@media screen and (max-width: 465px) {
		.c-ip-image-list-1__list {
			margin: 0px;
		}
	}

	@media screen and (max-width: 350px) {
		.c-product-grid__item--normal {
			/* width: 140px !important; */
			margin: 10px 0 !important;
			/* padding-bottom: 50px !important; */
		}
	}

	@media screen and (max-width: 380px) {
		.c-product-grid__item--normal {
			/* width: 160px !important; */
			margin: 10px 0 !important;
			/* padding-bottom: 50px !important; */
		}
	}

	@media (min-width: 760px) and (max-width: 770px) {
		.c-product-grid__item--normal {
			/* width: 160px !important;
			margin: 10px !important;
			padding-bottom: 35px !important; */
		}
	}

	@media (min-width: 560px) and (max-width: 590px) {
		.c-product-grid__item--normal {
			/* width: 160px !important; */
			margin: 10px !important;
			/* padding-bottom: 50px !important; */
		}
	}

	@media screen and (max-width: 768px) {
		.c-ip-heading--default {
			font-size: 15px;
			line-height: 25px;
		}

		.elementor-1131 .elementor-element.elementor-element-f6c8514 .c-ip-image-list-1__item:hover {
			box-shadow: none !important;
		}

		.elementor-1131.elementor-element.elementor-element-e52934a {
			margin-top: 90px;
		}

		.mb-video {
			margin-top: 30px;
		}

		.c-ip-product-tabs__menu-item {
			font-weight: bold;
			font-size: 12px;
			line-height: 8px;
			letter-spacing: 0.06em;
			margin-top: 15px;
			/* padding-bottom: 10px; */
		}

		.c-ip-heading.c-ip-heading--medium.c-ip-heading--center.c-ip-heading--tablet-.c-ip-heading--mobile-.c-ip-heading--bullet-hide {
			margin-top: -80px;
		}

		/* .c-product-grid__item--normal {
			width: 180px;
			margin: 16px !important;
			padding-bottom: 35px;
		} */

		.c-product-grid__item--normal .woocommerce-loop-product__title {
			line-height: 15px;
			letter-spacing: 0.1em;
			padding-left: 0.21em;
			font-size: 08px;
		}

		.elementor-column.elementor-col-33.elementor-top-column.elementor-element.elementor-element-8b0a55a {
			margin-top: -40px;
		}

		.c-ip-banners__button {
			width: 28%;
			font-size: 10px;
			padding: 10px;
		}

		.c-ip-banners__item,
		.c-ip-banners__list {
			flex-direction: column;
		}

		/* .c-ip-banners__image {
			object-fit: unset;
		} */
	}

	@media (max-width: 420px) {
		.c-product-grid__item--normal {
			/* width: 150px !important; */
			/* margin: 16px !important; */
			/* padding-bottom: 35px; */
		}
	}

	@media (max-width: 320px) {
		.c-product-grid__item--normal {
			/* width: 220px !important; */
			/* margin: 16px !important; */
			/* padding-bottom: 35px; */
		}
	}

	@media screen and (max-width: 567px) {
		.elementor-1131 .elementor-element.elementor-element-f6c8514 .c-ip-image-list-1__item {
			width: 85px;
			font-size: 13px;
			margin: 5px;
		}
	}

	@media screen and (min-width: 480px) {
		.image-stroke {
			width: 35%;
		}
	}

	@media(max-width:1188px) {
		.c-ip-heading__inner ul {
			padding-left: 0;
		}
	}

	@media screen and (max-width: 480px) {
		.image-stroke {
			width: 55%;
		}
	}

	#slider {
		overflow: hidden;
	}

	#slider figure {
		position: relative;
		width: 500%;
		margin: 0;
		left: 0;
		animation: 20s slider infinite;
	}

	#slider figure img {
		width: 20%;
		float: left;
	}

	@keyframes slider {
		0% {
			left: 0;
		}

		20% {
			left: 0;
		}

		25% {
			left: -100%;
		}

		45% {
			left: -100%;
		}

		50% {
			left: -200%;
		}

		70% {
			left: -200%;
		}

		75% {
			left: -300%;
		}

		95% {
			left: -300%;
		}

		100% {
			left: -400%;
		}
	}

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
		font-family: "Marcellus", sans-serif;
		padding-top: 5px;
		padding-bottom: 5px;
		text-align: center;
		color: white;
		margin-top: 5px;
		background-image: linear-gradient(to bottom, #666362, #413839);
	}

	.c-badge {
		-webkit-box-flex: 0;
		flex: 0 0 auto;
		display: inline-block;
		padding: 12px 5px;
		text-transform: uppercase;
		color: #FFF;
		font-style: normal;
		border-radius: 100%;
		font-weight: bold;
		font-size: 10px;
		line-height: 11px;
		/* margin-left: -13px; */
		letter-spacing: 0.03em;
		text-align: center;
		margin-bottom: 5px;
		background-color: var(--text-color);
	}

	.owl-stage-outer .owl-stage {
		width: 100% !important;
		/* height:100px; */
		display: flex;
	}

	.woocommerce {
		margin: 20px 0;
	}

	@media (max-width:426px) {
		.subscribe-btn {
			margin-top: 26.5px !important;
			left: -17px !important;
		}
	}

	@media (max-width:376px) {
		.subscribe-btn {
			margin-top: 10px !important;
			left: -8px !important;
		}
	}

	/* @media screen and (max-width: 768px){
		.price-div{
			margin-bottom: 10px;
		}
		.c-product-grid__atc {
			margin-bottom: 10px;
		}
	} */

	/* .blue-left-stroke {
		-webkit-transform: scaleX(-1);
		transform: scaleX(-1);
		height: 4%; 
		width: 9%;
	} */

	/* .blue-right-stroke {
		float: right; 
		padding-top: 0px;
		height: 4%; 
		width: 9%;
	} */

	/* @media screen and (max-width: 700px) {
		.blue-right-stroke {
			padding-top: 10px;
			width: 12%;
			height: 6%;
		}
		.blue-left-stroke {
			padding-bottom: 10px;
			width: 12%;
			height: 6%;
		}
	} */

	/* @media screen and (max-width: 455px) {
		.blue-right-stroke {
			width: 15%;
			height: 10%;
		}
		.blue-left-stroke {
			width: 15%;
			height: 10%;
		}
	} */

	.mb-video {
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.owl-carousel.owl-loaded {
		padding: 0 20px;
	}

	@media (max-width: 619px) and (min-width: 360px) {
		.c-ip-woocommerce-carousel__list--3-per-row {
			padding-right: 12px;
		}
	}

	@media screen and (max-width: 565px) {
		.c-ip-image-list-1__list {
			margin: -20px 0 0 0;
		}
	}

	@media screen and (max-width: 380px) {
		.c-ip-image-list-1__list {
			margin: 0;
		}

		.c-ip-image-list-1__wrap.c-ip-image-list-1__wrap--carousel {
			margin: 0;
		}
	}

	@media screen and (max-width: 330px) {
		.c-ip-image-list-1__list {
			margin: 0;
		}

		.c-ip-image-list-1__wrap.c-ip-image-list-1__wrap--carousel {
			margin: 0;
		}
	}

	@media screen and (max-width: 650px) {
		.elementor-1131 .elementor-element.elementor-element-e52934a {
			margin-top: 80px;
		}

		.elementor-1131 .elementor-element.elementor-element-3d1ff9f {
			margin-top: -30px;
		}
	}

	@media screen and (min-width: 1175px) {
		.img-stroke {
			padding-left: 100px;
		}

		.image-stroke {
			width: 40% !important;
		}
	}

	@media (min-width: 650px) and (max-width: 768px) {
		.elementor-1131 .elementor-element.elementor-element-e52934a {
			margin-top: 85px;
		}
	}

	@media screen and (max-width: 380px) {
		.c-ip-product-tabs__menu .owl-stage-outer .owl-stage .owl-item {
			margin-right: 35px !important;
		}
	}

	@media screen and (max-width: 360px) {
		.c-ip-product-tabs__menu .owl-stage-outer .owl-stage .owl-item {
			margin-right: 20px !important;
		}
	}

	.c-product-grid__title-wrap .woocommerce-LoopProduct-link .woocommerce-loop-product__title {
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		height: 3em;
	}

	@media screen and (max-width: 480px) {
		.c-product-grid__title-wrap .woocommerce-LoopProduct-link .woocommerce-loop-product__title {
			height: 2em;
		}

		.c-ip-image-list-1__thumb {
			width: 70px;
			height: 70px;
		}
	}

	.c-product-grid__badges {
		left: -10px;
	}

	.c-badge--sale {
		border-radius: 70px !important;
		height: 45px !important;
		width: 45px !important;
		padding-top: 15px !important;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.c-badge--featured {
		height: 25px !important;
		margin-right: -10px !important;
	}

	.elementor-column-wrap {
		width: 100%;
		margin: 0;
	}
</style>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
	<div data-elementor-type="wp-page" data-elementor-id="1131" class="elementor elementor-1131" data-elementor-settings="[]">
		<div class="elementor-inner" style="background-color: #E5E4E2;">
			<div class="elementor-section-wrap">
				<div id="slider">
					<figure>
						<img src="{{ asset('/images/1.webp') }}">
						<img src="{{ asset('/images/2.webp') }}">
						<img src="{{ asset('/images/3.webp') }}">
						<img src="{{ asset('/images/1.webp') }}">
						<img src="{{ asset('/images/2.webp') }}">
					</figure>
				</div>
			</div>
			<section class="elementor-section elementor-top-section elementor-element elementor-element-d63423e elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d63423e" data-element_type="section" style="background-image: linear-gradient(to top, #666362, #413839); padding-bottom:30px; padding-top: 30px; margin-bottom: 20px;">
				<!-- <img class="blue-left-stroke" src="{{ asset('/images/paint-stroke.png') }}"> -->
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-83255c5" data-id="83255c5" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-f6c8514 elementor-widget elementor-widget-ideapark-image-list-1" data-id="f6c8514" data-element_type="widget" data-widget_type="ideapark-image-list-1.default">
										<div class="elementor-widget-container">
											<div class="c-ip-image-list-1 c-ip-image-list-1--carousel">
												<div class="c-ip-image-list-1__wrap c-ip-image-list-1__wrap--carousel">
													<div class="c-ip-image-list-1__list c-ip-image-list-1__list--carousel js-image-list-1 h-carousel h-carousel--dots-hide h-carousel--nav-hide">
														@if(!empty($main_categories))
														@foreach($main_categories as $main_category)
														<div class="c-ip-image-list-1__item c-ip-image-list-1__item--carousel">
															<a href="{{ url('category',['slug' => $main_category->slug]) }}" class="c-ip-image-list-1__link">
																<div class="c-ip-image-list-1__thumb">
																	<img class="c-ip-image-list-1__image" width="115" height="50vh" src="{{ isset($main_category->featured_image) ? asset('storage/category/'.$main_category->featured_image) : '' }}" srcset="{{ isset($main_category->featured_image) ? asset('storage/category/'.$main_category->featured_image) : '' }} 180w" sizes="(max-width: 115px) 100vw, 115px" alt="{{ $main_category->alt }}" loading="lazy" />
																</div>
																<div class="c-ip-image-list-1__title">{{ $main_category->name }}</div>
															</a>
														</div>
														@endforeach
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <img class="blue-right-stroke" src="{{ asset('/images/paint-stroke.png') }}"> -->
			</section>
			<!-- <section class="elementor-section elementor-top-section elementor-element elementor-element-e52934a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="e52934a" data-element_type="section">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ce406a4" data-id="ce406a4" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-34b38e3 elementor-widget elementor-widget-ideapark-heading" data-id="34b38e3" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="img-stroke c-ip-heading c-ip-heading--medium c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
												<img src="{{ asset('/images/paint-brush-stroke-new.png') }}" class="image-stroke">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<section class="elementor-section elementor-top-section elementor-element elementor-element-d57b645 elementor-section-full_width elementor-section-height-default" style="margin-top: -50px;" data-id="d57b645" data-element_type="section">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c9d7225" data-id="c9d7225" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-01406ee elementor-widget elementor-widget-ideapark-product-tabs" data-id="01406ee" data-element_type="widget" data-widget_type="ideapark-product-tabs.default">
										<div class="elementor-widget-container">
											<div class="c-ip-product-tabs js-ip-tabs">
												<div class="c-ip-product-tabs__wrap js-ip-tabs-wrap">
													<div style="display : grid; grid-template-columns : 25% 25% 25% 25%" class="c-ip-product-tabs__menu js-ip-tabs-list h-carousel h-carousel--hover">
														<div class="c-ip-product-tabs__menu-item js-ip-tabs-menu-item active">
															<a class="c-ip-product-tabs__menu-link js-ip-tabs-link" href="#tab-01406ee-1" data-index="0" onclick="return false;">Newest</a>
														</div>
														<div class="c-ip-product-tabs__menu-item js-ip-tabs-menu-item ">
															<a class="c-ip-product-tabs__menu-link js-ip-tabs-link" href="#tab-01406ee-2" data-index="1" onclick="return false;">Popular</a>
														</div>
														<div class="c-ip-product-tabs__menu-item js-ip-tabs-menu-item ">
															<a class="c-ip-product-tabs__menu-link js-ip-tabs-link" href="#tab-01406ee-3" data-index="2" onclick="return false;">Category</a>
														</div>
														<div class="c-ip-product-tabs__menu-item js-ip-tabs-menu-item ">
															<a class="c-ip-product-tabs__menu-link js-ip-tabs-link" href="#tab-01406ee-4" data-index="3" onclick="return false;">Brand</a>
														</div>
													</div>
												</div>
												<div class="c-ip-product-tabs__list">
													<!-- Top Products Newest Begin -->

													<div class="c-ip-product-tabs__item visible active" id="tab-01406ee-1">
														<div class="woocommerce columns-4 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">
																	<!-- Top Newest Product List Item Begin -->
																	@if(!empty($main_newest_products))
																	@foreach($main_newest_products as $main_newest_product)
																	@if(str_contains($main_newest_product->tags,'newest'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple" style="background-color: white;">

																		@if($main_newest_product->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			@if(!empty($main_newest_product->p_discount && $main_newest_product->p_discount > 0))
																			<span class="c-badge c-badge--sale">
																				{{ $main_newest_product->p_discount }}% OFF</span>
																			@elseif($main_newest_product->discount >0)
																			<span class="c-badge c-badge--sale">
																				{{ $main_newest_product->discount }}% OFF</span>
																			@else

																			@endif

																		</div>
																		@endif

																		@if($main_newest_product->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $main_newest_product->regular_price - $main_newest_product->sale_price }}</span>
																		</div>
																		@endif

																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap">
																			<a href="{{ url('products',['product' => $main_newest_product->slug]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img src="{{ isset($main_newest_product->medias[0]->media) ? asset('storage/products/variants/'.$main_newest_product->medias[0]->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="{{ isset($main_newest_product->medias[0]->media) ? asset('storage/products/variants/'.$main_newest_product->medias[0]->media) : '' }}" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $main_newest_product->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_newest_product->id }}" data-product_variant="{{ $main_newest_product->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_newest_product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_newest_product->item_shade_name }}</h2>
																				</a>
																				<!-- <div class="c-product-grid__short-desc">
																					<p class="short-description">{{ $main_newest_product->short_description }}</p>
																				</div> -->
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating" style="font-size: 16px;">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap price-div">
																				<span class="price">
																					@php
																					$discount = $main_newest_product->regular_price * $main_newest_product->p_discount/100;
																					$dis_amount = $main_newest_product->regular_price - $discount;
																					@endphp
																					@if(!empty($main_newest_product->p_discount))
																					@if($main_newest_product->p_discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_newest_product->regular_price }}</bdi>
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
																					@if(!empty($main_newest_product->discount) && $main_newest_product->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_newest_product->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_newest_product->sale_price }}</bdi>
																						</span>
																					</ins>
																					@endif
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Newest Product List Item End -->
																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop/newest') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Newest End -->

													<!-- Top Products Popular Begin -->
													<div class="c-ip-product-tabs__item " id="tab-01406ee-2">
														<div class="woocommerce columns-4 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">

																	<!-- Top Popular Product List Item Begin -->
																	@if(!empty($main_popular_products))
																	@foreach($main_popular_products as $main_popular_product)
																	@if(str_contains($main_popular_product->tags,'popular'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple" style="background-color: white;">

																		@if($main_popular_product->discount_type == "percentage" && $main_popular_product->discount > 0)
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_popular_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_popular_product->label_name }}</span>
																			@endif
																			@if(!empty($main_popular_product->p_discount && $main_popular_product->p_discount > 0))
																			<span class="c-badge c-badge--sale">
																				{{ $main_popular_product->p_discount }}% OFF</span>
																			@elseif($main_popular_product->discount >0)
																			<span class="c-badge c-badge--sale">
																				{{ $main_popular_product->discount }}% OFF</span>
																			@endif
																			<!-- <span class="c-badge c-badge--sale">{{ $main_popular_product->discount }}%</span> -->
																		</div>
																		@endif

																		@if($main_popular_product->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_popular_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_popular_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $main_popular_product->regular_price - $main_popular_product->sale_price }}</span>
																		</div>
																		@endif

																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap" style="width: auto;">
																			<a href="{{ url('products',['product' => $main_popular_product->slug]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img src="{{ isset($main_popular_product->medias[0]->media) ? asset('storage/products/variants/'.$main_popular_product->medias[0]->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="{{ isset($main_popular_product->medias[0]->media) ? asset('storage/products/variants/'.$main_popular_product->medias[0]->media) : '' }}" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<!--<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">-->
																				<!--	<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>-->
																				<!--	<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>-->
																				<!--</button>-->
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_popular_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $main_popular_product->id }}" data-product-id="{{ $main_popular_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_popular_product->id }}" data-product_variant="{{ $main_popular_product->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_popular_product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_popular_product->item_shade_name }}</h2>
																				</a>
																				<!-- <div class="c-product-grid__short-desc">
																					<p class="short-description">{{ $main_popular_product->short_description }}</p>
																				</div> -->
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating" style="font-size: 16px;">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap price-div">
																				<span class="price">
																					@php
																					$discount = $main_popular_product->regular_price * $main_popular_product->p_discount/100;
																					$dis_amount = $main_popular_product->regular_price - $discount;
																					@endphp
																					@if(!empty($main_popular_product->p_discount))
																					@if($main_popular_product->p_discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_popular_product->regular_price }}</bdi>
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
																					@if(!empty($main_popular_product->discount) && $main_popular_product->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_popular_product->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_popular_product->sale_price }}</bdi>
																						</span>
																					</ins>
																					@endif
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Popular Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop/popular') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Popular End -->
													<!-- Top Products Category Begin-->
													<div class="c-ip-product-tabs__item " id="tab-01406ee-3">
														<div class="woocommerce columns-3 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">

																	<!-- Top Category Product List Item Begin -->
																	@if(!empty($main_category_products))
																	@foreach($main_category_products as $main_category_product)
																	@if(str_contains($main_category_product->tags,'category'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple" style="background-color: white;">

																		@if($main_category_product->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_category_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_category_product->label_name }}</span>
																			@endif
																			@if(!empty($main_category_product->p_discount && $main_category_product->p_discount > 0))
																			<span class="c-badge c-badge--sale">
																				{{ $main_category_product->p_discount }}% OFF</span>
																			@elseif($main_category_product->discount >0)
																			<span class="c-badge c-badge--sale">
																				{{ $main_category_product->discount }}% OFF</span>
																			@endif
																		</div>
																		@endif

																		@if($main_category_product->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_category_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_category_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $main_category_product->regular_price - $main_category_product->sale_price }}</span>
																		</div>
																		@endif

																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap" style="width: auto;">
																			<a href="{{ url('products',['product' => $main_category_product->slug]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img src="{{ isset($main_category_product->medias[0]->media) ? asset('storage/products/variants/'.$main_category_product->medias[0]->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="{{ isset($main_category_product->medias[0]->media) ? asset('storage/products/variants/'.$main_category_product->medias[0]->media) : '' }}" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<!--<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">-->
																				<!--	<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>-->
																				<!--	<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>-->
																				<!--</button>-->
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_category_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $main_category_product->id }}" data-product-id="{{ $main_category_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_category_product->id }}" data-product_variant="{{ $main_category_product->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_category_product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_category_product->item_shade_name }}</h2>
																				</a>
																				<!-- <div class="c-product-grid__short-desc">
																					<p class="short-description">{{ $main_category_product->short_description }}</p>
																				</div> -->
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating" style="font-size: 16px;">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap price-div">
																				<span class="price">
																					@php
																					$discount = $main_category_product->regular_price * $main_category_product->p_discount/100;
																					$dis_amount = $main_category_product->regular_price - $discount;
																					@endphp
																					@if(!empty($main_category_product->p_discount))
																					@if($main_category_product->p_discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_category_product->regular_price }}</bdi>
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
																					@if(!empty($main_category_product->discount) && $main_category_product->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_category_product->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_category_product->sale_price }}</bdi>
																						</span>
																					</ins>
																					@endif
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Category Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop/category') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Category End -->
													<!-- Top Products Brand Begin -->
													<div class="c-ip-product-tabs__item " id="tab-01406ee-4">
														<div class="woocommerce columns-4 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">

																	<!-- Top Brand Product List Item Begin -->
																	@if(!empty($main_brand_products))
																	@foreach($main_brand_products as $main_brand_product)
																	@if(str_contains($main_brand_product->tags,'brand'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple" style="background-color: white;">

																		@if($main_brand_product->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_brand_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_brand_product->label_name }}</span>
																			@endif
																			@if(!empty($main_brand_product->p_discount && $main_brand_product->p_discount > 0))
																			<span class="c-badge c-badge--sale">
																				{{ $main_brand_product->p_discount }}% OFF</span>
																			@elseif($main_brand_product->discount >0)
																			<span class="c-badge c-badge--sale">
																				{{ $main_brand_product->discount }}% OFF</span>
																			@endif
																		</div>
																		@endif

																		@if($main_brand_product->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_brand_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_brand_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $main_brand_product->regular_price - $main_brand_product->sale_price }}</span>
																		</div>
																		@endif

																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap" style="width: auto;">
																			<a href="{{ url('products',['product' => $main_brand_product->slug]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img src="{{ isset($main_brand_product->medias[0]->media) ? asset('storage/products/variants/'.$main_brand_product->medias[0]->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="{{ isset($main_brand_product->medias[0]->media) ? asset('storage/products/variants/'.$main_brand_product->medias[0]->media) : '' }}" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<!--<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">-->
																				<!--	<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>-->
																				<!--	<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>-->
																				<!--</button>-->
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_brand_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $main_brand_product->id }}" data-product-id="{{ $main_brand_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_brand_product->id }}" data-product_variant="{{ $main_brand_product->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_brand_product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_brand_product->item_shade_name }}</h2>
																				</a>
																				<!-- <div class="c-product-grid__short-desc">
																					<p class="short-description">{{ $main_brand_product->short_description }}</p>
																				</div> -->
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating" style="font-size: 16px;">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap price-div">
																				<span class="price">
																					@php
																					$discount = $main_brand_product->regular_price * $main_brand_product->p_discount/100;
																					$dis_amount = $main_brand_product->regular_price - $discount;
																					@endphp
																					@if(!empty($main_brand_product->p_discount))
																					@if($main_brand_product->p_discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_brand_product->regular_price }}</bdi>
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
																					@if(!empty($main_brand_product->discount) && $main_brand_product->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_brand_product->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $main_brand_product->sale_price }}</bdi>
																						</span>
																					</ins>
																					@endif
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Brand Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop/brand') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Brand End -->
												</div>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-1f4d44c elementor-widget-mobile__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="1f4d44c" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
										<div class="elementor-widget-container">
											<!-- <div class="elementor-image">
												<img width="264" height="255" src{{ asset('wp-content/uploads/2020/10/luchiana-2233701518.png') }}" class="attachment-full size-full" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2233701518.png 264w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2233701518-150x145.png 150w" sizes="(max-width: 264px) 100vw, 264px" />
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- <section class="elementor-section elementor-top-section elementor-element elementor-element-071bf45 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="071bf45" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2050a00" data-id="2050a00" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-4e8b05d elementor-invisible elementor-widget elementor-widget-ideapark-video" data-id="4e8b05d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;zoomIn&quot;}" data-widget_type="ideapark-video.default">
										<div class="elementor-widget-container">
											<div class="c-ip-video">
												<a class="js-ip-video" data-vbtype="video" data-autoplay="true" target="_blank" onclick="return false;" href="https://youtu.be/sLZZZWN7NnA">
													<i class="c-play c-play--large c-ip-video__play"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-5c5a7d4 elementor-widget elementor-widget-ideapark-heading" data-id="5c5a7d4" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--medium c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
												<span class="c-ip-heading__inner">Watch The Brand Presentation</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->

			<section class="mb-video">
				<video playsinline autoplay muted loop>
					<source src="{{ asset('/images/MB_Home_page_banner.mp4') }}" type="video/mp4">
				</video>
			</section>

			<section class="elementor-section elementor-top-section elementor-element elementor-element-98b9ea0 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="98b9ea0" data-element_type="section">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-8b0a55a" data-id="8b0a55a" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-5aaefc9 elementor-widget elementor-widget-ideapark-heading" data-id="5aaefc9" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--small c-ip-heading--left c-ip-heading--tablet-center c-ip-heading--mobile- c-ip-heading--bullet-after">
												<span class="c-ip-heading__inner">Big</span>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-a96250f elementor-widget elementor-widget-ideapark-heading" data-id="a96250f" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--medium c-ip-heading--left c-ip-heading--tablet-center c-ip-heading--mobile- c-ip-heading--bullet-hide">
												<span class="c-ip-heading__inner">Discounts</span>
											</div>
										</div>
									</div>
									<!-- <div class="elementor-element elementor-element-abae348 elementor-widget elementor-widget-ideapark-countdown" data-id="abae348" data-element_type="widget" data-widget_type="ideapark-countdown.default">
										<div class="elementor-widget-container">
											<script>
												var
													ideapark_countdown_months = 'Months',
													ideapark_countdown_weeks = 'Weeks',
													ideapark_countdown_days = 'Days',
													ideapark_countdown_hours = 'Hours',
													ideapark_countdown_minutes = 'Minutes',
													ideapark_countdown_seconds = 'Seconds';
											</script>
										<div class="c-ip-countdown">
									<div class="c-ip-countdown__wrap js-countdown" data-date="2021-04-30 12:00" data-month="no" data-week="no">
									</div>
									</div> 
										</div>
									</div> -->
									<div class="elementor-element elementor-element-3eb76f9 elementor-widget elementor-widget-ideapark-heading" data-id="3eb76f9" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--tablet-center c-ip-heading--mobile-center c-ip-heading--bullet-hide">
												<!-- <span class="c-ip-heading__inner" style="text-align: justify;">
													Excited about getting your hands on new and exclusive beauty product launches — the need to have trendiest makeup and skincare essentials is never-ending and at discounted prices.
												</span> -->
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-796391d elementor-tablet-align-center elementor-widget elementor-widget-ideapark-button" data-id="796391d" data-element_type="widget" data-widget_type="ideapark-button.default">
										<div class="elementor-widget-container">
											<div class="c-ip-button__wrap">
												<a href="{{ url('shop/big discount') }}" class="c-button c-ip-button c-button--outline" role="button" style="margin-top: 10px;">
													<span class="c-ip-button__text">Explore</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Big Discount Begin -->
						@if(!empty($big_offer_products) && count($big_offer_products) > 0)
						<div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-457d5c0" data-id="457d5c0" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-acbfad2 elementor-widget elementor-widget-ideapark-woocommerce-carousel" data-id="acbfad2" data-element_type="widget" data-widget_type="ideapark-woocommerce-carousel.default">
										<div class="elementor-widget-container">
											<div class="c-ip-woocommerce-carousel">
												<div class="c-ip-woocommerce-carousel__wrap">
													<div class="woocommerce columns-4">
														<div class="c-product-grid__wrap c-product-grid__wrap--3-per-row ">
															<div data-autoplay="no" class="c-product-grid__list c-ip-woocommerce-carousel__list c-ip-woocommerce-carousel__list--3-per-row js-woocommerce-carousel h-carousel h-carousel--default-dots h-carousel--flex h-carousel--round h-carousel--border h-carousel--dots-hide  c-product-grid__list--3-per-row ">

																@if(count($big_offer_products) > 0)
																@foreach($big_offer_products as $big_offer_product)
																<!-- Big Discount list itms Begin -->
																<div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple" style="background-color: white;">

																	<div class="c-product-grid__badges c-badge__list">
																		@if($big_offer_product->label_name != "")
																		<span class="c-badge c-badge--featured">{{ $big_offer_product->label_name }}</span>
																		@endif
																		@if($big_offer_product->discount_type == "percentage")
																		<!-- <span class="c-badge c-badge--sale">-{{ $big_offer_product->discount }}%</span> -->
																		@if(!empty($big_offer_product->p_discount && $big_offer_product->p_discount > 0))
																		<span class="c-badge c-badge--sale">
																			{{ $big_offer_product->p_discount }}% OFF</span>
																		@elseif($big_offer_product->discount >0)
																		<span class="c-badge c-badge--sale">
																			{{ $big_offer_product->discount }}% OFF</span>
																		@endif
																		@endif
																	</div>

																	<div class="c-product-grid__badges c-badge__list">
																		@if($big_offer_product->label_name != "")
																		<span class="c-badge c-badge--featured">{{ $big_offer_product->label_name }}</span>
																		@endif
																		@if($big_offer_product->discount_type == "flat")
																		<span class="c-badge c-badge--sale">- &#8377;{{ $big_offer_product->regular_price - $big_offer_product->sale_price }} OFF</span>
																		@endif
																	</div>


																	<!-- .c-product-grid__badges -->
																	<div class="c-product-grid__thumb-wrap" style="width: auto;">
																		<a href="{{ url('products',['product' => $big_offer_product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																			<img src="{{ isset($big_offer_product->medias[0]->media) ? asset('storage/products/variants/'.$big_offer_product->medias[0]->media) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="{{ isset($big_offer_product->medias[0]->media) ? asset('storage/products/variants/'.$big_offer_product->medias[0]->media) : '' }}" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
																		</a>
																		<div class="c-product-grid__thumb-button-list">
																			<!--<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">-->
																			<!--	<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>-->
																			<!--	<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>-->
																			<!--</button>-->
																			<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																				<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																				<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																			</button>
																		</div>
																	</div>
																	<!-- .c-product-grid__thumb-wrap -->
																	<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $big_offer_product->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																		<i class="ip-plus c-product-grid__atc-icon"></i>
																		<span class="c-product-grid__atc-text">Add to cart</span>
																	</button>
																	<div class="c-product-grid__details">
																		<div class="c-product-grid__title-wrap">
																			<a href="{{ url('products',['product' => $big_offer_product->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<h2 class="woocommerce-loop-product__title">{{ $big_offer_product->item_shade_name }}</h2>
																			</a>
																			<!-- <div class="c-product-grid__short-desc">
																				<p>{{ $big_offer_product->short_description }}</p>
																			</div> -->
																			<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																				<span style="width:80%">Rated
																					<strong class="rating" style="font-size: 16px;">4.00</strong>out of 5</span>
																			</div>
																		</div>
																		<!-- .c-product-grid__title-wrap -->
																		<div class="c-product-grid__price-wrap price-div">
																			<span class="price">
																				@if($big_offer_product->discount_type != "")
																				<del aria-hidden="true">
																					<span class="woocommerce-Price-amount amount">
																						<bdi>
																							<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $big_offer_product->regular_price }}</bdi>
																					</span>
																				</del>
																				@endif
																				<ins>
																					<span class="woocommerce-Price-amount amount">
																						<bdi>
																							<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $big_offer_product->sale_price }}</bdi>
																					</span>
																				</ins>

																			</span>
																		</div>
																		<!-- .c-product-grid__price-wrap -->
																	</div>
																	<!-- .c-product-grid__details -->
																</div>
																<!-- Big Discount list itms End -->
																@endforeach
																@endif

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						<!-- Big Discount End -->

					</div>
				</div>
			</section>

			@if(!empty($footer_banners) && count($footer_banners) > 0)
			<section class="elementor-section elementor-top-section elementor-element elementor-element-3d1ff9f elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3d1ff9f" data-element_type="section">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-935c41a" data-id="935c41a" data-element_type="column">
							<div class="elementor-column-wrap-banner elementor-element-populated" style="width:100%">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-91858e7 elementor-widget elementor-widget-ideapark-banners" data-id="91858e7" data-element_type="widget" data-widget_type="ideapark-banners.default">
										<div class="elementor-widget-container">
											<div class="c-ip-banners">
												<div class="c-ip-banners__list c-ip-banners__list--9 js-ip-banners" data-animation="banners-fade" data-animation-timeout="5000">

													<!-- @foreach($footer_banners as $footer_banner)
													<div data-id="1440-0fe75f30" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-830896d">
															<a href="{{ $footer_banner->url }}" class="c-ip-banners__link">
																<img class="c-ip-banners__image" src="{{ asset('storage/footer_images/'.$footer_banner->image) }}" srcset="{{ asset('storage/footer_images/'.$footer_banner->image) }}" sizes="(max-width: 760px) 100vw, 760px" alt="banner-9@2x" loading="lazy" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
																<div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
																	<div class="c-ip-banners__subheader">Skincare Tops</div>
																	<div class="c-ip-banners__header">
																		<span class="c-ip-banners__header-size">15% OFF</span>
																	</div>
																	<div class="c-ip-banners__space">
																	</div> 
																	<span class="c-button c-button--outline c-ip-banners__button">Explore</span>
																</div>
															</a>
													</div>
													@endforeach -->

													<div data-id="1440-0fe75f30" class="c-ip-banners__item c-ip-banners__item--left">
														<img class="c-ip-banners__image" src="{{ asset('images/s1.jpg') }}" srcset="{{ asset('images/s1.jpg') }}" alt="banner-9@2x" loading="lazy" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			@endif
		</div>
	</div>
</div>
</div>
@endsection