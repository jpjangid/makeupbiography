@extends('backend.layouts.app')

@section('title','Add Contact')

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
                        <h3 class="card-title">Add Contact</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/contact_us/store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">Name</label>
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="email">Email</label>
                                        <input type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" placeholder="Please Enter Email" />
                                        @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Mobile-->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="mobile">Mobile</label>
                                        <input type="number" class="form-control form-control-solid @error('mobile') is-invalid @enderror" name="mobile" id="mobile" placeholder="Please Enter Mobile" value="{{ old('mobile') }}">
                                        @error('mobile')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="message">Message</label>
                                        <textarea rows="4" cols="" class="form-control form-control-solid @error('message') is-invalid @enderror" name="message" placeholder="Please Enter Message">{{ old('message')}}</textarea>
                                        @error('message')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-active-light-primary">Add Contact</button>
                            <a href="{{ url('admin/contact_us') }}" class="btn btn-active-light-danger"> Cancel </a>
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