@extends('backend.layouts.app')

@section('title','Edit Blog')

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
                        <h3 class="card-title">Edit Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/blogs/update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <!-- Blog Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="title">Title</label>
                                        <input type="text" class="form-control form-control-solid @error('title') is-invalid @enderror" name="title" id="title" placeholder="Please Enter Blog title" value="{{ $blog->title }}">
                                        @error('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- slug -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="slug">Slug</label>
                                        <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" name="slug" value="{{ $blog->slug }}" placeholder="Please enter slug of blog" />
                                        @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- short_description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="short_description">Short Description</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('short_description') is-invalid @enderror" name="short_description" placeholder="Please enter Short Description">{{ $blog->short_description }}</textarea>
                                        @error('short_description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Blog Description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="description">Detail Description</label>
                                        <textarea id="summernote" class="form-control form-control-solid @error('description') is-invalid @enderror" name="description"><?php echo $blog->description; ?></textarea>
                                        @error('description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- blog image -->
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
                                        <input type="text" class="form-control form-control-solid @error('alt_title') is-invalid @enderror" name="alt" id="alt_title" placeholder="Please Enter Alt Title" value="{{ $blog->alt }}">
                                        @error('meta_description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Meta Title -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control form-control-solid @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $blog->meta_title }}" placeholder="Please Enter Meta Title" />
                                        @error('meta_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- keywords -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="keywords">Keywords</label>
                                        <input type="text" class="form-control form-control-solid @error('keywords') is-invalid @enderror" name="keywords" id="keywords" value="{{ $blog->keywords }}" placeholder="Please Enter keywords" />
                                        @error('keywords')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- meta_description -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="Please enter Meta Description">{{ $blog->meta_description }}</textarea>
                                        @error('meta_description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- tags -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="tags">Tags</label>
                                        <input type="text" class="form-control form-control-solid @error('tags') is-invalid @enderror" name="tags" id="tags" value="{{ $blog->tags }}" placeholder="Please Enter Meta Tag" />
                                        @error('tags')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- published date -->
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="publish_date">Publish Date</label>
                                        <input type="date" class="form-control form-control-solid @error('publish_date') is-invalid @enderror" name="publish_date" id="publish_date" value="{{ $blog->publish_date }}" placeholder="Please Enter Meta Tag" />
                                        @error('publish_date')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="customSwitch1">Publish Block</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1" {{ $blog->status == 1 ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Update Blog</button>
                            <a href="{{ url('admin/blogs') }}" class="btn btn-active-light-danger"> Cancel </a>
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
<script type="text/javascript">
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
</script>
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