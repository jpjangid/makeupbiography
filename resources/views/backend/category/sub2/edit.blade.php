@extends('backend.layouts.app')

@section('title','Edit Sub Category')

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
                        <h3 class="card-title">Edit Sub Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/sub/sub/categories/update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <!-- Category Name -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Name</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Category name" value="{{ $category->name }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- slug -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="slug">Slug</label>
                                        <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" placeholder="Please enter slug of category" />
                                        @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- category parent -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="slug">Parent Category</label>
                                        <select class="form-select form-select-solid @error('parent_category') is-invalid @enderror" name="parent_id">
                                            <option value="">Open this select menu</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat['id'] }}" {{ !empty($category->parent_id) && $category->parent_id == $cat['id'] ? "selected" : '' }}>{{ $cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_category')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> 

                                <!-- short_description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="short_description">Short Description</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('short_description') is-invalid @enderror" name="short_description" placeholder="Please enter Short Description">{{ $category->short_description }}</textarea>
                                        @error('short_description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Blog Description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="description">Detail Description</label>
                                        <textarea id="summernote" class="form-control form-control-solid @error('description') is-invalid @enderror" name="description"><?php echo $category->description; ?></textarea>
                                        @error('description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- category image -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="featured_image">Featured Image</label>
                                        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" id="exampleInputFile">
                                        @error('featured_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Featured Image Preview -->
                                @if(!empty($category->featured_image))   
                                <div class="col-md-2 ml-2">
                                    <div class="form-group">
                                        <label class="form-label" for="featured_image">Featured Image Preview</label>
                                        <br>
                                            <img src="{{ asset('storage/category/'.$category->featured_image) }}" alt="{{ $category->alt }}" style="height:4rem;width:12rem;">
                                    </div>
                                </div>
                                @endif

                                <!-- alt title-->
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="alt_title">Alt Title</label>
                                        <input type="text" class="form-control form-control-solid @error('alt_title') is-invalid @enderror" name="alt" id="alt_title" placeholder="Please Enter Alt Title" value="{{ $category->alt }}">
                                        @error('alt')
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
                                        <input type="text" class="form-control form-control-solid @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $category->meta_title }}" placeholder="Please Enter Meta Title" />
                                        @error('meta_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- keywords -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="keywords">Keywords</label>
                                        <input type="text" class="form-control form-control-solid @error('keywords') is-invalid @enderror" name="keywords" id="keywords" value="{{ $category->keywords }}" placeholder="Please Enter keywords" />
                                        @error('keywords')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- meta_description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="Please enter Meta Description">{{ $category->meta_description }}</textarea>
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
                                        <input type="text" class="form-control form-control-solid @error('og_title') is-invalid @enderror" name="og_title" value="{{ $category->og_title }}" placeholder="Please Enter OG Title" />
                                        @error('og_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- blog image -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="og_image">OG Image</label>
                                        <input type="file" name="og_image" class="form-control @error('og_image') is-invalid @enderror" id="exampleInputFile">
                                        @error('og_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- OG Image Preview -->
                                @if(!empty($category->og_image))
                                <div class="col-md-2 ml-2">
                                    <div class="form-group">
                                        <label class="form-label" for="og_image">OG Image Preview</label>
                                        <br>
                                        <img src="{{ asset('storage/category/og_images/'.$category->og_image) }}" alt="{{ $category->og_alt }}" style="height:4rem;width:12rem;">
                                    </div>
                                </div>
                                @endif

                                <!-- OG Title -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="og_alt">OG Image Alt</label>
                                        <input type="text" class="form-control form-control-solid @error('og_alt') is-invalid @enderror" name="og_alt" value="{{ $category->og_alt }}" placeholder="Please Enter OG Image Alt" />
                                        @error('og_alt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- OG description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="og_description">OG Description</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('og_description') is-invalid @enderror" name="og_description" placeholder="Please enter OG Description">{{ $category->og_description }}</textarea>
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
                                        <input type="text" class="form-control form-control-solid @error('tags') is-invalid @enderror" name="tags" id="tags" value="{{ $category->tags }}" placeholder="Please Enter Meta Tag" />
                                        @error('tags')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="customSwitch1">Category Status</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1" {{ $category->status == 1 ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Update Sub Category</button>
                            <a href="{{ url('admin/sub/categories') }}" class="btn btn-active-light-danger"> Cancel </a>
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