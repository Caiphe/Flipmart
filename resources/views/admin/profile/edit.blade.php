@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body row">
                    <div class="col">
                        <form novalidate="" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <h5>Admin Name <span class="text-danger">*</span></h5>
                                    <input type="text" name="name" class="form-control" required="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                    <input type="email" name="email" class="form-control" required="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <input type="file" name="profile_photo_path" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-user-image" style="background-image: url('{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/admin_images/no-photo.jpeg') }}'); height: 90px; width: 90px; background-size: cover; background-position: center center;border-radius: 50%; background-repeat: no-repeat;border: solid 2px #6701ac;"></div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-success mt-20"><i class="fa fa-save"></i>
                                &nbsp; Update</button>
                        </form>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
