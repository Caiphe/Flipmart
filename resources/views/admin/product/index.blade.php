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
                            <h4 class="box-title">Add New Product</h4>
                        </div>
                        <div class="box-body">

                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Category<span class="text-danger">*</span></h5>
                                            <select name="category_id" class="form-control">
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
                                            <select name="subcategory_id" class="form-control">

                                            </select>

                                            @error('subcategory_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Sub SubCategory<span class="text-danger">*</span></h5>
                                            <input type="text" name="subsubcategory_id" id="subsubcategory_id" class="form-control" />

                                            @error('subsubcategory_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Product Name <span class="text-danger">*</span></h5>
                                            <input type="text" name="name" id="name" class="form-control" />
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Product Quantity <span class="text-danger">*</span></h5>
                                            <input type="number" name="quantity" id="quantity" class="form-control" />
                                            @error('quantity')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Tags</h5>
                                            {{-- <input type="text" name="tags" id="tags" class="form-control" /> --}}

                                            {{-- <h6 class="box-subtitle d-block mb-10">Add <code>data-role="tagsinput"</code> to your input field & its automatically change it to a tags input.</h6> --}}
                                            <div class="tags-default">
                                                <input type="text" name="tags" value="" data-role="tagsinput" placeholder="add tags" />
                                            </div>

                                            @error('tags')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Size</h5>
                                            <input type="text" name="size" id="size" class="form-control" />
                                            @error('size')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Color</h5>
                                            <select name="color" id="color" class="form-control">
                                                <option value="">Select Color</option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="red">Red</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="blue">Blue</option>
                                            </select>
                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Price <span class="text-danger">*</span></h5>
                                            <input type="text" name="price" id="price" class="form-control" />
                                            @error('price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Discout Price <span class="text-danger">*</span></h5>
                                            <input type="text" name="discount_price" id="discount_price" class="form-control" />
                                            @error('discount_price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Thumbnail<span class="text-danger">*</span></h5>
                                            <input type="file" name="thumbanail" id="thumbanail" class="form-control" />
                                            @error('thumbanail')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Short Description</h5>
                                        <div class="controls">
                                            <textarea style="height: 70px;" name="short_description" id="short_description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Description </h5>
                                        <div class="controls">
                                            <textarea style="height: 70px;" name="description" id="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-10">
                                    <div class="col-md-6">
										<fieldset>
											<input type="checkbox" id="hot_deal" name="hot_deal">
											<label for="hot_deal">Hot Deal</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="featured" value="2">
											<label for="featured">Featured</label>
										</fieldset>

									</div>
                                    <div class="col-md-6">
                                        <fieldset>
											<input type="checkbox" id="special_deal" name="special_deal" value="2">
											<label for="special_deal">Special Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="status" value="2">
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
