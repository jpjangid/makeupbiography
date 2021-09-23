@extends('frontend.layouts.app')

@section('css')
<style>
	@media (max-width: 567px) {
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
</style>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
	<div data-elementor-type="wp-page" data-elementor-id="1131" class="elementor elementor-1131" data-elementor-settings="[]">
		<div class="elementor-inner" style="background-color: #e0ffff;">
			<div class="elementor-section-wrap">
				<div id="slider">
					<figure>
						<img src="{{ asset('/images/s1.jpg') }}">
						<img src="{{ asset('/images/s2.jpg') }}">
						<img src="{{ asset('/images/s3.jpg') }}">
						<img src="{{ asset('/images/s4.jpg') }}">
						<img src="{{ asset('/images/s5.jpg') }}">
					</figure>
				</div>
			</div>
			<section class="elementor-section elementor-top-section elementor-element elementor-element-d63423e elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d63423e" data-element_type="section" style="background-image: linear-gradient(to right, #C19A6B, #FFE5B4); padding-bottom:30px;">
				<img src="{{ asset('/images/paint-stroke.png') }}" height="4%" width="9%" style="margin-top: -20px; -webkit-transform: scaleX(-1); transform: scaleX(-1);">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-83255c5" data-id="83255c5" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-f6c8514 elementor-widget elementor-widget-ideapark-image-list-1" data-id="f6c8514" data-element_type="widget" data-widget_type="ideapark-image-list-1.default">
										<div class="elementor-widget-container">
											<div class="c-ip-image-list-1 c-ip-image-list-1--carousel">
												<div class="c-ip-image-list-1__wrap c-ip-image-list-1__wrap--carousel">
													<div class="c-ip-image-list-1__list c-ip-image-list-1__list--carousel  js-image-list-1 h-carousel h-carousel--dots-hide h-carousel--nav-hide">
														@if(!empty($main_categories))
														@foreach($main_categories as $main_category)
														<div class="c-ip-image-list-1__item c-ip-image-list-1__item--carousel">
															<a href="{{ url('category',['slug' => $main_category->slug]) }}" class="c-ip-image-list-1__link">
																<div class="c-ip-image-list-1__thumb">
																	<img class="c-ip-image-list-1__image" width="115" height="50vh" src="{{ asset('storage/category/'.$main_category->featured_image) }}" srcset="{{ asset('storage/category/'.$main_category->featured_image) }} 180w" sizes="(max-width: 115px) 100vw, 115px" alt="{{ $main_category->alt }}" loading="lazy" />
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
				<img src="{{ asset('/images/paint-stroke.png') }}" height="4%" width="9%" style="float:right; padding-top: 10px;">
			</section>
			<section class="elementor-section elementor-top-section elementor-element elementor-element-e52934a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="e52934a" data-element_type="section">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ce406a4" data-id="ce406a4" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-34b38e3 elementor-widget elementor-widget-ideapark-heading" data-id="34b38e3" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--medium c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
												<img src="{{ asset('/images/paint-brush-stroke-new.png') }}" class="image-stroke">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
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
													<div class="c-ip-product-tabs__menu js-ip-tabs-list h-carousel h-carousel--small h-carousel--hover h-carousel--mobile-arrows h-carousel--dots-hide">
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
																	@if(!empty($main_newest_product->variants) && count($main_newest_product->variants) > 0)
																	@php
																	$variant = $main_newest_product->variants[0];
																	@endphp
																	@if(str_contains($main_newest_product->tags,'newest'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">

																		@if($variant->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
																		</div>
																		@endif

																		@if($variant->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $variant->regular_price - $variant->sale_price }}</span>
																		</div>
																		@endif

																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap">
																			<a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">
																					<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
																					<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
																				</button>
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_newest_product->id }}" data-product_variant="{{ $variant->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_newest_product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_newest_product->name."-".$variant->name }}</h2>
																				</a>
																				<div class="c-product-grid__short-desc">
																					<p>{{ $main_newest_product->short_description }}</p>
																				</div>
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap">
																				<span class="price">
																					@if(!empty($variant->discount) && $variant->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->sale_price }}</bdi>
																						</span>
																					</ins>
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Newest Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Newest End -->

													<!-- Top Products Popular Begin -->
													<div class="c-ip-product-tabs__item " id="tab-01406ee-2">
														<div class="woocommerce columns-4 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">

																	<!-- Top Popular Product List Item Begin -->
																	@if(!empty($main_newest_products))
																	@foreach($main_newest_products as $main_newest_product)
																	@if(!empty($main_newest_product->variants) && count($main_newest_product->variants) > 0)
																	@php
																	$variant = $main_newest_product->variants[0];
																	@endphp
																	@if(str_contains($main_newest_product->tags,'popular'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
																		@if($variant->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
																		</div>
																		@endif

																		@if($variant->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $variant->regular_price - $variant->sale_price }}</span>
																		</div>
																		@endif
																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap">
																			<a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">
																					<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
																					<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
																				</button>
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_newest_product->id }}" data-product_variant="{{ $variant->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_newest_product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_newest_product->name."-".$variant->name }}</h2>
																				</a>
																				<div class="c-product-grid__short-desc">
																					<p>{{ $main_newest_product->short_description }}</p>
																				</div>
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap">
																				<span class="price">
																					@if(!empty($variant->discount) && $variant->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->sale_price }}</bdi>
																						</span>
																					</ins>
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Popular Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Popular End -->
													<!-- Top Products Category Begin-->
													<div class="c-ip-product-tabs__item " id="tab-01406ee-3">
														<div class="woocommerce columns-3 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">

																	<!-- Top Category Product List Item Begin -->
																	@if(!empty($main_newest_products))
																	@foreach($main_newest_products as $main_newest_product)
																	@if(!empty($main_newest_product->variants) && count($main_newest_product->variants) > 0)
																	@php
																	$variant = $main_newest_product->variants[0];
																	@endphp
																	@if(str_contains($main_newest_product->tags,'category'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
																		@if($variant->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
																		</div>
																		@endif

																		@if($variant->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $variant->regular_price - $variant->sale_price }}</span>
																		</div>
																		@endif
																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap">
																			<a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">
																					<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
																					<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
																				</button>
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_newest_product->id }}" data-product_variant="{{ $variant->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_newest_product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_newest_product->name."-".$variant->name }}</h2>
																				</a>
																				<div class="c-product-grid__short-desc">
																					<p>{{ $main_newest_product->short_description }}</p>
																				</div>
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap">
																				<span class="price">
																					@if(!empty($variant->discount) && $variant->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->sale_price }}</bdi>
																						</span>
																					</ins>
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Category Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Category End -->
													<!-- Top Products Brand Begin -->
													<div class="c-ip-product-tabs__item " id="tab-01406ee-4">
														<div class="woocommerce columns-4 ">
															<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
																<div class="c-product-grid__list c-ip-product-tabs__list c-ip-product-tabs__list--4-per-row c-ip-product-tabs__list--grid c-product-grid__list--4-per-row ">

																	<!-- Top Brand Product List Item Begin -->
																	@if(!empty($main_newest_products))
																	@foreach($main_newest_products as $main_newest_product)
																	@if(!empty($main_newest_product->variants) && count($main_newest_product->variants) > 0)
																	@php
																	$variant = $main_newest_product->variants[0];
																	@endphp
																	@if(str_contains($main_newest_product->tags,'brand'))
																	<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
																		@if($variant->discount_type == "percentage")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
																		</div>
																		@endif

																		@if($variant->discount_type == "flat")
																		<div class="c-product-grid__badges c-badge__list">
																			@if(!empty($main_newest_product->label_name))
																			<span class="c-badge c-badge--featured">{{ $main_newest_product->label_name }}</span>
																			@endif
																			<span class="c-badge c-badge--sale">- &#8377; {{ $variant->regular_price - $variant->sale_price }}</span>
																		</div>
																		@endif
																		<!-- .c-product-grid__badges -->
																		<div class="c-product-grid__thumb-wrap">
																			<a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
																			</a>
																			<div class="c-product-grid__thumb-button-list">
																				<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">
																					<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
																					<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
																				</button>
																				<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																					<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																					<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																				</button>
																			</div>
																		</div>
																		<!-- .c-product-grid__thumb-wrap -->
																		<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $main_newest_product->id }}" data-product_variant="{{ $variant->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																			<i class="ip-plus c-product-grid__atc-icon"></i>
																			<span class="c-product-grid__atc-text">Add to cart</span>
																		</button>
																		<div class="c-product-grid__details">
																			<div class="c-product-grid__title-wrap">
																				<a href="{{ url('products',['product' => $main_newest_product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																					<h2 class="woocommerce-loop-product__title">{{ $main_newest_product->name."-".$variant->name }}</h2>
																				</a>
																				<div class="c-product-grid__short-desc">
																					<p>{{ $main_newest_product->short_description }}</p>
																				</div>
																				<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																					<span style="width:80%">Rated
																						<strong class="rating">4.00</strong>out of 5</span>
																				</div>
																			</div>
																			<!-- .c-product-grid__title-wrap -->
																			<div class="c-product-grid__price-wrap">
																				<span class="price">
																					@if(!empty($variant->discount) && $variant->discount > 0)
																					<del aria-hidden="true">
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->regular_price }}</bdi>
																						</span>
																					</del>
																					@endif
																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<bdi>
																								<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->sale_price }}</bdi>
																						</span>
																					</ins>
																				</span>
																			</div>
																			<!-- .c-product-grid__price-wrap -->
																		</div>
																		<!-- .c-product-grid__details -->
																	</div>
																	@endif
																	@endif
																	@endforeach
																	@endif
																	<!-- Top Brand Product List Item End -->

																</div>
															</div>
														</div>
														<div class="c-ip-product-tabs__button-wrap">
															<a href="{{ url('shop') }}" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
														</div>
													</div>
													<!-- Top Products Brand End -->
												</div>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-1f4d44c elementor-widget-mobile__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="1f4d44c" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
										<div class="elementor-widget-container">
											<div class="elementor-image">
												<img width="264" height="255" src="../wp-content/uploads/2020/10/luchiana-2233701518.png" class="attachment-full size-full" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2233701518.png 264w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2233701518-150x145.png 150w" sizes="(max-width: 264px) 100vw, 264px" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="elementor-section elementor-top-section elementor-element elementor-element-071bf45 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="071bf45" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
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
									<div class="elementor-element elementor-element-abae348 elementor-widget elementor-widget-ideapark-countdown" data-id="abae348" data-element_type="widget" data-widget_type="ideapark-countdown.default">
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
											{{-- <div class="c-ip-countdown">
                          <div class="c-ip-countdown__wrap js-countdown" data-date="2021-04-30 12:00" data-month="no" data-week="no">
                          </div>
                        </div> --}}
										</div>
									</div>
									<div class="elementor-element elementor-element-3eb76f9 elementor-widget elementor-widget-ideapark-heading" data-id="3eb76f9" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--tablet-center c-ip-heading--mobile-center c-ip-heading--bullet-hide">
												<span class="c-ip-heading__inner">Name were we at hope. Remainder household direction zealously the unwilling bed sex. Lose and gay ham sake met that. Stood her place one ten.</span>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-796391d elementor-tablet-align-center elementor-widget elementor-widget-ideapark-button" data-id="796391d" data-element_type="widget" data-widget_type="ideapark-button.default">
										<div class="elementor-widget-container">
											<div class="c-ip-button__wrap">
												<a href="{{ url('shop') }}" class="c-button c-ip-button c-button--outline" role="button">
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
													<div class="woocommerce columns-4 ">
														<div class="c-product-grid__wrap c-product-grid__wrap--3-per-row ">
															<div data-autoplay="no" class="c-product-grid__list c-ip-woocommerce-carousel__list c-ip-woocommerce-carousel__list--3-per-row js-woocommerce-carousel h-carousel h-carousel--default-dots h-carousel--flex h-carousel--round h-carousel--border h-carousel--dots-hide  c-product-grid__list--3-per-row ">

																@if(count($big_offer_products) > 0)
																@foreach($big_offer_products as $big_offer_product)
																@php $variant = $big_offer_product->variants[0]; @endphp
																<!-- Big Discount list itms Begin -->
																<div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">

																	<div class="c-product-grid__badges c-badge__list">
																		@if($big_offer_product->label_name != "")
																		<span class="c-badge c-badge--featured">{{ $big_offer_product->label_name }}</span>
																		@endif
																		@if($variant->discount_type == "percentage")
																		<span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
																		@endif
																	</div>

																	<div class="c-product-grid__badges c-badge__list">
																		@if($big_offer_product->label_name != "")
																		<span class="c-badge c-badge--featured">{{ $big_offer_product->label_name }}</span>
																		@endif
																		@if($variant->discount_type == "flat")
																		<span class="c-badge c-badge--sale">- &#8377;{{ $variant->regular_price - $variant->sale_price }} OFF</span>
																		@endif
																	</div>


																	<!-- .c-product-grid__badges -->
																	<div class="c-product-grid__thumb-wrap">
																		<a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																			<img width="460" height="460" src="../wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
																		</a>
																		<div class="c-product-grid__thumb-button-list">
																			<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">
																				<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
																				<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
																			</button>
																			<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
																				<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
																				<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
																			</button>
																		</div>
																	</div>
																	<!-- .c-product-grid__thumb-wrap -->
																	<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $big_offer_product->id }}" data-product_variant="{{ $variant->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
																		<i class="ip-plus c-product-grid__atc-icon"></i>
																		<span class="c-product-grid__atc-text">Add to cart</span>
																	</button>
																	<div class="c-product-grid__details">
																		<div class="c-product-grid__title-wrap">
																			<a href="{{ url('products',['product' => $big_offer_product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
																				<h2 class="woocommerce-loop-product__title">{{ $big_offer_product->name."-".$variant->name }}</h2>
																			</a>
																			<div class="c-product-grid__short-desc">
																				<p>{{ $big_offer_product->short_description }}</p>
																			</div>
																			<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
																				<span style="width:80%">Rated
																					<strong class="rating">4.00</strong>out of 5</span>
																			</div>
																		</div>
																		<!-- .c-product-grid__title-wrap -->
																		<div class="c-product-grid__price-wrap">
																			<span class="price">
																				@if($variant->discount_type != "")
																				<del aria-hidden="true">
																					<span class="woocommerce-Price-amount amount">
																						<bdi>
																							<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->regular_price }}</bdi>
																					</span>
																				</del>
																				@endif
																				<ins>
																					<span class="woocommerce-Price-amount amount">
																						<bdi>
																							<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $variant->sale_price }}</bdi>
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
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-91858e7 elementor-widget elementor-widget-ideapark-banners" data-id="91858e7" data-element_type="widget" data-widget_type="ideapark-banners.default">
										<div class="elementor-widget-container">
											<div class="c-ip-banners">
												<div class="c-ip-banners__list c-ip-banners__list--9 js-ip-banners" data-animation="banners-fade" data-animation-timeout="5000">
													@foreach($footer_banners as $footer_banner)
													<div data-id="1440-0fe75f30" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-830896d">
														<a href="{{ $footer_banner->url }}" class="c-ip-banners__link">
															<img class="c-ip-banners__image" width="760" height="407" src="{{ asset('storage/footer_images/'.$footer_banner->image) }}" srcset="{{ asset('storage/footer_images/'.$footer_banner->image) }}" sizes="(max-width: 760px) 100vw, 760px" alt="banner-9@2x" loading="lazy" />
															<div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
																{{-- <div class="c-ip-banners__subheader">Skincare Tops</div>
																<div class="c-ip-banners__header">
																	<span class="c-ip-banners__header-size">15% OFF</span>
																</div>
																<div class="c-ip-banners__space">
																</div> --}}
																<span class="c-button c-button--outline c-ip-banners__button">Explore</span>
															</div>
														</a>
													</div>
													@endforeach
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