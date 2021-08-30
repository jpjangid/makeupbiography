$(document).ready(function() {


    $('.widget_shopping_cart_content').empty();

    $('.widget_shopping_cart_content').append('<div class="c-product-list-widget__empty woocommerce-mini-cart__empty-message">No products in the cart.</div>');
    $('.widget_shopping_cart_content').empty();

	var cartList = `<ul class="woocommerce-mini-cart cart_list c-product-list-widget "></ul>`;
    $('.widget_shopping_cart_content').append(cartList);

    $('.widget_shopping_cart_content').css('opacity','1');

    var listInProduct = `<li class="woocommerce-mini-cart-item c-product-list-widget__item mini_cart_item">
                            <div class="c-product-list-widget__wrap">
                                <div class="c-product-list-widget__thumb-col">
                                    <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/"><img width="115" height="115" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg" class="c-product-list-widget__thumb" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-460x460.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-760x760.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-920x920.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-145x145.jpg 145w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061-290x290.jpg 290w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-3022279061.jpg 1200w" sizes="(max-width: 115px) 100vw, 115px"></a>					
                                </div>
                                <div class="c-product-list-widget__title-col">
                                    <div class="c-product-list-widget__title">
                                        Airbrush Matte								
                                    </div>
                                    <div class="c-product-list-widget__price">
                                        <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>40.00</bdi></span></span>								
                                    </div>
                                </div>
                                <a href="https://parkofideas.com/luchiana/demo/cart/?remove_item=1651cf0d2f737d7adeab84d339dbabd3&amp;_wpnonce=ad01090cd8" class="c-product-list-widget__remove remove remove_from_cart_button" aria-label="Remove this item" data-product_id="438" data-cart_item_key="1651cf0d2f737d7adeab84d339dbabd3" data-product_sku="6549845321"><i class="ip-close-small c-product-list-widget__remove-icon"></i></a>						
                            </div>
                        </li>`;                         
    $('.c-product-list-widget').append(listInProduct);   
    
   

	 
	var cartTotal = `<div class="woocommerce-mini-cart__total c-product-list-widget__total total"><span class="c-product-list-widget__total-title">Subtotal:</span> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>40.00</bdi></span></div>`;	
	var checkout = `<div class="woocommerce-mini-cart__buttons c-product-list-widget__buttons buttons"><a href="https://parkofideas.com/luchiana/demo/cart/" class="button wc-forward">View cart</a><a href="https://parkofideas.com/luchiana/demo/checkout/" class="button checkout wc-forward">Checkout</a></div>`;
    $('.widget_shopping_cart_content').append(cartTotal);  
    $('.widget_shopping_cart_content').append(checkout);  

});