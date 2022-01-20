@extends('backend.layouts.app')

@section('title','Add Related Product')
@section('css')
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
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
                        <h3 class="card-title">Add Related Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/related_products/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <!-- Blog Title -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="main_id">Main Product</label>
                                        <select name="main_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Main Product">
                                            <option></option>
                                            @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->item_shade_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

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
                                            <tr>
                                                <td>
                                                    <select name="related_products[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Related Product">
                                                        <option></option>
                                                        @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->item_shade_name }}</option>
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
                            <button type="submit" class="btn btn-light-primary" style="float: right;">Add</button>
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
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
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