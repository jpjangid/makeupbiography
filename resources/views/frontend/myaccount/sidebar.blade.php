<ul class="c-account__navigation">
    <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard--edit-account {{ url('my-account') == url()->current() ? 'is-active' : '' }}">
        <a class="c-account__navigation-link" href="{{ url('my-account') }}"><i class='fas fa-user-edit'></i> My Account</a>
    </li>
    <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wallet {{ url('my-wallet') == url()->current() ? 'is-active' : '' }}">
        <a class="c-account__navigation-link" href="{{ url('my-wallet') }}"><i class='fas fa-wallet'></i> My Wallet</a>
    </li>
    <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders {{ url('my-orders') == url()->current() ? 'is-active' : '' }}">
        <a class="c-account__navigation-link" href="{{ url('my-orders') }}"><i class='fas fa-truck'></i> My Orders</a>
    </li>
    <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist {{ url('my-wishlist') == url()->current() ? 'is-active' : '' }}">
        <a class="c-account__navigation-link" href="{{ url('my-wishlist') }}"><i class='fas fa-heart'></i> My Wishlist</a>
    </li>
    <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address {{ url('my-wishlist') == url()->current() ? 'is-active' : '' }}">
        <a class="c-account__navigation-link" href="{{ url('q&a') }}"><i class="fas fa-question-circle" aria-hidden="true"></i> Q&A</a>
    </li>
    <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address {{ url('my-wishlist') == url()->current() ? 'is-active' : '' }}">
        <a class="c-account__navigation-link" href="{{ url('my-address') }}"><i class='fas fa-address-card'></i> My Addresses</a>
    </li>
    @if (Route::has('login'))
        @auth
        <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--log-out">
        <form action="{{ route('logout') }}" method="post">   
            @csrf 
            <button type="submit" style="background: none!important;border: none;margin-left: -7px;font-style: normal;font-weight: normal;font-size: 13px;line-height: 18px;letter-spacing: 0.06em;text-transform: uppercase;"><i class='fas fa-sign-out-alt'></i> Log out</button>
        </form>
        </li>
        @else 
        <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address {{ url('my-wishlist') == url()->current() ? 'is-active' : '' }}">
            <a class="c-account__navigation-link" href="{{ route('login') }}"> Login</a>
        </li>
        @endauth
    @endif    

</ul>