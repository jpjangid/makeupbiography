@extends('backend.layouts.app')

@section('title','Edit Related Product')

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
                        <h3 class="card-title">Edit Related Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">

                            <!-- Blog Title -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label class="required form-label" for="main_id">Main Product</label>
                                    <input type="text" value="{{ $main_product->main->name }}" class="form-control form-control-solid" disabled>
                                </div>
                            </div>

                            <h4>Update Related Product</h4>
                            <div class="col-md-12">
                                <table class="table table-row-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Related Product</th>
                                            <th>Sequence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($related_products as $related_product)
                                            <form action="{{ url('admin/related_products/update', $related_product->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <tr>
                                                    <td>
                                                        <select name="related_id" class="form-select form-select-solid">
                                                            <option value="">Select Related Product</option>
                                                            @foreach($products as $product)
                                                                @php
                                                                    $selected = $product->id === $related_product->related_id ? 'selected' : '';
                                                                @endphp
                                                                <option value="{{ $product->id }}" {{$selected}}>{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="sequence" class="form-control form-control-solid" value="{{ $related_product->sequence }}">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm">Update</button>
                                                        <a class="btn btn-danger btn-sm" href="{{ url('admin/related_products/delete', $related_product->id) }}" role="button"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <h4>Add New Related Product</h4>
                            <form action="{{ url('admin/related_products/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <table class="table table-row-bordered text-nowrap" id="relatedtbl">
                                        <thead>
                                            <tr>
                                                <th>Related Product</th>
                                                <th>Sequence</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="main_id" value="{{ $main_product->main_id }}">
                                            <tr>
                                                <td>
                                                    <select name="related_products[]" class="form-select form-select-solid">
                                                        <option value="">Select Related Product</option>
                                                        @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="sequence[]" class="form-control form-control-solid">
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm add_row" role="button"><i class="fa fa-plus"></i></a>
                                                    <a class="btn btn-danger btn-sm delete_row" role="button"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-light-primary" style="float: right;">Add Related Product</button>
                        <a href="{{ url('admin/related_products') }}" class="btn btn-light-danger"> Cancel </a>
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
        var table = $('#relatedtbl'),
            lastRow = table.find('tbody tr:last'),
            rowClone = lastRow.clone();
        rowClone.find("input").val("").end();
        table.find('tbody').append(rowClone);
    });

    $(document).on('click', '.delete_row', function() {
        var rowCount = $('#relatedtbl tbody tr').length;
        if (rowCount > 1) {
            $(this).closest('tr').remove();
        }
    });
</script>
@endsection