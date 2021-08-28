@extends('backend.layouts.app')

@section('title','Add Product')

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
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/products/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <!-- Product Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Name</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Product Name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- slug -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="slug">Slug</label>
                                        <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug')}}" placeholder="Please enter slug of Product" />
                                        @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>   

                                <!-- main category -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="main_cat">Main Category</label>
                                        <select name="main_cat" class="form-control form-control-solid">
                                            <option value="">Select Main Category</option>
                                            @foreach($main_cats as $main_cat)
                                                <option value="{{ $main_cat->id }}">{{ $main_cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 

                                <!-- category -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="cat">Category</label>
                                        <select name="cat" class="form-control form-control-solid">
                                            <option value="">Select Category</option>
                                            @foreach($cats as $cat)
                                                <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- sub category -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_cat">Sub Category</label>
                                        <select name="sub_cat" class="form-control form-control-solid">
                                            <option value="">Select Sub Category</option>
                                            @foreach($sub_cats as $sub_cat)
                                                <option value="{{ $sub_cat['id'] }}">{{ $sub_cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- short_description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="short_description">Short Description</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('short_description') is-invalid @enderror" name="short_description" placeholder="Please enter Short Description">{{ old('short_description')}}</textarea>
                                        @error('short_description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="description">Detail Description</label>
                                        <textarea id="summernote" class="form-control form-control-solid @error('description') is-invalid @enderror" name="description"><?php echo old('description'); ?></textarea>
                                        @error('description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product image -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="featured_image">Featured Image</label>
                                        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" id="exampleInputFile">
                                        @error('featured_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- alt title-->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="alt_title">Alt Title</label>
                                        <input type="text" class="form-control form-control-solid @error('alt_title') is-invalid @enderror" name="alt" id="alt_title" placeholder="Please Enter Alt Title" value="{{ old('alt') }}">
                                        @error('meta_description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <h4>Meta Section</h4>

                                <!-- Meta Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control form-control-solid @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title')}}" placeholder="Please Enter Meta Title" />
                                        @error('meta_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- keywords -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="keywords">Keywords</label>
                                        <input type="text" class="form-control form-control-solid @error('keywords') is-invalid @enderror" name="keywords" id="keywords" value="{{ old('keywords')}}" placeholder="Please Enter keywords" />
                                        @error('keywords')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- meta_description -->
                                <div class="col-md-12 mb-4">
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
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="og_title">OG Title</label>
                                        <input type="text" class="form-control form-control-solid @error('og_title') is-invalid @enderror" name="og_title" value="{{ old('og_title')}}" placeholder="Please Enter OG Title" />
                                        @error('og_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product image -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="og_image">OG Image</label>
                                        <input type="file" name="og_image" class="form-control @error('og_image') is-invalid @enderror" id="exampleInputFile">
                                        @error('og_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- OG Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="og_alt">OG Image Alt</label>
                                        <input type="text" class="form-control form-control-solid @error('og_alt') is-invalid @enderror" name="og_alt" value="{{ old('og_alt')}}" placeholder="Please Enter OG Image Alt" />
                                        @error('og_alt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- OG description -->
                                <div class="col-md-12 mb-4">
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
                                <div class="col-md-10 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="tags">Tags</label>
                                        <input type="text" class="form-control form-control-solid @error('tags') is-invalid @enderror" name="tags" id="tags" value="{{ old('tags')}}" placeholder="Please Enter Meta Tag" />
                                        @error('tags')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="customSwitch1">Product Status</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1">
                                        </div>
                                    </div>
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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

@endsection