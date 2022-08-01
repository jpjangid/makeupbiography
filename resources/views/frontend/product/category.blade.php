@extends('frontend.main.index')

@section('title', $main_category->meta_title != '' ? $main_category->meta_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('description',$main_category->meta_description != '' ? $main_category->meta_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('keywords',$main_category->keywords != '' ? $main_category->keywords : '')
@section('og_title', $main_category->og_title != '' ? $main_category->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('og_description',$main_category->og_description != '' ? $main_category->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('og_image',$main_category->og_image != '' ? asset('storage/category/'.$main_category->og_image) : '')
@section('twitter_title', $main_category->og_title != '' ? $main_category->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('twitter_description',$main_category->og_description != '' ? $main_category->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('twitter_image',$main_category->og_image != '' ? asset('storage/category/'.$main_category->og_image) : '')
@section('twitter_site',url(Request::url()))

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>
<style>
	#accordion a:hover {
		color: gray;
		text-decoration: none;
	}

	#accordion {
		margin: 10px;
	}

	.left-side-filter {
		position: sticky;
		top: 20px;
	}

	.data-class-1 {
		padding-left: 10px;
	}

	.data-class-2 {
		padding-left: 10px;
	}

	#accordion .card-body {
		padding: 0.5rem 1.25rem;
	}

	.card-link {
		display: flex;
		justify-content: space-between;
		align-content: center;
		align-items: baseline;
		width: 100%;
	}

	.sub-cat {
		display: flex;
		justify-content: space-between;
		width: 100%;
	}

	#accordion a {
		color: #000;
	}

	.c-product-grid {
		display: grid;
		grid-template-columns: 30% 70%;
	}

	header a {
		color: #ffff;
	}

	footer a {
		color: #ffff;
	}

	.woocommerce-pagination a {
		color: #000;
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

	a:hover {
		text-decoration: none;
		color: #fff;
	}

	.price-div {
		font-size: 17px;
		font-family: "Marcellus", sans-serif;
		padding-top: 5px;
		padding-bottom: 5px;
		text-align: center;
		color: white;
		margin-top: 0;
		background-image: linear-gradient(to bottom, #666362, #413839);
	}

	a>svg {
		height: 20px !important;
		padding-top: 7px;
	}

	.c-badge-category {
		-webkit-box-flex: 0;
		flex: 0 0 auto;
		display: flex;
		justify-content: center;
		align-items: center;
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
		background-color: var(--text-color);
	}

	.l-inner {
		background: whitesmoke;
	}

	/* mobile category filter css*/

	.responsive-cat {
		position: fixed;
		bottom: 0;
		width: 100%;
		z-index: 99;
	}

	@media(max-width:768px) {
		.left-side-filter {
			display: none;
		}

		.responsive-cat {
			display: block;
		}
	}

	.mobile-cat {
		display: grid;
		grid-template-columns: 50% 50%;
	}

	.css-4migyh {
		padding: 10px;
		text-align: center;
		font-weight: 500;
	}

	.mobile-cat .card {
		border-radius: 0;
		cursor: pointer;
	}

	.mobile-cat svg {
		width: 30px;
	}

	@media(min-width:769px) {
		.responsive-cat {
			display: none;
		}
	}

	@media(max-width:769px) {
		.c-product-grid {
			grid-template-columns: 100%;
		}
	}
</style>
@endsection

@section('script')
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "BlogPosting",
		"headline": "{{ $main_category->title }}",
		"image": "{{ asset('storage/products/'.$main_category->featured_image) }}",
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
		"datePublished": "{{ $main_category->publish_date }}"
	}
</script>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
	<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--product-list">
		<div class="c-page-header__wrap">
			<h1 class="c-page-header__title">{{ $main_category->name }}</h1>
		</div>
		<nav class="c-breadcrumbs">
			<ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Home" href="{{ url('') }}">
						<span itemprop="name">Home</span>
					</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
					<meta itemprop="position" content="1">
				</li>
				@if(isset($main_category->parent->parent->name) && !empty($main_category->parent->parent))
				<li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Shop" href="{{ url('category',$main_category->parent->parent->slug) }}">
						<span itemprop="name">{{ $main_category->parent->parent->name }}</span>
					</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
					<meta itemprop="position" content="2">
				</li>
				@endif
				@if(isset($main_category->parent->name) && !empty($main_category->parent))
				<li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Shop" href="{{ url('category',$main_category->parent->slug) }}">
						<span itemprop="name">{{ $main_category->parent->name }}</span>
					</a>
					<i class="ip-breadcrumb c-breadcrumbs__separator"></i>
					<meta itemprop="position" content="2">
				</li>
				@endif
				<li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" title="Shop" href="{{ url('category',$main_category->slug) }}">
						<span itemprop="name">{{ $main_category->name }}</span>
					</a>
					<meta itemprop="position" content="3">
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
					<div class="c-shop-sidebar__content c-shop-sidebar__content--mobile js-shop-sidebar-content">
						<aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter">
							<h2 class="widget-title">Price</h2>

							<div class="price_slider_wrapper">
								<div class="price_slider" style="display:none;">
								</div>
								<div class="price_slider_amount" data-step="10">
									<input type="text" id="min_price" name="min_price" value="20" data-min="20" placeholder="Min price" />
									<input type="text" id="max_price" name="max_price" value="200" data-max="200" placeholder="Max price" />
									<button type="submit" class="button">Filter</button>
									<div class="price_label" style="display:none;">Price:
										<span class="from">
										</span>&mdash;
										<span class="to">
										</span>
									</div>
									<input type="hidden" name="set" value="5" />
									<div class="clear">
									</div>
								</div>
							</div>
						</aside>
						<aside id="woocommerce_layered_nav-3" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">

							<div id="accordion">
								<div class="card">
									<div class="card-header">
										<a class="card-link" data-toggle="collapse" href="#description1">
											<span>Category</span><i class="fa fa-angle-down" aria-hidden="true"></i>
										</a>
									</div>
									<div id="description1" class="collapse" data-parent="#accordion">
										<div class="card-body d-flex" style="align-items: center;">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a class="card-link" data-toggle="collapse" href="#description12">
												<span>Body</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</div>
										<div id="description12" class="collapse data-class-1" data-parent="#description1">
											<div class="card-body d-flex" style="align-items: center;">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<a data-toggle="collapse" href="#description121" class="sub-cat">
													<span>Body Care</span>
													<i class="fa fa-angle-down" aria-hidden="true"></i>
												</a>
											</div>
											<div id="description121" class="collapse data-class-2" data-parent="#description12">
												<div class="card-body">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
													<label class="form-check-label" for="flexCheckChecked">Soap</label><span></span>
												</div>
												<div class="card-body">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
													<label class="form-check-label" for="flexCheckChecked">Data</label><span></span>
												</div>
												<div class="card-body">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
													<label class="form-check-label" for="flexCheckChecked">Perfumes</label><span></span>
												</div>
											</div>
										</div>

										<div class="card-body d-flex" style="align-items: center;">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a class="card-link" data-toggle="collapse" href="#description13">
												<span>Skin Care</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</div>
										<div id="description13" class="collapse data-class-1" data-parent="#description1">
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<a data-toggle="collapse" href="#description131">
													<span>Skin Care</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
												</a>
											</div>
											<div id="description131" class="collapse data-class-2" data-parent="#description13">
												<div class="card-body">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
													<label class="form-check-label" for="flexCheckChecked">Soap</label><span></span>
												</div>
												<div class="card-body">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
													<label class="form-check-label" for="flexCheckChecked">Data</label><span></span>
												</div>
												<div class="card-body">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
													<label class="form-check-label" for="flexCheckChecked">Perfumes</label><span></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<a class="collapsed card-link" data-toggle="collapse" href="#description2">
											<span>Brands</span><i class="fa fa-angle-down" aria-hidden="true"></i>
										</a>
									</div>
									<div id="description2" class="collapse" data-parent="#accordion">
										<div class="card-body d-flex" style="align-items: center;">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a class="card-link" data-toggle="collapse" href="#description22">
												<span>Lakeme</span>
												<!-- <i class="fa fa-angle-down" aria-hidden="true"></i> -->
											</a>
										</div>
										<!-- <div id="description22" class="collapse data-class-1" data-parent="#description2">
										<div class="card-body">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a data-toggle="collapse" href="#description221">
												<span>Skin Care</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</div>
										<div id="description221" class="collapse data-class-2" data-parent="#description22">
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Soap</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Data</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Perfumes</label><span></span>
											</div>
										</div>
									</div> -->
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<a class="collapsed card-link" data-toggle="collapse" href="#description3">
											<span>Price</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
										</a>
									</div>
									<div id="description3" class="collapse" data-parent="#accordion">
										<div class="card-body">
											<div style="display: flex;">
												<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
												<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
											</div>
											<div style="display: flex;">
												<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
												<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
											</div>
											<div style="display: flex;">
												<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
												<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
											</div>
											<div style="display: flex;">
												<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
												<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <h2 class="widget-title">Capacity</h2>
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
							</ul> -->
						</aside>
					</div>
					<div class="c-shop-sidebar__content c-shop-sidebar__content--desktop-filter js-shop-sidebar-content-desktop">
						<!-- Filter sidebar for computer begin -->
						<!-- <form action="{{ url('category',['slug' => $slug]); }}" method="get" id="categoryPageFrom">
							<input type="text" hidden name="pagination" id="paggination" value="">
							@if(!empty($sub_categories) && count($sub_categories) > 0)
							<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
								<div class="widget-title">Product categories</div>
								<ul class="product-categories">
									@foreach($sub_categories as $pet_cat)
									<li class="cat-item cat-item-50 cat-parent">

										<input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$pet_cat->slug}}" {{ !empty($filter_old) && in_array($pet_cat->slug,$filter_old) ? "checked" : "" }}>
										<label for="">{{ $pet_cat->name }}</label>

										@if(!empty($pet_cat->subcategory) && count($pet_cat->subcategory) > 0)
										<ul class='children'>
											@foreach($pet_cat->subcategory as $sub)
											<li class="cat-item cat-item-58 cat-parent">
												<input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$sub->slug}}" {{ !empty($filter_old) && in_array($sub->slug,$filter_old) ? "checked" : "" }}>
												<label for="">{{ $sub->name }}</label>
											</li>
											@endforeach
										</ul>
										@endif
									</li>
									@endforeach

								</ul>
							</aside>
							@endif

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

							<aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
								<div class="widget-title">Price <span id="min_price_filter_text">{{ $min_price_filter }}</span> - <span id="max_price_filter_text">{{ $max_price_filter }}</span></div>
								<div class="price_slider_wrapper">
									<div id="slider" wire:ignore></div>
								</div>
							</aside>

							<aside id="woocommerce_layered_nav-2" style="margin-top: 20px;" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
								<input type="text" name="min_price_filter" id="min_price_filter" value="" hidden>
								<input type="text" name="max_price_filter" id="max_price_filter" value="" hidden>
								<button type="submit" id="filterButton" class="button">Filter</button>
							</aside>
						</form> -->
						<!-- Filter sidebar for computer end -->
					</div>
				</div>
			</div>
		</div>
		<div class="l-section__content">
			<div class="">

				<div class="c-catalog-ordering  c-catalog-ordering--desktop-filter ">
					<div class="c-catalog-ordering__col c-catalog-ordering__col--result">
						<!-- <p class="woocommerce-result-count">Showing 1&ndash;12 of 21 results</p> -->
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
					<!-- Left side category filter -->
					<div class="left-side-filter">
						<div id="accordion">
							<div class="card">
								<div class="card-header">
									<a class="card-link" data-toggle="collapse" href="#description1">
										<span>Category</span><i class="fa fa-angle-down" aria-hidden="true"></i>
									</a>
								</div>
								<div id="description1" class="collapse" data-parent="#accordion">
									<div class="card-body d-flex" style="align-items: center;">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
										<a class="card-link" data-toggle="collapse" href="#description12">
											<span>Body</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
										</a>
									</div>
									<div id="description12" class="collapse data-class-1" data-parent="#description1">
										<div class="card-body d-flex" style="align-items: center;">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a data-toggle="collapse" href="#description121" class="sub-cat">
												<span>Body Care</span>
												<i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</div>
										<div id="description121" class="collapse data-class-2" data-parent="#description12">
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Soap</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Data</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Perfumes</label><span></span>
											</div>
										</div>
									</div>

									<div class="card-body d-flex" style="align-items: center;">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
										<a class="card-link" data-toggle="collapse" href="#description13">
											<span>Skin Care</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
										</a>
									</div>
									<div id="description13" class="collapse data-class-1" data-parent="#description1">
										<div class="card-body">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a data-toggle="collapse" href="#description131">
												<span>Skin Care</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</div>
										<div id="description131" class="collapse data-class-2" data-parent="#description13">
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Soap</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Data</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Perfumes</label><span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<a class="collapsed card-link" data-toggle="collapse" href="#description2">
										<span>Brands</span><i class="fa fa-angle-down" aria-hidden="true"></i>
									</a>
								</div>
								<div id="description2" class="collapse" data-parent="#accordion">
									<div class="card-body d-flex" style="align-items: center;">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
										<a class="card-link" data-toggle="collapse" href="#description22">
											<span>Lakeme</span>
											<!-- <i class="fa fa-angle-down" aria-hidden="true"></i> -->
										</a>
									</div>
									<!-- <div id="description22" class="collapse data-class-1" data-parent="#description2">
										<div class="card-body">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
											<a data-toggle="collapse" href="#description221">
												<span>Skin Care</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</div>
										<div id="description221" class="collapse data-class-2" data-parent="#description22">
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Soap</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Data</label><span></span>
											</div>
											<div class="card-body">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
												<label class="form-check-label" for="flexCheckChecked">Perfumes</label><span></span>
											</div>
										</div>
									</div> -->
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<a class="collapsed card-link" data-toggle="collapse" href="#description3">
										<span>Price</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
									</a>
								</div>
								<div id="description3" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<div style="display: flex;">
											<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
											<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
										</div>
										<div style="display: flex;">
											<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
											<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
										</div>
										<div style="display: flex;">
											<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
											<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
										</div>
										<div style="display: flex;">
											<span><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" /></span>
											<span><a class="card-link" data-toggle="collapse" href="#description31">Rs. 0 - Rs. 499 32</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- responsive filter category -->
					<div class="responsive-cat">
						<div class="mobile-cat">
							<div class="sort-by">
								<div class="card">
									<div class="css-4migyh js-filter-show-button">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<defs>
												<filter id="579yu3ce3a" width="105.8%" height="143.8%" x="-2.9%" y="-21.9%" filterUnits="objectBoundingBox">
													<feOffset dy="-1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
													<feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2"></feGaussianBlur>
													<feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.24 0"></feColorMatrix>
													<feMerge>
														<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
														<feMergeNode in="SourceGraphic"></feMergeNode>
													</feMerge>
												</filter>
											</defs>
											<g fill="none" fill-rule="evenodd" opacity=".54">
												<g fill="#001325" fill-rule="nonzero">
													<g filter="url(#579yu3ce3a)" transform="translate(-45 -685) translate(0 672)">
														<g>
															<g>
																<g>
																	<g>
																		<path d="M5.05 13.551V2.224c0-.373-.307-.68-.679-.68-.372 0-.68.307-.68.68V13.55l-2.513-2.834c-.272-.271-.68-.307-.95-.069-.272.271-.308.68-.07.95l3.704 4.144c.277.343.97.29 1.188 0v-2.19zM12.074 4.398L8.404.255c-.327-.33-.937-.35-1.221 0V13.74c0 .373.307.68.679.68.372 0 .679-.271.679-.647V2.45l2.514 2.834c.271.271.68.307.95.069.271-.274.307-.683.069-.954z" transform="translate(33 6) translate(12) translate(0 7) translate(6 4)"></path>
																	</g>
																</g>
															</g>
														</g>
													</g>
												</g>
											</g>
										</svg>
										Sort By
									</div>
								</div>
							</div>
							<div class="filter-by">
								<div class="card">
									<div class="css-4migyh js-filter-show-button">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 	24">
											<defs>
												<filter id="565v74wosa" width="105.8%" height="143.8%" x="-2.9%" y="-21.9%" filterUnits="objectBoundingBox">
													<feOffset dy="-1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
													<feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="2"></feGaussianBlur>
													<feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.24 0"></feColorMatrix>
													<feMerge>
														<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
														<feMergeNode in="SourceGraphic"></feMergeNode>
													</feMerge>
												</filter>
											</defs>
											<g fill="none" fill-rule="evenodd" opacity=".54">
												<g fill="#001325" fill-rule="nonzero">
													<g filter="url(#565v74wosa)" transform="translate(-207 -685) translate(0 672)">
														<g>
															<g>
																<g>
																	<path d="M18.533 5c.567 0 1.028.46 1.028 1.028 0 .247-.089.485-.25.672l-4.98 5.773v5.193c0 .332-.16.643-.43.836L11.9 19.935c-.462.33-1.104.224-1.435-.237-.125-.175-.192-.384-.192-.599v-6.625l-5.02-5.771c-.372-.429-.327-1.078.101-1.45C5.541 5.09 5.78 5 6.028 5h12.505zm-5.468 7.841h-1.528v5.797l1.528-1.094V12.84zm4.95-6.576H6.548l4.688 5.39h2.127l4.65-5.39z" transform="translate(195 6) translate(12) translate(0 7)"></path>
																</g>
															</g>
														</g>
													</g>
												</g>
											</g>
										</svg>
										Filter
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="c-product-grid__wrap c-product-grid__wrap--3-per-row ">
						<div class="c-product-grid__list c-product-grid__list--3-per-row ">
							@foreach($categories as $category)

							<div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
								<div class="c-product-grid__badges c-badge__list">
								</div>
								<!-- .c-product-grid__badges -->
								<div class="c-product-grid__thumb-wrap">
									<a href="{{ url('category',$category->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
										<img width="460" height="460" src="{{ isset($category->featured_image) ? asset('storage/category/'.$category->featured_image) : '' }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 460px) 100vw, 460px" style="max-width: 100% !important; height: 100% !important; object-fit: contain !important;" />
									</a>
								</div>
								<!-- .c-product-grid__thumb-wrap -->
								<div class="c-product-grid__details">
									<div class="c-product-grid__title-wrap">
										<a href="{{ url('category',$category->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
											<h2 class="woocommerce-loop-product__title">{{ $category->name }}</h2>
										</a>
										<div class="c-product-grid__short-desc">
											<p>{{ $category->short_description }}</p>
										</div>
									</div>
									<!-- .c-product-grid__price-wrap -->
								</div>
								<!-- .c-product-grid__details -->
							</div>
							@endforeach
							@foreach($products as $key => $product)
							@php
							$media = $product_medias->where('product_id',$product->id)->first();
							@endphp

							<div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
								<div class="c-product-grid__badges c-badge__list">
								</div>

								@if($product->discount_type == "percentage")
								<div class="c-product-grid__badges c-badge__list" style="width: fit-content;">
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
								<div class="c-product-grid__price-wrap price-div">
									<span class="price">
										@if(!empty($product->discount) && $product->discount > 0)
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
									</span>
								</div>
							</div>

							@endforeach
						</div>
					</div>
				</div>
				<nav class="woocommerce-pagination">
					<ul class='page-numbers'>
						<li>
							<a class="prev page-numbers" href="{{ url('category/'.$slug.'?page=1') }}" onclick="return <?php echo $prev; ?>;">
								<i class="ip-menu-left page-numbers__prev-ico"></i>
							</a>
						</li>
						@foreach($no_of_pages as $page)
						<li>
							<a class="page-numbers" href="{{ url('category/'.$slug.'?page='.$page) }}">{{ $page }}</a>
						</li>
						@endforeach
						<li>
							<a class="next page-numbers" href="{{ url('category/'.$slug.'?page='.$products->lastPage()) }}" onclick="return <?php echo $next; ?>;">
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
	});
</script>
@endsection