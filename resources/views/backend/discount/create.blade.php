@extends('backend.layouts.app')

@section('title','Add Discount')

@section('css')
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> -->
<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        /* cursor: pointer; */
        /* display: block; */
        height: 40px;
        user-select: none;
        -webkit-user-select: none;
    }
</style>
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
                        <h3 class="card-title">Add Discount</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/discounts/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <!-- Category Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Discount On</label>
                                        <select class="form-control form-control-solid @error('name') is-invalid @enderror" name="discount_on" id="discount_on">
                                            <option value="" selected>Select Discount On</option>
                                            <option value="1">Brand</option>
                                            <option value="2">Caetgory</option>
                                            <option value="3">Product</option>
                                            <option value="4">All</option>
                                        </select>
                                        @error('discount_on')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Discount On</label>
                                        <select class="form-select @error('name') is-invalid @enderror" name="entity_id" id="entity_id" data-control="select2">
                                            <option value="" selected>Select Discount On</option>
                                        </select>
                                        @error('discount_on')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 exclusion" hidden="hidden">
                                    <div class="form-group">
                                        <label class="required form-label" for="brand_exclusion">Brand Exclusion</label>
                                        <select class="form-select @error('brand_exclusion') is-invalid @enderror" name="brand_exclusion[]" id="brand_exclusion" data-control="select2" multiple>
                                            <option value="" selected>Select Discount On</option>
                                        </select>
                                        @error('brand_exclusion')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 exclusion" hidden="hidden">
                                    <div class="form-group">
                                        <label class="required form-label" for="products_exclusion">Product Exclusion</label>
                                        <select class="form-select @error('products_exclusion') is-invalid @enderror" name="products_exclusion[]" id="products_exclusion" data-control="select2" multiple>
                                            <option value="" selected>Select Discount On</option>
                                        </select>
                                        @error('products_exclusion')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Product Variant Discount Type -->
                                <!-- <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="discount_type">Product Discount Type</label>
                                        <select name="discount_type" class="form-select form-select-solid" id="dis_type">
                                            <option value="">Select Type</option>
                                            <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                            <option value="flat" {{ old('discount_type') == 'flat' ? 'selected' : '' }}>Flat</option>
                                        </select>
                                    </div>
                                </div> -->

                                <!-- Product Variant Discount -->
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Product Discount</label>
                                        <input type="text" class="form-control form-control-solid" name="discount" id="discount" placeholder="Please Enter Discount" value="{{ old('discount') }}">
                                    </div>
                                </div>
                                <!-- Product Variant Discount -->
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Start Date</label>
                                        <input class="form-control form-control-solid" name="start_date" placeholder="Select Discount Start Date" id="kt_datepicker_34" />
                                    </div>
                                </div>
                                <!-- Product Variant Discount -->
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="start">End Date</label>
                                        <input class="form-control form-control-solid" name="end_date" placeholder="Select Discount Start Date" id="kt_datepicker_2" />
                                    </div>
                                </div>


                                <!-- Status
                                <div class="col-md-2 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="customSwitch1">Category Status</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1">
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Add</button>
                            <a href="{{ url('admin/discounts') }}" class="btn btn-active-light-danger"> Cancel </a>
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
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> -->

<!-- Page specific script -->
<!-- <script type="text/javascript">
    $(document).on('keydown', '#keywords', function() {
        if ($('#keywords').val() != "") {
            var keywords = $('#keywords').val();
            keywords = keywords.replace(/\s/g, ",");
            $('#keywords').val(keywords);
        }
    });

    $(document).on('keydown', '#tags', function() {
        if ($('#tags').val() != "") {
            var tags = $('#tags').val();
            tags = tags.replace(/\s/g, ",");
            $('#tags').val(tags);
        }
    });
</script> -->
<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
<script>
    $(document).on('change', '#discount_on', function() {
        var id = this.value;
        $.ajax({
            url: "{{ url('admin/discounts/discounton') }}",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                $('#entity_id').empty();
                $('#entity_id').append('<option value="">Select Entity</option>');
                if (data.discounton == 'brand') {
                    let data_array = [];
                    data_array.push(data);
                    data_array.forEach(element => {
                        element.cat?.map((res) => {
                            $('#entity_id').append('<option value="' + res.id + '">' + res.name + '</option>')
                        })
                    });
                } else if (data.discounton == 'category') {
                    $('#brand_exclusion').empty();
                    $('#brand_exclusion').append('<option value="">Select Entity</option>');
                    $('#products_exclusion').empty();
                    $('#products_exclusion').append('<option value="">Select Entity</option>');
                    let data_array = [];
                    data_array.push(data);
                    data_array.forEach(element => {
                        element.cat?.map((res) => {
                            $('#entity_id').append('<option value="' + res.id + '">' + res.name + '</option>')
                        })
                    });
                    data_array.forEach(element => {
                        element.brand?.map((res) => {
                            $('#brand_exclusion').append('<option value="' + res.id + '">' + res.name + '</option>')
                        })
                    });
                    data_array.forEach(element => {
                        element.product?.map((res) => {
                            $('#products_exclusion').append('<option value="' + res.id + '">' + res.item_name + '</option>')
                        })
                    });
                } else if (data.discounton == 'product') {
                    let data_array = [];
                    data_array.push(data);
                    data_array.forEach(element => {
                        element.cat?.map((res) => {
                            $('#entity_id').append('<option value="' + res.id + '">' + res.item_name + '</option>')
                        })
                    });
                }

            }
        });
    });
</script>
<script>
    $("#kt_datepicker_2").flatpickr();
    $("#kt_datepicker_34").flatpickr();

    $('body').on('change', '#discount_on', function() {
        if ($(this).val() != "" && $(this).val() != "2") {
            $(".exclusion").attr("hidden", "hidden");

        } else {
            $('.exclusion').removeAttr('hidden');
            // $("#panno").val("");
        }
    });
</script>
@endsection