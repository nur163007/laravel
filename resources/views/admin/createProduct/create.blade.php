@extends('admin.master')

@section('dashboard.title', 'Create Product')

@section('admincontent')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3>Create Product</h3>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="category_name">Category Name</label>

                                <select id="" class="custom-select" name="category_name">
                                    <option value="">--select category name--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_name'))
                                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcategory_name">Subcategory name</label>

                                <select id="" class="custom-select" name="subcategory_name">
                                    <option value="">--select subcategory name--</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('subcategory_name'))
                                    <p class="text-danger">{{ $errors->first('subcategory_name') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_name">Product Name</label>
                                <input class="form-control" type="text" name="product_name">
                                @if ($errors->has('product_name'))
                                    <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_discount">Discount</label>
                                <input class="form-control" type="text" name="product_discount">
                                @if ($errors->has('product_discount'))
                                    <p class="text-danger">{{ $errors->first('product_discount') }}</p>
                                @endif
                            </div>


                            <div class="form-group col-md-6">
                                <label for="short_description">Short Description</label>
                                <textarea rows="3"col="15"class="form-control" type="text" name="short_description"></textarea>
                                @if ($errors->has('short_description'))
                                    <p class="text-danger">{{ $errors->first('short_description') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="long_description">Long Description</label>
                                <textarea rows="3"col="15"class="form-control" type="text" name="long_description"></textarea>
                                @if ($errors->has('long_description'))
                                    <p class="text-danger">{{ $errors->first('long_description') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="specification">Specification</label>
                                <textarea rows="3"col="15"class="form-control" type="text" name="specification"></textarea>
                                @if ($errors->has('specification'))
                                    <p class="text-danger">{{ $errors->first('specification') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="delivary_description">Delivary Description</label>
                                <textarea rows="3"col="15"class="form-control" type="text" name="delivary_description"></textarea>
                                @if ($errors->has('delivary_description'))
                                    <p class="text-danger">{{ $errors->first('delivary_description') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_price">Product Price</label>
                                <input class="form-control" type="text" name="product_price">
                                @if ($errors->has('product_price'))
                                    <p class="text-danger">{{ $errors->first('product_price') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_stock">Product Stock</label>
                                <input class="form-control" type="text" name="product_stock">
                                @if ($errors->has('product_stock'))
                                    <p class="text-danger">{{ $errors->first('product_stock') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_color">Product Color</label>

                                <select id="" class="custom-select" name="product_color">
                                    <option value="">--select product color--</option>
                                    @foreach ($product_details as $details)
                                    <option value="{{$details->id}}">{{$details->product_color}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_color'))
                                    <p class="text-danger">{{ $errors->first('product_color') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_size">Product Size</label>

                                <select id="" class="custom-select" name="product_size">
                                    <option value="">--select product size--</option>
                                    @foreach ($product_details as $details)
                                    <option value="{{$details->id}}">{{$details->product_size}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_size'))
                                    <p class="text-danger">{{ $errors->first('product_size') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_unit">Product Unit</label>
                                <input class="form-control" type="text" name="product_unit">
                                @if ($errors->has('product_unit'))
                                    <p class="text-danger">{{ $errors->first('product_unit') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input class="form-control-file" type="file" name="image">

                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" name="submit">
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

@endsection
