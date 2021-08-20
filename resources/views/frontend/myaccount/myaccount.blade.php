@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--wc c-page-header--low">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">My account</h1>
    </div>
    <div class="c-page-header__login-info">
      <span class="c-page-header__login-text">Logged in as
        <span class="c-page-header__login-name">xyz</span>
      </span>
      <a class="c-page-header__logout" href="https://parkofideas.com/luchiana/demo/my-account/customer-logout/?_wpnonce=c22e1eb537">Logout
        <i class="ip-menu-right c-page-header__logout-icon"></i>
      </a>
    </div>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
    <div class="l-section__content">
      <div class="woocommerce">
        <div class="c-account">
          <div class="c-account__col-menu">
            <nav>
              <ul class="c-account__navigation">
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/">Dashboard</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/orders/">Orders</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/downloads/">Downloads</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-address/">Addresses</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-account/">Account details</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="c-account__col-content">
            <form class="woocommerce-EditAccountForm edit-account" action="" method="post">
              <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="account_first_name">First name&nbsp;
                  <span class="required">*</span>
                </label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="xyz" />
              </p>
              <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                <label for="account_last_name">Last name&nbsp;
                  <span class="required">*</span>
                </label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="xyz" />
              </p>
              <div class="clear">
              </div>
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="account_display_name">Display name&nbsp;
                  <span class="required">*</span>
                </label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="xyz" />
                <span>
                  <em>This will be how your name will be displayed in the account section and in reviews</em>
                </span>
              </p>
              <div class="clear">
              </div>
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="account_email">Email address&nbsp;
                  <span class="required">*</span>
                </label>
                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="xyz@gmail.com" />
              </p>
              <fieldset>
                <legend>Password change</legend>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password_current">Current password (leave blank to leave unchanged)</label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password_1">New password (leave blank to leave unchanged)</label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password_2">Confirm new password</label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
                </p>
              </fieldset>
              <div class="clear">
              </div>
              <p>
                <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="89b5092734" />
                <input type="hidden" name="_wp_http_referer" value="/luchiana/demo/my-account/edit-account/" />
                <button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
                <input type="hidden" name="action" value="save_account_details" />
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection