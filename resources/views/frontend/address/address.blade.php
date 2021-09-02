@extends('frontend.main.index')

@section('css')
<style>
address {
    line-height: 1.5em;
    height: 5em;       
    overflow: hidden;  
}

.add {
  background-color: #3B9C9C !important;
  color: white;
  padding: 10px 20px;
  margin-bott0m: 10px !important;
}
</style>
@endsection

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">My account</h1>
    </div>
    <div class="c-page-header__login-info">
      <span class="c-page-header__login-text">Logged in as
        <span class="c-page-header__login-name">{{ auth()->user()->name }}</span>
      </span>
    </div>
  </header>
  <div class="woocommerce-notices-wrapper">
   @include('frontend.message.message') 
  </div>
  <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
    <div class="l-section__content">
      <div class="woocommerce">
        <div class="c-account">
          <div class="c-account__col-menu">
            <nav>
            @include('frontend.myaccount.sidebar')
            </nav>
          </div>
          <div class="c-account__col-content">
            <a href="{{ url('my-address/create') }}" class="add">Add</a>
            <p style="margin-top: 20px">The following addresses will be used on the checkout page by default.</p>
            
            <div class="u-columns woocommerce-Addresses col2-set addresses">
              @php $count = 1; @endphp
              @foreach($user_addresses as $user_address)
              <div class="u-column1 col-1 woocommerce-Address">
                <header class="woocommerce-Address-title title">
                  <h3>Address {{ $count }}</h3>
                  <a href="{{ url('my-address/edit',$user_address->id) }}" class="edit">Edit</a>
                </header>
                <address>{{ $user_address->address }}</address>
                <small>State: {{ !empty($user_address->state) ? $user_address->state : '' }}</small><br>
                <small>City: {{ !empty($user_address->city) ? $user_address->city : '' }}</small><br>
                <small>Postcode: {{ !empty($user_address->pincode) ? $user_address->pincode : '' }}</small>
              </div>
              @php $count++ @endphp
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection