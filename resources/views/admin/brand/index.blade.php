@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">

                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Brand List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Brand Slug</th>
                                            <th>Brand Image</th>
                                            {{-- <th>Date Added</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->brand_name }}</td>
                                                <td>{{ $brand->brand_slug }}</td>
                                                <td><img alt="" src="{{ asset($brand->brand_image) }}" style="width: 70px;height: 40px;"/></td>
                                                {{-- <td>{{ $brand->created_at->diffForHumans() }}</td> --}}
                                                <td>
                                                    <a class="btn btn-info" href="">Edit</a>
                                                    <a class="btn btn-danger" href="">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Add New Brand</h4>
                        </div>
                        <div class="box-body">
                            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Brand Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="brand_name" id="brand_name" class="form-control" value="" />
                                    @error('brand_name')
                                        <p style="color: red;'">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <input type="file" name="brand_image" class="form-control" id="brand_image" />
                                    @error('brand_image')
                                        <p style="color: red;'">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Add New</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
