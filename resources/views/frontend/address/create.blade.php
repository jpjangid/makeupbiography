@extends('frontend.main.index')

@section('title','New Address')

@section('css')
<style>
  strong {
    color: red;
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
  <div class="woocommerce-notices-wrapper woocommerce-notices-wrapper--ajax" style="transform: translateY(90px);">
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
            <form method="post" action="{{ url('my-address/create') }}">
              @csrf
              <h3>New address</h3>
              <div class="woocommerce-address-fields">
                <div class="woocommerce-address-fields__field-wrapper">
                  <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                    <label for="name" class=""> Name&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="name" id="name" placeholder="" value="{{ old('name') }}" autocomplete="given-name">
                    </span>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                    <label for="email" class="">Email address&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="email" class="input-text " name="email" id="email" placeholder="" value="{{ old('email') }}" autocomplete="email username">
                    </span>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                    <label for="mobile_no" class="">Mobile No.&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="number input-text " name="mobile_no" id="mobile_no" placeholder="" value="{{ old('mobile_no') }}" autocomplete="tel">
                    </span>
                    @error('mobile_no')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                    <label for="address" class=""> Address&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="address" id="address" placeholder="House number and address" value="{{ old('address') }}" autocomplete="address-line1">
                    </span>
                    @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90">
                    <label for="postcode" class="">Postcode&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text number" name="postcode" id="postcode" placeholder="" value="{{ old('postcode') }}" autocomplete="postal-code">
                    </span>
                    <span>
                      <small>state :</small>
                      <small class="stateName"></small>
                    </span>
                    <span>
                      <span>|</span>
                    </span>
                    <span>
                      <small>city:</small>
                      <small class="cityName"></small>
                    </span>
                    @error('postcode')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                    <label for="name" class=""> Landmark&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="landmark" id="landmark" placeholder="" value="{{ old('landmark') }}" autocomplete="given-name">
                    </span>
                    @error('landmark')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                </div>
                <p>
                  <button type="submit" class="button">Save address</button>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type='text/javascript' src='{{ asset("js/validation.js") }}' id='preloaded-modules-js'></script>
<script type="text/javascript">
  $(document).on('keyup','#postcode',function(){
    $('.stateName').text('');
    $('.cityName').text('');
    var pincode = $(this).val();
    $.ajax({
        type:'GET',
        url: '{{ url("my-address/create") }}',
        data: {pincode:pincode},
        success:function(data) {
            if(data.location != "") {
              $('.stateName').text(data.location.state);
              $('.cityName').text(data.location.city);
            }
        }
    });
  });
</script>
@endsection