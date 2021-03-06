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

    #preview-images{
        margin-left: 3px;
    }

    #preview-images .thumb{
        width: 30px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

</style>
    <div class="container-full">
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Add New Product</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Brand <span class="text-danger">*</span></h5>
                                            <select name="brand_id" class="form-control">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{!! $brand->name !!}</option>
                                                @endforeach
                                            </select>

                                            @error('category_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Category <span class="text-danger">*</span></h5>
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
                                            <h5>Sub-Category <span class="text-danger">*</span></h5>
                                            <select name="subcategory_id" class="form-control"></select>

                                            @error('subcategory_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Sub SubCategory<span class="text-danger">*</span></h5>
                                            <select name="subsubcategory_id" class="form-control"></select>

                                            @error('subsubcategory_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Product Name <span class="text-danger">*</span></h5>
                                            <input type="text" name="name" id="name" class="form-control" />
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <h5>Product Quantity <span class="text-danger">*</span></h5>
                                            <input type="number" name="quantity" id="quantity" class="form-control" />
                                            @error('quantity')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Tags</h5>
                                            <input type="text" name="tags" value="" data-role="tagsinput" placeholder="add tags"/>

                                            @error('tags')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Size</h5>
                                            <input type="text" name="size" value="" data-role="tagsinput" placeholder="add size"/>

                                            @error('size')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Color</h5>
                                            <input type="text" name="color" class="form-control" value="" data-role="tagsinput" placeholder="Add Color"/>

                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Status</h5>
                                            <select name="current_status">
                                                <option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>

                                            @error('current_status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Selling Price <span class="text-danger">*</span></h5>
                                            <input type="text" name="price" id="price" class="form-control" />
                                            @error('price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Discout Price</h5>
                                            <input type="text" name="discount_price" id="discount_price" class="form-control" />
                                            @error('discount_price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Thumbnail<span class="text-danger">*</span></h5>
                                            <input type="file" name="thumbanail" id="thumbanail" class="form-control thumbanail" onChange="loadFile(event)" />
                                            @error('thumbanail')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <img src="" id="main-thumbnail" style="width: 30px;margin-top: 10px;">

                                        </div>

                                        <div class="form-group">
                                            <h5>Multiple Image</h5>
                                            <input type="file" name="multi_images[]" id="multi-images" class="form-control" value="" multiple="" />

                                            @error('multi_images')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <div class="row mt-5" id="preview-images"></div>

                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Short Description</h5>
                                        <div class="controls">
                                            <textarea style="height: 70px;" name="short_description" id="editor1" rows="10" cols="30" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Description </h5>
                                        <div class="controls">
                                            <textarea style="height: 70px;" name="description" id="editor2" rows="10" cols="30" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row mt-10">
                                    <div class="col-md-6">
										<fieldset>
											<input type="checkbox" id="hot_deal" name="hot_deal" value='1'>
											<label for="hot_deal">Hot Deal</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="featured" name="featured" value="1">
											<label for="featured">Featured</label>
										</fieldset>

									</div>
                                    <div class="col-md-6">
                                        <fieldset>
											<input type="checkbox" id="special_deal" name="special_deal" value="1">
											<label for="special_deal">Special Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="status" name="status" value="1">
											<label for="status">Status</label>
										</fieldset>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-20 mb-30">Add New</button>
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
    <script type="text/javascript" src="{{ asset('backend/js/ajax-jquery.js') }}"></script>

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
                            $('select[name="subsubcategory_id"]').html('');

                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>')
                            })
                        }
                    });
                }else{
                    alert('danger');
                }
            });

            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();

                if(subcategory_id){
                    $.ajax({
                        url: "{{ url('/category/subsubcategory/ajax') }}/" + subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success: function(data){
                            var d = $('select[name="subsubcategory_id"]').empty();
                            console.log(data);
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>')
                            })
                        }
                    });
                }else{
                    alert('danger');
                }
            });
        });

        // Show the main thumbnail on input change event
        var loadFile = function(event){
            var output = document.getElementById('main-thumbnail');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function(){
                URL.revokeObjectURL(output.src);
            }
        }

        // Show multiple images on input change event
        $('#multi-images').on('change', function(){
            if(window.File && window.FileReader && window.FileList && window.Blob){
                var data = $(this)[0].files;

                $.each(data, function(index, file){
                    if(/(\.|\/)(gif|jpe?g|png|jpg)$/i.test(file.type)){
                        var fRead = new FileReader();
                        fRead.onload =(function(file){
                            return function(e){
                                var img = $('<img />').addClass('thumb').attr('src', e.target.result);
                                $('#preview-images').append(img);
                            };
                        })(file);
                        fRead.readAsDataURL(file);
                    }
                });
            }else{
                alert('Your browser does not support File API');
            }
        });

    </script>

@endsection
