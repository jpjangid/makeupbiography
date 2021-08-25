
@extends('backend.layouts.app')

@section('title','Add Redirection')

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
                        <h3 class="card-title">Add Redirection</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/redirections/store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <!-- Redirection Url from -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">From Url</label>
                                        <input type="text" class="form-control form-control-solid @error('from') is-invalid @enderror" name="from" id="from" placeholder="Please Enter From Url" value="{{ old('from') }}">
                                        @error('from')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Redirection Url To -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="to">To Url</label>
                                        <input type="text" class="form-control form-control-solid @error('to') is-invalid @enderror" name="to" id="to" placeholder="Please Enter To Url" value="{{ old('to') }}">
                                        @error('to')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Add Redirection</button>
                            <a href="{{ url('admin/redirections') }}" class="btn btn-active-light-danger"> Cancel </a>
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
