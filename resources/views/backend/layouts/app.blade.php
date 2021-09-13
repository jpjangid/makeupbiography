<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
  <base href="">
  <meta charset="utf-8" />
  <title>Makeupbiography | @yield('title','Home')</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link rel="canonical" href="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Global Stylesheets Bundle(used by all pages)-->
  <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!-- DataTable Css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  @yield('css')
  <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed">
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Aside-->@include('backend.layouts.sidebar')
      <!--end::Aside-->
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        @include('backend.layouts.header')
        <!--end::Header-->
        <!--begin::Content-->
        @yield('content')
        <!--end::Content-->
        <!--begin::Footer-->
        @include('backend.layouts.footer')
        <!--end::Footer-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Main-->
  <!--begin::Drawers-->
  <!--end::Drawers-->
  <!--begin::Scrolltop-->@include('backend.layouts.scrolltop')
  <!--end::Scrolltop-->
  <!--begin::Javascript-->
  <!--begin::Global Javascript Bundle(used by all pages)-->
  <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
  <!--end::Global Javascript Bundle-->
  <!--begin::Page Custom Javascript(used by this page)-->
  <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
  <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js')}}"></script>
  <!--end::Page Custom Javascript-->
  <!--end::Javascript-->
  @yield('js')
</body>
<!--end::Body-->

</html>