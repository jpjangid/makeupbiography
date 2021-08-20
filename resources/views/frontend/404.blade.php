@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Page not found</h1>
    </div>
    <div class="c-page-header__spacer">
    </div>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <section class="l-section l-section--container l-section--top-margin-60 l-section--bottom-margin--60 l-section--white">
    <div class="c-cart-empty">
      <div class="c-cart-empty__image-wrap">
        <i class="ip-404 c-cart-empty__icon c-cart-empty__icon--failed"></i>
      </div>
      <h1 class="c-cart-empty__header">Oops! That page can’t be found</h1>
      <p class="c-cart-empty__try">The page you are trying to reach is not available. Maybe try a search?</p>
      <div class="c-cart-empty__search">
        <div class="c-search-form">
          <form role="search" method="get" class="js-search-form-entry" action="https://parkofideas.com/luchiana/demo/">
            <div class="c-search-form__wrap">
              <label class="c-search-form__label">
                <span class="screen-reader-text">Search for:</span>
                <input class="c-form__input c-form__input--full c-search-form__input" type="search" placeholder="Search &hellip;" value="" name="s" />
              </label>
              <button type="submit" class="c-button c-search-form__button">
                <i class="ip-search c-search-form__svg"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.l-inner -->
@endsection