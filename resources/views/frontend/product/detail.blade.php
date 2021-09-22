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
        top: 20%;
        font-size: 60px;
        font-weight: bold;
        cursor: pointer;
        left: .2%;
        z-index: 1;
    }

    .arrows:nth-of-type(2) {
        left: 99%;
        text-align: right;
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
</style>
@endsection

@section('content')
<input type="text" id="csrfToken" value="{{ csrf_token() }}" hidden>
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--product-page">
    <div class="c-page-header__wrap">
      <div class="c-page-header__title">{{ $product->name }}</div>
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
          <i class="ip-breadcrumb c-breadcrumbs__separator"></i>
        </li>
        @endif
        <li class="c-breadcrumbs__item">{{ $product->name }}</li>
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
                <a download href="{{ asset('storage/products/variants/'.$media->media) }}" class="c-product__image-link c-product__image-link--zoom js-product-modal" data-size="1200x1200" data-index="{{ $count }}" data-product-id="" data-elementor-open-lightbox="no" onclick="return false;">
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
              <ul class="c-product__tabs-list tabs wc-tabs js-tabs-list h-carousel h-carousel-small h-carousel--hover h-carousel--dots-hide" role="tablist">
                <li class="c-product__tabs-item description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                  <a data-index="0" class="c-product__tabs-item-link js-tabs-item-link" href="#tab-description">Description</a>
                </li>
                <li class="c-product__tabs-item additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
                  <a data-index="1" class="c-product__tabs-item-link js-tabs-item-link" href="#tab-additional_information">Additional information</a>
                </li>
                <li class="c-product__tabs-item reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                  <a data-index="2" class="c-product__tabs-item-link js-tabs-item-link" href="#tab-reviews">Reviews</a>
                </li>
              </ul>
            </div>
            <div class="c-product__tabs-panel woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab  current visible" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
              <p><?php echo $product->description; ?></p>
            </div>
            <div class="c-product__tabs-panel woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel  wc-tab " id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
              <table class="woocommerce-product-attributes shop_attributes">
                <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_capacity">
                  <th class="woocommerce-product-attributes-item__label">Capacity</th>
                  <td class="woocommerce-product-attributes-item__value">
                    <p>50 mL</p>
                  </td>
                </tr>
                <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brands">
                  <th class="woocommerce-product-attributes-item__label">Brand</th>
                  <td class="woocommerce-product-attributes-item__value">
                    <p>
                      <a href="https://parkofideas.com/luchiana/demo/brands/aerin/" rel="tag">Aerin</a>
                    </p>
                  </td>
                </tr>
              </table>
            </div>
            <div class="c-product__tabs-panel woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel  wc-tab " id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
              <div id="reviews" class="woocommerce-Reviews">
                <div id="comments">
                  <h2 class="woocommerce-Reviews-title">Reviews</h2>
                  <p class="woocommerce-noreviews">There are no reviews yet.</p>
                </div>
                <div id="review_form_wrapper">
                  <div id="review_form">
                    <div id="respond" class="comment-respond">
                      <span id="reply-title" class="comment-reply-title">Be the first to review &ldquo;Midnight Musk&rdquo;
                        <small>
                          <a rel="nofollow" id="cancel-comment-reply-link" href="/luchiana/demo/shop/midnight-musk-amber/#respond" style="display:none;">Cancel reply</a>
                        </small>
                      </span>
                      <form action="https://parkofideas.com/luchiana/demo/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
                        <div class="comment-form-rating">
                          <label for="rating">Your rating&nbsp;
                            <span class="required">*</span>
                          </label>
                          <select name="rating" id="rating" required>
                            <option value="">Rate&hellip;</option>
                            <option value="5">Perfect</option>
                            <option value="4">Good</option>
                            <option value="3">Average</option>
                            <option value="2">Not that bad</option>
                            <option value="1">Very poor</option>
                          </select>
                        </div>
                        <p class="comment-form-comment">
                          <label for="comment">Your review&nbsp;
                            <span class="required">*</span>
                          </label>
                          <textarea id="comment" name="comment" cols="45" rows="8" required>
                          </textarea>
                        </p>
                        <p class="form-submit">
                          <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                          <input type='hidden' name='comment_post_ID' value='511' id='comment_post_ID' />
                          <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                        </p>
                      </form>
                    </div>
                    <!-- #respond -->
                  </div>
                </div>
                <div class="clear">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- .c-product__col-1 -->
      </div>
      <!-- .js-sticky-sidebar-nearby -->
      <div class="c-product__col-2">
        <div class="js-sticky-sidebar">
          <div class="summary entry-summary">
            <h1 class="c-product__title">{{ $product->name }} - {{ $variant->name }}</h1>
            <div class="c-product__short-description">
              <p>{{ $product->short_description }}</p>
            </div>
            <p class="price">
              <span class="woocommerce-Price-amount amount">
                <bdi>
                  <del>&#8377;{{ number_format((float)$variant->regular_price, 2, '.', '') }}</del><span class="woocommerce-Price-currencySymbol"> &#8377;</span>{{ number_format((float)$variant->sale_price, 2, '.', '') }}</bdi>
              </span>
            </p>
            <div class="c-product__atc-wrap">
              <form class="cart" action="https://parkofideas.com/luchiana/demo/shop/midnight-musk-amber/" method="post" enctype='multipart/form-data'>
                <div class="c-product__quantity quantity">
                  <label class="screen-reader-text" for="quantity_611f6fb23f9e0">Midnight Musk quantity</label>
                  <input type="number" id="quantity_611f6fb23f9e0" class="h-cb c-product__quantity-value qty product-quantity" step="1" min="1" name="quantity" value="1" title="Qty" placeholder="" inputmode="numeric" />
                  <input type="text" id="productId" value="{{ $product->id }}" hidden>
                  <input type="text" id="productVarientId" value="{{ $variant->id }}" hidden>
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
            <div class="c-product__wishlist">
              <button class="js-wishlist-btn-add c-wishlist__btn c-wishlist__item-511-btn h-cb c-product__wishlist-button" data-product_variant_id="{{ $variant->id }}" data-product-id="{{ $product->id }}">
                <i class="ip-heart c-product__wishlist-icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                <i class="ip-heart_hover c-product__wishlist-icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                <span class="c-product__wishlist-text" >Add to Wishlist</span>
                <span class="c-product__wishlist-text c-wishlist__btn-text-remove">Remove from Wishlist</span>
              </button>
            </div>
            <div class="product_meta">
              <span class="sku_wrapper">SKU:
                <span class="sku">{{ $variant->sku }}</span>
              </span>
              <span class="posted_in">Category:
                <a href="https://parkofideas.com/luchiana/demo/product-category/fragrance/" rel="tag">{{ $product->category->name }}</a>
              </span>
              <span class="tagged_as">Tag:
                <a href="https://parkofideas.com/luchiana/demo/product-tag/perfume/" rel="tag">{{ $product->tags }}</a>
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
        <!-- .c-product__col-2 -->
      </div>
      <!-- .js-sticky-sidebar -->
    </div>
    <!-- .c-product__wrap -->
        @if($related_products->isNotEmpty())
        <section class="c-product__products c-product__products--related">
            <div class="c-product__products-title">Related products</div>
            <div class="c-product-grid__wrap c-product-grid__wrap--4-per-row ">
                <div class="c-product-grid__list c-product-grid__list--3-per-row ">


                    <div class="in-main">
                        @foreach($related_products as $key => $related)
                        <div class="c-product-grid__item c-product-grid__item--4-per-row c-product-grid__item--normal c-product-grid__item--hover product type-product post-459 status-publish first instock product_cat-fragrance product_tag-florals product_tag-fragrance product_tag-warm has-post-thumbnail featured shipping-taxable purchasable product-type-simple same">
                            <div class="c-product-grid__badges c-badge__list">
                            </div>
                            <!-- .c-product-grid__badges -->
                            <div class="c-product-grid__thumb-wrap">
                                <a href="{{ url('products',['product' => $related->slug, 'variant' => $related_variants[$key] ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <img width="260" height="230" src="{{ asset('storage/products/variants/'.$related_images[$key]) }}" class="c-product-grid__thumb c-product-grid__thumb--cover" alt="" loading="lazy" sizes="(max-width: 260px) 100vw, 260px" />
                                </a>
                                <div class="c-product-grid__thumb-button-list">
                                    <button class="h-cb c-product-grid__thumb-button js-grid-zoom" type="button" data-lang="" data-product-id="459">
                                        <i class="ip-eye c-product-grid__icon c-product-grid__icon--normal"></i>
                                        <i class="ip-eye_hover c-product-grid__icon c-product-grid__icon--hover"></i>
                                    </button>
                                    <button class="js-wishlist-btn c-wishlist__btn c-wishlist__item-459-btn h-cb c-product-grid__thumb-button" data-product-id="459" data-title="Wishlist">
                                        <i class="ip-heart c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon-normal"></i>
                                        <i class="ip-heart_hover c-product-grid__icon c-wishlist__btn-icon c-wishlist__btn-icon--hover"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- .c-product-grid__thumb-wrap -->
                            <a href="?add-to-cart=459" data-quantity="1" class="h-cb c-product-grid__atc button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="459" data-product_sku="6549845389" aria-label="Add &ldquo;Voce Viva Eau de Parfum&rdquo; to your cart" rel="nofollow">
                                <i class="ip-plus c-product-grid__atc-icon"></i>
                                <span class="c-product-grid__atc-text">Add to cart</span>
                            </a>
                            <div class="c-product-grid__details">
                                <div class="c-product-grid__title-wrap">
                                    <a href="{{ url('products',['product' => $related->slug, 'variant' => $related_variants[$key] ]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <h2 class="woocommerce-loop-product__title">{{ $related->name }}</h2>
                                    </a>
                                    <div class="c-product-grid__short-desc">
                                        <p>{{ $related->short_description }}</p>
                                    </div>
                                </div>
                                <!-- .c-product-grid__title-wrap -->
                                <div class="c-product-grid__price-wrap">
                                    <span class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ $related_prices[$key] }}</bdi>
                                        </span>
                                    </span>
                                </div>
                                <!-- .c-product-grid__price-wrap -->
                            </div>
                            <!-- .c-product-grid__details -->
                        </div>
                        @endforeach
                    </div>
                    <span class="arrows" id="forward">&#139;</span>
                    <span class="arrows" id="backward">&#155;</span>
                </div>
            </div>
        </section>
        @endif
  </div>
</div>
<!-- /.l-inner -->
@endsection
@section('js')
<script>
    $(document).on('click', '#backward', function() {
        var div = document.getElementsByClassName('same');
        var l = 0;
        l++;
        for (var i of div) {
            if (l == 0) {
                i.style.left = "0px";
            }
            if (l == 1) {
                i.style.left = "-740px";
            }
            if (l == 2) {
                i.style.left = "-1480px";
            }
            if (l == 3) {
                i.style.left = "-2220px";
            }
            if (l == 4) {
                i.style.left = "-2960px";
            }
            if (l > 4) {
                l = 4;
            }
        }
    });
    $(document).on('click', '#forward', function() {
        var div = document.getElementsByClassName('same');
        var l = 0;
        l--;
        for (var i of div) {
            if (l == 0) {
                i.style.left = "0px";
            }
            if (l == 1) {
                i.style.left = "-740px";
            }
            if (l == 2) {
                i.style.left = "-1480px";
            }
            if (l == 3) {
                i.style.left = "-2220px";
            }
            if (l < 0) {
                l = 0;
            }
        }
    });
</script>
@endsection
