@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black">
					  <h3 class="widget-user-username">Admin Name : {{ $adminData->name }}</h3>
                      <a href="{{ route('admin.profile.edit') }}" style="float: right" class="btn btn-round btn-info mb-5">	<i class="fa fa-edit"></i> &nbsp; Edit Profile</a>
					  <h6 class="widget-user-desc">Admin Email : {{ $adminData->email }}</h6>
					</div>
					<div class="widget-user-image" style="background-image: url('{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/admin_images/no-photo.jpeg') }}'); height: 90px; width: 90px; background-size: cover; background-position: center center;border-radius: 50%; background-repeat: no-repeat;border: solid 2px #6701ac;"></div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
