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
                            <h4 class="box-title">Sub Sub-Category List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Sub-sub-category</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($subsubcategories as $item)
                                        <tr>
                                            <td>{!! $item->category->name !!}</td>
                                            <td>{!! $item->subcategory->name !!}</td>
                                            <td>{!! $item->name !!}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td style="display: flex;">
                                                <a class="btn btn-info mr-2" href="{{ route('subsubcategory.edit', $item->slug) }}" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger delete-data" id="delete" href="{{ route('subsubcategory.delete', $item->id) }}" title="Delete Data"><i class="fa fa-trash-o"></i></a>
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
                            <h4 class="box-title">Add New Sub-Category</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="{{ route('subsubcategory.store') }}">
                                @csrf

                                <div class="form-group">
                                    <h5>Category<span class="text-danger">*</span></h5>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Sub-Category<span class="text-danger">*</span></h5>
                                    <select name="sub_category_id" class="form-control">

                                    </select>

                                    @error('sub_category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Sub SubCategory Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" id="name" class="form-control" />

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
    <script type="text/javascript" src="{{ asset('backend/js/jquery.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function(){

        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();

            if(category_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        var d = $('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="sub_category_id"]').append('<option value="' + value.id + '">' + value.name + '</option>')
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });
    });

    </script>
@endsection
