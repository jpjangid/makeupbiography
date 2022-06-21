@extends('frontend.main.index')

@section('title', $product->meta_title != '' ? $product->meta_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('description',$product->meta_description != '' ? $product->meta_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('keywords',$product->keywords != '' ? $product->keywords : '')
@section('og_title', $product->og_title != '' ? $product->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('og_description',$product->og_description != '' ? $product->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('og_image',$product->og_image != '' ? asset('storage/products/'.$product->og_image) : '')
@section('twitter_title', $product->og_title != '' ? $product->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('twitter_description',$product->og_description != '' ? $product->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('twitter_image',$product->og_image != '' ? asset('storage/products/'.$product->og_image) : '')
@section('twitter_site',url(Request::url()))

@section('script')
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "BlogPosting",
		"headline": "{{ $product->title }}",
		"image": "{{ asset('storage/products/'.$product->featured_image) }}",
		"author": {
			"@type": "Organization",
			"name": "Makeupbiography"
		},
		"publisher": {
			"@type": "Organization",
			"name": "https://g.page/makeupbiography?share",
			"logo": {
				"@type": "ImageObject",
				"url": ""
			}
		},
		"datePublished": "{{ $product->publish_date }}"
	}
</script>
@endsection

@section('css')
<style>
	.arrows {
		position: absolute;
		top: 30%;
		font-size: 60px;
		font-weight: bold;
		cursor: pointer;
		left: .2%;
		z-index: 1;
	}

	.arrows:nth-of-type(2) {
		left: 97%;
		/* text-align: right; */
	}

	.arrows:hover {
		background-color: powderblue;
		border-radius: 5px;
	}

	.same {
		position: relative;
		left: 0;
		transition: 0.5s;
	}

	.in-main {
		width: 99%;
		display: flex;
		justify-content: left;
		overflow-x: auto;
	}

	.in-main::-webkit-scrollbar {
		visibility: hidden;
	}

	.product-shades ul {
		list-style-type: none;
	}

	.product-shades ul li {
		float: left !important;
		margin-left: -20px;
		margin-right: 40px;
		margin-top: -10px;
		outline-offset: 2px;
		padding-bottom: 20px;
	}

	.product-shades ul li a {
		width: 1.5rem;
		height: 1.5rem;
		border-radius: 3px;
		text-align: center;
		color: #000;
		border: 1px solid;
		border-color: transparent;
		font-weight: 300;
		display: inline-block;
		font-size: 1.0625rem;
		outline: 2px solid black;
		outline-offset: 2px;
	}

	.palette-title {
		text-transform: uppercase;
		margin-bottom: 20px;
		margin-top: 30px;
	}

	.column-additional-info,
	.column-reviews-tab {
		float: left;
		width: 50%;
		padding: 10px;
		text-align: center;
	}

	.row-additional-info-reviews:after {
		content: "";
		display: table;
		clear: both;
	}

	.row-additional-info-reviews {
		margin-top: 50px;
		margin-bottom: 50px;
		height: 350px;
	}

	@media screen and (max-width: 600px) {

		.column-additional-info,
		.column-reviews-tab {
			width: 100%;
		}
	}

	.write-review {
		background-color: #3B9C9C !important;
		color: white !important;
		border: none;
		cursor: pointer;
		text-transform: uppercase;
		letter-spacing: 0.1em;
		text-align: center;
		width: 250px;
		padding-top: 10px;
		padding-bottom: 10px;
		margin-top: 20px;
	}

	.price-div {
		border-top: 2px solid #FFD700;
		font-size: 20px;
		font-family: "Times New Roman";
		background-image: linear-gradient(to bottom, #43C6DB, #43BFC7);
		padding-top: 10px;
		padding-bottom: 10px;
		text-align: center;
		color: white;
	}

	.c-badge-category {
		-webkit-box-flex: 0;
		flex: 0 0 auto;
		display: inline-block;
		width: 40px;
		height: 40px;
		text-transform: uppercase;
		color: #FFF;
		font-style: normal;
		border-radius: 100%;
		font-weight: bold;
		font-size: 10px;
		line-height: 11px;
		margin-left: -5px;
		letter-spacing: 0.03em;
		text-align: center;
		margin-bottom: 5px;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: var(--text-color);
	}

	.reviews-added-main {
		background-color: white;
		padding: 25px 25px 25px 25px;
	}

	.reviews-added-sub {
		text-align: left;
		border-bottom: 1px solid lightgrey;
	}

	.reviewer-name {
		font-weight: bold;
		font-size: 15px;
		margin-right: 20px;
	}

	.reviewer-rating {
		font-size: 15px;
		display: inline-block;
	}

	.reviewer-review {
		font-size: 12px;
	}

	.c-product__tabs-panel>* {
		font-size: 15px !important;
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

	.ip-zoom {
		display: none;
	}

	@media (max-width: 768px) {
		p.price {
			text-align: center;
			/* margin: 0 auto; */
		}

		.c-product__quantity>* {
			height: 40px;
		}

		.owl-carousel.owl-loaded {
			display: none;
		}

	}
</style>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
	<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--product-page">
		<div class="c-page-header__wrap">
			<div class="c-page-header__title">{{ $product->item_shade_name }}</div>
		</div>
		<nav class="c-breadcrumbs">
			<ol class="c-breadcrumbs__list">
				<li class="c-breadcrumbs__item">
					<a href="{{ url('') }}">Home</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
				</li>
				@if(isset($product->category->parent->parent->name) && !empty($product->category->parent->parent))
				<li class="c-breadcrumbs__item">
					<a href="{{ url('category',$product->category->parent->parent->slug) }}">{{ $product->category->parent->parent->name }}</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
				</li>
				@endif
				@if(isset($product->category->parent->name) && !empty($product->category->parent))
				<li class="c-breadcrumbs__item">
					<a href="{{ url('category',$product->category->parent->slug) }}">{{ $product->category->parent->name }}</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
				</li>
				@endif
				@if(isset($product->category->name) && !empty($product->category))
				<li class="c-breadcrumbs__item">
					<a href="{{ url('category',$product->category->slug) }}">{{ $product->category->name }}</a>
				</li>
				@endif
			</ol>
		</nav>
	</header>
	<div class="woocommerce-notices-wrapper">
	</div>
	<div class="woocommerce-notices-wrapper">
	</div>
	<div class="woocommerce-notices-wrapper">
	</div>
	<div id="product-511" class="c-product c-product--layout-1 l-section l-section--container product type-product post-511 status-publish first instock product_cat-fragrance product_tag-perfume has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
		<div class="c-product__wrap c-product__wrap--layout-1">
			<div class="c-product__col-1">
				<div class="js-sticky-sidebar-nearby">
					<div class="c-product__gallery">
						<div class="c-badge__list c-product__badges">
						</div>
						<!-- .c-product__badges -->
						<div class="c-product__slider c-product__slider--carousel h-carousel h-carousel--inner h-carousel--hover h-carousel--dots-hide js-single-product-carousel">
							@php $count = 0; use Illuminate\Support\Facades\Storage; @endphp
							@foreach($medias as $media)
							@if($media->media_type == 'image')
							<div class="c-product__slider-item c-product__slider-item--zoom woocommerce-product-gallery__image ">
								<a download href="{{ asset('/storage/products/variants/'.$media->media) }}" class="c-product__image-link c-product__image-link--zoom js-product-modal" data-size="1200x1200" data-index="{{ $count }}" data-product-id="" data-elementor-open-lightbox="no" onclick="return false;">
									<div data-img="{{ asset('storage/products/variants/'.$media->media) }}" class="c-product__image-zoom js-product-zoom ">
										<img width="460" height="460" src="{{ asset('storage/products/variants/'.$media->media) }}" class="c-product__slider-img c-product__slider-img--cover" alt="product-1-3" srcset="{{ asset('storage/products/variants/'.$media->media) }}" sizes="(max-width: 460px) 100vw, 460px" />
									</div>
									<span class="c-product__loading js-loading-wrap">
									</span>
								</a>
								<button class='h-cb c-product__image-zoom-mobile js-mobile-modal'>
									<i class='ip-zoom'></i>
								</button>
							</div>
							@endif
							@if($media->media_type == 'video')
							<div class="c-product__slider-item c-product__slider-item--video">
								<a download href="{{ $media->media }}" class="c-product__image-link c-product__image-link--zoom js-product-modal" data-index="{{ $count }}" data-product-id="511" data-elementor-open-lightbox="no" onclick="return false;">
									<span class="c-product__slider--video" style="background-image: url()">
										<span class="c-product__video-mask">
										</span>
									</span>
									<i class="c-play c-play--large c-play--disabled"></i>
								</a>
							</div>
							@endif
							@php $count++; @endphp
							@endforeach
						</div>
						<div class="c-product__thumbs h-carousel h-carousel--nav-hide h-carousel--dots-hide js-product-thumbs-carousel">
							@php $count1 = 0; @endphp
							@foreach($medias as $key => $media)
							@php
							$active_status = "";
							if($key == 0) {
							$active_status = "active";
							}
							@endphp
							@if($media->media_type == 'image')
							<div class="c-product__thumbs-item {{ $active_status }}">
								<button type="button" class="h-cb js-single-product-thumb " data-index="{{ $count1 }}">
									<img width="115" height="115" src="{{ asset('storage/products/variants/'.$media->media) }}" sizes="(max-width: 115px) 100vw, 115px" />
								</button>
							</div>
							@endif
							@if($media->media_type == 'video')
							<div class="c-product__thumbs-item {{ $active_status }}">
								<button type="button" class="h-cb js-single-product-thumb c-product__thumbs-video" data-index="{{ $count1 }}" style="background-image: url()">
									<span class="c-product__thumbs-video-mask">
									</span>
									<i class="c-play"></i>
								</button>
							</div>
							@endif
							@php $count1++; @endphp
							@endforeach
						</div>
					</div>
					<!-- .c-product__gallery -->
					<div class="c-product__tabs woocommerce-tabs wc-tabs-wrapper  c-product__tabs--desktop">
						<div class="c-product__tabs-wrap">
							<div class="c-product__tabs-item description_tab" id="tab-title-description" role="tab" aria-controls="tab-description" style="text-align: center; border-bottom: 1px solid lightgrey;">
								<a data-index="0" class="c-product__tabs-item-link js-tabs-item-link" href="#tab-description" style="font-size: 20px; font-weight: bold; color: black; letter-spacing: 0.2em;">Description</a>
							</div>
						</div>
						<div class="c-product__tabs-panel woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab current visible" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="text-align: justify;">
							<p><?php echo $product->description; ?></p>
						</div>
					</div>
				</div>
				<!-- .c-product__col-1 -->
			</div>
			<!-- .js-sticky-sidebar-nearby -->
			<div class="c-product__col-2">
				<div class="js-sticky-sidebar">
					<div class="summary entry-summary">
						<!-- <h1 class="c-product__title">{{ $product->item_shade_name }}</h1> -->
						<div class="c-product__short-description" style="text-align: justify;">
							<!-- <p class="price">
								<span class="woocommerce-Price-amount amount">
									<bdi>
										@if($product->regular_price != $product->sale_price)
										<del>&#8377;{{ number_format((float)$product->regular_price, 2, '.', '') }}</del>
										@endif
										<span class="woocommerce-Price-currencySymbol"> &#8377;</span>{{ number_format((float)$product->sale_price, 2, '.', '') }}
									</bdi>
								</span>
							</p> -->
							<p>{{ $product->short_description }}</p>
						</div>
						<p class="price">
							<span class="woocommerce-Price-amount amount">
								@php
								$discount = $product->regular_price * $product->p_discount/100;
								$dis_amount = $product->regular_price - $discount;
								@endphp
								@if(!empty($product->p_discount))
								<del>&#8377;{{ number_format((float)$product->regular_price, 2, '.', '') }}</del>
								<span class="woocommerce-Price-currencySymbol"> &#8377;</span>{{ number_format((float)$dis_amount, 2, '.', '') }}
								@else
								<bdi>
									@if($product->regular_price != $product->sale_price)
									<del>&#8377;{{ number_format((float)$product->regular_price, 2, '.', '') }}</del>
									@endif
									<span class="woocommerce-Price-currencySymbol"> &#8377;</span>{{ number_format((float)$product->sale_price, 2, '.', '') }}
								</bdi>
								@endif
								<!-- <bdi>
									@if($product->regular_price != $product->sale_price)
									<del>&#8377;{{ number_format((float)$product->regular_price, 2, '.', '') }}</del>
									@endif
									<span class="woocommerce-Price-currencySymbol"> &#8377;</span>{{ number_format((float)$product->sale_price, 2, '.', '') }}
								</bdi> -->
							</span>
						</p>
						@if($product->p_type == 'HEX SHADE')
						<div class="product-shades" style="background-color: #f3f3f3;">
							<h6 class="palette-title">Colour Palette</h6>
							<ul>
								@if($variants->isNotEmpty())
								@foreach($variants as $variant)
								<li><a href="{{ url('products',['product' => $variant->slug ]) }}" style="background-color: <?php echo $variant->hex_code ?>;">&nbsp;</a></li>
								@endforeach
								@endif
							</ul>
						</div>
						@endif
						@if($product->p_type == 'EYESHADOW')
						<div>
							<h6 class="palette-title">All Shades</h6>

							<ul style="white-space:nowrap !important;">
								<li style="display: inline;"><img src="{{ asset('storage/products/shades/'.$product->hex_code) }}" alt="{{$product->hex_code}}" height="50px"></li>
								@if($variants->isNotEmpty())
								@foreach($variants as $variant)
								@if($variant->id !== $product->id)
								<li style="display: inline;"><a href="{{ url('products',['product' => $variant->slug ]) }}" style="text-decoration: none;"><img src="{{ asset('storage/products/shades/'.$variant->hex_code) }}" alt="{{$variant->hex_code}}" height="30px"></a></li>
								@endif
								@endforeach
								@endif
							</ul>
						</div>
						@endif
						<div class="c-product__atc-wrap">
							<form class="cart" action="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" method="post" enctype='multipart/form-data' style="margin-left: 50px; margin-right: 50px;">
								<div class="c-product__quantity quantity">
									<label class="screen-reader-text" for="quantity_611f6fb23f9e0">Midnight Musk quantity</label>
									<input type="number" id="quantity_611f6fb23f9e0" class="h-cb c-product__quantity-value qty product-quantity" step="1" min="1" name="quantity" value="1" title="Qty" placeholder="" inputmode="numeric" />
									<input type="text" id="productId" value="{{ $product->id }}" hidden>
									<button class="h-cb c-product__quantity-minus js-quantity-minus" type="button">
										<i class="ip-minus"></i>
									</button>
									<button class="h-cb c-product__quantity-plus js-quantity-plus" type="button">
										<i class="ip-plus_big"></i>
									</button>
								</div>
								@if($product->status == 1 && $product->flag == 0)
								<button type="button" name="add-to-cart" value="511" class="single_add_to_cart_button button alt add-to-cart">Add to cart</button>
								@endif
							</form>
						</div>
						<!-- .c-product__atc-wra -->
						<div class="product_description_detail">
							<div class="c-product__wishlist">
								<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-511-btn h-cb c-product__wishlist-button" data-product-id="{{ $product->id }}">
									<i class="ip-heart c-product__wishlist-icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
									<i class="ip-heart_hover c-product__wishlist-icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
									<span class="c-product__wishlist-text">Add to Wishlist</span>
									<span class="c-product__wishlist-text c-wishlist__btn-text-remove">Remove from Wishlist</span>
								</button>
							</div>
							<div class="product_meta">
								<span class="sku_wrapper">SKU:
									<span class="sku">{{ $product->sku }}</span>
								</span>
								<span class="posted_in">Category:
									<a href="#" rel="tag">{{ isset($product->category->name) ? $product->category->name : '' }}</a>
								</span>
								<span class="tagged_as">Tag:
									<a href="#" rel="tag">{{ $product->tags }}</a>
								</span>
							</div>
							<div class="c-product__share">
								<div class="c-product__share-title">Share</div>
								<div class="c-post-share">
									<a class="c-post-share__link" target="_blank" href="//www.facebook.com/sharer.php?u=https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" title="Share on Facebook">
										<i class="ip-facebook c-post-share__icon c-post-share__icon--facebook"></i>
									</a>
									<a class="c-post-share__link" target="_blank" href="//twitter.com/share?url=https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" title="Share on Twitter">
										<i class="ip-twitter c-post-share__icon c-post-share__icon--twitter"></i>
									</a>
									<a class="c-post-share__link" target="_blank" href="//pinterest.com/pin/create/button/?url=https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/&amp;media=https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463.jpg&amp;description=Midnight+Musk" title="Pin on Pinterest">
										<i class="ip-pinterest c-post-share__icon c-post-share__icon--pinterest"></i>
									</a>
									<a class="c-post-share__link" target="_blank" href="whatsapp://send?text=https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" title="Share on Whatsapp" data-action="share/whatsapp/share">
										<i class="ip-whatsapp c-post-share__icon c-post-share__icon--whatsapp"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .c-product__col-2 -->
			</div>
			<!-- .js-sticky-sidebar -->
		</div>
		<!-- .c-product__wrap -->

		<!-- Additional Information & Reviews -->
		<!-- <div class="row-additional-info-reviews">
			<div class="column-additional-info">
				<div class="c-product__tabs-item additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
					<a data-index="1" class="c-product__tabs-item-link js-tabs-item-link" href="#tab-additional_information" style="font-size: 20px; font-weight: bold; color: black; letter-spacing: 0.2em;">Additional information</a>
				</div>
				<div class="c-product__tabs-panel woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel  wc-tab " id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
					<table class="woocommerce-product-attributes shop_attributes">
						<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_capacity">
							<th class="woocommerce-product-attributes-item__label">{{ strtoupper($product->p_type) }}</th>
							<td class="woocommerce-product-attributes-item__value">
								<p>{{ strtoupper($product->variation) }}</p>
							</td>
						</tr>
						@if(!empty($product->brand))
						<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brands">
							<th class="woocommerce-product-attributes-item__label">Brand</th>
							<td class="woocommerce-product-attributes-item__value">
								<p>
									<a href="{{ url('brands',$product->brand->slug) }}" rel="tag">{{ $product->brand->name }}</a>
								</p>
							</td>
						</tr>
						@endif
					</table>
				</div>
			</div>
			<div class="column-reviews-tab">
				<div class="c-product__tabs-item reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
					<a data-index="2" class="c-product__tabs-item-link js-tabs-item-link" href="#tab-reviews" style="font-size: 20px; font-weight: bold; color: black; letter-spacing: 0.2em;">Reviews</a>
				</div>
				<div class="reviews-added-main">
					@foreach($reviews as $review)
					<div class="reviews-added-sub">
						<div>
							<span class="reviewer-name"><i class="fa fa-user" aria-hidden="true"></i> {{ $review->name }}</span>
							<span class="reviewer-rating" id="rate-review">
								@php
								$rating = $review->rating;
								$rating_view = "";
								for ($x = 1; $x <= 5; $x++) { if($rating < $x) { $rating_view .='<i class="fa fa-star" aria-hidden="true" style="letter-spacing: 0.2em;"></i>' ; } else { $rating_view .='<i class="fa fa-star" aria-hidden="true" style="color: orange;letter-spacing: 0.2em;"></i>' ; } } echo $rating_view; @endphp </span>
						</div>
						<div style="padding-bottom: 10px; text-align: justify;"><span class="reviewer-review">{{ $review->comment }}</span></div>
					</div>
					@endforeach
				</div>
				<button class="write-review collapsible" id="review-write"><i class="fa fa-edit"></i> Write Your Review</button>
				<div class="c-product__tabs-panel woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel  wc-tab " id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews" style="display: none; overflow: hidden;">
					<div id="reviews" class="woocommerce-Reviews">
						<div id="comments">
							<h2 class="woocommerce-Reviews-title">Reviews</h2>
							<p class="woocommerce-noreviews">There are no reviews yet.</p>
						</div>
						<div id="review_form_wrapper">
							<div id="review_form">
								<div id="respond" class="comment-respond"> -->
		<!-- <span id="reply-title" class="comment-reply-title">Be the first to review &ldquo;{{ $product->item_shade_name }}&rdquo;
									<small>
										<a rel="nofollow" id="cancel-comment-reply-link" href="/luchiana/demo/shop/midnight-musk-amber/#respond" style="display:none;">Cancel reply</a>
									</small>
								</span> -->
		<!-- <form action="{{ url('review/store') }}" method="post" id="commentform" class="comment-form" novalidate="">
										@csrf
										<p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
										<div class="comment-form-comment">
											<select name="rating" id="rating" required style="width: 100%;">
												<option value="">Your rating&hellip;</option>
												<option value="5">Perfect</option>
												<option value="4">Good</option>
												<option value="3">Average</option>
												<option value="2">Not that bad</option>
												<option value="1">Very poor</option>
											</select>
										</div>
										<p class="comment-form-comment">
											<label for="comment">Your review&nbsp;<span class="required">*</span></label>
											<textarea id="comment" name="comment" cols="45" rows="8" required placeholder="Your review&nbsp;*"></textarea>
										</p>
										<p class="comment-form-author">
											<label for="author">Name&nbsp;<span class="required">*</span></label>
											<input id="name" name="name" type="text" value="" size="30" required placeholder="Name&nbsp;*">
										</p>
										<p class="comment-form-email">
											<label for="email">Email&nbsp;<span class="required">*</span></label>
											<input id="email" name="email" type="email" value="" size="30" required placeholder="Email&nbsp;*">
										</p>
										<p class="form-submit">
											<input type="submit" id="submit" class="submit">
											<input type="hidden" name="product_id" value="{{ $product->id }}">
										</p>
									</form>
								</div> -->
		<!-- #respond -->
		<!-- </div>
						</div>
						<div class="clear">
						</div>
					</div>
				</div>
			</div>
		</div> -->

		@if($related_products->isNotEmpty())
		<section class="c-product__products c-product__products--related">
			<div class="c-product__products-title" style="font-size: 25px; font-weight: bold; color: black; letter-spacing: 0.2em;">Related products</div>
			<div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
				<div class="c-product-grid__list c-product-grid__list--3-per-row " style="margin : 0 30px">

					<div class="in-main">
						@foreach($related_products as $key => $related)
						<div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-459 status-publish first instock product_cat-fragrance product_tag-florals product_tag-fragrance product_tag-warm has-post-thumbnail featured shipping-taxable purchasable product-type-simple same">
							<div class="c-product-grid__badges c-badge__list">
							</div>
							@if($product->discount_type == "percentage")
							<div class="c-product-grid__badges c-badge__list">
								@if(!empty($product->label_name))
								<span class="c-badge-category c-badge--featured">{{ $product->label_name }}</span>
								@endif
								<span class="c-badge-category c-badge--sale">-{{ $product->discount }}%</span>
							</div>
							@endif

							@if($product->discount_type == "flat")
							<div class="c-product-grid__badges c-badge__list">
								@if(!empty($product->label_name))
								<span class="c-badge-category c-badge--featured">{{ $product->label_name }}</span>
								@endif
								<span class="c-badge-category c-badge--sale">- &#8377; {{ $product->regular_price - $product->sale_price }}</span>
							</div>
							@endif
							<!-- .c-product-grid__badges -->
							<div class="c-product-grid__thumb-wrap">
								<a href="{{ url('products',['product' => $related->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
									<img width="260" height="230" src="{{ asset('storage/products/variants/'.$related_images[$key]) }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 260px) 100vw, 260px" />
								</a>
								<div class="c-product-grid__thumb-button-list">
									<!--<button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="459">-->
									<!--	<i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>-->
									<!--	<i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>-->
									<!--</button>-->
									<button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $related->id }}-btn h-cb c-product-grid__thumb-button" data-product-id="{{ $related->id }}" data-title="Wishlist">
										<i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
										<i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
									</button>
								</div>
							</div>
							<!-- .c-product-grid__thumb-wrap -->
							<button class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $related->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
								<i class="ip-plus c-product-grid__atc-icon"></i>
								<span class="c-product-grid__atc-text">Add to cart</span>
							</button>
							<div class="c-product-grid__details">
								<div class="c-product-grid__title-wrap">
									<a href="{{ url('products',['product' => $related->slug]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
										<h2 class="woocommerce-loop-product__title">{{ $related->item_shade_name }}</h2>
									</a>
									<!-- <div class="c-product-grid__short-desc">
										<p>{{ $related->short_description }}</p>
									</div> -->
								</div>
								<!-- .c-product-grid__title-wrap -->
								<div class="c-product-grid__price-wrap price-div">
									<span class="price">
										<span class="woocommerce-Price-amount amount">
											@if($related_regular_prices[$key] != $related_sale_prices[$key])
											<del><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $related_regular_prices[$key] }}</bdi></del>
											@endif
											<span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $related_sale_prices[$key] }}</bdi>
										</span>
									</span>
								</div>
								<!-- .c-product-grid__price-wrap -->
							</div>
							<!-- .c-product-grid__details -->
						</div>
						@endforeach
					</div>
					<span class="arrows" id="forward" style="visibility: none;">&#139;</span>
					<span class="arrows" id="backward" style="visibility: none;">&#155;</span>
				</div>
			</div>
		</section>
		@endif
	</div>
</div>
<!-- /.l-inner -->
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script>
	$("#commentform").validate({
		rules: {
			rating: {
				required: true
			},
			comment: {
				required: true
			},
			name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
		}
	});
</script>
<script>
	var product = "{{count($related_products)}}";
	if (product < 4) {
		document.getElementById('forward').style.visibility = "hidden";
		document.getElementById('backward').style.visibility = "hidden";
	} else {
		document.getElementById('forward').style.visibility = "visible";
		document.getElementById('backward').style.visibility = "visible";
		var right = document.getElementById('forward');
		var left = document.getElementById('backward');
		var item = document.getElementsByClassName('same');
		let product_page = Math.ceil(product / 4);
		let l = 0;
		let movePer = 25.34;
		let maxMove = 203;
		// mobile_view  
		let mob_view = window.matchMedia("(max-width: 768px)");
		if (mob_view.matches) {
			movePer = 50.36;
			maxMove = 504;
		}

		let right_mover = () => {
			l = l + movePer;
			if (item == 1) {
				l = 0;
			}
			for (const i of item) {
				if (l > maxMove) {
					l = l - movePer;
				}
				i.style.left = '-' + l + '%';
			}

		}
		let left_mover = () => {
			l = l - movePer;
			if (l <= 0) {
				l = 0;
			}
			for (const i of item) {
				if (product_page > 1) {
					i.style.left = '-' + l + '%';
				}
			}
		}
		left.onclick = () => {
			right_mover();
		}
		right.onclick = () => {
			left_mover();
		}
	}
</script>
<script>
	$(document).ready(function() {
		$('#tab-description').show();
		$('#tab-additional_information').show();
		$('#tab-reviews').hide();
	});

	var coll = document.getElementsByClassName("collapsible");
	var i;
	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				content.style.display = "none";
			} else {
				content.style.display = "block";
			}
		});
	}
</script>
@endsection