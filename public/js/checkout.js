/* new address button event */
$(document).on('click','.button-add-new-address', function(e) {
    e.preventDefault();
    $('.add-new-address-show').css('display','block');
    
});

/* address function */
function addressChange(address) {
    var locationId = $('input[name=addressSelect]:checked', '#checkout-form').val();
    if(locationId != "new" && locationId != "") {
        var csrfToken= $('#tokken').val();
        var baseUrl = $('#baseUrl').val();
        var mainUrl = baseUrl+"/checkout/get/location";
        if($(this).attr('checked',true) && locationId != "") {
            $.ajax({
                type:'POST',
                url: mainUrl,
                data: {_token:csrfToken,location_id:locationId},
                success:function(data) {
                   if(data.status == 200 && data.data != "") {
                    locationClear();   
                    var billingName = data.data.name;
                    var billingEmail = data.data.email;
                    var billingMobile = data.data.mobile;
                    var billingAddress = data.data.address;
                    var billingPostcode = data.data.pincode;
                    var billingState = data.data.state;
                    var billingCity = data.data.city;
                    var billingLandmark = data.data.landmark;
    
                    $('#billing_name').val(billingName);
                    $('#billing_email').val(billingEmail);
                    $('#billing_mobile').val(billingMobile);
                    $('#billing_address').val(billingAddress);
                    $('#billing_postcode').val(billingPostcode);
                    $('#billing_state').val(billingState);
                    $('#billing_city').val(billingCity);
                    $('#billing_landmark').val(billingLandmark);
    
                    $('#shipping_name').val(billingName);
                    $('#shipping_email').val(billingEmail);
                    $('#shipping_mobile').val(billingMobile);
                    $('#shipping_address').val(billingAddress);
                    $('#shipping_postcode').val(billingPostcode);
                    $('#shipping_state').val(billingState);
                    $('#shipping_city').val(billingCity);
                    $('#shipping_landmark').val(billingLandmark);
    
                   }
                }
            });
        };
    } else {
        locationClear();
    }

}

/* Empty the input forms for locations */
function locationClear(){
    $('#billing_name').val('');
    $('#billing_email').val('');
    $('#billing_mobile').val('');
    $('#billing_address').val('');
    $('#billing_state').val('');
    $('#billing_city').val('');
    $('#billing_postcode').val('');
    $('#billing_landmark').val('');
    $('#shipping_name').val('');
    $('#shipping_email').val('');
    $('#shipping_mobile').val('');
    $('#shipping_address').val('');
    $('#shipping_state').val('');
    $('#shipping_city').val('');
    $('#shipping_postcode').val('');
    $('#shipping_landmark').val('');
}

/* ship to a different address checkbox event */
$(document).on('click','#ship-to-different-address-checkbox', function() {
    var billingName = $('#billing_name').val();
    var billingEmail = $('#billing_email').val();
    var billingMobile = $('#billing_mobile').val();
    var billingAddress = $('#billing_address').val();
    var billingPostcode = $('#billing_postcode').val();
    var billingLandmark = $('#billing_landmark').val();
    var billingState = $('#billing_state').val();
    var billingCity = $('#billing_city').val();
    if($(this).prop("checked") == true) {
       $('.shipping_address').css("display",'block'); 
       $('#billing_name').val(billingName);
       $('#billing_email').val(billingEmail);
       $('#billing_mobile').val(billingMobile);
       $('#billing_address').val(billingAddress);
       $('#billing_postcode').val(billingPostcode);
       $('#billing_state').val(billingState);
       $('#billing_city').val(billingCity);
       $('#billing_landmark').val(billingLandmark);
    } else {
        $('.shipping_address').css("display",'none'); 
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