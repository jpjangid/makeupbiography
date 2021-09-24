@extends('frontend.main.index')

@section('title', $main_brand->meta_title != '' ? $main_brand->meta_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('description',$main_brand->meta_description != '' ? $main_brand->meta_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('keywords',$main_brand->keywords != '' ? $main_brand->keywords : '')
@section('og_title', $main_brand->og_title != '' ? $main_brand->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('og_description',$main_brand->og_description != '' ? $main_brand->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('og_image',$main_brand->og_image != '' ? asset('storage/category/'.$main_brand->og_image) : '')
@section('twitter_title', $main_brand->og_title != '' ? $main_brand->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('twitter_description',$main_brand->og_description != '' ? $main_brand->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('twitter_image',$main_brand->og_image != '' ? asset('storage/brand/og_images/'.$main_brand->og_image) : '')
@section('twitter_site',url(Request::url()))

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css"/>
<style>
  .short-description {
    display: block;/* or inline-block */
    text-overflow: ellipsis;
    word-wrap: break-word;
    overflow: hidden;
    max-height: 3.6em;
    line-height: 1.8em;
  }
</style>
@endsection

@section('script')
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $main_brand->title }}",
    "image": "{{ asset('storage/brands/'.$main_brand->featured_image) }}",
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
    "datePublished": "{{ $main_brand->publish_date }}"
  }
</script>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--product-list">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">{{ $main_brand->name }}</h1>
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
        @if(isset($main_category->parent->parent->name) && !empty($main_category->parent->parent))
        <li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="Shop" href="{{ url('brands') }}">
            <span itemprop="name">Brands</span>
          </a>
          <i class="ip-breadcrumb c-breadcrumbs__separator"></i>
          <meta itemprop="position" content="2">
        </li>
        @endif
        <li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="Shop" href="{{ url('brands',$main_brand->slug) }}">
            <span itemprop="name">{{ $main_brand->name }}</span>
          </a>
          <i class="ip-breadcrumb c-breadcrumbs__separator"></i>
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
          <div class="c-shop-sidebar__content c-shop-sidebar__content--desktop-filter js-shop-sidebar-content-desktop">
          <!-- Filter sidebar for computer begin --> 
          <form action="{{ url('brands',['slug' => $slug]); }}" method="get" id="categoryPageFrom">
            <input type="text" hidden name="pagination" id="paggination" value="">
            @if(!empty($sub_categories) && count($sub_categories) > 0)
              <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                <div class="widget-title">Product categories</div>
                <ul class="product-categories">
                @foreach($sub_categories as $pet_cat)
                  <li class="cat-item cat-item-50 cat-parent">
            
                    <input type="checkbox" name="filter_category[]" id="filterCategory" class="filter_category" value="{{$pet_cat->slug}}" {{ !empty($filter_old) && in_array($pet_cat->slug,$filter_old) ? "checked" : "" }}> 
                    <label for="" >{{ $pet_cat->name }}</label>

                    @if(!empty($pet_cat->subcategory)  && count($pet_cat->subcategory) > 0)
                    <ul class='children'>
                      @foreach($pet_cat->subcategory as $sub)
                        <li class="cat-item cat-item-58 cat-parent">
                          <input type="checkbox"  name="filter_category[]" id="filterCategory" class="filter_category" value="{{$sub->slug}}" {{ !empty($filter_old) && in_array($sub->slug,$filter_old) ? "checked" : "" }}> 
                          <label for="">{{ $sub->name }}</label>
                        @foreach($sub->subcategory as $su)
                        <ul class='children' style="margin-left: 15px !important;">        
                          <li class="cat-item cat-item-50 cat-parent">
                            <input type="checkbox"  name="filter_category[]" id="filterCategory" class="filter_category" value="{{$su->slug}}" {{ !empty($filter_old) && in_array($su->slug,$filter_old) ? "checked" : "" }}> 
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
            @endif
            
            <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
              <div class="widget-title">Product Brands</div>
              <ul class="product-categories">
              @foreach($brands as $brand)  
                <li class="cat-item cat-item-50 cat-parent">
                  <input type="checkbox" name="filter_brand[]" id="filterBrand" class="filter_brand" value="{{ $brand->id }}" {{ !empty($filter_brands) && count($filter_brands) && in_array($brand->id,$filter_brands) ? "checked" : "" }}>
                  <label for="" >{{ $brand->name }}</label> 
                </li>
              @endforeach  
              </ul>
            </aside>

            <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><div class="widget-title">Price <span id="min_price_filter_text">{{ $min_price_filter }}</span> - <span id="max_price_filter_text">{{ $max_price_filter }}</span></div>
              <div class="price_slider_wrapper">
                <div id="slider" wire:ignore></div>
              </div>
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
             
              @foreach($products as $key => $variant)
              @php
                $product = $product_details->where('id',$variant->product_id)->first();
                $media = $product_medias->where('product_variant_id',$variant->id)->first();
              @endphp

              <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                <div class="c-product-grid__badges c-badge__list">
                </div>
                <!-- .c-product-grid__badges -->
                <div class="c-product-grid__thumb-wrap">
                  <a href="{{ url('products',['product' => $product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="460" height="460" src="{{ asset('storage/products/'.$product->main_image) }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 460px) 100vw, 460px" />
                  </a>
                  <div class="c-product-grid__thumb-button-list">
                    <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $product->id }}-btn h-cb c-product-grid__thumb-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $product->id }}" data-title="Wishlist">
                      <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                      <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                    </button>
                  </div>
                </div>
                <!-- .c-product-grid__thumb-wrap -->
      
                @if($product->status == 1 && $product->flag == 0)
                <button data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add-to-cart" data-product_id="{{ $variant->product_id }}" data-product_variant="{{ $variant->id }}" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
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
                    <a href="{{ url('products',['product' => $product->slug, 'variant' => $variant->slug ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <h2 class="woocommerce-loop-product__title">{{ $product->name."-".$variant->name }}</h2>
                    </a>
                    <div class="c-product-grid__short-desc">
                      <p class="short-description">{{ $product->short_description }}</p>
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
              <a class="next page-numbers" href="">
                <i class="ip-menu-right page-numbers__prev-ico"></i>
              </a>
            </li>
            <li>
              <a class="page-numbers" href="" onclick="return false;">1</a>
            </li>
            <li>
              <a class="next page-numbers" href="">
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
  $(document).ready(function(){
    // $(document).on('click','#filterCategory',function(e){
    //   e.preventDefault();
    //   $('#categoryPageFrom').submit();
    // });
    $(document).on('change','#orderbyFilter', function(e) {
        e.preventDefault();    
        if($('#orderbyFilter').val() != "") {
          $('#categoryPageFrom').submit();
        }
    });  

    $(document).on('click','#filterButton',function(e){
      e.preventDefault();
      $('#categoryPageFrom').submit();
    });

    var slider = document.getElementById('slider');
    noUiSlider.create(slider, {
        start: ["{{ $min_price_old }}", "{{ $max_price_old }}"],
        connect: true,
        range: {
            'min': 0,
            'max': { $max_price_filter }
        },
        pips: {
          mode: 'steps',
          stepped: true,
          density: 4
        }
    });
    slider.noUiSlider.on('update',function(value){
      priceChangeFilter(value[0],value[1]);
    });
    function priceChangeFilter(min_price,max_price) {
      $('#min_price_filter_text').text(min_price);
      $('#max_price_filter_text').text(max_price);
      $('#min_price_filter').val(min_price);
      $('#max_price_filter').val(max_price);
    }
  });
</script>
@endsection