@extends('backend.layouts.app')

@section('title','Edit Label')

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
                        <h3 class="card-title">Edit Label</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/labels/update', $label->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <!-- Label Name -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Label</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Label name" value="{{ $label->name }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="customSwitch1">Label Status</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1" {{ $label->status == 1 ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Update Label</button>
                            <a href="{{ url('admin/labels') }}" class="btn btn-active-light-danger"> Cancel </a>
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
