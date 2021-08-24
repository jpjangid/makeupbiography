@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--product-list">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Shop</h1>
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
          <a itemprop="item" title="Shop" href="https://parkofideas.com/luchiana/demo/shop/">
            <span itemprop="name">Shop</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="woocommerce-notices-wrapper">
  </div>
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
            <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
              <div class="widget-title">Product categories</div>
              <ul class="product-categories">
                <li class="cat-item cat-item-67">
                  <a href="https://parkofideas.com/luchiana/demo/product-category/fragrance/">Fragrance</a>
                </li>
                <li class="cat-item cat-item-50 cat-parent">
                  <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/">Makeup</a>
                  <ul class='children'>
                    <li class="cat-item cat-item-58">
                      <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/eye/">Eye Palettes</a>
                    </li>
                    <li class="cat-item cat-item-64">
                      <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/hair/">Hair Health</a>
                    </li>
                    <li class="cat-item cat-item-49">
                      <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/lips/">Lips Gloss</a>
                    </li>
                  </ul>
                </li>
                <li class="cat-item cat-item-54">
                  <a href="https://parkofideas.com/luchiana/demo/product-category/skincare/">Skincare</a>
                </li>
              </ul>
            </aside>
            <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
              <div class="widget-title">Price</div>
              <form method="get" action="https://parkofideas.com/luchiana/demo/shop/">
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
              </form>
            </aside>
            <aside id="woocommerce_layered_nav-2" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
              <div class="widget-title">Capacity</div>
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
            </aside>
          </div>
          <div class="c-shop-sidebar__content c-shop-sidebar__content--mobile js-shop-sidebar-content">
            <aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter">
              <h2 class="widget-title">Price</h2>
              <form method="get" action="https://parkofideas.com/luchiana/demo/shop/">
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
              </form>
            </aside>
            <aside id="woocommerce_layered_nav-3" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
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
            </aside>
          </div>
        </div>
      </div>
    </div>
    <div class="l-section__content">
      <div class="">
        <div class="c-catalog-ordering  c-catalog-ordering--desktop-filter ">
          <div class="c-catalog-ordering__col c-catalog-ordering__col--result">
            <p class="woocommerce-result-count">Showing 1&ndash;12 of 21 results</p>
          </div>
          <div class="c-catalog-ordering__col c-catalog-ordering__col--ordering">
            <form class="woocommerce-ordering" method="get">
              <select name="orderby" class="orderby" aria-label="Shop order">
                <option value="menu_order" selected='selected'>Default sorting</option>
                <option value="popularity">Sort by popularity</option>
                <option value="rating">Sort by average rating</option>
                <option value="date">Sort by latest</option>
                <option value="price">Sort by price: low to high</option>
                <option value="price-desc">Sort by price: high to low</option>
              </select>
              <input type="hidden" name="paged" value="1" />
              <input type="hidden" name="set" value="5" />
            </form>
          </div>
          <button class="h-cb c-catalog-ordering__filter-show-button js-filter-show-button" type="button">Filter
            <i class="ip-filter c-catalog-ordering__filter-ico"></i>
          </button>
        </div>
        <div class="c-product-grid">
          <div class="c-product-grid__wrap c-product-grid__wrap--3-per-row ">
            <div class="c-product-grid__list c-product-grid__list--3-per-row ">
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--featured">Featured</span>
                  <span class="c-badge c-badge--sale">-11%</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="438">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-438-btn h-cb c-product-grid__thumb-button" data-product-id="438" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=438" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="438" data-product_sku="6549845321" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Airbrush Matte</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>Skin-perfecting bronzed filter for the face.</p>
                    </div>
                    <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                      <span style="width:80%">Rated
                        <strong class="rating">4.00</strong>out of 5</span>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <del aria-hidden="true">
                        <span class="woocommerce-Price-amount amount">
                          <bdi>
                            <span class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi>
                        </span>
                      </del>
                      <ins>
                        <span class="woocommerce-Price-amount amount">
                          <bdi>
                            <span class="woocommerce-Price-currencySymbol">&#36;</span>40.00</bdi>
                        </span>
                      </ins>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-504 status-publish instock product_cat-hair product_tag-hair product_tag-shampoo has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--new">New</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/bodifying-shampoo/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015865450.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="504">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-504-btn h-cb c-product-grid__thumb-button" data-product-id="504" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=504" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="504" data-product_sku="6549845337" aria-label="Add &ldquo;Bodifying Shampoo&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/bodifying-shampoo/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Bodifying Shampoo</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>A gentle but thorough cleanser that leaves hair.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-508 status-publish last instock product_cat-eye product_tag-brightening product_tag-corrector product_tag-eye has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--new">New</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/eye-brightening-corrector/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022718468.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="508">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-508-btn h-cb c-product-grid__thumb-button" data-product-id="508" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=508" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="508" data-product_sku="6549845322" aria-label="Add &ldquo;Brightening Corrector&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/eye-brightening-corrector/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Brightening Corrector</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>A full-coverage color corrector.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>80.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-451 status-publish first instock product_cat-lips product_tag-lips product_tag-tint has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/extra-lip-tint/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3024294986.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="451">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-451-btn h-cb c-product-grid__thumb-button" data-product-id="451" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=451" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="451" data-product_sku="6549845335" aria-label="Add &ldquo;Extra Lip Tint&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/extra-lip-tint/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Extra Lip Tint</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>Сolor-enhancing tint that brings out the best in lips.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>29.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-420 status-publish instock product_cat-makeup has-post-thumbnail sale featured shipping-taxable product-type-grouped">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--featured">Featured</span>
                  <span class="c-badge c-badge--sale">Sale</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/flyliner-longwear-eyeliner/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-760x761.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-920x921.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709.jpg 1201w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="420">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-420-btn h-cb c-product-grid__thumb-button" data-product-id="420" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="https://parkofideas.com/luchiana/demo/shop/flyliner-longwear-eyeliner/" data-quantity="1" class="h-cb c-product-grid__atc button product_type_grouped" data-product_id="420" data-product_sku="6549845382" aria-label="View products in the &ldquo;Eyeliner Pack&rdquo; group" rel="nofollow">
                  <span class="c-product-grid__atc-text">View products</span>
                  <i class="ip-button-more c-product-grid__atc-icon"></i>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/flyliner-longwear-eyeliner/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Eyeliner Pack</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>A hyper-saturated, water-resistant, liquid eyeliner.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>40.00</bdi>
                      </span>&ndash;
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>80.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-429 status-publish last instock product_cat-makeup has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--featured">Featured</span>
                  <span class="c-badge c-badge--sale">-11%</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/face-body-foundation/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="429">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-429-btn h-cb c-product-grid__thumb-button" data-product-id="429" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=429" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="429" data-product_sku="" aria-label="Add &ldquo;Face &amp; Body Foundation&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/face-body-foundation/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Face &#038; Body Foundation</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>A foundation for the face and body.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <del aria-hidden="true">
                        <span class="woocommerce-Price-amount amount">
                          <bdi>
                            <span class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi>
                        </span>
                      </del>
                      <ins>
                        <span class="woocommerce-Price-amount amount">
                          <bdi>
                            <span class="woocommerce-Price-currencySymbol">&#36;</span>40.00</bdi>
                        </span>
                      </ins>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-464 status-publish first instock product_cat-fragrance product_tag-fragrance product_tag-warm has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/eau-de-soleil-blanc-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
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
                <a href="?add-to-cart=464" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="464" data-product_sku="6549845315" aria-label="Add &ldquo;Flowerbomb&rdquo; to your cart" rel="nofollow">
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
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-515 status-publish instock product_cat-hair has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--new">New</span>
                  <span class="c-badge c-badge--sale">Sale</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/hair-coloring/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-760x761.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-920x921.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3056568558.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="515">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-515-btn h-cb c-product-grid__thumb-button" data-product-id="515" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="https://parkofideas.com/luchiana/demo/shop/hair-coloring/" data-quantity="1" class="h-cb c-product-grid__atc button product_type_variable add_to_cart_button" data-product_id="515" data-product_sku="6549845320" aria-label="Select options for &ldquo;Hair Coloring&rdquo;" rel="nofollow">
                  <span class="c-product-grid__atc-text">Select options</span>
                  <i class="ip-button-more c-product-grid__atc-icon"></i>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/hair-coloring/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Hair Coloring</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>A semi-permanent hair color in a deep conditioning.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>30.00</bdi>
                      </span>&ndash;
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-474 status-publish last outofstock product_cat-makeup has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <div class="c-product-grid__stock-wrap">
                    <span class="c-product-grid__stock c-product-grid__stock--out-of-stock out-of-stock">Out of stock</span>
                  </div>
                  <a href="https://parkofideas.com/luchiana/demo/shop/instant-retouch-primer/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="474">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-474-btn h-cb c-product-grid__thumb-button" data-product-id="474" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="https://parkofideas.com/luchiana/demo/shop/instant-retouch-primer/" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple" data-product_id="474" data-product_sku="6549845377" aria-label="Read more about &ldquo;Instant Retouch Primer&rdquo;" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Read more</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/instant-retouch-primer/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Instant Retouch Primer</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>Longer wear with an instant retouch effect.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-431 status-publish first instock product_cat-skincare has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--featured">Featured</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/lactic-acid-treatment/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-760x761.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-920x921.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="431">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-431-btn h-cb c-product-grid__thumb-button" data-product-id="431" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=431" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="431" data-product_sku="" aria-label="Add &ldquo;Lactic Acid Treatment&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/lactic-acid-treatment/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Lactic Acid Treatment</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>An all-in-one AHA treatment.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>37.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-490 status-publish instock product_cat-eye product_tag-eye product_tag-serum has-post-thumbnail shipping-taxable product-type-external">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/long-lash-serum/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3037998670.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="490">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-490-btn h-cb c-product-grid__thumb-button" data-product-id="490" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="#" data-quantity="1" class="h-cb c-product-grid__atc button product_type_external" data-product_id="490" data-product_sku="6549845388" aria-label="Buy on the Amazon" rel="nofollow">
                  <span class="c-product-grid__atc-text">Buy on the Amazon</span>
                  <i class="ip-button-more c-product-grid__atc-icon"></i>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/long-lash-serum/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Long Lash Serum</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>This is an external product.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>25.00</bdi>
                      </span>
                    </span>
                  </div>
                  <!-- .c-product-grid__price-wrap -->
                </div>
                <!-- .c-product-grid__details -->
              </div>
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-511 status-publish last instock product_cat-fragrance product_tag-perfume has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--featured">Featured</span>
                  <span class="c-badge c-badge--new">New</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-760x759.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-920x919.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463.jpg 1201w" sizes="(max-width: 460px) 100vw, 460px" />
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
                <a href="?add-to-cart=511" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="511" data-product_sku="65498453209" aria-label="Add &ldquo;Midnight Musk&rdquo; to your cart" rel="nofollow">
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
            </div>
          </div>
        </div>
        <nav class="woocommerce-pagination">
          <ul class='page-numbers'>
            <li>
              <span aria-current="page" class="page-numbers current">1</span>
            </li>
            <li>
              <a class="page-numbers" href="https://parkofideas.com/luchiana/demo/shop/page/2/?set=5">2</a>
            </li>
            <li>
              <a class="next page-numbers" href="https://parkofideas.com/luchiana/demo/shop/page/2/?set=5">
                <i class="ip-menu-right page-numbers__prev-ico"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="l-section l-section--container entry-content c-product-grid__cat-desc c-product-grid__cat-desc--below">
  </div>
</div>
<!-- /.l-inner -->
@endsection