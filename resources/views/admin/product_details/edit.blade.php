
@extends('admin.master')

@section('dashboard.title','Edit Product Details')
@section('title','Edit Details')

@section('admincontent')
    <section class="content">
        <div class="container-fluid">
           <div class="card">
            <div class="card-header">
               <h4> Edit Product Details</h4>
            </div>

            @include('admin.includes.message')

            <div class="card-body">
                <form action="{{ route('details.update',$product_details->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="product_color"> Product Color</label>
                        <input type="text" class="form-control @error('product_color') is-invalid @enderror" name="product_color" value="{{ $product_details->product_color}}">
                        @if($errors->has('product_color'))
                            <p class="text-danger">{{ $errors->first('product_color') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product_size"> Product Size</label>
                        <input type="text" class="form-control @error('product_size') is-invalid @enderror" name="product_size" value="{{ $product_details->product_size}}">
                        @if($errors->has('product_size'))
                            <p class="text-danger">{{ $errors->first('product_size') }}</p>
                        @endif
                    </div>
                    
                <div class="form-group">
                    <label for="image"></label>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            </div>
           </div>
        </div>
    </section>
@endsection