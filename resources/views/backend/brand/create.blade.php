@extends('backend.layouts.app')

@section('content')
<div class="container">
<div class="card mb-2">
<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
<div class="py-5">  
<div class="rounded border p-10">   
<div class="mb-10">
<label class="form-label">Brand Name</label>
<input type="text" class="form-control" placeholder="name@example.com">
</div>
<div class="mb-10">
<label class="form-label"></label>
<input type="text" class="form-control" placeholder="name@example.com"/>
</div>
<div class="mb-10">
<div class="form-check form-switch form-check-custom form-check-solid">
    <input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />
    <label class="form-check-label" for="flexSwitchChecked">
        Checked switch
    </label>
</div>
</div>
<div class="mb-10">
<input type="text" class="form-control form-control-solid" placeholder="name@example.com"/>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
