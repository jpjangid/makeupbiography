@extends('backend.layouts.app')

@section('title','Add Product')
@section('header_title','Products')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
                        <h3 class="card-title">Add Product</h3>
                        <div class="card-body">
                            <div class="d-flex flex-stack px-9">
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                </div>
                                <ul class="nav nav-pills nav-line-pills border rounded p-1">
                                    <li class="nav-item me-2">
                                        <a class="nav-link btn btn-active-warning btn-active-color-warning-700 btn-color-warning-400 py-2 px-5 fs-6 fw-bold active" data-bs-toggle="tab" href="#kt_charts_widget_3_tab_pane_1" id="product_info_show">Product Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-warning btn-active-color-warning-700 btn-color-warning-400 py-2 px-5 fs-6 fw-bold" data-bs-toggle="tab" href="#kt_charts_widget_3_tab_pane_2" id="media_show">Product Media</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-warning btn-active-color-warning-700 btn-color-warning-400 py-2 px-5 fs-6 fw-bold" href="{{ url('admin/products') }}" >Back</a>
                                    </li>
                                </ul>
                                <!--end::Tabs-->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/products/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" id="product_info">
                                    <div class="row">
                                        <!-- Product Title -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="item_name">Product Name</label>
                                                <input type="text" class="form-control form-control-solid @error('item_name') is-invalid @enderror" name="item_name" id="item_name" placeholder="Please Enter Product Name" value="{{ old('item_name') }}">
                                                @error('item_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Product Variant Title -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="item_shade_name">Product Variant Name</label>
                                                <input type="text" class="form-control form-control-solid @error('item_shade_name') is-invalid @enderror" name="item_shade_name" id="item_shade_name" placeholder="Please Enter Product Variant Name" value="{{ old('item_shade_name') }}">
                                                @error('item_shade_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- slug -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="slug">Slug</label>
                                                <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug')}}" placeholder="Please enter slug of Product" />
                                                @error('slug')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- main brand -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="main_cat">Brand</label>
                                                <select name="brand" class="form-control form-control-solid @error('brand') is-invalid @enderror">
                                                    <option value="">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? "selected" : "" }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- main category -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="main_cat">Main Category</label>
                                                <select name="main_cat" id="main_cat" class="form-control form-control-solid">
                                                    <option value="">Select Main Category</option>
                                                    @foreach($main_cats as $main_cat)
                                                    <option value="{{ $main_cat->id }}">{{ $main_cat->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('main_cat')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- category -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="cat">Category</label>
                                                <select name="cat" id="cat" class="form-control form-control-solid">
                                                    <option value="">Select Category</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- sub category -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="sub_cat">Sub Category</label>
                                                <select name="sub_cat" id="sub_cat" class="form-control form-control-solid">
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Product Variant SKU -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="sku">SKU</label>
                                                <input type="text" class="form-control form-control-solid @error('sku') is-invalid @enderror" name="sku" id="sku" placeholder="Please Enter Product Variant SKU" value="{{ old('sku') }}">
                                                @error('sku')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Product Variant Hex -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="hex_code">Hex Code</label>
                                                <input type="text" class="form-control form-control-solid" name="hex_code" id="hex_code" placeholder="Please Enter Hex Code" value="{{ old('hex_code') }}">
                                            </div>
                                        </div>

                                        <!-- Product Variant Type -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="p_type">Product Type</label>
                                                <select name="p_type" class="form-select form-select-solid">
                                                    <option value="">Select Type</option>
                                                    <option value="Pieces" {{ old('p_type') == 'Pieces' ? 'selected' : '' }}>Pieces</option>
                                                    <option value="Ltrs" {{ old('p_type') == 'Ltrs' ? 'selected' : '' }}>Ltrs</option>
                                                    <option value="MLtrs" {{ old('p_type') == 'MLtrs' ? 'selected' : '' }}>MLtrs</option>
                                                    <option value="Grams" {{ old('p_type') == 'Grams' ? 'selected' : '' }}>Grams</option>
                                                    <option value="Shades" {{ old('p_type') == 'Shades' ? 'selected' : '' }}>Shades</option>
                                                    <option value="NOS" {{ old('p_type') == 'NOS' ? 'selected' : '' }}>NOS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Product Variant Hex -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="variation">Variation</label>
                                                <input type="text" class="form-control form-control-solid" name="variation" id="variation" placeholder="Please Enter Hex Code" value="{{ old('variation') }}">
                                            </div>
                                        </div>

                                        <!-- Product Variant Sequence -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="sequence">Product Sequence</label>
                                                <input type="text" class="form-control form-control-solid" name="main_sequence" id="sequence" placeholder="Please Enter Product Sequence" value="{{ old('sequence') }}">
                                            </div>
                                        </div>

                                        <!-- Product Variant Discount Type -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="discount_type">Product Discount Type</label>
                                                <select name="discount_type" class="form-select form-select-solid" id="dis_type">
                                                    <option value="">Select Type</option>
                                                    <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                                    <option value="flat" {{ old('discount_type') == 'flat' ? 'selected' : '' }}>Flat</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Product Variant Discount -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="discount">Product Discount</label>
                                                <input type="text" class="form-control form-control-solid" name="discount" id="discount" placeholder="Please Enter Product Discount" value="{{ old('discount') }}">
                                            </div>
                                        </div>

                                        <!-- Product Variant Regular Price -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="regular_price">Product Regular Price</label>
                                                <input type="text" class="form-control form-control-solid" name="regular_price" id="regular_price" placeholder="Please Enter Product Regular Price" value="{{ old('regular_price') }}">
                                            </div>
                                        </div>

                                        <!-- Product Variant Sale Price -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="sale_price">Product Sale Price</label>
                                                <input type="text" class="form-control form-control-solid" name="sale_price" id="sale_price" placeholder="Please Enter Product Sale Price" value="{{ old('sale_price') }}">
                                            </div>
                                        </div>


                                        <!-- short_description -->
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="short_description">Short Description</label>
                                                <textarea rows="4" cols="" class="form-control form-control-solid @error('short_description') is-invalid @enderror" name="short_description" placeholder="Please enter Short Description">{{ old('short_description')}}</textarea>
                                                @error('short_description')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="required form-label" for="description">Detail Description</label>
                                                <textarea id="summernote" class="form-control form-control-solid @error('description') is-invalid @enderror" name="description"><?php echo old('description'); ?></textarea>
                                                @error('description')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Meta Section</h4>

                                        <!-- Meta Title -->
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="meta_title">Meta Title</label>
                                                <input type="text" class="form-control form-control-solid @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title')}}" placeholder="Please Enter Meta Title" />
                                                @error('meta_title')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- keywords -->
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="keywords">Keywords</label>
                                                <input type="text" class="form-control form-control-solid @error('keywords') is-invalid @enderror" name="keywords" id="keywords" value="{{ old('keywords')}}" placeholder="Please Enter keywords" />
                                                @error('keywords')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- meta_description -->
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="meta_description">Meta Description</label>
                                                <textarea rows="4" cols="" class="form-control form-control-solid @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="Please enter Meta Description">{{ old('meta_description')}}</textarea>
                                                @error('meta_description')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>OG Section</h4>

                                        <!-- OG Title -->
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="og_title">OG Title</label>
                                                <input type="text" class="form-control form-control-solid @error('og_title') is-invalid @enderror" name="og_title" value="{{ old('og_title')}}" placeholder="Please Enter OG Title" />
                                                @error('og_title')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Product image -->
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="og_image">OG Image</label>
                                                <input type="file" name="og_image" class="form-control @error('og_image') is-invalid @enderror" id="exampleInputFile">
                                                @error('og_image')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- OG description -->
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="og_description">OG Description</label>
                                                <textarea rows="4" cols="" class="form-control form-control-solid @error('og_description') is-invalid @enderror" name="og_description" placeholder="Please enter OG Description">{{ old('og_description')}}</textarea>
                                                @error('og_description')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- tags -->
                                        <div class="col-md-5 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="tags">Tags</label>
                                                <select class="form-select form-select-solid @error('tags') is-invalid @enderror" data-control="select2" data-placeholder="Select a Tags" data-allow-clear="true" multiple="multiple" name="tags[]">
                                                    <option></option>
                                                    <option value="newest" {{ !empty(old('tags')) && in_array("newest",old('tags')) ? "selected" : "" }}>Newest</option>
                                                    <option value="popular" {{ !empty(old('tags')) && in_array("popular",old('tags')) ? "selected" : "" }}>Popular</option>
                                                    <option value="category" {{ !empty(old('tags')) && in_array("category",old('tags')) ? "selected" : "" }}>Category</option>
                                                    <option value="brand" {{ !empty(old('tags')) && in_array("brand",old('tags')) ? "selected" : "" }}>Brand</option>
                                                    <option value="big discount" {{ !empty(old('tags')) && in_array("big discount",old('tags')) ? "selected" : "" }}>Big Discount</option>
                                                </select>
                                                @error('tags')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- labels -->
                                        <div class="col-md-5 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="label_name">Label</label>
                                                <select class="form-select form-select-solid @error('label_name') is-invalid @enderror" name="label_name">
                                                    <option>Select Label</option>
                                                    @foreach($labels as $label)
                                                    <option value="{{ $label->name }}" {{ old('label_name') == $label->name ? "selected" : "" }}>{{ $label->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('label_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-2 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="customSwitch1">Product Status</label>
                                                <div class="form-check form-switch form-check-custom form-check-solid">
                                                    <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2" id="media">
                                    <h4>Product Media</h4>
                                    <table class="table table-row-bordered text-nowrap" id="media_tbl">
                                        <thead>
                                            <tr>
                                                <th>Media Type</th>
                                                <th>Media</th>
                                                <th>Alt title</th>
                                                <th>Sequence</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="media_type[]" class="form-select form-select-solid media_type">
                                                        <option value="image">Image</option>
                                                        <option value="video">Video Link</option>
                                                    </select>
                                                </td>
                                                <td class="media_td">
                                                    <input type="file" name="media[]" class="form-control" required>
                                                </td>
                                                <td>
                                                    <input type="text" name="media_alt[]" class="form-control" placeholder="Enter Alt Title">
                                                </td>
                                                <td>
                                                    <input type="number" name="sequence[]" class="form-control" placeholder="Enter Sequence">
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm add_row">Add</a>
                                                    <a class="btn btn-danger btn-sm delete_row">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary" style="float: right;">Next</button>
                            <a href="{{ url('admin/products') }}" class="btn btn-active-light-danger"> Back </a>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
    // Init Select2 --- more info: https://select2.org/
    $(document).ready(function() {
        $('#product_info').show();
        $('#media').hide();
    });

    $(document).on('click', '#product_info_show', function() {
        $('#product_info').show();
        $('#media').hide();
    });

    $(document).on('click', '#media_show', function() {
        $('#product_info').hide();
        $('#media').show();
    });
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

    $(document).on('change', '#main_cat', function() {
        var id = this.value;
        $.ajax({
            url: "{{ url('admin/products/cat') }}",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                $('#cat').empty();
                $('#sub_cat').empty();
                $('#cat').append('<option value="">Select Category</option>');
                $('#sub_cat').append('<option value="">Select Sub Category</option>');
                data.forEach(element =>
                    $('#cat').append('<option value="' + element.id + '">' + element.name + '</option>')
                );
            }
        });
    });

    $(document).on('change', '#cat', function() {
        var id = this.value;
        $.ajax({
            url: "{{ url('admin/products/cat') }}",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                $('#sub_cat').empty();
                $('#sub_cat').append('<option value="">Select Sub Category</option>');
                data.forEach(element =>
                    $('#sub_cat').append('<option value="' + element.id + '">' + element.name + '</option>')
                );
            }
        });
    });

    $(document).on('click', '.add_row', function() {
        var table = $('#media_tbl'),
            lastRow = table.find('tbody tr:last'),
            rowClone = lastRow.clone();
        rowClone.find("input").val("").end();
        table.find('tbody').append(rowClone);
    });

    $(document).on('click', '.delete_row', function() {
        var rowCount = $('#media_tbl tbody tr').length;
        if (rowCount > 1) {
            $(this).closest('tr').remove();
        }
    });

    $(document).on('change', '.media_type', function() {
        var type = $(this).val();
        var row = $(this).closest("tr");
        if (type == 'video') {
            row.find('.media_td').empty();
            row.find('.media_td').html('<input type="text" class="form-control form-control-solid" name="media1[]" id="sale_price" placeholder="Please Enter Video Link" required>');
        } else {
            row.find('.media_td').empty();
            row.find('.media_td').html('<input type="file" name="media[]" class="form-control" required>');
        }
    });

    $(document).on('change', '#regular_price', function() {
        var dis_type = $('#dis_type').val();
        var dis = $('#discount').val();
        var price = $('#regular_price').val();
        discount_amt(dis_type, dis, price);
    });

    $(document).on('change', '#dis_type', function() {
        var dis_type = $('#dis_type').val();
        var dis = $('#discount').val();
        var price = $('#regular_price').val();
        discount_amt(dis_type, dis, price);
    });

    $(document).on('change', '#discount', function() {
        var dis_type = $('#dis_type').val();
        var dis = $('#discount').val();
        var price = $('#regular_price').val();
        discount_amt(dis_type, dis, price);
    });

    function discount_amt(dis_type, dis, price) {
        var amt = 0;

        if (dis_type != '' && dis != '' && price != '') {
            if (dis_type == 'percentage') {
                amt = price - ((price * dis) / 100);
                $('#sale_price').val(amt);
            } else {
                if (dis < price) {
                    amt = price - dis;
                    $('#sale_price').val(amt);
                } else {
                    alert('Please Enter Correct Discount');
                    $('#discount').val('');
                }
            }
        } else {
            $('#sale_price').val(price);
        }
    }
</script>
@endsection