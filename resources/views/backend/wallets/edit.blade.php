@extends('backend.layouts.app')

@section('title','Wallet Info')

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
                        <h3 class="card-title">Wallet Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('admin/wallets/update', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="required form-label" for="amount">Amount</label>
                                        <input type="hidden" name="user_id" value="{{ $id }}">
                                        <input type="text" class="form-control form-control-solid @error('amount') is-invalid @enderror" name="amount" id="amount" placeholder="Please Enter Amount" value="{{ old('amount') }}">
                                        @error('amount')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="form-label" for="remark">Remark</label>
                                        <textarea name="remark" class="form-control form-control-solid" id="" rows="2">{{ old('remark') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-light-primary" style="float: right;">Add Amount</button>
                                    <a href="{{ url('admin/users') }}" class="btn btn-light-danger"> Back </a>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                    </form>

                    <div class="card-footer">
                        <table class="table table-row-bordered table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $credit = 0;
                                    $debit = 0;
                                @endphp
                                @foreach($wallets as $wallet)
                                @php
                                    if($wallet->status == 'credited'){
                                        $credit += $wallet->amount;
                                    }
                                    if($wallet->status == 'debited'){
                                        $debit += $wallet->amount;
                                    }
                                @endphp
                                @if($wallet->status == 'credited')
                                <tr style="background-color: #b3ffb3">
                                @else
                                <tr style="background-color: #ff8080">
                                @endif
                                    <td>{{ date('d-m-Y', strtotime($wallet->created_at)) }}</td>
                                    <td>{{ ucfirst($wallet->status) }}</td>
                                    <td>{{ number_format((float)$wallet->amount, 2, '.', '') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #e6ccff">
                                    <th colspan="2">Available Balance</th>
                                    <th>{{ number_format((float)$credit - $debit, 2, '.', '') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--/.col (left) -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection