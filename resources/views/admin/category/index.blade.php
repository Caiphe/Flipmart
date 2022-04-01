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
                            <h4 class="box-title">Category List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Icon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <th>{!! $category->name !!}</th>
                                                <th>{{ $category->slug }}</th>
                                                <td style="text-align: center;"><i class="fa fa-{{ strtolower($category->icon) }}"></i></td>
                                                <td style="display: flex;">
                                                    <a class="btn btn-info mr-2" href="{{ route('category.edit', $category->slug) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger delete-data" id="delete" href="{{ route('category.delete', $category->id) }}" title="Delete Data"><i class="fa fa-trash-o"></i></a>
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
                            <h4 class="box-title">Add New Category</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" id="name" class="form-control" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <input type="text" name="icon" class="form-control" id="icon"/>
                                    @error('icon')
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
@endsection
