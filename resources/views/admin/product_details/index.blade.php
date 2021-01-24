@extends('admin.master')

@section('dashboard.title', 'All Product Details')
@section('title', 'all product details')

@section('admincontent')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All Product Details</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-category" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Product Color</th>
                                <th>Product Size</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product_details as $details)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $details->product_color }}</td>
                                    <td>{{ $details->product_size }}</td>
                                    <td style="width: 80px">
                                        <a href="{{route('edit.details',$details->id)}}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{route('delete.details',$details->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash-alt"></i> </a>
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
