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
                            <h4 class="box-title">Update Category</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <input type="text" name="icon" value="{{ $category->icon }}" class="form-control" id="icon"/>
                                    @error('icon')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
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
