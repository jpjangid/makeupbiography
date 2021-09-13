<div id="kt_aside" class="aside bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
  <!--begin::Brand-->
  <div class="aside-logo flex-column-auto pt-9 pb-7 px-9" id="kt_aside_logo">
    <!--begin::Logo-->
    <a href="{{ url('admin') }}">
      <img alt="Logo" src="assets/media/logos/logo-default.svg" class="max-h-50px logo-default" />
      <img alt="Logo" src="assets/media/logos/logo-compact.svg" class="max-h-50px logo-minimize" />
    </a>
    <!--end::Logo-->
  </div>
  <!--end::Brand-->
  <!--begin::Aside menu-->
  <div class="aside-menu flex-column-fluid px-3 px-lg-6">
    <!--begin::Aside Menu-->
    <!--begin::Menu-->
    <div class="menu menu-column menu-pill menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 menu-active-bg-primary fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
      <div class="hover-scroll-y me-n3 pe-3" id="kt_aside_menu_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="20px">
        <div class="menu-item mb-1">
          <a class="menu-link active" href="index.html">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Dashboards</span>
          </a>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                  <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Masters</span>
            <span class="menu-arrow">
            </span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/orders') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Orders</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/returns') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Return Orders</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/brands') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Brands</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/categories') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Categories</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/sub/categories') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Sub Categories</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/sub/sub/categories') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Sub Sub Categories</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/labels') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Labels</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/products') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Products</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/footer/banners') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Footer Banners</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/redirections') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Redirections</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/blogs') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Blogs</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/pages') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Pages</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/coupons') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Coupon</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{ url('admin/users') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">User</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end::Menu-->
  </div>
  <!--end::Aside menu-->
  <!--begin::Footer-->
  <div class="aside-footer flex-column-auto px-6 pb-5" id="kt_aside_footer">
    <a href="https://keenthemes.com/products/rider-html-pro" class="btn btn-light-primary w-100" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" title="Upgrade to Pro to get &lt;br/&gt;the best of Rider">Upgrade to Pro</a>
  </div>
  <!--end::Footer-->
</div>