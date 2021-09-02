@if ($message = Session::get('success'))
<div class="woocommerce-notice shown" role="alert">
    <i class="ip-wc-success woocommerce-notice-success-svg"></i>
    {{ $message }}
    <button class="h-cb h-cb--svg woocommerce-notice-close js-notice-close" type="button"><i class="ip-close-small woocommerce-notice-close-svg"></i></button>
</div>
@endif