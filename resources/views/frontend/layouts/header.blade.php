@php
use \App\Models\Category;
$mains = Category::select('id','slug','name')->where(['flag' => 0,'status' => 1])->where('parent_id',null)->with('subcategory')->get();

@endphp
<style>
	.logo-non-desktop {
		width: 25vh !important;
		z-index: 2;
	}

	.logo-desktop {
		width: 20vh;
	}

	@media screen and (max-width: 1190px) {
		.mz-title {
			width: 90% !important;
		}
	}

	@media (min-width: 768px) and (max-width: 1024px) {
		.logo-non-desktop {
			width: 20vh !important;
		}
	}

	.mz-title {
		overflow: hidden;
		float: left;
		width: 30%;
	}

	.dt-sc-title {
		position: relative;
		clear: both;
		float: left;
	}

	.mz-title .mz-title-content {
		position: relative;
		clear: both;
		float: left;
	}

	/* .mz-title .mz-title-content {
      margin-bottom: 30px;
    } */

	.mz-title .mz-title-content:before {
		background-image: linear-gradient(to bottom, #008B8B, #20B2AA);
		content: "";
		position: absolute;
		right: -16px;
		top: 0px;
		width: 100%;
		height: 100%;
		-webkit-transform: skewX(30deg);
		transform: skewX(30deg);
		-ms-transform: skewX(30deg);
	}

	*,
	*:before,
	*:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.mz-title .mz-title-content:after {
		content: "";
		height: 100%;
		top: 0px;
		left: 114%;
		left: -webkit-calc(100% - -26px);
		left: -moz-calc(100% - -26px);
		left: calc(100% - -26px);
		position: absolute;
		-ms-transform: skewX(30deg);
		-webkit-transform: skewX(30deg);
		transform: skewX(30deg);
		width: 9000px;
		background: #f3f3f3;
		display: none;
	}

	.dt-sc-title.mz-title .mz-title-content a {
		padding: 17px 10px 15px 20px;
		position: relative;
		z-index: 1;
		margin: 0px;
		left: 0px;
		font-size: 16px;
		text-transform: uppercase;
	}
</style>

<header class="l-section" id="main-header">
	<div class="c-header__outer c-header__outer--mobile c-header__outer--header-type-4 c-header__outer--header-type-mobile-1">
		<div class="c-header c-header--sticky-support c-header--header-type-4 c-header--header-type-mobile-1 c-header--buttons-4 c-header--mobile js-header-mobile">
			<div class="c-header__row">
				<div class="dt-sc-title mz-title">
					<a href="{{ url('/') }}" class="c-header__logo mz-title-content" style="background-image: linear-gradient(to bottom, #008B8B, #20B2AA);">
						<img class="logo-non-desktop" src="{{ asset('images/mblogo.png') }}">
					</a>
				</div>
				<div class="c-header__search-button" style="margin-top: 10px;">
					<a class="c-header__button-link c-header__button-link--search js-search-button" type="button" href="https://parkofideas.com/luchiana/demo/search/" onclick="return false;">
						<i class="ip-search" style="font-size: 25px;"></i>
					</a>
				</div>
				<button class="h-cb h-cb--svg c-header__menu-button js-mobile-menu-open" type="button">
					<i class="ip-hamburger_menu c-header__menu-button-icon"></i>
				</button>
			</div>
		</div>
	</div>

	<div class="c-header__menu c-header--mobile c-header__menu--header-type-mobile-1 js-mobile-menu">
		<div class="c-header__menu-shadow">
		</div>
		<div class="c-header__menu-buttons">
			<button type="button" class="h-cb h-cb--svg c-header__menu-back js-mobile-menu-back">
				<i class="ip-menu-left c-header__menu-back-svg"></i>Back</button>
			<button type="button" class="h-cb h-cb--svg c-header__menu-close js-mobile-menu-close">
				<i class="ip-close-small c-header__menu-close-svg"></i>
			</button>
		</div>
		<div class="c-header__menu-content">
			<div class="c-header__menu-wrap js-mobile-menu-wrap">
			</div>
			<nav itemscope itemtype="http://schema.org/SiteNavigationElement" class="c-mobile-menu c-mobile-menu--top-menu js-mobile-top-menu">
				<ul id="mobile-top-menu" class="c-mobile-menu__list">
					<li id="menu-item-17" class="c-mobile-menu__item menu-item-17" style="margin-top: 15px !important;">
						<a href="{{ url('/') }}">Home</a>
					</li>
					<li id="menu-item-17" class="c-mobile-menu__item menu-item-17">
						<a href="{{ url('/shop') }}">Shop</a>
					</li>
					@if(count($mains) > 0)
					<li id="menu-item-162" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-162">
						<a href="#">Category</a>
						@foreach($mains as $main)
						<ul class="c-mobile-menu__submenu">
							<li id="menu-item-163" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-162">
								<a href="{{ url('category',['slug' => $main->slug]) }}">{{ $main->name }}</a>
								@foreach($main->subcategory as $sub1)
								@if($sub1->status === 1 && $sub1 === 0)
								<ul class="c-mobile-menu__submenu" style="margin-top: 10px !important">
									<li id="menu-item-163" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-162">
										<a href="{{ url('category',['slug' => $sub1->slug]) }}">{{ $sub1->name }}</a>
										<ul class="c-mobile-menu__submenu">
											@foreach($sub1->subcategory as $sub2)
											@if($sub2->status == 1 && $sub2->flag == 0)
											<li id="menu-item-2474" class="c-mobile-menu__subitem menu-item-2474">
												<a href="{{ url('category',['slug' => $sub2->slug]) }}">{{ $sub2->name }}</a>
											</li>
											@endif
											@endforeach
										</ul>
									</li>
								</ul>
								@endif
								@endforeach
							</li>
						</ul>
						@endforeach
					</li>
					@endif
					<li id="menu-item-804" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-804">
						<a>Headers</a>
						<ul class="c-mobile-menu__submenu">
							<li id="menu-item-2042" class="c-mobile-menu__subitem c-mobile-menu__subitem--has-children menu-item-2042">
								<a>Desktop</a>
								<ul class="c-mobile-menu__submenu c-mobile-menu__submenu--inner">
									<li id="menu-item-805" class="c-mobile-menu__subitem menu-item-805">
										<a href="https://parkofideas.com/luchiana/demo/?set=21">Type 1</a>
									</li>
									<li id="menu-item-806" class="c-mobile-menu__subitem menu-item-806">
										<a href="https://parkofideas.com/luchiana/demo/?set=22">Type 2</a>
									</li>
									<li id="menu-item-807" class="c-mobile-menu__subitem menu-item-807">
										<a href="https://parkofideas.com/luchiana/demo/?set=23">Type 3</a>
									</li>
									<li id="menu-item-1293" class="c-mobile-menu__subitem menu-item-1293">
										<a href="https://parkofideas.com/luchiana/demo/?set=25">Type 4</a>
									</li>
									<li id="menu-item-2006" class="c-mobile-menu__subitem menu-item-2006">
										<a href="https://parkofideas.com/luchiana/demo/?set=24">Type 5</a>
									</li>
								</ul>
							</li>
							<li id="menu-item-2043" class="c-mobile-menu__subitem c-mobile-menu__subitem--has-children menu-item-2043">
								<a>Mobile</a>
								<ul class="c-mobile-menu__submenu c-mobile-menu__submenu--inner">
									<li id="menu-item-2044" class="c-mobile-menu__subitem menu-item-2044">
										<a href="https://parkofideas.com/luchiana/demo/">Type 1</a>
									</li>
									<li id="menu-item-2045" class="c-mobile-menu__subitem menu-item-2045">
										<a href="https://parkofideas.com/luchiana/demo/home-2/?set=16">Type 2</a>
									</li>
									<li id="menu-item-2046" class="c-mobile-menu__subitem menu-item-2046">
										<a href="https://parkofideas.com/luchiana/demo/home-5/?set=18">Type 3</a>
									</li>
								</ul>
							</li>
							<li id="menu-item-2478" class="c-mobile-menu__subitem menu-item-2478">
								<a href="https://parkofideas.com/luchiana/demo/shop/?set=32">Special Offers</a>
							</li>
						</ul>
					</li>
					<li id="menu-item-17" class="c-mobile-menu__item menu-item-17">
						<a href="{{ url('brands') }}">Brand</a>
					</li>
					<li id="menu-item-17" class="c-mobile-menu__item menu-item-17">
						<a href="{{ url('blogs/all') }}">Blog</a>
					</li>
					{{-- <li id="menu-item-163" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-163">
            <a>Pages</a>
            <ul class="c-mobile-menu__submenu">
              <li id="menu-item-165" class="c-mobile-menu__subitem menu-item-165">
                <a href="{{ url('about-us') }}">About us</a>
					</li>
					<li id="menu-item-164" class="c-mobile-menu__subitem menu-item-164">
						<a href="https://parkofideas.com/luchiana/demo/our-team/">Our team</a>
					</li>
					<li id="menu-item-185" class="c-mobile-menu__subitem menu-item-185">
						<a href="{{ url('faq') }}">FAQ</a>
					</li>
					<li id="menu-item-2320" class="c-mobile-menu__subitem menu-item-2320">
						<a href="{{ url('return-policy') }}">Return Policy</a>
					</li>
					<li id="menu-item-395" class="c-mobile-menu__subitem menu-item-395">
						<a href="{{ url('shipping-policy') }}">Shipping Policy</a>
					</li>
					<li id="menu-item-396" class="c-mobile-menu__subitem menu-item-396">
						<a href="{{ url('cancellation-policy') }}">Cancellation Policy</a>
					</li>
					<li class="c-mobile-menu__subitem menu-item-397">
						<a href="{{ url('privacy-policy') }}">Privacy Policy</a>
					</li>
					<li class="c-mobile-menu__subitem menu-item-397">
						<a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a>
					</li>
				</ul>
				</li> --}}
				<li id="menu-item-20" class="c-mobile-menu__item menu-item-20">
					<a href="{{ url('contact-us') }}">Contact</a>
				</li>
				</ul>
			</nav>
			<div class="c-header__mobile_blocks">
				<div class="c-header__top js-mobile-blocks">
					<ul class="c-header__top-row-list c-header__top-row-list--blocks-first">
						<!-- <li class="c-header__top-row-item c-header__top-row-item--phone">
              <i class="ip-z-phone c-header__top-row-icon c-header__top-row-icon--phone"></i>
              <a href="tel:+081978 94448">+081978 94448</a>
            </li> -->
						<li class="c-header__top-row-item c-header__top-row-item--email">
							<i class="ip-email c-header__top-row-icon c-header__top-row-icon--email"></i>
							<a href="mailto:makeupbiography@gmail.com">makeupbiography@gmail.com</a>
						</li>
						<!-- <li class="c-header__top-row-item c-header__top-row-item--address">
              <i class="ip-z-map-pin c-header__top-row-icon c-header__top-row-icon--address"></i>Sri Complex, #45, Sajjan Rao Cir, Vishweshwarapura, Bengaluru, Karnataka 560004</li> -->
						<li class="c-header__top-row-item c-header__top-row-item--hours">
							<i class="ip-z-time c-header__top-row-icon c-header__top-row-icon--hours"></i>Mon-Fri: 10:00 - 20:00
						</li>
						<li class="c-header__top-row-item c-header__top-row-item--hours">
							<i class="ip-z-map-pin c-header__top-row-icon c-header__top-row-icon--address"></i>Free Delivery on orders above &#8377; 500
						</li>
						{{-- <li class="c-header__top-row-item c-header__top-row-item--other">
              <ul class="c-top-bar-menu__list c-lang-demo">
                <li class="c-top-bar-menu__item c-top-bar-menu__item--has-children">
                  <a href="#" onclick="return false;">English</a>
                  <ul class="c-top-bar-menu__submenu">
                    <li class="c-top-bar-menu__subitem">
                      <a href="#" onclick="return false;">English</i>
                      </a>
                    </li>
                    <li class="c-top-bar-menu__subitem">
                      <a href="#" onclick="return false;">German</i>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> --}}
					</ul>
					<div class="c-soc">
						<a href="#" class="c-soc__link" target="_blank">
							<i class="ip-facebook c-soc__icon c-soc__icon--facebook">
								<!-- -->
							</i>
						</a>
						<a href="#" class="c-soc__link" target="_blank">
							<i class="ip-instagram c-soc__icon c-soc__icon--instagram">
								<!-- -->
							</i>
						</a>
						<a href="#" class="c-soc__link" target="_blank">
							<i class="ip-whatsapp c-soc__icon c-soc__icon--whatsapp">
								<!-- -->
							</i>
						</a>
						<a href="#" class="c-soc__link" target="_blank">
							<i class="ip-youtube c-soc__icon c-soc__icon--youtube">
								<!-- -->
							</i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="c-header__menu-bottom">

			<div class="c-header__auth-button">
				@if (Route::has('login'))
				@auth
				xyz
				@else
				<a class="c-header__button-link c-header__button-link--account" title="Login" href="{{ url('admin') }}" rel="nofollow">
					<i class="ip-user">
						<!-- -->
					</i>
				</a>
				@endauth
				@endif
			</div>
			<div class="c-header__wishlist">
				<a class="c-header__button-link" href="https://parkofideas.com/luchiana/demo/wishlist/">
					<i class="ip-wishlist c-header__wishlist-icon"></i>
					<span class="js-wishlist-info">
					</span>
				</a>
			</div>
			<div class="c-header__cart js-cart">
				<a class="c-header__button-link" href="https://parkofideas.com/luchiana/demo/cart/">
					<i class="ip-cart c-header__cart-icon">
						<!-- -->
					</i>
					<span class="js-cart-info">
					</span>
				</a>
			</div>
		</div>
	</div>
	<div class="c-header__outer c-header__outer--desktop c-header__outer--header-type-4 c-header__outer--top-row ">
		<div class="c-header c-header--desktop js-header-desktop c-header--header-type-4 ">
			<div class="c-header__top-row c-header__top-row--header-type-4">
				<ul class="c-header__top-row-list c-header__top-row-list--blocks-first">
					<li class="c-header__top-row-item c-header__top-row-item--social">
						<div class="c-soc">
							<a href="#" class="c-soc__link" target="_blank">
								<i class="ip-facebook c-soc__icon c-soc__icon--facebook">
									<!-- -->
								</i>
							</a>
							<a href="#" class="c-soc__link" target="_blank">
								<i class="ip-instagram c-soc__icon c-soc__icon--instagram">
									<!-- -->
								</i>
							</a>
							<a href="#" class="c-soc__link" target="_blank">
								<i class="ip-whatsapp c-soc__icon c-soc__icon--whatsapp">
									<!-- -->
								</i>
							</a>
							<a href="#" class="c-soc__link" target="_blank">
								<i class="ip-youtube c-soc__icon c-soc__icon--youtube">
									<!-- -->
								</i>
							</a>
						</div>
					</li>
					<!-- <li class="c-header__top-row-item c-header__top-row-item--phone">
            <i class="ip-z-phone c-header__top-row-icon c-header__top-row-icon--phone"></i>
            <a href="tel:+081978 94448">+081978 94448</a>
          </li> -->
					<li class="c-header__top-row-item c-header__top-row-item--email">
						<i class="ip-email c-header__top-row-icon c-header__top-row-icon--email"></i>
						<a href="mailto:makeupbiography@gmail.com">makeupbiography@gmail.com</a>
					</li>
					<!-- <li class="c-header__top-row-item c-header__top-row-item--address">
            <i class="ip-z-map-pin c-header__top-row-icon c-header__top-row-icon--address"></i>Sri Complex, #45, Sajjan Rao Cir, Vishweshwarapura, Bengaluru, Karnataka 560004</li> -->
					<li class="c-header__top-row-item c-header__top-row-item--hours">
						<i class="ip-z-time c-header__top-row-icon c-header__top-row-icon--hours"></i>Mon-Fri: 10:00 - 20:00
					</li>
					<li class="c-header__top-row-item c-header__top-row-item--hours">
						<i class="ip-z-map-pin c-header__top-row-icon c-header__top-row-icon--address"></i>Free Delivery on orders above &#8377; 500
					</li>
					{{-- <li class="c-header__top-row-item c-header__top-row-item--other">
            <ul class="c-top-bar-menu__list c-lang-demo">
              <li class="c-top-bar-menu__item c-top-bar-menu__item--has-children">
                <a href="#" onclick="return false;">English</a>
                <ul class="c-top-bar-menu__submenu">
                  <li class="c-top-bar-menu__subitem">
                    <a href="#" onclick="return false;">English</i>
                    </a>
                  </li>
                  <li class="c-top-bar-menu__subitem">
                    <a href="#" onclick="return false;">German</i>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> --}}
				</ul>
			</div>
			<div class="c-header__row">
				<div class="dt-sc-title mz-title">
					<div class="c-header__col-left">
						<div class="c-header__logo mz-title-content" style="background-image: linear-gradient(to bottom, #008B8B, #20B2AA); padding-left: 150px;">
							<a href="{{ url('/') }}" style="margin-left: -80px;">
								<img class="logo-desktop" src="{{ asset('images/mblogo.png') }}" style="margin-right: 5px;">
							</a>
						</div>
					</div>
				</div>
				<div class="c-header__col-center">
					<nav itemscope itemtype="http://schema.org/SiteNavigationElement" class="c-top-menu js-top-menu">
						<ul id="top-menu-desktop" class="c-top-menu__list c-top-menu__list--compact">
							<li class="c-top-menu__item menu-item-17 c-top-menu__item--has-children js-menu-item">
								<a href="{{ url('/') }}">Home</a>
							</li>
							<li class="c-top-menu__item c-top-menu__item--has-children menu-item-162 js-menu-item">
								<a href="{{ url('shop') }}">Shop</a>
							</li>

							<!-- category begin -->
							@if(count($mains) > 0)
							<li class="c-top-menu__item c-top-menu__item--has-children menu-item-162 js-menu-item">
								<a href="#">Category</a>
								<ul class="c-top-menu__submenu c-top-menu__submenu--columns-4 c-top-menu__submenu--expand" style="display: flex;flex-direction: row;">
									@foreach($mains as $main)
									<li class="c-top-menu__subitem menu-item-557 c-top-menu__subitem--expand js-menu-item">
										<a href="{{ url('category',$main->slug) }}">{{ $main->name }}</a>
										<ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--expand c-top-menu__submenu--inner">
											@if(!empty($main->subcategory))
											@foreach($main->subcategory as $subcategory)
											@if($subcategory->status == 1 && $subcategory->flag == 0)
											@php
											$subcategories = Category::select('id','name','slug')->where('flag',0)->where('status',1)->where('parent_id',$subcategory->id)->get();
											@endphp
											@if(count($subcategories) > 0)
											<li class="c-top-menu__subitem c-top-menu__subitem--has-children menu-item-2042 c-top-menu__subitem--collapse js-menu-item">
												<a href="{{ url('category',$subcategory->slug) }}">{{ $subcategory->name }}</a>
												<ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--inner">
													@foreach($subcategories as $sub)
													<li class="c-top-menu__subitem menu-item-805 c-top-menu__subitem--collapse js-menu-item">
														<a href="{{ url('category',$sub->slug) }}">{{ $sub->name }}</a>
													</li>
													@endforeach
												</ul>
											</li>
											@else
											<li class="c-top-menu__subitem menu-item-2474 c-top-menu__subitem--collapse js-menu-item">
												<a href="{{ url('category',$subcategory->slug) }}">{{ $subcategory->name }}</a>
											</li>
											@endif
											@endif
											@endforeach
											@endif
										</ul>
									</li>
									@endforeach

								</ul>
							</li>
							@endif
							<!-- category end -->

							<!-- brand begin -->
							<li class="c-top-menu__item c-top-menu__item--has-children menu-item-19 js-menu-item">
								<a href="{{ url('brands') }}">Brands</a>
							</li>
							<!-- brand end -->

							<li class="c-top-menu__item c-top-menu__item--has-children menu-item-19 js-menu-item">
								<a href="{{ url('blogs/all') }}">Blog</a>
							</li>
							{{-- <li class="c-top-menu__item c-top-menu__item--has-children menu-item-163 js-menu-item">
                <a>Pages</a>
                <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1">
                  <li class="c-top-menu__subitem menu-item-165 c-top-menu__subitem--collapse js-menu-item">
                    <a href="{{ url('about-us') }}">About us</a>
							</li>
							<li class="c-top-menu__subitem menu-item-2320 c-top-menu__subitem--collapse js-menu-item">
								<a href="https://parkofideas.com/luchiana/demo/service/">Service</a>
							</li>
							<li class="c-top-menu__subitem menu-item-164 c-top-menu__subitem--collapse js-menu-item">
								<a href="https://parkofideas.com/luchiana/demo/our-team/">Our team</a>
							</li>
							<li class="c-top-menu__subitem menu-item-185 c-top-menu__subitem--collapse js-menu-item">
								<a href="{{ url('faq') }}">FAQ</a>
							</li>
							<li id="menu-item-2320" class="c-top-menu__subitem menu-item-2320  c-top-menu__subitem--collapse js-menu-item">
								<a href="{{ url('return-policy') }}">Return Policy</a>
							</li>
							<li id="menu-item-395" class="c-top-menu__subitem menu-item-395  c-top-menu__subitem--collapse js-menu-item">
								<a href="{{ url('shipping-policy') }}">Shipping Policy</a>
							</li>
							<li id="menu-item-396" class="c-top-menu__subitem menu-item-396  c-top-menu__subitem--collapse js-menu-item">
								<a href="{{ url('cancellation-policy') }}">Cancellation Policy</a>
							</li>
							<li class="c-top-menu__subitem menu-item-397 c-top-menu__subitem--collapse js-menu-item">
								<a href="{{ url('privacy-policy') }}">Privacy Policy</a>
							</li>
							<li class="c-top-menu__subitem menu-item-397 c-top-menu__subitem--collapse js-menu-item">
								<a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a>
							</li>
						</ul>
						</li> --}}

						<li class="c-top-menu__item menu-item-20 js-menu-item">
							<a href="{{ url('contact-us') }}">Contact</a>
						</li>
						</ul>
					</nav>
				</div>
				<div class="c-header__col-right">
					<div class="c-header__col-right-wrap">
						<div class="c-header__search-button">
							<a class="c-header__button-link c-header__button-link--search js-search-button" type="button" href="#" onclick="return false;">
								<i class="ip-search">
									<!-- -->
								</i>
							</a>
						</div>

						@if (Route::has('login'))
						@auth
						<div class="c-header__auth-button">
							<a class="c-header__button-link c-header__button-link--account" title="my-account" href="{{ url('my-account') }}" rel="nofollow">
								<i class="ip-user">
									<!-- -->
								</i>
							</a>
						</div>
						@else
						<div class="c-header__auth-button">
							<a class="c-header__button-link c-header__button-link--account" title="Login" href="{{ url('login') }}" rel="nofollow">
								<i class="ip-user">
									<!-- -->
								</i>
							</a>
						</div>
						@endauth
						@endif
						<div class="c-header__wishlist">
							<a class="c-header__button-link" href="{{ url('wishlist') }}">
								<i class="ip-wishlist c-header__wishlist-icon"></i>
								<span class="js-wishlist-info">
									@php
									$countF = "";
									if(auth()->user() && App\Models\Favorite::where('user_id',auth()->user()->id)->count() > 0) {
									$countF = '<span class="c-header__cart-count">'.App\Models\Favorite::where('user_id',auth()->user()->id)->count().'</span>';
									}
									echo $countF;
									@endphp
								</span>
							</a>
						</div>
						<div class="c-header__cart js-cart">
							<a class="c-header__button-link" href="{{ url('cart') }}">
								<i class="ip-cart c-header__cart-icon">
									<!-- -->
								</i>
								<span class="js-cart-info">
								</span>
							</a>
							<div class="widget_shopping_cart_content">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="c-header--desktop l-section__container js-simple-container">
	</div>
	<div class="c-header__callback-popup c-header__callback-popup--disabled js-callback-popup js-quickview-popup">
		<div class="c-header__callback-bg js-callback-close">
		</div>
		<div class="c-header__callback-wrap">
			<div class="js-quickview-container">
			</div>
			<button type="button" class="h-cb h-cb--svg c-header__callback-close js-callback-close" id="ideapark-callback-close">
				<i class="ip-close"></i>
			</button>
		</div>
	</div>
</header>