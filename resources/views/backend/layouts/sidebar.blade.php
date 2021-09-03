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
              <a class="menu-link" href="{{ url('admin/products') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Products</span>
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
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Wizard
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Pricing
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Account</span>
            <span class="menu-arrow">
            </span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link" href="account/overview.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Overview</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Settings
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Security
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Audit Logs
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Activity
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Interface/Lock.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Authentication
              <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
            </span>
            <span class="menu-arrow">
            </span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
              <span class="menu-link">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Base</span>
                <span class="menu-arrow">
                </span>
              </span>
              <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Sign-in
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
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
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="general/about.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">About Us</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="general/invoice.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Invoice</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="general/faq.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">FAQ</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#" data-kt-page="pro">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Wizard
                                <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span></span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#" data-kt-page="pro">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pricing
                                <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Two-steps Auth
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Password Reset
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">New Password
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
              <span class="menu-link">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Extended</span>
                <span class="menu-arrow">
                </span>
              </span>
              <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Multi-steps
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Free Trial
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Coming Soon
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
              <span class="menu-link">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">General</span>
                <span class="menu-arrow">
                </span>
              </span>
              <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Welcome
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Verify Email
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Password Confirmation
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Close Account
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Error 404
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Error 500
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
              <span class="menu-link">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Email</span>
                <span class="menu-arrow">
                </span>
              </span>
              <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                  <a class="menu-link" href="#" target="blank" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Verify Email
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" target="blank" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Password Reset
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="#" target="blank" data-kt-page="pro">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot">
                      </span>
                    </span>
                    <span class="menu-title">Password Change
                      <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart4.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path opacity="0.25" d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z" fill="#7E8299" />
                  <path d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z" fill="#7E8299" />
                  <path d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z" fill="#7E8299" />
                  <path d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z" fill="#7E8299" />
                  <g opacity="0.25">
                    <path d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z" fill="#7E8299" />
                    <path d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z" fill="#7E8299" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Subscriptions
              <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
            </span>
            <span class="menu-arrow">
            </span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Getting Started
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Subscription List
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Add Subscription
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">View Subscription
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Communication/Group-chat.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                  <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Chat
              <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
            </span>
            <span class="menu-arrow">
            </span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Private Chat
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Group Chat
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="#" data-kt-page="pro">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot">
                  </span>
                </span>
                <span class="menu-title">Drawer Chat
                  <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="menu-item">
          <div class="menu-content">
            <div class="separator mx-1 my-4">
            </div>
          </div>
        </div>
        <div class="menu-item mb-1">
          <a class="menu-link" href="documentation/base/utilities.html" title="Check out over 200 in-house components, plugins and ready for use solutions" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-arrange.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000" />
                    <path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Components</span>
          </a>
        </div>
        <div class="menu-item mb-1">
          <a class="menu-link" href="documentation/getting-started.html" title="Check out the complete documentation" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Documentation</span>
          </a>
        </div>
        <div class="menu-item mb-1">
          <a class="menu-link" href="#" data-kt-page="pro" title="Build your layout, preview and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path opacity="0.25" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z" fill="#12131A" />
                  <path d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z" fill="#12131A" />
                  <path opacity="0.25" d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z" fill="#12131A" />
                  <path d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z" fill="#12131A" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Layout Builder
              <span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span>
            </span>
          </a>
        </div>
        <div class="menu-item mb-1">
          <a class="menu-link" href="documentation/getting-started/changelog.html">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotone/Files/File.svg-->
              <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Changelog</span>
          </a>
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