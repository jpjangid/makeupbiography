@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--product-list">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Aerin</h1>
    </div>
    <nav class="c-breadcrumbs">
      <ol class="c-breadcrumbs__list">
        <li class="c-breadcrumbs__item">
          <a href="https://parkofideas.com/luchiana/demo/">Home</a>
          <i class="ip-breadcrumb c-breadcrumbs__separator">
            <!-- -->
          </i>
        </li>
        <li class="c-breadcrumbs__item">Product Brand
          <i class="ip-breadcrumb c-breadcrumbs__separator">
            <!-- -->
          </i>
        </li>
        <li class="c-breadcrumbs__item">Aerin</li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="l-section l-section--container l-section--top-margin l-section--bottom-margin l-section--with-sidebar">
    <div class="l-section__sidebar">
      <div class="c-sidebar c-shop-sidebar js-shop-sidebar  js-sticky-sidebar ">
        <div class="c-shop-sidebar__shadow">
        </div>
        <div class="c-shop-sidebar__wrap js-shop-sidebar-wrap">
          <div class="c-shop-sidebar__buttons">
            <button type="button" class="h-cb h-cb--svg c-shop-sidebar__close js-filter-close-button">
              <i class="ip-close-small c-header__menu-close-svg"></i>
            </button>
          </div>
          <div class="c-shop-sidebar__content c-shop-sidebar__content--desktop">
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
              <form method="get" action="https://parkofideas.com/luchiana/demo/brands/aerin/">
                <div class="price_slider_wrapper">
                  <div class="price_slider" style="display:none;">
                  </div>
                  <div class="price_slider_amount" data-step="10">
                    <input type="text" id="min_price" name="min_price" value="30" data-min="30" placeholder="Min price" />
                    <input type="text" id="max_price" name="max_price" value="200" data-max="200" placeholder="Max price" />
                    <button type="submit" class="button">Filter</button>
                    <div class="price_label" style="display:none;">Price:
                      <span class="from">
                      </span>&mdash;
                      <span class="to">
                      </span>
                    </div>
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
                  <a rel="nofollow" href="https://parkofideas.com/luchiana/demo/brands/aerin/?filter_capacity=30ml">30 mL</a>
                  <span class="count">(1)</span>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                  <a rel="nofollow" href="https://parkofideas.com/luchiana/demo/brands/aerin/?filter_capacity=40ml">40 mL</a>
                  <span class="count">(2)</span>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                  <a rel="nofollow" href="https://parkofideas.com/luchiana/demo/brands/aerin/?filter_capacity=50ml">50 mL</a>
                  <span class="count">(1)</span>
                </li>
              </ul>
            </aside>
          </div>
          <div class="c-shop-sidebar__content c-shop-sidebar__content--mobile js-shop-sidebar-content">
            <aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter">
              <h2 class="widget-title">Price</h2>
              <form method="get" action="https://parkofideas.com/luchiana/demo/brands/aerin/">
                <div class="price_slider_wrapper">
                  <div class="price_slider" style="display:none;">
                  </div>
                  <div class="price_slider_amount" data-step="10">
                    <input type="text" id="min_price" name="min_price" value="30" data-min="30" placeholder="Min price" />
                    <input type="text" id="max_price" name="max_price" value="200" data-max="200" placeholder="Max price" />
                    <button type="submit" class="button">Filter</button>
                    <div class="price_label" style="display:none;">Price:
                      <span class="from">
                      </span>&mdash;
                      <span class="to">
                      </span>
                    </div>
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
                  <a rel="nofollow" href="https://parkofideas.com/luchiana/demo/brands/aerin/?filter_capacity=30ml">30 mL</a>
                  <span class="count">(1)</span>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                  <a rel="nofollow" href="https://parkofideas.com/luchiana/demo/brands/aerin/?filter_capacity=40ml">40 mL</a>
                  <span class="count">(2)</span>
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                  <a rel="nofollow" href="https://parkofideas.com/luchiana/demo/brands/aerin/?filter_capacity=50ml">50 mL</a>
                  <span class="count">(1)</span>
                </li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <div class="l-section__content l-section__content--with-sidebar">
      <div class=" js-sticky-sidebar-nearby ">
        <div class="c-catalog-ordering ">
          <div class="c-catalog-ordering__col c-catalog-ordering__col--result">
            <p class="woocommerce-result-count">Showing all 4 results</p>
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
            </form>
          </div>
          <button class="h-cb c-catalog-ordering__filter-show-button js-filter-show-button" type="button">Filter
            <i class="ip-filter c-catalog-ordering__filter-ico"></i>
          </button>
        </div>
        <div class="c-product-grid">
          <div class="c-product-grid__wrap c-product-grid__wrap--4-per-row  c-product-grid__wrap--sidebar ">
            <div class="c-product-grid__list c-product-grid__list--4-per-row ">
              <div class="c-product-grid__item c-product-grid__item--sidebar c-product-grid__item--4-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-464 status-publish first instock product_cat-fragrance product_tag-fragrance product_tag-warm has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/eau-de-soleil-blanc-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="260" height="230" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3000062647-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
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
              <div class="c-product-grid__item c-product-grid__item--sidebar c-product-grid__item--4-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-474 status-publish outofstock product_cat-makeup has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <div class="c-product-grid__stock-wrap">
                    <span class="c-product-grid__stock c-product-grid__stock--out-of-stock out-of-stock">Out of stock</span>
                  </div>
                  <a href="https://parkofideas.com/luchiana/demo/shop/instant-retouch-primer/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="260" height="230" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3006105529-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
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
              <div class="c-product-grid__item c-product-grid__item--sidebar c-product-grid__item--4-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-511 status-publish last instock product_cat-fragrance product_tag-perfume has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                  <span class="c-badge c-badge--featured">Featured</span>
                  <span class="c-badge c-badge--new">New</span>
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="260" height="230" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
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
              <div class="c-product-grid__item c-product-grid__item--sidebar c-product-grid__item--4-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-443 status-publish first instock product_cat-eye product_tag-eye has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="https://parkofideas.com/luchiana/demo/shop/perfect-brow-pencil/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="260" height="230" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3046426842-260x230.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3046426842-260x230.jpg 260w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3046426842-520x460.jpg 520w" sizes="(max-width: 260px) 100vw, 260px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="443">
                      <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                      <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                    </button>
                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-443-btn h-cb c-product-grid__thumb-button" data-product-id="443" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
                <a href="?add-to-cart=443" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="443" data-product_sku="8948978944" aria-label="Add &ldquo;Perfect Brow Pencil&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </a>
                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="https://parkofideas.com/luchiana/demo/shop/perfect-brow-pencil/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">Perfect Brow Pencil</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>Brow pencil for applying and blending eyebrow color.</p>
                    </div>
                  </div>
                  <!-- .c-product-grid__title-wrap -->
                  <div class="c-product-grid__price-wrap">
                    <span class="price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">&#36;</span>30.00</bdi>
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
  <div class="l-section l-section--container entry-content c-product-grid__cat-desc c-product-grid__cat-desc--below">
  </div>
</div>
<!-- /.l-inner -->
@endsection