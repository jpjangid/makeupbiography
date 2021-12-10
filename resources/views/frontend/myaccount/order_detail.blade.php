@extends('frontend.main.index')

@section('css')
<!-- Status message -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    @media screen and (min-width: 600px) {
        .card-view {
            border-radius: 2px;
            box-shadow: 0 2px 10px 0 rgb(0 0 0 / 10%);
            display: inline-block;
            margin: 15px 20px 25px 0;
            padding: 20px 15px 20px 20px;
            white-space: normal;
            width: 800px;
            min-height: 40%;
            vertical-align: middle;
            cursor: pointer;
        }

        .card-view:hover {
            cursor: pointer;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    }

    .table {
        height: auto;
        width: auto;
        text-align: top;
        table-layout: fixed;
    }

    td {
        width: 25%;
        vertical-align: top;
        text-align: center;
    }

    .checked {
        color: orange;
    }
</style>
@endsection

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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="l-inner">
    <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--wc c-page-header--low">
        <div class="c-page-header__wrap">
            <h1 class="c-page-header__title">My account</h1>
        </div>
        <div class="c-page-header__login-info">
            <span class="c-page-header__login-text">Logged in as
                <span class="c-page-header__login-name">xyz</span>
            </span>
            <a class="c-page-header__logout" href="https://parkofideas.com/luchiana/demo/my-account/customer-logout/?_wpnonce=c22e1eb537">Logout
                <i class="ip-menu-right c-page-header__logout-icon"></i>
            </a>
        </div>
    </header>
    <div class="woocommerce-notices-wrapper">
    </div>
    <div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
        <div class="l-section__content">
            <div class="woocommerce">
                <div class="c-account">
                    <div class="c-account__col-menu">
                        <nav>
                            @include('frontend.myaccount.sidebar')
                        </nav>
                    </div>
                    <div class="c-account__col-content">
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label style="font-size:20px; font-weight:bolder;">
                                <i class='fas fa-shopping-bag' style="color: #c58c85;"></i> ORDER {{ strtoupper($order->order_no) }}
                                <hr style="width:800px;">
                            </label>
                        </p>
                        <form action="{{ url('orders/return') }}" method="post">
                            @csrf
                            @php $no = 0; @endphp
                            @foreach($order->items as $key => $item)
                                @if(empty($item->return))
                                    @if($item->flag == '0')
                                    @php $no += 1; @endphp
                                    <div class="card-view">
                                        <table class="table" id="producttbl">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Product Name</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Check If Return</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <tr>
                                                    <td><img src="{{ asset('storage/products/variants/'.$image[$key]) }}" alt="{{ $image[$key] }}" style="height: 4rem;"></td>
                                                    <td>{{ $item->variant->product->name }} - {{ $item->variant->name }} X {{ $item->quantity }}</td>
                                                    <td>{{ $item->variant->sale_price }}</td>
                                                    <td>{{ $item->variant->sale_price * $item->quantity }}</td>
                                                    <input type="hidden" class="orderitem_id" value="{{ $item->id }}">
                                                    <td><input type="checkbox" class="form-control return_check" name="return_check[]" value="{{ $item->id }}"></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="5">Return/Exchange Request <span style="color: red;">*</span> </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <select class="status" name="status[]">
                                                            <option value="">Reason Of Return</option>
                                                            <option value="Accidentally Placed Order">Accidentally Placed Order</option>
                                                            <option value="Ordered Wrong Product">Ordered Wrong Product</option>
                                                            <option value="Product is not good as per requirement">Product is not good as per requirement</option>
                                                            <option value="Didn't like the Product">Didn't like the Product</option>
                                                            <option value="Defective Product">Defective Product</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="5">Please Describe the Issue <span style="color: red;">*</span> </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <textarea name="description[]" class="description" cols="30" rows="2" placeholder="Please Enter..."></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                @endif
                            @endforeach
                            @if($no > 0)
                            <button class="btn btn-primary return">Return</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.l-inner -->
@endsection
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on('click', '.return_check', function() {
        var statusrow = $(this).closest('tr').next('tr').next('tr');
        var discriptionrow = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr');
        var status = statusrow.find('.status').val();
        var description = discriptionrow.find('.description').val();
        if ($(this).prop("checked") == true) {
            if (description == '') {
                swal("Please Describe the Issue");
                $(this).removeAttr('checked');
            }
            if (status == '') {
                swal("Please Select Return/Exchange Request");
                $(this).removeAttr('checked');
            }
        }

    });
</script>
@endsection