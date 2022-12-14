$(document).ready(function() {
    cart();
    /* cart list header refresh */
    function cart() {
        $('.widget_shopping_cart_content').empty();
        $('.js-cart-info').empty();
        var baseUrl = $('#baseUrl').val();
        var cartUrl = baseUrl + "/cart";
        var checkoutUrl = baseUrl + "/checkout";
        $.ajax({
            type: 'GET',
            url: cartUrl,
            success: function(data) {
                if (data != "") {
                    var header = `<span class="c-header__cart-count js-cart-count">` + data.totalQuantityItems + `</span>`;
                    $('.js-cart-info').append(header);
                    var cartList = `<ul class="woocommerce-mini-cart cart_list c-product-list-widget"></ul>`;
                    $('.widget_shopping_cart_content').append(cartList);
                    $('.widget_shopping_cart_content').css('opacity', '1');
                    var listInProduct = data.listItem;
                    $('.c-product-list-widget').append(listInProduct);
                    var baseUrl = $('#baseUrl').val();
                    var cartUrl = baseUrl + "/cart";
                    var cartTotal = `<div class="woocommerce-mini-cart__total c-product-list-widget__total total"><span class="c-product-list-widget__total-title">Total Items:</span> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">` + data.totalQuantityItems + `</span></bdi></span></div>`;
                    var checkout = `<div class="woocommerce-mini-cart__buttons c-product-list-widget__buttons buttons"><a href="` + cartUrl + `" class="button wc-forward">View cart</a><a href="` + checkoutUrl + `" class="button checkout wc-forward">Checkout</a></div>`;
                    $('.widget_shopping_cart_content').append(cartTotal);
                    $('.widget_shopping_cart_content').append(checkout);
                } else {
                    $('.widget_shopping_cart_content').append('<div class="c-product-list-widget__empty woocommerce-mini-cart__empty-message">No products in the cart.</div>');
                }
            }
        });


    }
    /* remove to cart code */
    $(document).on('click', '.remove-product-drop', function(e) {
        e.preventDefault();
        var removeUrl = $(this).data('remove-url');
        $.ajax({
            type: 'GET',
            url: removeUrl,
            success: function(data) {
                if (data.status == 200) {
                    cart();
                    if ($('#currentUrl').val() == $('#cartUrl').val()) {
                        location.reload();
                    }
                }
            }
        });
    });
    /* add to cart code */
    $(document).on('click', '.add-to-cart', function() {
        var baseUrl = $('#baseUrl').val();
        var cartUrl = baseUrl + '/cart';
        var mainUrl = baseUrl + '/add/to/cart';
        var productId = $('#productId').val();
        var productQuantity = $('.product-quantity').val();

        if ($(this).data('product_id') != null) {
            productId = $(this).data('product_id');
        }

        if (productQuantity == null) {
            productQuantity = 1;
        }

        $.ajax({
            type: 'GET',
            url: mainUrl,
            data: { product_id: productId, product_quantity: productQuantity },
            success: function(data) {
                if (data == "") {
                    var msg = `<div class="woocommerce-notice shown" role="alert">
                                    <i class="ip-wc-error woocommerce-notice-error-svg"></i>
                                    Product is not available<button class="h-cb h-cb--svg woocommerce-notice-close js-notice-close" type="button"><i class="ip-close-small woocommerce-notice-close-svg"></i></button>
                                </div>`;
                    ideapark_show_notice($(msg));
                } else {
                    var msg = `<div class="woocommerce-notice shown" role="alert">
                                <i class="ip-wc-success woocommerce-notice-success-svg"></i>
                                <a href="` + cartUrl + `" tabindex="1" class="button wc-forward">View cart</a>` + data + `<button class="h-cb h-cb--svg woocommerce-notice-close js-notice-close" type="button"><i class="ip-close-small woocommerce-notice-close-svg"></i></button>
                            </div>`;
                    ideapark_show_notice($(msg));
                }
                cart();
            }
        });
    });

});