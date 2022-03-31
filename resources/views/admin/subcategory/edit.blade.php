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


                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Add New Sub-Category</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="{{ route('subcategory.update', $subcategory->id) }}">
                                @csrf

                                <div class="form-group">
                                    <h5>Category Name<span class="text-danger">*</span></h5>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? ' selected' : '' }}>
                                                {!! $category->name !!}
                                            </option>
                                        @endforeach
                                    </select>


                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <h5>Sub-Category Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $subcategory->name }}" />
                                    @error('name')
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
