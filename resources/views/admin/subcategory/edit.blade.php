@extends('admin.master')

@section('dashboard.title', 'Create sub Category')

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
                    <form method="post" action="{{ route('update.subcategory',$subcategory->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="category_id">Category Name</label>

                                <select id="" class="custom-select" name="category_name">
                                    <option value="">--select category name--</option>
                                   @foreach ($category as $item)
                                   <option {{$item->id==$subcategory->category_id ? 'selected' :''}} value="{{$item->id}}">{{$item->category_name}}</option>
                                   @endforeach
                                </select>
                                @if ($errors->has('category_name'))
                                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcategory_name">Subcategory Name</label>
                                <input class="form-control" type="text" name="subcategory_name"value="{{ $subcategory->subcategory_name}}">
                                @if ($errors->has('subcategory_name'))
                                    <p class="text-danger">{{ $errors->first('subcategory_name') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input class="form-control-file" type="file" name="image"id="image">

                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <img style="width: 60px; height: 60px" src="{{asset('uploads/category/'.$subcategory->image)}}">
                             </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>

                                <select id="" class="custom-select" name="status">
                                    <option value="">--select--</option>
                                   <option {{ $subcategory->status == 1 ? 'selected' : ''  }} value="1">Open</option>
                            <option {{ $subcategory->status == 0 ? 'selected' : ''  }} value="0">Close</option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

@endsection
