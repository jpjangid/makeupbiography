@extends('frontend.layouts.app')

@section('css')
<style>
  @media screen and (min-width: 480px) {
    .image-stroke
    {
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
                                        @php 
                                          $variant = $main_newest_product->variants[0];
                                        @endphp
                                        @if(str_contains($main_newest_product,'newest'))
                                          <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                                            <div class="c-product-grid__badges c-badge__list">
                                              <span class="c-badge c-badge--featured">Newest</span>
                                              @if(!empty($variant->discount) && $variant->discount > 0 && $variant->discount_type)
                                                <span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
                                              @endif
                                            </div>
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
                                                <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button"  data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
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
                                                        <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{  $variant->sale_price }}</bdi>
                                                    </span>
                                                  </ins>
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
                                <a href="https://parkofideas.com/luchiana/demo/newest/" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
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
                                        @php 
                                          $variant = $main_newest_product->variants[0];
                                        @endphp
                                        @if(str_contains($main_newest_product,'popular'))
                                          <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                                            <div class="c-product-grid__badges c-badge__list">
                                              <span class="c-badge c-badge--featured">Popular</span>
                                              @if(!empty($variant->discount) && $variant->discount > 0 && $variant->discount_type)
                                                <span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
                                              @endif
                                            </div>
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
                                                <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button"  data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
                                                  <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                  <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                                </button>
                                              </div>
                                            </div>
                                            <!-- .c-product-grid__thumb-wrap -->
                                            <a href="index4b36.html?add-to-cart=438" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="438" data-product_sku="6549845321" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
                                              <i class="ip-plus c-product-grid__atc-icon"></i>
                                              <span class="c-product-grid__atc-text">Add to cart</span>
                                            </a>
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
                                                        <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{  $variant->sale_price }}</bdi>
                                                    </span>
                                                  </ins>
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
                                <a href="https://parkofideas.com/luchiana/demo/popular/" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
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
                                      @php 
                                        $variant = $main_newest_product->variants[0];
                                      @endphp
                                      @if(str_contains($main_newest_product,'category'))
                                        <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                                          <div class="c-product-grid__badges c-badge__list">
                                            <span class="c-badge c-badge--featured">Category</span>
                                            @if(!empty($variant->discount) && $variant->discount > 0 && $variant->discount_type)
                                              <span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
                                            @endif
                                          </div>
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
                                              <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button"  data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
                                                <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                              </button>
                                            </div>
                                          </div>
                                          <!-- .c-product-grid__thumb-wrap -->
                                          <a href="index4b36.html?add-to-cart=438" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="438" data-product_sku="6549845321" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
                                            <i class="ip-plus c-product-grid__atc-icon"></i>
                                            <span class="c-product-grid__atc-text">Add to cart</span>
                                          </a>
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
                                                      <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{  $variant->sale_price }}</bdi>
                                                  </span>
                                                </ins>
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
                                <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
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
                                      @php 
                                        $variant = $main_newest_product->variants[0];
                                      @endphp
                                      @if(str_contains($main_newest_product,'brand'))
                                        <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                                          <div class="c-product-grid__badges c-badge__list">
                                            <span class="c-badge c-badge--featured">Brand</span>
                                            @if(!empty($variant->discount) && $variant->discount > 0 && $variant->discount_type)
                                              <span class="c-badge c-badge--sale">-{{ $variant->discount }}%</span>
                                            @endif
                                          </div>
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
                                              <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-{{ $main_newest_product->id }}-btn h-cb c-product-grid__thumb-button"  data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $main_newest_product->id }}" data-title="Wishlist">
                                                <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                                <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                              </button>
                                            </div>
                                          </div>
                                          <!-- .c-product-grid__thumb-wrap -->
                                          <a href="index4b36.html?add-to-cart=438" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="438" data-product_sku="6549845321" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
                                            <i class="ip-plus c-product-grid__atc-icon"></i>
                                            <span class="c-product-grid__atc-text">Add to cart</span>
                                          </a>
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
                                                      <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{  $variant->sale_price }}</bdi>
                                                  </span>
                                                </ins>
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
                                <a href="https://parkofideas.com/luchiana/demo/brands/loreal/" class="c-button c-button--outline c-ip-product-tabs__button">View All</a>
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
                        <div class="c-ip-countdown">
                          <div class="c-ip-countdown__wrap js-countdown" data-date="2021-04-30 12:00" data-month="no" data-week="no">
                          </div>
                        </div>
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
                          <a href="https://parkofideas.com/luchiana/demo/shop/?set=7" class="c-button c-ip-button c-button--outline" role="button">
                            <span class="c-ip-button__text">Explore</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
                                  <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-438 status-publish first instock product_cat-makeup product_tag-airbrush product_tag-matte product_tag-skin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                                    <div class="c-product-grid__badges c-badge__list">
                                      <span class="c-badge c-badge--featured">Featured</span>
                                      <span class="c-badge c-badge--sale">-11%</span>
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
                                        <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-438-btn h-cb c-product-grid__thumb-button" data-product-id="438" data-title="Wishlist">
                                          <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                          <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <!-- .c-product-grid__thumb-wrap -->
                                    <a href="index4b36.html?add-to-cart=438" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="438" data-product_sku="6549845321" aria-label="Add &ldquo;Airbrush Matte&rdquo; to your cart" rel="nofollow">
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
                                  <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-420 status-publish instock product_cat-makeup has-post-thumbnail sale featured shipping-taxable product-type-grouped">
                                    <div class="c-product-grid__badges c-badge__list">
                                      <span class="c-badge c-badge--featured">Featured</span>
                                      <span class="c-badge c-badge--sale">Sale</span>
                                    </div>
                                    <!-- .c-product-grid__badges -->
                                    <div class="c-product-grid__thumb-wrap">
                                      <a href="https://parkofideas.com/luchiana/demo/shop/flyliner-longwear-eyeliner/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img width="460" height="460" src="../wp-content/uploads/2020/10/luchiana-3019755709-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-760x761.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-920x921.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019755709.jpg 1201w" sizes="(max-width: 460px) 100vw, 460px" />
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
                                  <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-429 status-publish instock product_cat-makeup has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                                    <div class="c-product-grid__badges c-badge__list">
                                      <span class="c-badge c-badge--featured">Featured</span>
                                      <span class="c-badge c-badge--sale">-11%</span>
                                    </div>
                                    <!-- .c-product-grid__badges -->
                                    <div class="c-product-grid__thumb-wrap">
                                      <a href="https://parkofideas.com/luchiana/demo/shop/face-body-foundation/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img width="460" height="460" src="../wp-content/uploads/2020/10/luchiana-3019438449-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3019438449.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
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
                                    <a href="indexd633.html?add-to-cart=429" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="429" data-product_sku="" aria-label="Add &ldquo;Face &amp; Body Foundation&rdquo; to your cart" rel="nofollow">
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
                                  <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-431 status-publish last instock product_cat-skincare has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                    <div class="c-product-grid__badges c-badge__list">
                                      <span class="c-badge c-badge--featured">Featured</span>
                                    </div>
                                    <!-- .c-product-grid__badges -->
                                    <div class="c-product-grid__thumb-wrap">
                                      <a href="https://parkofideas.com/luchiana/demo/shop/lactic-acid-treatment/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img width="460" height="460" src="../wp-content/uploads/2020/10/luchiana-3015857259-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-760x761.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-920x921.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3015857259.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
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
                                    <a href="index086a.html?add-to-cart=431" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="431" data-product_sku="" aria-label="Add &ldquo;Lactic Acid Treatment&rdquo; to your cart" rel="nofollow">
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
                                  <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-511 status-publish first instock product_cat-fragrance product_tag-perfume has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                    <div class="c-product-grid__badges c-badge__list">
                                      <span class="c-badge c-badge--featured">Featured</span>
                                      <span class="c-badge c-badge--new">New</span>
                                    </div>
                                    <!-- .c-product-grid__badges -->
                                    <div class="c-product-grid__thumb-wrap">
                                      <a href="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img width="460" height="460" src="../wp-content/uploads/2020/10/luchiana-3032395463-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-760x759.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-920x919.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3032395463.jpg 1201w" sizes="(max-width: 460px) 100vw, 460px" />
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
                                  <div class="c-product-grid__item c-product-grid__item--3-per-row c-product-grid__item--normal product type-product post-447 status-publish instock product_cat-skincare product_tag-moisturizers product_tag-skincare has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                    <div class="c-product-grid__badges c-badge__list">
                                      <span class="c-badge c-badge--featured">Featured</span>
                                    </div>
                                    <!-- .c-product-grid__badges -->
                                    <div class="c-product-grid__thumb-wrap">
                                      <a href="https://parkofideas.com/luchiana/demo/shop/extra-illuminating-moisture-balm/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img width="460" height="460" src="../wp-content/uploads/2020/10/luchiana-3055359661-460x460.jpg" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3055359661.jpg 1200w" sizes="(max-width: 460px) 100vw, 460px" />
                                      </a>
                                      <div class="c-product-grid__thumb-button-list">
                                        <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="447">
                                          <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                          <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                        </button>
                                        <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-447-btn h-cb c-product-grid__thumb-button" data-product-id="447" data-title="Wishlist">
                                          <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                          <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <!-- .c-product-grid__thumb-wrap -->
                                    <a href="index9783.html?add-to-cart=447" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="447" data-product_sku="6549845328" aria-label="Add &ldquo;Moisture Balm&rdquo; to your cart" rel="nofollow">
                                      <i class="ip-plus c-product-grid__atc-icon"></i>
                                      <span class="c-product-grid__atc-text">Add to cart</span>
                                    </a>
                                    <div class="c-product-grid__details">
                                      <div class="c-product-grid__title-wrap">
                                        <a href="https://parkofideas.com/luchiana/demo/shop/extra-illuminating-moisture-balm/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                          <h2 class="woocommerce-loop-product__title">Moisture Balm</h2>
                                        </a>
                                        <div class="c-product-grid__short-desc">
                                          <p>A bestselling luminizing moisture balm</p>
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
                            <div data-id="1440-0fe75f30" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-830896d">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/skincare/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325904117-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325904117-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325904117-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325904117-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325904117-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325904117-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325904117.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-9@2x" loading="lazy" />
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
                            <div data-id="1435-707f4f5b" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-5d0eaf7">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/hair/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325690878-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325690878-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325690878-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325690878-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325690878-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325690878-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325690878.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-4@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Collection</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">My Roses</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1437-b40b020d" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-fd8a51e">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/hair/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325664736-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325664736-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325664736-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325664736-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325664736-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325664736-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325664736.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-6@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Hair Health</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">15% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1439-c1352c77" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-c019670">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/lips/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325335719-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325335719-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325335719-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325335719-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325335719-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325335719-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325335719.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-8@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Christmas Days</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">60% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1433-7ac5ddc2" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-16ba33c">
                              <a href="https://parkofideas.com/luchiana/demo/shop/purity-made-simple-cleanser/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325416161-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325416161-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325416161-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325416161-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325416161-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325416161-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325416161.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-2@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Best for Body</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">40% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1432-09e1413f" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-e5a3905">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/eye/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325206996-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325206996-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325206996-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325206996-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325206996-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325206996-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325206996.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-1@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Natural Items</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">50% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1434-a4fa583b" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-9755350">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325082143-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325082143-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325082143-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325082143-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325082143-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325082143-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325082143.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-3@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Fresh for Face</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">20% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1436-ffc9e382" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-079cdf6">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/eye/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325234112-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325234112-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325234112-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325234112-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325234112-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325234112-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325234112.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-5@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Bodyshowers</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">20% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
                            </div>
                            <div data-id="1438-a4fa583b" class="c-ip-banners__item c-ip-banners__item--left elementor-repeater-item-8249877">
                              <a href="https://parkofideas.com/luchiana/demo/product-category/makeup/" class="c-ip-banners__link">
                                <img class="c-ip-banners__image" width="760" height="407" src="../wp-content/uploads/2021/01/luchiana-0325882093-760x407.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325882093-760x407.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325882093-460x246.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325882093-920x493.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325882093-271x145.jpg 271w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325882093-541x290.jpg 541w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2021/01/luchiana-0325882093.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="banner-7@2x" loading="lazy" />
                                <div class="c-ip-banners__wrap c-ip-banners__wrap--stretch c-ip-banners__wrap--left">
                                  <div class="c-ip-banners__subheader">Pro Tools</div>
                                  <div class="c-ip-banners__header">
                                    <span class="c-ip-banners__header-size">20% OFF</span>
                                  </div>
                                  <div class="c-ip-banners__space">
                                  </div>
                                  <span class="c-button c-button--outline c-ip-banners__button">Explore</span>
                                </div>
                              </a>
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
@endsection