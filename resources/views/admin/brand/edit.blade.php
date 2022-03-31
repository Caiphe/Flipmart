@extends('admin.admin_master')

@section('admin')
<style>
    .brand-image{
        width: 70px;
        margin-bottom: 20px;
    }

</style>
    <div class="container-full">
        <section class="content">
            <div class="row">

                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Add New Brand</h4>
                    </div>
                    <div class="box-body">

                        <form method="POST" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $brand->id }}"/>
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}"/>

                            <div class="form-group">
                                <h5>Brand Name <span class="text-danger">*</span></h5>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}" />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <input type="file" name="brand_image" class="form-control" id="brand_image" value="" />
                                @error('brand_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <img src="{{ asset($brand->brand_image) }}" class="brand-image" />
                            <br/>

                            {{-- <div class="brand-logo brand-image" style="background-image:url(''); background-size: cover;"></div> --}}

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
