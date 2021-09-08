/* new address button event */
$(document).on('click','.button-add-new-address', function(e) {
    e.preventDefault();
    $('.add-new-address-show').css('display','block');
    
});
/* address radio events */
$(document).on('click','.addressSelect', function(e) {
    e.preventDefault();
    $('.addressSelect').attr('checked',false);

    $(this).attr('checked',true);
    $(this).css("background-color", "black");

    $('.add-new-address-show').css('display','none');
    
});

/* ship to a different address checkbox event */
$(document).on('click','#ship-to-different-address-checkbox', function() {
    var billingName = $('#billing_name').val();
    var billingEmail = $('#billing_email').val();
    var billingMobile = $('#billing_mobile').val();
    var billingAddress = $('#billing_address').val();
    var billingPostcode = $('#billing_postcode').val();
    var billingLandmark = $('#billing_landmark').val();
    if($(this).prop("checked") == true) {
       $('.shipping_address').css("display",'block'); 
       $('#billing_name').val(billingName);
       $('#billing_email').val(billingEmail);
       $('#billing_mobile').val(billingMobile);
       $('#billing_address').val(billingAddress);
       $('#billing_postcode').val(billingPostcode);
       $('#billing_landmark').val(billingLandmark);
    } else {
        $('.shipping_address').css("display",'none'); 
        $('#shipping_name').val(billingName);
        $('#shipping_email').val(billingEmail);
        $('#shipping_mobile').val(billingMobile);
        $('#shipping_address').val(billingAddress);
        $('#shipping_postcode').val(billingPostcode);
        $('#shipping_landmark').val(billingLandmark);
    }
});

/* on change event for body */
$('body').on('change',function(){
    var billingName = $('#billing_name').val();
    var billingEmail = $('#billing_email').val();
    var billingMobile = $('#billing_mobile').val();
    var billingAddress = $('#billing_address').val();
    var billingPostcode = $('#billing_postcode').val();
    var billingState = $('#billing_state').val();
    var billingCity = $('#billing_city').val();
    var billingLandmark = $('#billing_landmark').val();

    if($(this).prop("checked") == true) {
       $('#billing_name').val(billingName);
       $('#billing_email').val(billingEmail);
       $('#billing_mobile').val(billingMobile);
       $('#billing_address').val(billingAddress);
       $('#billing_postcode').val(billingPostcode);
       $('#billing_state').val(billingState);
       $('#billing_city').val(billingCity);
       $('#billing_landmark').val(billingLandmark);
    } else {
        $('#shipping_name').val(billingName);
        $('#shipping_email').val(billingEmail);
        $('#shipping_mobile').val(billingMobile);
        $('#shipping_address').val(billingAddress);
        $('#shipping_postcode').val(billingPostcode);
        $('#shipping_state').val(billingState);
        $('#shipping_city').val(billingCity);
        $('#shipping_landmark').val(billingLandmark);
    }
});

/* coupan check */
$(document).on('click','#ip-checkout-apply-coupon-check', function(e){
    e.preventDefault();
    $('.coupon-error').text('');
    var baseUrl = $('#baseUrl').val();
    var applyCouponUrl = baseUrl+"/checkout/apply/coupon";
    var couponCode = $('#coupon_code').val();
    var csrfToken = $('#couponCsrfToken').val();
    if(couponCode != "") {
        $.ajax({
            type:'POST',
            url: applyCouponUrl,
            data: {_token:csrfToken,coupon_code:couponCode},
            success:function(data) {
               console.log(data);
            }
        });
    } else {
        $('.coupon-error').text('Please Enter Coupon Code');
    }
});

/* coupan check blank or not */
$(document).on('keyup','#coupon_code',function(){
    if($('#coupon_code').val() != "") {
        $('.coupon-error').text('');
    }
}); 