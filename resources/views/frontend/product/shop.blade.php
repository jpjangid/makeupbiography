@extends('frontend.main.index')

@section('title', 'Shop')

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--product-list">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Shop</h1>
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
              
              @foreach($products as $key => $product)
              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="{{ url('products',['product' => $product->slug, 'variant' => $variants[$key] ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="{{ asset('storage/products/'.$product->main_image) }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant_ids[$key] }}" data-product-id="{{ $product->id }}" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
      
                @if($product->status == 1 && $product->flag == 0)
                <button data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $product->id }}" data-product_variant="{{ $variant_ids[$key] }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
                  <i class="ip-plus c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Add to cart</span>
                </button>
                @else 
                <a href="" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple" onclick="return false;" data-product_id="438" data-product_sku="6549845321" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
                  <i class=" c-product-grid__atc-icon"></i>
                  <span class="c-product-grid__atc-text">Currently Unavailable</span>
                </a>
                @endif

                <div class="c-product-grid__details">
                  <div class="c-product-grid__title-wrap">
                    <a href="{{ url('products',['product' => $product->slug, 'variant' => $variants[$key] ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p>{{ $product->short_description }}</p>
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