@php
 use \App\Models\Category;
 $mains = Category::select('id','slug','name')->where('flag',0)->where('parent_id',null)->with('subcategory')->get();

@endphp
<header class="l-section" id="main-header">
  <div class="c-header__outer c-header__outer--mobile c-header__outer--header-type-4 c-header__outer--header-type-mobile-1">
    <div class="c-header c-header--sticky-support c-header--header-type-4 c-header--header-type-mobile-1 c-header--buttons-4 c-header--mobile js-header-mobile">
      <div class="c-header__row">
        <a href="{{ url('/') }}" class="c-header__logo">
          <img src="{{ asset('/images/mblogo.png') }}" style="width: 50px; height:50px; border-radius: 50%">
        </a>
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
          <li id="menu-item-17" class="c-mobile-menu__item menu-item-17">
            <a href="{{ url('/') }}">Home</a>
          </li>
          <li id="menu-item-162" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-162">
            <a href="https://parkofideas.com/luchiana/demo/shop/">Shop</a>
            <ul class="c-mobile-menu__submenu">
              <li id="menu-item-557" class="c-mobile-menu__subitem c-mobile-menu__subitem--has-children menu-item-557">
                <a>Shop layout</a>
                <ul class="c-mobile-menu__submenu c-mobile-menu__submenu--inner">
                  <li id="menu-item-2474" class="c-mobile-menu__subitem menu-item-2474">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=31">Categories in header</a>
                  </li>
                  <li id="menu-item-576" class="c-mobile-menu__subitem menu-item-576">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=30">Categories</a>
                  </li>
                  <li id="menu-item-559" class="c-mobile-menu__subitem menu-item-559">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=5">3 per row</a>
                  </li>
                  <li id="menu-item-560" class="c-mobile-menu__subitem menu-item-560">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=6">4 per row</a>
                  </li>
                  <li id="menu-item-561" class="c-mobile-menu__subitem menu-item-561">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=7">Compact</a>
                  </li>
                  <li id="menu-item-562" class="c-mobile-menu__subitem menu-item-562">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=8">3 per row (sidebar)</a>
                  </li>
                  <li id="menu-item-563" class="c-mobile-menu__subitem menu-item-563">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=9">4 per row (sidebar)</a>
                  </li>
                  <li id="menu-item-564" class="c-mobile-menu__subitem menu-item-564">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=10">Compact (sidebar)</a>
                  </li>
                  <li id="menu-item-2434" class="c-mobile-menu__subitem menu-item-2434">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=26">2 per row (on mobile)</a>
                  </li>
                </ul>
              </li>
              <li id="menu-item-558" class="c-mobile-menu__subitem c-mobile-menu__subitem--has-children menu-item-558">
                <a>Product layout</a>
                <ul class="c-mobile-menu__submenu c-mobile-menu__submenu--inner">
                  <li id="menu-item-570" class="c-mobile-menu__subitem menu-item-570">
                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=11">Layout 1</a>
                  </li>
                  <li id="menu-item-571" class="c-mobile-menu__subitem menu-item-571">
                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=12">Layout 2</a>
                  </li>
                  <li id="menu-item-572" class="c-mobile-menu__subitem menu-item-572">
                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=13">Layout 3</a>
                  </li>
                  <li id="menu-item-573" class="c-mobile-menu__subitem menu-item-573">
                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=14">Layout 4</a>
                  </li>
                  <li id="menu-item-2016" class="c-mobile-menu__subitem menu-item-2016">
                    <a href="https://parkofideas.com/luchiana/demo/shop/matte-revolution-lipstick/?set=15">Product image zoom</a>
                  </li>
                  <li id="menu-item-808" class="c-mobile-menu__subitem menu-item-808">
                    <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/">Product video</a>
                  </li>
                </ul>
              </li>
              <li id="menu-item-565" class="c-mobile-menu__subitem c-mobile-menu__subitem--has-children menu-item-565">
                <a>Product type</a>
                <ul class="c-mobile-menu__submenu c-mobile-menu__submenu--inner">
                  <li id="menu-item-567" class="c-mobile-menu__subitem menu-item-567">
                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/">Simple product</a>
                  </li>
                  <li id="menu-item-568" class="c-mobile-menu__subitem menu-item-568">
                    <a href="https://parkofideas.com/luchiana/demo/shop/flyliner-longwear-eyeliner/">Grouped product</a>
                  </li>
                  <li id="menu-item-566" class="c-mobile-menu__subitem menu-item-566">
                    <a href="https://parkofideas.com/luchiana/demo/shop/hair-coloring/">Variable product</a>
                  </li>
                  <li id="menu-item-569" class="c-mobile-menu__subitem menu-item-569">
                    <a href="https://parkofideas.com/luchiana/demo/shop/long-lash-serum/">External &#038; affiliate product</a>
                  </li>
                </ul>
              </li>
              <li id="menu-item-2468" class="c-mobile-menu__subitem c-mobile-menu__subitem--has-children menu-item-2468">
                <a>Brands</a>
                <ul class="c-mobile-menu__submenu c-mobile-menu__submenu--inner">
                  <li id="menu-item-2469" class="c-mobile-menu__subitem menu-item-2469">
                    <a href="https://parkofideas.com/luchiana/demo/brands-1/?set=27">Brand List 1</a>
                  </li>
                  <li id="menu-item-2470" class="c-mobile-menu__subitem menu-item-2470">
                    <a href="https://parkofideas.com/luchiana/demo/brands-2/?set=28">Brand List 2</a>
                  </li>
                  <li id="menu-item-2471" class="c-mobile-menu__subitem menu-item-2471">
                    <a href="https://parkofideas.com/luchiana/demo/shop/lactic-acid-treatment/?set=19">Brand (product page)</a>
                  </li>
                  <li id="menu-item-2394" class="c-mobile-menu__subitem menu-item-2394">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=19">Brands (product grid)</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
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
          <li id="menu-item-19" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-19">
            <a href="{{ url('blogs/all') }}">Blog</a>>
          </li>
          <li id="menu-item-163" class="c-mobile-menu__item c-mobile-menu__item--has-children menu-item-163">
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
          </li>
          <li id="menu-item-1681" class="c-mobile-menu__item menu-item-1681 c-mobile-menu__item--has-children">
            <a>Mega</a>
            <div class="c-mobile-menu__submenu c-mobile-menu__submenu--content">
              <div data-elementor-type="wp-post" data-elementor-id="1523" class="elementor elementor-1523" data-elementor-settings="[]">
                <div class="elementor-inner">
                  <div class="elementor-section-wrap">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-94b0934 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="94b0934" data-element_type="section">
                      <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-row">
                          <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a5a1574" data-id="a5a1574" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-column-wrap elementor-element-populated">
                              <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-bb54a11 elementor-widget elementor-widget-ideapark-mega-menu" data-id="bb54a11" data-element_type="widget" data-widget_type="ideapark-mega-menu.default">
                                  <div class="elementor-widget-container">
                                    <div class="c-ip-mega-menu">
                                      <div class="c-ip-mega-menu__title ">Brands</div>
                                      <ul class="c-ip-mega-menu__list">
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/aerin/">Aerin</a>
                                        </li>
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/fablemane/">Fable&amp;Mane</a>
                                        </li>
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/loreal/">Loreal</a>
                                        </li>
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/mac/">Mac</a>
                                        </li>
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/schwarzkopf/">Schwarzkopf</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="elementor-element elementor-element-82bf165 elementor-widget elementor-widget-ideapark-mega-menu" data-id="82bf165" data-element_type="widget" data-widget_type="ideapark-mega-menu.default">
                                  <div class="elementor-widget-container">
                                    <div class="c-ip-mega-menu">
                                      <div class="c-ip-mega-menu__title ">Capacity</div>
                                      <ul class="c-ip-mega-menu__list">
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/?taxonomy=pa_capacity&amp;term=30ml">30 mL</a>
                                        </li>
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/?taxonomy=pa_capacity&amp;term=40ml">40 mL</a>
                                        </li>
                                        <li class="c-ip-mega-menu__item">
                                          <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/?taxonomy=pa_capacity&amp;term=50ml">50 mL</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1b19645" data-id="1b19645" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-column-wrap elementor-element-populated">
                              <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-6103afb elementor-widget elementor-widget-ideapark-woocommerce-grid" data-id="6103afb" data-element_type="widget" data-widget_type="ideapark-woocommerce-grid.default">
                                  <div class="elementor-widget-container">
                                    <div class="c-ip-woocommerce-grid">
                                      <div class="c-ip-woocommerce-grid__wrap">
                                        <div class="woocommerce columns-3 ">
                                          <div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
                                            <div class="c-product-grid__list c-ip-woocommerce-grid__listc-product-grid__list--4-per-row ">
                                              <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-464 status-publish first instock product_cat-fragrance product_tag-fragrance product_tag-warm has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                <div class="c-product-grid__badges c-badge__list">
                                                </div>
                                                <!-- .c-product-grid__badges -->
                                                <div class="c-product-grid__thumb-wrap">
                                                  <a href="https://parkofideas.com/luchiana/demo/shop/eau-de-soleil-blanc-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3000062647-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                                                  </a>
                                                  <div class="c-product-grid__thumb-button-list">
                                                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="464">
                                                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                                    </button>
                                                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-464-btn h-cb c-product-grid__thumb-button" data-product-id="464" data-title="Wishlist">
                                                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <!-- .c-product-grid__thumb-wrap -->
                                                <a href="index63e5.html?add-to-cart=464" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="464" data-product_sku="6549845315" aria-label="Add &ldquo;Flowerbomb&rdquo; to your cart" rel="nofollow">
                                                  <i class="ip-plus c-product-grid__atc-icon"></i>
                                                  <span class="c-product-grid__atc-text">Add to cart</span>
                                                </a>
                                                <div class="c-product-grid__details">
                                                  <div class="c-product-grid__title-wrap">
                                                    <a href="https://parkofideas.com/luchiana/demo/shop/eau-de-soleil-blanc-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                      <h2 class="woocommerce-loop-product__title">Flowerbomb</h2>
                                                    </a>
                                                    <div class="c-product-grid__short-desc">
                                                      <p>Vert de Bergamot, Coco de Mer Accord.</p>
                                                    </div>
                                                  </div>
                                                  <!-- .c-product-grid__title-wrap -->
                                                  <div class="c-product-grid__price-wrap">
                                                    <span class="price">
                                                      <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                          <span class="woocommerce-Price-currencySymbol">&#36;</span>200.00</bdi>
                                                      </span>
                                                    </span>
                                                  </div>
                                                  <!-- .c-product-grid__price-wrap -->
                                                </div>
                                                <!-- .c-product-grid__details -->
                                              </div>
                                              <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-511 status-publish instock product_cat-fragrance product_tag-perfume has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                                <div class="c-product-grid__badges c-badge__list">
                                                  <span class="c-badge c-badge--featured">Featured</span>
                                                  <span class="c-badge c-badge--new">New</span>
                                                </div>
                                                <!-- .c-product-grid__badges -->
                                                <div class="c-product-grid__thumb-wrap">
                                                  <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3032395463-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                                                  </a>
                                                  <div class="c-product-grid__thumb-button-list">
                                                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="511">
                                                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                                    </button>
                                                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-511-btn h-cb c-product-grid__thumb-button" data-product-id="511" data-title="Wishlist">
                                                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <!-- .c-product-grid__thumb-wrap -->
                                                <a href="indexd5bb.html?add-to-cart=511" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="511" data-product_sku="65498453209" aria-label="Add &ldquo;Midnight Musk&rdquo; to your cart" rel="nofollow">
                                                  <i class="ip-plus c-product-grid__atc-icon"></i>
                                                  <span class="c-product-grid__atc-text">Add to cart</span>
                                                </a>
                                                <div class="c-product-grid__details">
                                                  <div class="c-product-grid__title-wrap">
                                                    <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                      <h2 class="woocommerce-loop-product__title">Midnight Musk</h2>
                                                    </a>
                                                    <div class="c-product-grid__short-desc">
                                                      <p>Earthy &amp; Woody.</p>
                                                    </div>
                                                  </div>
                                                  <!-- .c-product-grid__title-wrap -->
                                                  <div class="c-product-grid__price-wrap">
                                                    <span class="price">
                                                      <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                          <span class="woocommerce-Price-currencySymbol">&#36;</span>150.00</bdi>
                                                      </span>
                                                    </span>
                                                  </div>
                                                  <!-- .c-product-grid__price-wrap -->
                                                </div>
                                                <!-- .c-product-grid__details -->
                                              </div>
                                              <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-482 status-publish last instock product_cat-fragrance product_cat-skincare product_tag-cream product_tag-dry product_tag-skin has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                                <div class="c-product-grid__badges c-badge__list">
                                                  <span class="c-badge c-badge--featured">Featured</span>
                                                </div>
                                                <!-- .c-product-grid__badges -->
                                                <div class="c-product-grid__thumb-wrap">
                                                  <a href="https://parkofideas.com/luchiana/demo/shop/purity-made-simple-cleanser/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3025788510-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3025788510-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3025788510-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                                                  </a>
                                                  <div class="c-product-grid__thumb-button-list">
                                                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="482">
                                                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                                    </button>
                                                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-482-btn h-cb c-product-grid__thumb-button" data-product-id="482" data-title="Wishlist">
                                                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <!-- .c-product-grid__thumb-wrap -->
                                                <a href="index05f7.html?add-to-cart=482" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="482" data-product_sku="6549845399" aria-label="Add &ldquo;Purity Made Cleanser&rdquo; to your cart" rel="nofollow">
                                                  <i class="ip-plus c-product-grid__atc-icon"></i>
                                                  <span class="c-product-grid__atc-text">Add to cart</span>
                                                </a>
                                                <div class="c-product-grid__details">
                                                  <div class="c-product-grid__title-wrap">
                                                    <a href="https://parkofideas.com/luchiana/demo/shop/purity-made-simple-cleanser/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                      <h2 class="woocommerce-loop-product__title">Purity Made Cleanser</h2>
                                                    </a>
                                                    <div class="c-product-grid__short-desc">
                                                      <p>Top-selling facial cleanser.</p>
                                                    </div>
                                                  </div>
                                                  <!-- .c-product-grid__title-wrap -->
                                                  <div class="c-product-grid__price-wrap">
                                                    <span class="price">
                                                      <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                          <span class="woocommerce-Price-currencySymbol">&#36;</span>60.00</bdi>
                                                      </span>
                                                    </span>
                                                  </div>
                                                  <!-- .c-product-grid__price-wrap -->
                                                </div>
                                                <!-- .c-product-grid__details -->
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
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li id="menu-item-20" class="c-mobile-menu__item menu-item-20">
            <a href="https://parkofideas.com/luchiana/demo/contact/">Contact</a>
          </li>
        </ul>
      </nav>
      <div class="c-header__mobile_blocks">
        <div class="c-header__top js-mobile-blocks">
          <ul class="c-header__top-row-list c-header__top-row-list--blocks-first">
            <li class="c-header__top-row-item c-header__top-row-item--phone">
              <i class="ip-z-phone c-header__top-row-icon c-header__top-row-icon--phone"></i>
              <a href="tel:+1234567890">+123 456 7890</a>
            </li>
            <li class="c-header__top-row-item c-header__top-row-item--email">
              <i class="ip-email c-header__top-row-icon c-header__top-row-icon--email"></i>
              <a href="mailto:info@luchiana.com">info@luchiana.com</a>
            </li>
            <li class="c-header__top-row-item c-header__top-row-item--address">
              <i class="ip-z-map-pin c-header__top-row-icon c-header__top-row-icon--address"></i>25 West 21th Street, Miami FL, USA</li>
            <li class="c-header__top-row-item c-header__top-row-item--hours">
              <i class="ip-z-time c-header__top-row-icon c-header__top-row-icon--hours"></i>Mon-Fri: 10:00 - 18:00</li>
            <li class="c-header__top-row-item c-header__top-row-item--other">
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
            </li>
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
      <div class="c-header__search-button">
        <a class="c-header__button-link c-header__button-link--search js-search-button" type="button" href="https://parkofideas.com/luchiana/demo/search/" onclick="return false;">
          <i class="ip-search">
            <!-- -->
          </i>
        </a>
      </div>
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
          <li class="c-header__top-row-item c-header__top-row-item--phone">
            <i class="ip-z-phone c-header__top-row-icon c-header__top-row-icon--phone"></i>
            <a href="tel:+1234567890">+123 456 7890</a>
          </li>
          <li class="c-header__top-row-item c-header__top-row-item--email">
            <i class="ip-email c-header__top-row-icon c-header__top-row-icon--email"></i>
            <a href="mailto:info@luchiana.com">info@luchiana.com</a>
          </li>
          <li class="c-header__top-row-item c-header__top-row-item--address">
            <i class="ip-z-map-pin c-header__top-row-icon c-header__top-row-icon--address"></i>25 West 21th Street, Miami FL, USA</li>
          <li class="c-header__top-row-item c-header__top-row-item--hours">
            <i class="ip-z-time c-header__top-row-icon c-header__top-row-icon--hours"></i>Mon-Fri: 10:00 - 18:00</li>
          <li class="c-header__top-row-item c-header__top-row-item--other">
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
          </li>
        </ul>
      </div>
      <div class="c-header__row">
        <div class="c-header__col-left">
          <div class="c-header__logo">
            <a href="{{ url('/') }}">
              <img src="{{ asset('/images/mblogo.png') }}" style="width: 70px; height:70px; border-radius: 50%">
            </a>
          </div>
        </div>
        <div class="c-header__col-center">
          <nav itemscope itemtype="http://schema.org/SiteNavigationElement" class="c-top-menu js-top-menu">
            <ul id="top-menu-desktop" class="c-top-menu__list c-top-menu__list--compact">
              <li class="c-top-menu__item menu-item-17 c-top-menu__item--has-children js-menu-item">
                <a href="{{ url('/') }}">Home</a>
              </li>
              <li class="c-top-menu__item c-top-menu__item--has-children menu-item-162 js-menu-item">
                <a href="https://parkofideas.com/luchiana/demo/shop/">Shop</a>
                <ul class="c-top-menu__submenu c-top-menu__submenu--columns-4 c-top-menu__submenu--expand">
                  <li class="c-top-menu__subitem menu-item-557 c-top-menu__subitem--expand js-menu-item">
                    <a>Shop layout</a>
                    <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--expand c-top-menu__submenu--inner">
                      <li class="c-top-menu__subitem menu-item-2474 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=31">Categories in header</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-576 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=30">Categories</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-559 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=5">3 per row</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-560 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=6">4 per row</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-561 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=7">Compact</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-562 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=8">3 per row (sidebar)</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-563 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=9">4 per row (sidebar)</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-564 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=10">Compact (sidebar)</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2434 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=26">2 per row (on mobile)</a>
                      </li>
                    </ul>
                  </li>
                  <li class="c-top-menu__subitem menu-item-558 c-top-menu__subitem--expand js-menu-item">
                    <a>Product layout</a>
                    <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--expand c-top-menu__submenu--inner">
                      <li class="c-top-menu__subitem menu-item-570 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=11">Layout 1</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-571 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=12">Layout 2</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-572 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=13">Layout 3</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-573 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/?set=14">Layout 4</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2016 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/matte-revolution-lipstick/?set=15">Product image zoom</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-808 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/">Product video</a>
                      </li>
                    </ul>
                  </li>
                  <li class="c-top-menu__subitem menu-item-565 c-top-menu__subitem--expand js-menu-item">
                    <a>Product type</a>
                    <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--expand c-top-menu__submenu--inner">
                      <li class="c-top-menu__subitem menu-item-567 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/">Simple product</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-568 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/flyliner-longwear-eyeliner/">Grouped product</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-566 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/hair-coloring/">Variable product</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-569 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/long-lash-serum/">External &#038; affiliate product</a>
                      </li>
                    </ul>
                  </li>
                  <li class="c-top-menu__subitem menu-item-2468 c-top-menu__subitem--expand js-menu-item">
                    <a>Brands</a>
                    <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--expand c-top-menu__submenu--inner">
                      <li class="c-top-menu__subitem menu-item-2469 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/brands-1/?set=27">Brand List 1</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2470 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/brands-2/?set=28">Brand List 2</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2471 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/lactic-acid-treatment/?set=19">Brand (product page)</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2394 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/shop/?set=19">Brands (product grid)</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <!-- category begin -->

              @if(count($mains) > 0)
              <li class="c-top-menu__item c-top-menu__item--has-children menu-item-162 js-menu-item">
                <a href="#">Category</a>
                <ul class="c-top-menu__submenu c-top-menu__submenu--columns-4 c-top-menu__submenu--expand">
                @foreach($mains as $main)  
                  <li class="c-top-menu__subitem menu-item-557 c-top-menu__subitem--expand js-menu-item">
                    <a href="{{ url('category',$main->slug) }}" >{{ $main->name }}</a>
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

              <li class="c-top-menu__item c-top-menu__item--has-children menu-item-804 js-menu-item">
                <a>Headers</a>
                <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1">
                  <li class="c-top-menu__subitem c-top-menu__subitem--has-children menu-item-2042 c-top-menu__subitem--collapse js-menu-item">
                    <a>Desktop</a>
                    <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--inner">
                      <li class="c-top-menu__subitem menu-item-805 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/?set=21">Type 1</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-806 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/?set=22">Type 2</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-807 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/?set=23">Type 3</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-1293 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/?set=25">Type 4</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2006 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/?set=24">Type 5</a>
                      </li>
                    </ul>
                  </li>
                  <li class="c-top-menu__subitem c-top-menu__subitem--has-children menu-item-2043 c-top-menu__subitem--collapse js-menu-item">
                    <a>Mobile</a>
                    <ul class="c-top-menu__submenu c-top-menu__submenu--columns-1 c-top-menu__submenu--inner">
                      <li class="c-top-menu__subitem menu-item-2044 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/">Type 1</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2045 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/home-2/?set=16">Type 2</a>
                      </li>
                      <li class="c-top-menu__subitem menu-item-2046 c-top-menu__subitem--collapse js-menu-item">
                        <a href="https://parkofideas.com/luchiana/demo/home-5/?set=18">Type 3</a>
                      </li>
                    </ul>
                  </li>
                  <li class="c-top-menu__subitem menu-item-2478 c-top-menu__subitem--collapse js-menu-item">
                    <a href="https://parkofideas.com/luchiana/demo/shop/?set=32">Special Offers</a>
                  </li>
                </ul>
              </li>
              <li class="c-top-menu__item c-top-menu__item--has-children menu-item-19 js-menu-item">
                <a href="{{ url('blogs/all') }}">Blog</a>
              </li>
              <li class="c-top-menu__item c-top-menu__item--has-children menu-item-163 js-menu-item">
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
              </li>
              <li class="c-top-menu__item menu-item-1681 c-top-menu__item--has-children js-menu-item">
                <a>Mega</a>
                <div class="c-top-menu__submenu c-top-menu__submenu--content c-top-menu__submenu--columns-4">
                  <div data-elementor-type="wp-post" data-elementor-id="1523" class="elementor elementor-1523" data-elementor-settings="[]">
                    <div class="elementor-inner">
                      <div class="elementor-section-wrap">
                        <section class="elementor-section elementor-top-section elementor-element elementor-element-94b0934 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="94b0934" data-element_type="section">
                          <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-row">
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a5a1574" data-id="a5a1574" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-column-wrap elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-bb54a11 elementor-widget elementor-widget-ideapark-mega-menu" data-id="bb54a11" data-element_type="widget" data-widget_type="ideapark-mega-menu.default">
                                      <div class="elementor-widget-container">
                                        <div class="c-ip-mega-menu">
                                          <div class="c-ip-mega-menu__title ">Brands</div>
                                          <ul class="c-ip-mega-menu__list">
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/aerin/">Aerin</a>
                                            </li>
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/fablemane/">Fable&amp;Mane</a>
                                            </li>
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/loreal/">Loreal</a>
                                            </li>
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/mac/">Mac</a>
                                            </li>
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/brands/schwarzkopf/">Schwarzkopf</a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="elementor-element elementor-element-82bf165 elementor-widget elementor-widget-ideapark-mega-menu" data-id="82bf165" data-element_type="widget" data-widget_type="ideapark-mega-menu.default">
                                      <div class="elementor-widget-container">
                                        <div class="c-ip-mega-menu">
                                          <div class="c-ip-mega-menu__title ">Capacity</div>
                                          <ul class="c-ip-mega-menu__list">
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/?taxonomy=pa_capacity&amp;term=30ml">30 mL</a>
                                            </li>
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/?taxonomy=pa_capacity&amp;term=40ml">40 mL</a>
                                            </li>
                                            <li class="c-ip-mega-menu__item">
                                              <a class="c-ip-mega-menu__item-link" href="https://parkofideas.com/luchiana/demo/?taxonomy=pa_capacity&amp;term=50ml">50 mL</a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1b19645" data-id="1b19645" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-column-wrap elementor-element-populated">
                                  <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-6103afb elementor-widget elementor-widget-ideapark-woocommerce-grid" data-id="6103afb" data-element_type="widget" data-widget_type="ideapark-woocommerce-grid.default">
                                      <div class="elementor-widget-container">
                                        <div class="c-ip-woocommerce-grid">
                                          <div class="c-ip-woocommerce-grid__wrap">
                                            <div class="woocommerce columns-3 ">
                                              <div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
                                                <div class="c-product-grid__list c-ip-woocommerce-grid__listc-product-grid__list--4-per-row ">
                                                  <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-464 status-publish first instock product_cat-fragrance product_tag-fragrance product_tag-warm has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                    <div class="c-product-grid__badges c-badge__list">
                                                    </div>
                                                    <!-- .c-product-grid__badges -->
                                                    <div class="c-product-grid__thumb-wrap">
                                                      <a href="https://parkofideas.com/luchiana/demo/shop/eau-de-soleil-blanc-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3000062647-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                                                      </a>
                                                      <div class="c-product-grid__thumb-button-list">
                                                        <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="464">
                                                          <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                                          <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                                        </button>
                                                        <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-464-btn h-cb c-product-grid__thumb-button" data-product-id="464" data-title="Wishlist">
                                                          <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                          <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                        </button>
                                                      </div>
                                                    </div>
                                                    <!-- .c-product-grid__thumb-wrap -->
                                                    <a href="index63e5.html?add-to-cart=464" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="464" data-product_sku="6549845315" aria-label="Add &ldquo;Flowerbomb&rdquo; to your cart" rel="nofollow">
                                                      <i class="ip-plus c-product-grid__atc-icon"></i>
                                                      <span class="c-product-grid__atc-text">Add to cart</span>
                                                    </a>
                                                    <div class="c-product-grid__details">
                                                      <div class="c-product-grid__title-wrap">
                                                        <a href="https://parkofideas.com/luchiana/demo/shop/eau-de-soleil-blanc-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                          <h2 class="woocommerce-loop-product__title">Flowerbomb</h2>
                                                        </a>
                                                        <div class="c-product-grid__short-desc">
                                                          <p>Vert de Bergamot, Coco de Mer Accord.</p>
                                                        </div>
                                                      </div>
                                                      <!-- .c-product-grid__title-wrap -->
                                                      <div class="c-product-grid__price-wrap">
                                                        <span class="price">
                                                          <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                              <span class="woocommerce-Price-currencySymbol">&#36;</span>200.00</bdi>
                                                          </span>
                                                        </span>
                                                      </div>
                                                      <!-- .c-product-grid__price-wrap -->
                                                    </div>
                                                    <!-- .c-product-grid__details -->
                                                  </div>
                                                  <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-511 status-publish instock product_cat-fragrance product_tag-perfume has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                                    <div class="c-product-grid__badges c-badge__list">
                                                      <span class="c-badge c-badge--featured">Featured</span>
                                                      <span class="c-badge c-badge--new">New</span>
                                                    </div>
                                                    <!-- .c-product-grid__badges -->
                                                    <div class="c-product-grid__thumb-wrap">
                                                      <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3032395463-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                                                      </a>
                                                      <div class="c-product-grid__thumb-button-list">
                                                        <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="511">
                                                          <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                                          <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                                        </button>
                                                        <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-511-btn h-cb c-product-grid__thumb-button" data-product-id="511" data-title="Wishlist">
                                                          <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                          <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                        </button>
                                                      </div>
                                                    </div>
                                                    <!-- .c-product-grid__thumb-wrap -->
                                                    <a href="indexd5bb.html?add-to-cart=511" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="511" data-product_sku="65498453209" aria-label="Add &ldquo;Midnight Musk&rdquo; to your cart" rel="nofollow">
                                                      <i class="ip-plus c-product-grid__atc-icon"></i>
                                                      <span class="c-product-grid__atc-text">Add to cart</span>
                                                    </a>
                                                    <div class="c-product-grid__details">
                                                      <div class="c-product-grid__title-wrap">
                                                        <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                          <h2 class="woocommerce-loop-product__title">Midnight Musk</h2>
                                                        </a>
                                                        <div class="c-product-grid__short-desc">
                                                          <p>Earthy &amp; Woody.</p>
                                                        </div>
                                                      </div>
                                                      <!-- .c-product-grid__title-wrap -->
                                                      <div class="c-product-grid__price-wrap">
                                                        <span class="price">
                                                          <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                              <span class="woocommerce-Price-currencySymbol">&#36;</span>150.00</bdi>
                                                          </span>
                                                        </span>
                                                      </div>
                                                      <!-- .c-product-grid__price-wrap -->
                                                    </div>
                                                    <!-- .c-product-grid__details -->
                                                  </div>
                                                  <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-482 status-publish last instock product_cat-fragrance product_cat-skincare product_tag-cream product_tag-dry product_tag-skin has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                                    <div class="c-product-grid__badges c-badge__list">
                                                      <span class="c-badge c-badge--featured">Featured</span>
                                                    </div>
                                                    <!-- .c-product-grid__badges -->
                                                    <div class="c-product-grid__thumb-wrap">
                                                      <a href="https://parkofideas.com/luchiana/demo/shop/purity-made-simple-cleanser/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <img width="260" height="230" src="../wp-content/uploads/2020/10/luchiana-3025788510-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3025788510-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3025788510-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                                                      </a>
                                                      <div class="c-product-grid__thumb-button-list">
                                                        <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="482">
                                                          <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                                          <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                                        </button>
                                                        <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-482-btn h-cb c-product-grid__thumb-button" data-product-id="482" data-title="Wishlist">
                                                          <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                          <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                        </button>
                                                      </div>
                                                    </div>
                                                    <!-- .c-product-grid__thumb-wrap -->
                                                    <a href="index05f7.html?add-to-cart=482" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="482" data-product_sku="6549845399" aria-label="Add &ldquo;Purity Made Cleanser&rdquo; to your cart" rel="nofollow">
                                                      <i class="ip-plus c-product-grid__atc-icon"></i>
                                                      <span class="c-product-grid__atc-text">Add to cart</span>
                                                    </a>
                                                    <div class="c-product-grid__details">
                                                      <div class="c-product-grid__title-wrap">
                                                        <a href="https://parkofideas.com/luchiana/demo/shop/purity-made-simple-cleanser/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                          <h2 class="woocommerce-loop-product__title">Purity Made Cleanser</h2>
                                                        </a>
                                                        <div class="c-product-grid__short-desc">
                                                          <p>Top-selling facial cleanser.</p>
                                                        </div>
                                                      </div>
                                                      <!-- .c-product-grid__title-wrap -->
                                                      <div class="c-product-grid__price-wrap">
                                                        <span class="price">
                                                          <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                              <span class="woocommerce-Price-currencySymbol">&#36;</span>60.00</bdi>
                                                          </span>
                                                        </span>
                                                      </div>
                                                      <!-- .c-product-grid__price-wrap -->
                                                    </div>
                                                    <!-- .c-product-grid__details -->
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
                              </div>
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="c-top-menu__item menu-item-20 js-menu-item">
                <a href="https://parkofideas.com/luchiana/demo/contact/">Contact</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="c-header__col-right">
          <div class="c-header__col-right-wrap">
            <div class="c-header__search-button">
              <a class="c-header__button-link c-header__button-link--search js-search-button" type="button" href="https://parkofideas.com/luchiana/demo/search/" onclick="return false;">
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