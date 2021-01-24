@extends('admin.master')

@section('dashboard.title', 'All Products')
@section('title', 'all Products')

@section('admincontent')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All Products</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-category" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                {{-- <th>Category Name</th>
                                <th>Subcategory Name</th> --}}
                                <th>Product Name</th>
                                <th>Product short description</th>
                                <th>Product long description</th>
                                <th>Specification</th>
                                <th>Delivary description</th>
                                <th>Product Discount</th>
                                <th>Product price</th>
                                <th>Product stock</th>
                                {{-- <th>Product color</th>
                                <th>Product size</th> --}}
                                <th>Product unit</th>
                                <th>Product images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->product_name }}</td>
                                    <td>{{ $category->short_description }}</td>
                                    <td>{{ $category->long_description }}</td>
                                    <td>{{ $category->specification }}</td>
                                    <td>{{ $category->delivary_description }}</td>
                                    <td>{{ $category->product_discount }}</td>
                                    <td>{{ $category->product_price }}</td>
                                    <td>{{ $category->product_stock }}</td>
                                    {{-- <td>{{ $category->product_color }}</td>
                                    <td>{{ $category->product_size }}</td> --}}
                                    <td>{{ $category->product_unit }}</td>
                                    
                                    <td>
                                        <img style="width: 60px; height:60px"
                                            src="{{ asset('uploads/category/' . $category->image) }}" alt="">
                                    </td>
                                    <td style="width: 80px">
                                        <a href="#" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> </a>
                                        <a href="#" class="btn btn-danger btn-xs"> <i class="fa fa-trash-alt"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script>
        $(function() {
            $("#all-category").DataTable();
            //   $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //   });
        });

    </script>
@endsection
