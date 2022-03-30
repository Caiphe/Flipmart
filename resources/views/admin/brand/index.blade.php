@extends('admin.admin_master')

@section('admin')
<style>
    .brand-image{
        background-size: cover;
        background-repeat: no-repeat;
        height: 30px;
        width: 30px;
        margin: auto;
        background-size: cover;
        background-repeat: no-repeat;
    }

</style>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->name }}</td>
                                                <td>{{ $brand->brand_slug }}</td>
                                                <td><div class="brand-image" style="background-image: url('{{ asset($brand->brand_image) }}');"></div></td>
                                                <td style="display: flex;">
                                                    <a class="btn btn-info mr-2" href="{{ route('brand.edit', $brand->brand_slug ) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger delete-data" id="delete" href="{{ route('brand.delete', $brand->id) }}" title="Delete Data"><i class="fa fa-trash-o"></i></a>
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

                            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Brand Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" id="name" class="form-control" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <input type="file" name="brand_image" class="form-control" id="brand_image" required />
                                    @error('brand_image')
                                    <p class="text-danger">{{ $message }}</p>

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
    <script type="text/javascript">


    </script>
@endsection
