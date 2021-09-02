@extends('backend.layouts.app')

@section('title','Add Coupon')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/coupons/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Coupon Name</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Coupon Name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="code">Coupon Code</label>
                                        <input type="text" class="form-control form-control-solid @error('code') is-invalid @enderror" name="code" id="code" placeholder="Please Enter Coupon Code" value="{{ old('code') }}">
                                        @error('code')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="type">Coupon Type</label>
                                        <select name="type" id="type" class="form-select form-select-solid @error('type') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="cart_value_discount" {{ old('type') == 'cart_value_discount' ? 'selected' : '' }} >Cart Value Discount</option>
                                            <option value="referral_discount" {{ old('type') == 'referral_discount' ? 'selected' : '' }} >Referral Discount</option>
                                            <option value="personal_code" {{ old('type') == 'personal_code' ? 'selected' : '' }} >Personal Code Discount</option>
                                            <option value="customer_based" {{ old('type') == 'customer_based' ? 'selected' : '' }} >Customer Based Discount</option>
                                            <option value="global" {{ old('type') == 'global' ? 'selected' : '' }} >Global Discount</option>
                                            <option value="merchandise" {{ old('type') == 'merchandise' ? 'selected' : '' }} >Merchandise Discount</option>
                                        </select>
                                        @error('type')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4" id="brand_id">
                                    <div class="form-group">
                                        <label class="form-label" for="brand_id">Brand</label>
                                        <select name="brand_id" class="form-select form-select-solid">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4" id="main_cat_id">
                                    <div class="form-group">
                                        <label class="form-label" for="main_cat_id">Main Category</label>
                                        <select name="main_cat_id" class="form-select form-select-solid">
                                            <option value="">Select Main Category</option>
                                            @foreach($main_cats as $main_cat)
                                            <option value="{{ $main_cat->id }}">{{ $main_cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4" id="cat_id">
                                    <div class="form-group">
                                        <label class="form-label" for="cat_id">Category</label>
                                        <select name="cat_id" class="form-select form-select-solid">
                                            <option value="">Select Category</option>
                                            @foreach($cats as $cat)
                                            <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4" id="sub_cat_id">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_cat_id">Sub Category</label>
                                        <select name="sub_cat_id" class="form-select form-select-solid">
                                            <option value="">Select Sub Category</option>
                                            @foreach($sub_cats as $sub_cat)
                                            <option value="{{ $sub_cat['id'] }}">{{ $sub_cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4" id="product_id">
                                    <div class="form-group">
                                        <label class="form-label" for="product_id">Product</label>
                                        <select name="product_id" class="form-select form-select-solid">
                                            <option value="">Select Product</option>
                                            @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4" id="user_id">
                                    <div class="form-group">
                                        <label class="form-label" for="user_id">Customer</label>
                                        <select name="user_id" class="form-select form-select-solid">
                                            <option value="">Select Customer</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="min_order_amount">Min Order Amount</label>
                                        <input type="text" class="form-control form-control-solid" name="min_order_amount" id="min_order_amount" placeholder="Please Enter Min Order Amount" value="{{ old('min_order_amount') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="max_order_amount">Max Order Amount</label>
                                        <input type="text" class="form-control form-control-solid" name="max_order_amount" id="max_order_amount" placeholder="Please Enter Max Order Amount" value="{{ old('max_order_amount') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="offer_start">Offer Start</label>
                                        <input type="datetime-local" class="form-control form-control-solid" name="offer_start" id="offer_start" placeholder="Please Enter Offer Start" value="{{ old('offer_start') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="offer_end">Offer End</label>
                                        <input type="datetime-local" class="form-control form-control-solid" name="offer_end" id="offer_end" placeholder="Please Enter Offer End" value="{{ old('offer_end') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="days">Week Days</label>
                                        <select name="days[]" id="days" class="form-select form-select-solid select2" multiple>
                                            <option value="Sunday" {{ old('days') == 'Sunday' ? 'seleted' : '' }} >Sunday</option>
                                            <option value="Monday" {{ old('days') == 'Monday' ? 'seleted' : '' }} >Monday</option>
                                            <option value="Tuesday" {{ old('days') == 'Tuesday' ? 'seleted' : '' }} >Tuesday</option>
                                            <option value="Wednesday" {{ old('days') == 'Wednesday' ? 'seleted' : '' }} >Wednesday</option>
                                            <option value="Thursday" {{ old('days') == 'Thursday' ? 'seleted' : '' }} >Thursday</option>
                                            <option value="Friday" {{ old('days') == 'Friday' ? 'seleted' : '' }} >Friday</option>
                                            <option value="Saturday" {{ old('days') == 'Saturday' ? 'seleted' : '' }} >Saturday</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="coupon_limit">Coupon Limit</label>
                                        <input type="text" class="form-control form-control-solid" name="coupon_limit" id="coupon_limit" placeholder="Please Enter Offer End" value="{{ old('coupon_limit') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="disc_type">Discount Type</label>
                                        <select name="disc_type" id="disc_type" class="form-select form-select-solid">
                                            <option value="">Select </option>
                                            <option value="percent" {{ old('disc_type') == 'percent' ? 'selected' : '' }} >In Percent</option>
                                            <option value="amount" {{ old('disc_type') == 'amount' ? 'selected' : '' }} >In Amount</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Discount</label>
                                        <input type="text" class="form-control form-control-solid" name="discount" id="discount" placeholder="Please Enter Offer End" value="{{ old('discount') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="show_in_front">Show In Front</label>
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input h-40px w-60px" type="checkbox" name="show_in_front" value="1" id="show_in_front" checked />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-light-primary" style="float: right;">Add Coupon</button>
                            <a href="{{ url('admin/coupons') }}" class="btn btn-light-danger"> Cancel </a>
                        </div>

                    </form>
                </div>
            </div>
            <!--/.col (left) -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('js')
<script>
    $(document).ready(function() {

        $('.select2').select2({
            placeholder: "Select Week Days",
            allowClear: true
        });

        var type = '';
        input_show_hide(type);
    });

    $(document).on('change','#type', function () {
        var type = $(this).val();
        input_show_hide(type);
    });

    function input_show_hide(type) {
        if(type == 'merchandise'){
            $('#brand_id').show();
            $('#main_cat_id').show();
            $('#cat_id').show();
            $('#sub_cat_id').show();
            $('#product_id').show();
            $('#user_id').hide();
        }else if(type == 'customer_based' || type == 'personal_code'){
            $('#user_id').show();
            $('#brand_id').hide();
            $('#main_cat_id').hide();
            $('#cat_id').hide();
            $('#sub_cat_id').hide();
            $('#product_id').hide();
        }else{
            $('#brand_id').hide();
            $('#main_cat_id').hide();
            $('#cat_id').hide();
            $('#sub_cat_id').hide();
            $('#product_id').hide();
            $('#user_id').hide();
        }
    }
</script>
@endsection