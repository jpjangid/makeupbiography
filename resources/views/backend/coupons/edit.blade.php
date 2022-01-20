@extends('backend.layouts.app')

@section('title','Update Coupon')

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
                        <h3 class="card-title">Update Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/coupons/update', $coupon->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Coupon Name</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Coupon Name" value="{{ $coupon->name }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="code">Coupon Code</label>
                                        <input type="text" class="form-control form-control-solid @error('code') is-invalid @enderror" name="code" id="code" placeholder="Please Enter Coupon Code" value="{{ $coupon->code }}">
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
                                            <option value="cart_value_discount" {{ $coupon->type == 'cart_value_discount' ? 'selected' : '' }}>Cart Value Discount</option>
                                            <option value="referral_discount" {{ $coupon->type == 'referral_discount' ? 'selected' : '' }}>Referral Discount</option>
                                            <option value="personal_code" {{ $coupon->type == 'personal_code' ? 'selected' : '' }}>Personal Code Discount</option>
                                            <option value="customer_based" {{ $coupon->type == 'customer_based' ? 'selected' : '' }}>Customer Based Discount</option>
                                            <option value="global" {{ $coupon->type == 'global' ? 'selected' : '' }}>Global Discount</option>
                                            <option value="merchandise" {{ $coupon->type == 'merchandise' ? 'selected' : '' }}>Merchandise Discount</option>
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
                                            @php
                                            $selected = '';
                                            $selected = $brand->id == $coupon->brand_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $brand->id }}" {{ $selected }}>{{ $brand->name }}</option>
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
                                            @php
                                            $selected = '';
                                            $selected = $main_cat['id'] == $coupon->main_cat_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $main_cat->id }}" {{ $selected }}>{{ $main_cat->name }}</option>
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
                                            @php
                                            $selected = '';
                                            $selected = $cat['id'] == $coupon->cat_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $cat['id'] }}" {{ $selected }}>{{ $cat['name'] }}</option>
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
                                            @php
                                            $selected = '';
                                            $selected = $sub_cat['id'] == $coupon->sub_cat_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $sub_cat['id'] }}" {{ $selected }}>{{ $sub_cat['name'] }}</option>
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
                                            @php
                                            $selected = '';
                                            $selected = $product->id == $coupon->product_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $product->id }}" {{ $selected }}>{{ $product->item_shade_name }}</option>
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
                                            @php
                                            $selected = '';
                                            $selected = $user->id == $coupon->user_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $user->id }}" {{ $selected }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="min_order_amount">Min Order Amount</label>
                                        <input type="text" class="form-control form-control-solid" name="min_order_amount" id="min_order_amount" placeholder="Please Enter Min Order Amount" value="{{ $coupon->min_order_amount }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="max_order_amount">Max Order Amount</label>
                                        <input type="text" class="form-control form-control-solid" name="max_order_amount" id="max_order_amount" placeholder="Please Enter Max Order Amount" value="{{ $coupon->max_order_amount }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="offer_start">Offer Start</label>
                                        <input type="datetime-local" class="form-control form-control-solid" name="offer_start" id="offer_start" placeholder="Please Enter Offer Start" value="{{ date('Y-m-d\TH:i:s', strtotime($coupon->offer_start))  }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="offer_end">Offer End</label>
                                        <input type="datetime-local" class="form-control form-control-solid" name="offer_end" id="offer_end" placeholder="Please Enter Offer End" value="{{ date('Y-m-d\TH:i:s', strtotime($coupon->offer_end)) }}">
                                    </div>
                                </div>

                                @php $days = explode(',',$coupon->days); @endphp
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="days">Week Days</label>
                                        <select name="days[]" id="days" class="form-select form-select-solid select2" multiple>
                                            <option value="Sunday" {{ in_array('Sunday', $days) == true ? 'selected' : '' }}>Sunday</option>
                                            <option value="Monday" {{ in_array('Monday', $days) == true ? 'selected' : '' }}>Monday</option>
                                            <option value="Tuesday" {{ in_array('Tuesday', $days) == true ? 'selected' : '' }}>Tuesday</option>
                                            <option value="Wednesday" {{ in_array('Wednesday', $days) == true ? 'selected' : '' }}>Wednesday</option>
                                            <option value="Thursday" {{ in_array('Thursday', $days) == true ? 'selected' : '' }}>Thursday</option>
                                            <option value="Friday" {{ in_array('Friday', $days) == true ? 'selected' : '' }}>Friday</option>
                                            <option value="Saturday" {{ in_array('Saturday', $days) == true ? 'selected' : '' }}>Saturday</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="coupon_limit">Coupon Limit</label>
                                        <input type="text" class="form-control form-control-solid" name="coupon_limit" id="coupon_limit" placeholder="Please Enter Offer End" value="{{ $coupon->coupon_limit }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="disc_type">Discount Type</label>
                                        <select name="disc_type" id="disc_type" class="form-select form-select-solid">
                                            <option value="">Select </option>
                                            <option value="percent" {{ $coupon->disc_type == 'percent' ? 'selected' : '' }}>In Percent</option>
                                            <option value="amount" {{ $coupon->disc_type == 'amount' ? 'selected' : '' }}>In Amount</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Discount</label>
                                        <input type="text" class="form-control form-control-solid" name="discount" id="discount" placeholder="Please Enter Offer End" value="{{ $coupon->discount }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="show_in_front">Show In Front</label>
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input h-40px w-60px" type="checkbox" name="show_in_front" value="1" id="show_in_front" {{ $coupon->show_in_front == '1' ? 'checked' : '' }} />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-light-primary" style="float: right;">Update Coupon</button>
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

        var type = $('#type').val();
        input_show_hide(type);
    });

    $(document).on('change', '#type', function() {
        var type = $(this).val();
        input_show_hide(type);
    });

    function input_show_hide(type) {
        if (type == 'merchandise') {
            $('#brand_id').show();
            $('#main_cat_id').show();
            $('#cat_id').show();
            $('#sub_cat_id').show();
            $('#product_id').show();
            $('#user_id').hide();
        } else if (type == 'customer_based' || type == 'personal_code') {
            $('#user_id').show();
            $('#brand_id').hide();
            $('#main_cat_id').hide();
            $('#cat_id').hide();
            $('#sub_cat_id').hide();
            $('#product_id').hide();
        } else {
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