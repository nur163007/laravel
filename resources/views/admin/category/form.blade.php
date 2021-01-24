@extends('admin.master')

@section('dashboard.title', 'Create Category')

@section('admincontent')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3>Create Category</h3>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category_name">Category Name</label>
                                <input class="form-control" type="text" name="category_name">
                                @if ($errors->has('category_name'))
                                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>

                                <select id="" class="custom-select" name="status">
                                    <option value="">--select--</option>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image">

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
