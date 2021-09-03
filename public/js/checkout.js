/* new address button event */
$(document).on('click','.button-add-new-address', function(e) {
    e.preventDefault();
    $('.add-new-address-show').css('display','block');
    
});
/* address radio events */
$(document).on('click','#addressSelect', function(e) {
    e.preventDefault();
    $('.add-new-address-show').css('display','none');
    
});