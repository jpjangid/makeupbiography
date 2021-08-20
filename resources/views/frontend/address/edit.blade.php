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
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address is-active">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-address/">Addresses</a>
                </li>
                <li class="c-account__navigation-item woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                  <a class="c-account__navigation-link" href="https://parkofideas.com/luchiana/demo/my-account/edit-account/">Account details</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="c-account__col-content">
            <form method="post">
              <h3>Billing address</h3>
              <div class="woocommerce-address-fields">
                <div class="woocommerce-address-fields__field-wrapper">
                  <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                    <label for="billing_first_name" class="">First name&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="xyz" autocomplete="given-name" />
                    </span>
                  </p>
                  <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                    <label for="billing_last_name" class="">Last name&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="xyz" autocomplete="family-name" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                    <label for="billing_company" class="">Company name&nbsp;
                      <span class="optional">(optional)</span>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="ascasc" autocomplete="organization" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
                    <label for="billing_country" class="">Country / Region&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <select name="billing_country" id="billing_country" class="country_to_state country_select " autocomplete="country" data-placeholder="Select a country / region&hellip;" data-label="Country / Region">
                        <option value="">Select a country / region&hellip;</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU" selected='selected'>Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="PW">Belau</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo (Brazzaville)</option>
                        <option value="CD">Congo (Kinshasa)</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Cura&ccedil;ao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="CI">Ivory Coast</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="KP">North Korea</option>
                        <option value="MK">North Macedonia</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PS">Palestinian Territory</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barth&eacute;lemy</option>
                        <option value="SH">Saint Helena</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="SX">Saint Martin (Dutch part)</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia/Sandwich Islands</option>
                        <option value="KR">South Korea</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syria</option>
                        <option value="TW">Taiwan</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom (UK)</option>
                        <option value="US">United States (US)</option>
                        <option value="UM">United States (US) Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VA">Vatican</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VG">Virgin Islands (British)</option>
                        <option value="VI">Virgin Islands (US)</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                      </select>
                      <noscript>
                        <button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button>
                      </noscript>
                    </span>
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                    <label for="billing_address_1" class="">Street address&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="ascas" autocomplete="address-line1" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
                    <label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;
                      <span class="optional">(optional)</span>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="ddd" autocomplete="address-line2" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
                    <label for="billing_city" class="">Suburb&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="sdvsdv" autocomplete="address-level2" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide address-field validate-required validate-state" id="billing_state_field" data-priority="80">
                    <label for="billing_state" class="">State&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <select name="billing_state" id="billing_state" class="state_select " autocomplete="address-level1" data-placeholder="Select an option&hellip;" data-input-classes="" data-label="State">
                        <option value="">Select an option&hellip;</option>
                        <option value="ACT">Australian Capital Territory</option>
                        <option value="NSW">New South Wales</option>
                        <option value="NT">Northern Territory</option>
                        <option value="QLD">Queensland</option>
                        <option value="SA">South Australia</option>
                        <option value="TAS">Tasmania</option>
                        <option value="VIC" selected='selected'>Victoria</option>
                        <option value="WA">Western Australia</option>
                      </select>
                    </span>
                  </p>
                  <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90">
                    <label for="billing_postcode" class="">Postcode&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="313002" autocomplete="postal-code" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                    <label for="billing_phone" class="">Phone&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="1234567890" autocomplete="tel" />
                    </span>
                  </p>
                  <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                    <label for="billing_email" class="">Email address&nbsp;
                      <abbr class="required" title="required">*</abbr>
                    </label>
                    <span class="woocommerce-input-wrapper">
                      <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="xyz@gmail.com" autocomplete="email username" />
                    </span>
                  </p>
                </div>
                <p>
                  <button type="submit" class="button" name="save_address" value="Save address">Save address</button>
                  <input type="hidden" id="woocommerce-edit-address-nonce" name="woocommerce-edit-address-nonce" value="9fe9b63096" />
                  <input type="hidden" name="_wp_http_referer" value="/luchiana/demo/my-account/edit-address/billing/" />
                  <input type="hidden" name="action" value="edit_address" />
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection