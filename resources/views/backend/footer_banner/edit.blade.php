@extends('backend.layouts.app')

@section('title','Edit Footer Banner')

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
                        <h3 class="card-title">Edit Footer Banner</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/footer/banners/update', $footer->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <!-- Footer Banner image -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="featured_image">Footer Image</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="exampleInputFile">
                                        @error('image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                @if(!empty($footer->image))    
                                <!-- Featured Image Preview -->
                                <div class="col-md-2 ml-2">
                                    <div class="form-group">
                                        <label class="form-label" for="featured_image">Footer Image Preview</label>
                                        <br>
                                        <img src="{{ asset('storage/footer_images/'.$footer->image) }}" alt="{{ $footer->alt }}" style="height:4rem;width:12rem;">
                                    </div>
                                </div>
                                @endif

                                <!-- Footer alt Name -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="alt">Footer Banner Image Alt</label>
                                        <input type="text" class="form-control form-control-solid @error('alt') is-invalid @enderror" name="alt" id="alt" placeholder="Please Enter image alt" value="{{ $footer->alt }}">
                                        @error('alt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Footer alt Name -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="url">Footer Banner Url</label>
                                        <input type="text" class="form-control form-control-solid @error('url') is-invalid @enderror" name="url" id="url" placeholder="Please Enter url" value="{{ $footer->url }}">
                                        @error('url')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="customSwitch1">Footer Banner Status</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1" {{ $footer->status == 1 ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Update Footer Banner</button>
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
