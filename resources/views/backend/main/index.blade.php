@extends('backend.layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
	<!--begin::Container-->
	<div class="container" id="kt_content_container">
		<!--begin::Row-->
		<div class="row">
			<div class="col-md-6 mb-2"></div>
			<div class="col-md-3 mb-2">
				<label for="from">From</label>
				<input type="date" class="form-control" id="from" value="{{ date('Y-m-d', strtotime('-1 day')) }}">
			</div>
			<div class="col-md-3 mb-2">
				<label for="to">To</label>
				<input type="date" class="form-control" id="to" value="{{ date('Y-m-d') }}">
			</div>
		</div>
		<div class="row g-xl-8">
			<!--begin:::Col-->
			<div class="col-xxl-5">
				<!--begin::List Widget 3-->
				<div class="card card-flush mb-5 mb-xl-8">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<h3 class="card-title fw-boldest">Latest Top Sales</h3>
						<!--end::Card title-->
					</div>
					<!--end::Card header-->
					<!--begin::Body-->
					<div class="card-body pt-1">
						<!--begin:Tab content-->
						<div class="tab-content">
							<!--begin::Tab pane-->
							<div class="tab-pane fade active show" id="kt_lists_widget_3_tab_pane_1">
								<!--begin::Section-->
								<div class="mb-7">
									<!--begin::Items-->
									<div class="overflow-auto mb-10" id="top_sale">
										<!--begin::Item-->
										<!--end::Item-->
									</div>
									<!--end::Items-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Tab pane-->
						</div>
						<!--end:Tab content-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::List Widget 3-->
				<!--begin::List Widget 4-->
				<div class="card mb-5 mb-xl-8">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-boldest text-dark fs-2">Top Sold Products</span>
						</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-1" id="top_products">
					</div>
					<!--end::Body-->
				</div>
				<!--end::List Widget 4-->
				<!--begin::Slider Widget 1-->
				<div class="card mb-5 mb-xl-8">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-boldest text-dark fs-2">Site Visit by Traffic Sources</span>
						</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-5" id="traffic_sources">
					</div>
					<!--end::Body-->
				</div>
				<div class="card mb-5 mb-xl-8">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-boldest text-dark fs-2">Abadoned Cart</span>
						</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-5" id="carts">
					</div>
					<!--end::Body-->
				</div>
			</div>
			<!--end:::Col-->
			<!--begin:::Col-->
			<div class="col-xxl-7">
				<!--begin::Row-->
				<div class="row g-xl-8">
					<!--begin:::Col-->
					<div class="col-xl-6">
						<!--begin::Engage widget 1-->
						<div class="card card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Card body-->
							<div class="card-body bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-center" style="background-image:url('assets/media/illustrations/customer.png')">
								<!--begin::Title-->
								<div class="fw-boldest fs-3 mb-2">Ecommerce Revenue</div>
								<!--end::Title-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 text-gray-400" id="current_total_revenue">&#8377; 0.00</div>
								<div class="fw-bold fs-6 text-gray-400" id="prev_total_revenue">&#8377; 0.00</div>
								<!--end::Description-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Engage widget 1-->
					</div>
					<!--end:::Col-->
					<!--begin:::Col-->
					<div class="col-xl-6">
						<!--begin::Engage widget 1-->
						<div class="card card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Card body-->
							<div class="card-body bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-center" style="background-image:url('assets/media/illustrations/customer.png')">
								<!--begin::Title-->
								<div class="fw-boldest fs-3 mb-2">New Customers</div>
								<!--end::Title-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 text-gray-400" id="current_new_users">0</div>
								<div class="fw-bold fs-6 text-gray-400" id="prev_new_users">0</div>
								<!--end::Description-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Engage widget 1-->
					</div>
					<!--end:::Col-->
					<!--begin:::Col-->
					<div class="col-xl-6">
						<!--begin::Engage widget 1-->
						<div class="card card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Card body-->
							<div class="card-body bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-center" style="background-image:url('assets/media/illustrations/customer.png')">
								<!--begin::Title-->
								<div class="fw-boldest fs-3 mb-2">Average Order Value</div>
								<!--end::Title-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 text-gray-400" id="current_average_revenue">&#8377; 0.00</div>
								<div class="fw-bold fs-6 text-gray-400" id="prev_average_revenue">&#8377; 0.00</div>
								<!--end::Description-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Engage widget 1-->
					</div>
					<!--end:::Col-->
					<!--begin:::Col-->
					<div class="col-xl-6">
						<!--begin::Engage widget 1-->
						<div class="card card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Card body-->
							<div class="card-body bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-center" style="background-image:url('assets/media/illustrations/customer.png')">
								<!--begin::Title-->
								<div class="fw-boldest fs-3 mb-2">Total No. of Returns</div>
								<!--end::Title-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 text-gray-400" id="current_total_returns">0</div>
								<div class="fw-bold fs-6 text-gray-400" id="prev_total_returns">0</div>
								<!--end::Description-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Engage widget 1-->
					</div>
					<!--end:::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row g-xl-8">
					<!--begin:::Col-->
					<div class="col-xl-6">
						<!--begin::List Widget 2-->
						<div class="card card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Header-->
							<div class="card-header align-items-center border-0 mt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="fw-boldest text-dark fs-2">Types of Users visits Site</span>
								</h3>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-5" id="user_types">
							</div>
							<!--end::Body-->
						</div>
						<!--end::List Widget 2-->
					</div>
					<!--end:::Col-->
					<!--begin:::Col-->
					<div class="col-xl-6">
						<!--begin::List Widget 2-->
						<div class="card card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Header-->
							<div class="card-header align-items-center border-0 mt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="fw-boldest text-dark fs-2">Top Pages Visited</span>
									<span class="text-gray-400 mt-2 fw-bold fs-6">Max 10 results</span>
								</h3>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-5" id="top_pages">
							</div>
							<!--end::Body-->
						</div>
						<!--end::List Widget 2-->
					</div>
					<!--end:::Col-->
				</div>
				<!--end::Row-->
			</div>
			<!--end:::Col-->
		</div>
	</div>
	<!--end::Container-->
</div>
@endsection
@section('js')
<script>
	$(document).ready(function() {
		var from = $('#from').val();
		var to = $('#to').val();
		filter(from, to);
	});

	$(document).on('change', '#from', function() {
		var from = $('#from').val();
		var to = $('#to').val();
		filter(from, to);
	});

	$(document).on('change', '#to', function() {
		var from = $('#from').val();
		var to = $('#to').val();
		filter(from, to);
	});

	function filter(from, to) {
		$.ajax({
			url: "{{ url('admin/dashboard') }}",
			type: "POST",
			dataType: "json",
			data: {
				from: from,
				to: to,
				_token: '{{csrf_token()}}'
			},
			success: function(data) {
				$('#top_sale').empty();

				$('#current_total_returns').empty();
				$('#current_average_revenue').empty();
				$('#current_new_users').empty();
				$('#current_total_revenue').empty();

				$('#prev_total_returns').empty();
				$('#prev_average_revenue').empty();
				$('#prev_new_users').empty();
				$('#prev_total_revenue').empty();

				$('#top_products').empty();
				var top_sale = '';
				var top_products = '';
				var sources = '';
				var user_types = '';
				var top_pages = '';
				var carts = '';

				$.each(data['orders_to_show'], function(index, value) {
					top_sale += `
						<div class="d-flex align-items-center mb-7">
							<!--begin::Avatar-->
							<div class="symbol symbol-40px symbol-circle me-4">
								<span class="symbol-label bg-light-primary text-primary fw-boldest">` + value.first_letter + `</span>
							</div>
							<!--end::Avatar-->
							<!--begin::List content-->
							<div class="d-flex flex-column min-w-150px me-4">
								<a href="#" class="fw-boldest text-gray-800 text-hover-primary fs-4">` + value.user + `</a>
								<div class="fw-bold fs-6 text-gray-400">` + value.order_no + `</div>
							</div>
							<!--end::List content-->
							<!--begin::Price-->
							<div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">&#8377;` + value.amount + `</div>
							<!--end::Price-->
						</div>
					`;
				});

				$.each(data['traffic'], function(index, value) {
					sources += `
						<div class="d-flex flex-stack mb-7">
							<div class="d-flex align-items-center">
								<div class="ps-1">
									<div href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">` + value[0] + `</div>
									<div class="fs-7 text-gray-400 fw-bold mt-1">` + value[1] + `</div>
								</div>
							</div>
							<button class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">` + value[2] + `</button>
						</div>
					`;
				});


				$.each(data['top_sold_products'], function(index, value) {
					var url = "{{ url('') }}";
					var image = url + '/storage/products/variants/' + value.image;
					top_products += `
						<!--begin::Item-->
						<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-40px symbol-circle me-4">
									<span class="symbol-label bg-light-primary">
										<!--begin::Svg Icon | path: icons/duotone/Clothes/Crown.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<img src="` + image + `" alt="` + value.image + `" style="height: 4rem;border-radius: 10%;">
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="ps-1 mb-1">
									<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">` + value.name + `</a>
									<div class="text-gray-400 fw-bold">` + value.brand + `</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<span class="badge badge-light rounded-pill fs-7 fw-boldest">` + value.qty + `</span>
							<!--end::Label-->
						</div>
						<!--end::Item-->
					`;
				});

				$.each(data['toppages'], function(index, value) {
					var url = value['url'];
					var str = value['url'].length;
					if (str > 20) {
						url = url.slice(0, 17) + '...';
					}
					top_pages += `
						<div class="d-flex flex-stack mb-7">
							<div class="d-flex align-items-center">
								<div class="ps-1">
									<div href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">` + value['pageTitle'] + `</div>
									<div class="fs-7 text-gray-400 fw-bold mt-1">` + url + `</div>
								</div>
							</div>
							<button class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">` + value['pageViews'] + `</button>
						</div>
					`;
				});

				$.each(data['usertypes'], function(index, value) {
					user_types += `
						<div class="d-flex flex-stack mb-7">
							<div class="d-flex align-items-center">
								<div class="ps-1">
									<div href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">` + value['type'] + `</div>
								</div>
							</div>
							<button class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">` + value['sessions'] + `</button>
						</div>
					`;
				});

				$.each(data['carts'], function(index, value) {
					carts += `
						<div class="d-flex flex-stack mb-7">
							<div class="d-flex align-items-center">
								<div class="ps-1">
									<div href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">` + value['product']['item_shade_name'] + `</div>
									<div class="fs-7 text-gray-400 fw-bold mt-1">` + value['user']['name'] + `</div>
								</div>
							</div>
							<button class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">` + value['quantity'] + `</button>
						</div>
					`;
				});

				$('#top_sale').html(top_sale);
				$('#top_products').html(top_products);
				$('#traffic_sources').html(sources);
				$('#top_pages').html(top_pages);
				$('#user_types').html(user_types);
				$('#carts').html(carts);

				$('#current_total_returns').html(`Current: ` + data['current_total_return_qty']);
				$('#current_average_revenue').html(`Current: ` + data['current_avg_revenue']);
				$('#current_new_users').html(`Current: ` + data['current_new_users']);
				$('#current_total_revenue').html(`Current: ` + data['current_total_revenue']);

				$('#prev_total_returns').html(`Previous: ` + data['prev_total_return_qty']);
				$('#prev_average_revenue').html(`Previous: ` + data['prev_avg_revenue']);
				$('#prev_new_users').html(`Previous: ` + data['prev_new_users']);
				$('#prev_total_revenue').html(`Previous: ` + data['prev_total_revenue']);
			}
		});
	}
</script>
@endsection