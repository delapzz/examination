@extends('layouts.app')
@section('content')
<h2>Add Product</a></h2>
<br>
 
<form action="{{ route('expenses.store') }}" method="POST" name="add_product">
{{ csrf_field() }}
 
<div class="col">
    <div class="col-md-5">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <strong>Product Code</strong>
            <input type="text" name="product_code" class="form-control" placeholder="Enter Product Code">
            <span class="text-danger">{{ $errors->first('product_code') }}</span>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-5">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection