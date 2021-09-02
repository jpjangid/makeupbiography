@extends('backend.layouts.app')

@section('title','Edit Product Variants')

@section('content')

<!-- alerts start -->
@if ($message = Session::get('success'))
<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h5 class="mb-1">Success</h5>
        <span>{{ $message }}</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <span class="svg-icon svg-icon-2x svg-icon-light" style="color:white !important"><i class="fas fa-times"></i></i></span>
    </button>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h5 class="mb-1">Danger</h5>
        <span>{{ $message }}</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <span class="svg-icon svg-icon-2x svg-icon-light" style="color:white !important"><i class="fas fa-times"></i></i></span>
    </button>
</div>
@endif
<!-- alerts end -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product Variants</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/products/variants/update',$id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <!-- Product Variant Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Name</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Product Variant Name" value="{{ $variant->name }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Variant SKU -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="sku">SKU</label>
                                        <input type="text" class="form-control form-control-solid @error('sku') is-invalid @enderror" name="sku" id="sku" placeholder="Please Enter Product Variant SKU" value="{{ $variant->sku }}">
                                        @error('sku')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Variant Hex -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="hex_code">Hex Code</label>
                                        <input type="text" class="form-control form-control-solid" name="hex_code" id="hex_code" placeholder="Please Enter Hex Code" value="{{ $variant->hex_code }}">
                                    </div>
                                </div>

                                <!-- Product Variant Type -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="p_type">Product Type</label>
                                        <select name="p_type" class="form-select form-select-solid">
                                            <option value="">Select Type</option>
                                            <option value="pieces" {{ $variant->p_type == 'pieces' ? 'selected' : '' }} >Pieces</option>
                                            <option value="ltrs" {{ $variant->p_type == 'ltrs' ? 'selected' : '' }} >Ltrs</option>
                                            <option value="mltrs" {{ $variant->p_type == 'mltrs' ? 'selected' : '' }} >MLtrs</option>
                                            <option value="grams" {{ $variant->p_type == 'grams' ? 'selected' : '' }} >Grams</option>
                                            <option value="shades" {{ $variant->p_type == 'shades' ? 'selected' : '' }} >Shades</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Product Variant Hex -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="variation">Variation</label>
                                        <input type="text" class="form-control form-control-solid" name="variation" id="variation" placeholder="Please Enter Hex Code" value="{{ $variant->variation }}">
                                    </div>
                                </div>

                                <!-- Product Variant Sequence -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="sequence">Product Sequence</label>
                                        <input type="text" class="form-control form-control-solid" name="main_sequence" id="sequence" placeholder="Please Enter Product Sequence" value="{{ $variant->sequence }}">
                                    </div>
                                </div>

                                <!-- Product Variant Discount Type -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="discount_type">Product Discount Type</label>
                                        <select name="discount_type" class="form-select form-select-solid" id="dis_type">
                                            <option value="">Select Type</option>
                                            <option value="percentage" {{ $variant->discount_type == 'percentage' ? 'selected' : '' }} >Percentage</option>
                                            <option value="flat" {{ $variant->discount_type == 'flat' ? 'selected' : '' }} >Flat</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Product Variant Discount -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Product Discount</label>
                                        <input type="text" class="form-control form-control-solid" name="discount" id="discount" placeholder="Please Enter Product Discount" value="{{ $variant->discount }}">
                                    </div>
                                </div>

                                <!-- Product Variant Regular Price -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="regular_price">Product Regular Price</label>
                                        <input type="text" class="form-control form-control-solid" name="regular_price" id="regular_price" placeholder="Please Enter Product Regular Price" value="{{ $variant->regular_price }}">
                                    </div>
                                </div>

                                <!-- Product Variant Sale Price -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="sale_price">Product Sale Price</label>
                                        <input type="text" class="form-control form-control-solid" name="sale_price" id="sale_price" placeholder="Please Enter Product Sale Price" value="{{ $variant->sale_price }}">
                                    </div>
                                </div>

                                <!-- Product Variant Slug -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="slug">Slug</label>
                                        <input type="text" class="form-control form-control-solid" name="slug" id="slug" placeholder="Please Enter Slug" value="{{ $variant->slug }}">
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4>Product Media</h4>
                                    <table class="table table-row-bordered text-nowrap" id="media_tbl">
                                        <thead>
                                            <tr>
                                                <th>Media Type</th>
                                                <th>Media</th>
                                                <th>Media Alt</th>
                                                <th>Sequence</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($variant->medias as $media)
                                                <tr>
                                                    <td>{{ ucfirst($media->media_type) }}</td>
                                                    <td>
                                                        @if($media->media_type == 'image')
                                                            <img src="{{ asset('storage/products/variants/'.$media->media) }}" style="height: 10rem;width: 10rem;">
                                                        @else
                                                            {{$media->media}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $media->media_alt }}</td>
                                                    <td>{{ $media->sequence }}</td>
                                                    <td><a href="{{ url('admin/products/deletemedia',$media->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <select name="media_type[]" class="form-select form-select-solid media_type">
                                                        <option value="image">Image</option>
                                                        <option value="video">Video Link</option>
                                                    </select>
                                                </td>
                                                <td class="media_td">
                                                    <input type="file" name="media[]" class="form-control">
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
                            <button type="submit" class="btn btn-light-primary mb-2" style="float: right;">Update</button>
                            <a href="{{ url('admin/products/variants',$variant->product_id) }}" class="btn btn-light-warning" >Back</a>
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