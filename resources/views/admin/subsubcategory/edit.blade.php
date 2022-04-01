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

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Add New Sub-Category</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="{{ route('subsubcategory.update', $subsubcategory->id) }}">
                                @csrf

                                <div class="form-group">
                                    <h5>Category<span class="text-danger">*</span></h5>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subsubcategory->category->id ? 'selected' : '' }} >{!! $category->name !!}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Sub-Category<span class="text-danger">*</span></h5>

                                    <select name="sub_category_id" class="form-control">
                                        @foreach ($subcategories as $subsub)
                                            <option value="{{ $subsub->id }}" {{ $subsub->id ==$subsubcategory->sub_category_id ? ' selected' : '' }}>{{ $subsub->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('sub_category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Sub SubCategory Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" id="name" value="{{ $subsubcategory->name }}" class="form-control" />

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
