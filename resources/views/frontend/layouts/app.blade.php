<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{ asset('images/mbround.png') }}" type="image/gif" sizes="32x32">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Makeupbiograpy | @yield('title','Home')</title>
  <meta name="description" content="@yield('description','')" />
  <meta name="keywords" content="@yield('keywords','')">
  <meta property=”og:title” content="@yield('og_title')" />
  <meta property=”og:description” content="@yield('og_description','')" />
  <meta property=”og:image” content="@yield('og_image','')" />

  <link rel="canonical" href="{{ url(Request::url()) }}"/>
  <meta name='robots' content='index,follow' />
  <a href="URL" rel="publisher" ></a>
  <meta name="twitter:card" content="@yield('twitter_title','')" />
  <meta name="twitter:description" content="@yield('twitter_description','')" />
  <meta name="twitter:title" content="@yield('twitter_title','')" />
  <meta name="twitter:site" content="@yield('twitter_site','')" />
  <meta name="twitter:image" content="@yield('twitter_image','')" />
  <meta name="twitter:creator" content="Makeup Biography" />

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Inter%3A200%2Cregular%2C500%2C600%2C700%2C900%7CMarcellus%3Aregular%26subset%3Dlatin%2Clatin-ext&amp;display=swap">
  <link rel="stylesheet" href="{{ asset('wp-content/themes/luchiana/assets/font/theme-icons9d3f.css?ver=1614106825')}}">
  <link rel="stylesheet" href="{{ asset('css/frontend.css')}}">
  <link rel='dns-prefetch' href='http://s.w.org/' />
  <link rel="alternate" type="application/rss+xml" title="Luchiana &raquo; Feed" href="https://parkofideas.com/luchiana/demo/feed/" />
  <link rel="alternate" type="application/rss+xml" title="Luchiana &raquo; Comments Feed" href="https://parkofideas.com/luchiana/demo/comments/feed/" />
  @yield('script')
  <script type="text/javascript">
  window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.8"}};
  		!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([10084,65039,8205,55357,56613],[10084,65039,8203,55357,56613])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
  </script>
  <style type="text/css">
  img.wp-smiley,
  	img.emoji {
  		display: inline !important;
  		border: none !important;
  		box-shadow: none !important;
  		height: 1em !important;
  		width: 1em !important;
  		margin: 0 .07em !important;
  		vertical-align: -0.1em !important;
  		background: none !important;
  		padding: 0 !important;
  	}
  </style>
  
  <link rel='stylesheet' id='contact-form-7-css' href='{{ asset("wp-content/plugins/contact-form-7/includes/css/styles7661.css?ver=5.4.2") }}' type='text/css' media='all' />
  <style id='woocommerce-inline-inline-css' type='text/css'>
  .woocommerce form .form-row .required { visibility: visible; }
  </style>
  <link rel='stylesheet' id='select2-css'  href='{{ url("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css") }}' type='text/css' media='all' />

  <link rel='stylesheet' id='elementor-frontend-legacy-css' href='{{ asset("wp-content/plugins/elementor/assets/css/frontend-legacy.min3d36.css?ver=3.3.1") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-frontend-css' href='{{ asset("wp-content/uploads/elementor/css/custom-frontend.mina47c.css?ver=1626831364") }}' type='text/css' media='all' />
  <style id='elementor-frontend-inline-css' type='text/css'>
  @font-face{font-family:eicons;src:url(https://parkofideas.com/luchiana/demo/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.eot?5.10.0);src:url(https://parkofideas.com/luchiana/demo/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.eot?5.10.0#iefix) format("embedded-opentype"),url(https://parkofideas.com/luchiana/demo/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.woff2?5.10.0) format("woff2"),url(https://parkofideas.com/luchiana/demo/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.woff?5.10.0) format("woff"),url(https://parkofideas.com/luchiana/demo/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.ttf?5.10.0) format("truetype"),url(https://parkofideas.com/luchiana/demo/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.svg?5.10.0#eicon) format("svg");font-weight:400;font-style:normal}
  [class^="eicon"], [class*=" eicon-"] { font-family: "initial"; } [class^="eicon"]:before, [class*=" eicon-"]:before { content: ""; }
  </style>
  <link rel='stylesheet' id='elementor-post-37-css' href='{{ asset("wp-content/uploads/elementor/css/post-37a47c.css?ver=1626831364") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-post-1131-css' href='{{ asset("wp-content/uploads/elementor/css/post-1131bebe.css?ver=1626835119") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='woo-variation-swatches-css' href='{{ asset("wp-content/plugins/woo-variation-swatches/assets/css/frontend.min93fb.css?ver=1.1.17") }}' type='text/css' media='all' />
  <style id='woo-variation-swatches-inline-css' type='text/css'>
  .variable-item:not(.radio-variable-item) { width : 36px; height : 36px; } .wvs-style-squared .button-variable-item { min-width : 36px; } .button-variable-item span { font-size : 16px; }
  </style>
  <link rel='stylesheet' id='woo-variation-swatches-theme-override-css' href='{{ asset("wp-content/plugins/woo-variation-swatches/assets/css/wvs-theme-override.min93fb.css?ver=1.1.17") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='woo-variation-swatches-tooltip-css' href='{{ asset("wp-content/plugins/woo-variation-swatches/assets/css/frontend-tooltip.min93fb.css?ver=1.1.17") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='ideapark_fonts-icons-css' href='{{ asset("wp-content/uploads/ideapark_fonts/font-style-e4f8afc0.min41a3.css?ver=5.8") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='ideapark-entry-content-css' href='{{ asset("wp-content/themes/luchiana/assets/css/entry-contentd30c.css?ver=1629054694") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='ideapark-core-css' href='{{ asset("wp-content/themes/luchiana/styled30c.css?ver=1629054694")}}' type='text/css' media='all' />
  <style id='ideapark-core-inline-css' type='text/css'>
  :root { --text-color: #000000; --text-color-light: rgb(97, 97, 97); --text-color-extra-light: rgb(222, 222, 222); --text-color-tr: rgba(0, 0, 0, 0.15); --background-color: #f3f3f3; --background-color-light: rgb(249, 249, 249); --background-color-dark: rgb(236, 236, 236); --accent-color: #E4C1B1; --accent-color-dark: rgb(205, 174, 159); --font-text: "Inter", sans-serif; --font-header: "Marcellus", sans-serif; --logo-size: 205px; --logo-size-mobile: 185px; --shadow-color-desktop: rgba(255, 255, 255, 0.95); --shadow-color-mobile: rgba(37, 32, 30, 0.95); --mobile-menu-color: #FFFFFF; --mobile-menu-bg-color: #25201E; --badge-bgcolor-outofstock: #000000; --custom-transform-transition: visibility 0.5s cubic-bezier(0.86, 0, 0.07, 1), opacity 0.5s cubic-bezier(0.86, 0, 0.07, 1), transform 0.5s cubic-bezier(0.86, 0, 0.07, 1), box-shadow 0.5s cubic-bezier(0.86, 0, 0.07, 1); --opacity-transition: opacity 0.3s linear, visibility 0.3s linear; --opacity-transform-transition: opacity 0.3s linear, visibility 0.3s linear, transform 0.3s ease-out, box-shadow 0.3s ease-out; --hover-transition: opacity 0.3s linear, visibility 0.3s linear, color 0.15s linear, border-color 0.15s linear, background-color 0.15s linear, box-shadow 0.15s linear; --star-rating-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iMTAiIGZpbGw9IiNGRkFBOEYiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTguOTU2IDkuNzgyYy4wNS4xNTMtLjEzMi4yOC0uMjcuMTg2TDUuNSA3Ljc5OGwtMy4xOSAyLjE2OGMtLjEzNy4wOTMtLjMyLS4wMzMtLjI2OS0uMTg3bDEuMTc4LTMuNTYzTC4wNyAzLjk5Yy0uMTM1LS4wOTUtLjA2NS0uMy4xMDMtLjMwMmwzLjkxNi0uMDMyTDUuMzM1LjExNGMuMDUzLS4xNTIuMjgtLjE1Mi4zMzMgMEw2LjkxIDMuNjU4bDMuOTE2LjAzNWMuMTY4LjAwMS4yMzguMjA2LjEwMy4zMDJMNy43OCA2LjIxN2wxLjE3NSAzLjU2NXoiLz48L3N2Zz4="); --icon-user: "\f139" /* ip-user */; --icon-close-small: "\f10d" /* ip-close-small */; --icon-check: "\f10a" /* ip-check */; --icon-select: "\f111" /* ip-down_arrow */; --icon-select-bold: "\f144" /* ip-y-down */; --icon-romb: "\f131" /* ip-romb */; --icon-calendar: "\f105" /* ip-calendar */; --icon-li: "\f110" /* ip-dot */; --icon-quote: "\f12d" /* ip-quote */; --icon-submenu: "\f125" /* ip-menu-right */; --icon-depth: "\f146" /* ip-z-depth */; } .c-badge__list { --badge-bgcolor-featured: #e4c1b1; --badge-bgcolor-new: #000000; --badge-bgcolor-sale: #000000; } .c-to-top-button { --to-top-button-color: #ffffff; } .c-top-menu { --top-menu-submenu-color: #000000; --top-menu-submenu-bg-color: #FFFFFF; --top_menu_submenu_accent_color: #E4C1B1; } .c-product-grid__item { --font-size: 20px; --font-size-mobile: 18px; --font-size-mobile-2-per-row: 14px; --font-size-compact: 15px; --font-letter-spacing: 0.25em; } .c-header__outer { --top-color: #000000; --top-color-light: rgb(87, 73, 67); --top-accent-color: #FFFFFF; --top-background-color: #E4C1B1; --top-color-hr: rgb(205, 174, 159); --top-color-input: rgb(137, 116, 106); --header-color-light: #FFFFFF; --header-color-dark: #000000; --header-color-menu: #000000; --header-color-bg-menu: #FFFFFF; --header-color-mobile: #000000; --header-color-mobile-tr: #FFFFFF; --header-color-mobile-tr-neg: #000000; --header-color-bg-mobile: #FFFFFF; --sticky-menu-color: #000000; --sticky-menu-bg-color: #FFFFFF; } .c-product__slider-item { --image-background-color: inherit; } .woocommerce-store-notice { --store-notice-color: #FFFFFF; --store-notice-background-color: #CF3540; } .c-page-header--default { color: #FFFFFF; background-color: #88BAB5; background-image: url("../wp-content/uploads/2020/10/luchiana-1911690231.png"); background-repeat: repeat; background-position: center; background-size: 290px 290px; } .c-page-header--post { background-color: #d6acb1; background-image: url("../wp-content/uploads/2020/10/luchiana-1911589804.png"); background-repeat: repeat; background-position: center; background-size: 290px 290px; } .c-page-header--wc { background-color: #dfc7b3; background-image: url("../wp-content/uploads/2020/10/luchiana-1911948555.png"); background-repeat: repeat; background-position: center; background-size: 290px 290px; } .c-page-header--product-page { background-color: #85b0bd; background-image: url("../wp-content/uploads/2020/10/luchiana-1911261111.png"); background-repeat: repeat; background-position: center; background-size: 290px 290px; } 
  ul.c-lang-demo{color: white;}ul.c-lang-demo .c-top-bar-menu__item{text-transform:unset;font-weight: 300;font-size: 12px;line-height: 15px;letter-spacing: 0.05em;}.ip-buy-now{position:fixed;z-index:100001;-webkit-transform-origin: right center;transform-origin: right center;}.ip-buy-now.loading{-webkit-transform: translateX(100%);transform: translateX(100%);}.ip-buy-now{right:0;bottom:205px;transition:transform 0.3s linear,box-shadow 0.3s linear}.ip-buy-now:hover{-webkit-transform: scale(1.2);transform: scale(1.2);box-shadow: 10px 5px 12px rgba(0, 0, 0, 0.2);}@media (max-width: 767px){.ip-buy-now{display:none}}@media (max-width: 1189px){ul.c-lang-demo{display:none;}}
  </style>
  <link rel='stylesheet' id='ideapark-elementor-css' href='{{ asset("wp-content/plugins/ideapark-luchiana/assets/css/style.min5e57.css?ver=1629054696") }}' type='text/css' media='all' />
  <script type="text/template" id="tmpl-variation-template">
  </script>
  <script type="text/template" id="tmpl-unavailable-variation-template">
  <p>Sorry, this product is unavailable. Please choose a different combination.</p>
  </script>
  <script type='text/javascript' src='{{ asset("wp-includes/js/jquery/jquery.minaf6c.js?ver=3.6.0") }}' id='jquery-core-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70") }}' id='jquery-blockui-js'></script>
  <script type='text/javascript' src='{{ asset("wp-includes/js/underscore.min4511.js?ver=1.8.3") }}' id='underscore-js'></script>
  <script type='text/javascript' id='wp-util-js-extra'>
  /* <![CDATA[ */
  var _wpUtilSettings = {"ajax":{"url":"\/luchiana\/demo\/wp-admin\/admin-ajax.php"}};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-includes/js/wp-util.min41a3.js?ver=5.8") }}' id='wp-util-js'></script>
  <script type='text/javascript' id='wc-add-to-cart-variation-js-extra'>
  /* <![CDATA[ */
  var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/luchiana\/demo\/?wc-ajax=%%endpoint%%","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min4245.js?ver=5.5.2") }}' id='wc-add-to-cart-variation-js'></script>
  <script type='text/javascript' id='woo-variation-swatches-js-extra'>
  /* <![CDATA[ */
  var woo_variation_swatches_options = {"is_product_page":"","show_variation_label":"","variation_label_separator":":","wvs_nonce":"79fa18679c"};
  /* ]]> */
  </script>
  <script type='text/javascript' defer src='{{ asset("wp-content/plugins/woo-variation-swatches/assets/js/frontend.min93fb.js?ver=1.1.17") }}' id='woo-variation-swatches-js'></script>
  <link rel="https://api.w.org/" href="https://parkofideas.com/luchiana/demo/wp-json/" />
  <link rel="alternate" type="application/json" href="https://parkofideas.com/luchiana/demo/wp-json/wp/v2/pages/1131" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://parkofideas.com/luchiana/demo/xmlrpc.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://parkofideas.com/luchiana/demo/wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress 5.8" />
  <meta name="generator" content="Theme Plugin 2.12" />
  <meta name="generator" content="WooCommerce 5.5.2" />
  <meta name="generator" content="Luchiana 2.12" />
  <link rel="canonical" href="index.html" />
  <link rel='shortlink' href='https://parkofideas.com/luchiana/demo/?p=1131' />
  <link rel="alternate" type="application/json+oembed" href="https://parkofideas.com/luchiana/demo/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fparkofideas.com%2Fluchiana%2Fdemo%2Fhome-3%2F" />
  <link rel="alternate" type="text/xml+oembed" href="https://parkofideas.com/luchiana/demo/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fparkofideas.com%2Fluchiana%2Fdemo%2Fhome-3%2F&amp;format=xml" />
  <noscript>
    <style>
  .woocommerce-product-gallery{ opacity: 1 !important; }
    </style>
  </noscript>
  @yield('css')
  <link rel="apple-touch-icon" href="{{ asset('wp-content/uploads/2020/10/luchiana-1807981163.png') }}" />
  <meta name="msapplication-TileImage" content="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1807981163.png" />
</head>

<body class="page-template page-template-elementor_header_footer page page-id-1131 theme-luchiana woocommerce-no-js woo-variation-swatches wvs-theme-luchiana wvs-theme-child-luchiana wvs-style-rounded wvs-attr-behavior-blur wvs-tooltip wvs-css woocommerce-on h-ltr h-wpml elementor-default elementor-template-full-width elementor-kit-37 elementor-page elementor-page-1131">
  <input type="text" id="baseUrl" value="{{ url('/') }}" hidden>
  <input type="text" id="currentUrl" value="{{ url()->current() }}" hidden>
  <input type="text" id="cartUrl" value="{{ url('cart') }}" hidden>
  <input type="text" id="tokken" value="{{ csrf_token() }}" hidden>
  <input type="text" id="userIdAuth" value="{{ !empty(auth()->user()->id) ? auth()->user()->id : '' }}" hidden>
  <div class="c-header-search disabled js-ajax-search">
    <div class="c-header-search__wrap">
      <div class="c-header-search__shadow js-search-close">
      </div>
      <div class="c-header-search__form">
        <div class="c-header-search__tip">What you are looking for?</div>
        <form role="search" class="js-search-form" method="get" action="https://parkofideas.com/luchiana/demo/">
          <div class="c-header-search__input-block">
            <input class="js-ajax-search-input h-cb c-header-search__input" autocomplete="off" type="text" name="s" placeholder="Start typing..." value="" />
            <button class="js-search-clear h-cb c-header-search__clear" type="button">
              <i class="ip-close-small c-header-search__clear-svg"></i>
              <span class="c-header-search__clear-text">Clear</span>
            </button>
          </div>
          <input type="hidden" name="post_type" value="product" class="js-ajax-search-type" />
        </form>
      </div>
      <div class="l-section l-section--container c-header-search__result js-ajax-search-result">
      </div>
      <button type="button" class="h-cb h-cb--svg c-header-search__close js-search-close">
        <i class="ip-close-small"></i>
      </button>
    </div>
  </div>
  <div class="l-wrap">
    <!-- Site Header Start -->@include('frontend.layouts.header')
    <!-- Site Header End -->
    <!-- Site Main Content Start -->@yield('content')
    <!-- Site Main Content End -->
    <!-- Site Footer Start -->@include('frontend.layouts.footer')
    <!-- Site Footer End -->
  </div>
  <!-- /.l-wrap -->
  <div class="pswp js-fixed" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg">
    </div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item">
        </div>
        <div class="pswp__item">
        </div>
        <div class="pswp__item">
        </div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter">
          </div>
          <button class="h-cb pswp__button--close" title="Close (Esc)">
            <i class="ip-close pswp__button-svg pswp__button-svg--close"></i>
          </button>
          <button class="h-cb pswp__button--zoom" title="Zoom in/out">
            <i class="ip-zoom pswp__button-svg pswp__button-svg--zoom"></i>
          </button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut">
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="h-cb pswp__button--arrow--left" title="Previous (arrow left)">
          <i class="ip-right pswp__button-svg pswp__button-svg--left"></i>
        </button>
        <button class="h-cb pswp__button--arrow--right" title="Next (arrow right)">
          <i class="ip-right pswp__button-svg pswp__button-svg--right"></i>
        </button>
        <div class="pswp__caption">
          <div class="pswp__caption__center">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  (function () {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    })();
  </script>
  <link rel='stylesheet' id='elementor-post-1528-css' href='{{ asset("wp-content/uploads/elementor/css/post-1528b487.css?ver=1626831365") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-post-1523-css' href='{{ asset("wp-content/uploads/elementor/css/post-1523b487.css?ver=1626831365") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='elementor-post-1052-css' href='{{ asset("wp-content/uploads/elementor/css/post-1052bebe.css?ver=1626835119") }}' type='text/css' media='all' />
  <link rel='stylesheet' id='e-animations-css' href='{{ asset("wp-content/plugins/elementor/assets/lib/animations/animations.min3d36.css?ver=3.3.1") }}' type='text/css' media='all' />
  <script type='text/javascript' src='{{ asset("wp-includes/js/dist/vendor/regenerator-runtime.minb36a.js?ver=0.13.7") }}' id='regenerator-runtime-js'></script>
  <script type='text/javascript' src='{{ asset("wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0") }}' id='wp-polyfill-js'></script>
  <script type='text/javascript' id='contact-form-7-js-extra'>
  /* <![CDATA[ */
  var wpcf7 = {"api":{"root":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-json\/","namespace":"contact-form-7\/v1"},"cached":"1"};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/contact-form-7/includes/js/index7661.js?ver=5.4.2") }}' id='contact-form-7-js'></script>
  <script type='text/javascript' id='wc-add-to-cart-js-extra'>
  /* <![CDATA[ */
  var wc_add_to_cart_params = {"ajax_url":"\/luchiana\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/luchiana\/demo\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/parkofideas.com\/luchiana\/demo\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min4245.js?ver=5.5.2") }}' id='wc-add-to-cart-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4") }}' id='js-cookie-js'></script>
  <script type='text/javascript' id='woocommerce-js-extra'>
  /* <![CDATA[ */
  var woocommerce_params = {"ajax_url":"\/luchiana\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/luchiana\/demo\/?wc-ajax=%%endpoint%%"};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min4245.js?ver=5.5.2") }}' id='woocommerce-js'></script>
  <script type='text/javascript' id='wc-cart-fragments-js-extra'>
  /* <![CDATA[ */
  var wc_cart_fragments_params = {"ajax_url":"\/luchiana\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/luchiana\/demo\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_3885bfad4d2f66732d16d47646339903","fragment_name":"wc_fragments_3885bfad4d2f66732d16d47646339903","request_timeout":"5000"};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min4245.js?ver=5.5.2") }}' id='wc-cart-fragments-js'></script>
  <script type='text/javascript' id='ideapark-core-js-extra'>
  /* <![CDATA[ */
  var ideapark_wp_vars = {"themeDir":"\/usr\/www\/parkofideas.com\/luchiana\/demo\/wp-content\/themes\/luchiana","themeUri":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-content\/themes\/luchiana","ajaxUrl":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-admin\/admin-ajax.php","searchUrl":"https:\/\/parkofideas.com\/luchiana\/demo\/?s=","lazyload":"1","isRtl":"","stickySidebar":"1","stickyMenuDesktop":"1","stickyMenuMobile":"1","headerType":"header-type-4","viewMore":"View More","imagesloadedUrl":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-includes\/js\/imagesloaded.min.js?v=4.1.4","scriptsHash":"b3dfb716","stylesHash":"0e847ce0","cookiePath":"\/luchiana\/demo\/","cookieDomain":"","cookieHash":"f7112860472b9795969b0395ee7f2260","locale":"en_us","masonryUrl":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-includes\/js\/masonry.min.js?v=4.2.2","wishlistCookieName":"ip-wishlist-items","wishlistTitleAdd":"Add to Wishlist","wishlistTitleRemove":"Remove from Wishlist"};
  /* ]]> */
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/uploads/luchiana/min4e05.js?ver=1629054746") }}' id='ideapark-core-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/themes/luchiana/assets/js/add-to-cart-variation-fix2905.js?ver=2.12")}}' id='wc-add-to-cart-variation-fix-js'></script>
  <script type='text/javascript' src='{{ asset("wp-includes/js/wp-embed.min41a3.js?ver=5.8") }}' id='wp-embed-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/js/webpack.runtime.min3d36.js?ver=3.3.1") }}' id='elementor-webpack-runtime-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/js/frontend-modules.min3d36.js?ver=3.3.1") }}' id='elementor-frontend-modules-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2") }}' id='elementor-waypoints-js'></script>
  <script type='text/javascript' src='{{ asset("wp-includes/js/jquery/ui/core.min35d0.js?ver=1.12.1") }}' id='jquery-ui-core-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/lib/share-link/share-link.min3d36.js?ver=3.3.1") }}' id='share-link-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/lib/dialog/dialog.mina288.js?ver=4.8.1") }}' id='elementor-dialog-js'></script>
  <script type='text/javascript' id='elementor-frontend-js-before'>
  var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1190,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"direction":"max","is_enabled":true,"default_value":767},"mobile_extra":{"label":"Mobile Extra","value":880,"direction":"max","is_enabled":false,"default_value":880},"tablet":{"label":"Tablet","value":1189,"direction":"max","is_enabled":true,"default_value":1024},"tablet_extra":{"label":"Tablet Extra","value":1365,"direction":"max","is_enabled":false,"default_value":1365},"laptop":{"label":"Laptop","value":1620,"direction":"max","is_enabled":false,"default_value":1620},"widescreen":{"label":"Widescreen","value":2400,"direction":"min","is_enabled":false,"default_value":2400}}},"version":"3.3.1","is_static":false,"experimentalFeatures":{"e_import_export":true,"landing-pages":true,"elements-color-picker":true,"admin-top-bar":true},"urls":{"assets":"https:\/\/parkofideas.com\/luchiana\/demo\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description","active_breakpoints":["viewport_mobile","viewport_tablet"],"viewport_tablet":1189},"post":{"id":1131,"title":"Wide%20Home%20%E2%80%93%20Luchiana","excerpt":"","featuredImage":false}};
  </script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/js/frontend.min3d36.js?ver=3.3.1") }}' id='elementor-frontend-js'></script>
  <script type='text/javascript' src='{{ asset("wp-content/plugins/elementor/assets/js/preloaded-modules.min3d36.js?ver=3.3.1") }}' id='preloaded-modules-js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- cart js -->
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type='text/javascript' src='{{ asset("js/cart.js") }}' id='preloaded-modules-js'></script>
  <script type='text/javascript' src='{{ asset("js/favourite.js") }}' id='preloaded-modules-js'></script>
  @yield('js')  
</html>