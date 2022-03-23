@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>
                </div>
                <div class="box-body row">
                    <div class="col">
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.profile.update') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <h5>Admin Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" class="form-control" required="" value={{ $adminData->name }} />
                                </div>

                                <div class="col-md-6 form-group">
                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                    <input type="email" name="email" class="form-control" required="" value="{{ $adminData->email }}" />
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <input type="file" name="profile_photo_path" class="form-control" id="image">
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-user-image">
                                        <img
                                            src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/admin_images/no-photo.jpeg') }}"
                                            style="height: 90px; width: 90px;border-radius: 50%; background-repeat: no-repeat;border: solid 2px #6701ac;"
                                            id="show-image"
                                        />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-success mt-20"><i class="fa fa-save"></i>
                                &nbsp; Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script type="text/javascript" src="{{ asset('backend/js/jquery.js') }}"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(et){
                $('#show-image').attr('src', et.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });

    </script>
@endsection
