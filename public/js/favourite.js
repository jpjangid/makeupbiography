$(document).on('click','.js-wishlist-btn-add',function(){
    alert("hello");
    var productId = $(this).data('product-id');
    var productVariantId = $(this).data('product_variant_id');
    var baseUrl = $('#baseUrl').val();
    var wishlistUrl = baseUrl+'/wishlist';
    var userId = $('#userIdAuth').val();
    var LoginUrl = baseUrl+"/login";
    if(userId == "") {
        window.location.href = LoginUrl;
    }
    var token = $('#csrfToken').val();
    $('.js-wishlist-info').empty();
    $.ajax({
        type:'POST',
        url: baseUrl+'/wishlist/add',
        data: {_token:token,product_id:productId,product_variant_id:productVariantId},
        success:function(data) {
           console.log(data);
            if(data.status != 200) {
                var msg = `<div class="woocommerce-notice shown" role="alert">
                                <i class="ip-wc-error woocommerce-notice-error-svg"></i>
                                `+data.message+`<button class="h-cb h-cb--svg woocommerce-notice-close js-notice-close" type="button"><i class="ip-close-small woocommerce-notice-close-svg"></i></button>
                        </div>`; 
                ideapark_show_notice($(msg));    
                var count  = "";
                if(data.count  > 0) {
                    var count  = `<span class="c-header__cart-count">`+data.count+`</span>`;
                }  
                $('.js-wishlist-info').empty();
                $('.js-wishlist-info').html(count);
            } else {
                var msg = `<div class="woocommerce-notice shown" role="alert">
                            <i class="ip-wc-success woocommerce-notice-success-svg"></i>
                            <a href="`+wishlistUrl+`" tabindex="1" class="button wc-forward">View wishlist</a>`+data.message+`<button class="h-cb h-cb--svg woocommerce-notice-close js-notice-close" type="button"><i class="ip-close-small woocommerce-notice-close-svg"></i></button>
                        </div>`;
                ideapark_show_notice($(msg)); 
                var count  = "";
                if(data.count  > 0) {
                    var count  = `<span class="c-header__cart-count">`+data.count+`</span>`;
                }  
                $('.js-wishlist-info').empty();
                $('.js-wishlist-info').html(count);
            }
        }
    });
});
