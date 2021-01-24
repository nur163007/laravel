@extends('admin.master')

@section('dashboard.title', 'product details')

@section('admincontent')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3>Product Details</h3>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('store.product.details') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="product_color">Product Color</label>
                                <input class="form-control" type="text" name="product_color">
                                @if ($errors->has('product_color'))
                                    <p class="text-danger">{{ $errors->first('product_color') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Product Size</label>
                                <input class="form-control" type="text" name="product_size">
                                @if ($errors->has('product_size'))
                                    <p class="text-danger">{{ $errors->first('product_size') }}</p>
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
