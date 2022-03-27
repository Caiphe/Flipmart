@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Change Password</h4>
                </div>
                <div class="box-body row">
                    <div class="col">

                        <form method="post" action="{{ route('admin.password.update') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <input type="password" name="current_password" id="old_password" class="form-control"
                                        required="" />
                                </div>

                                <div class="col-md-6 form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <input type="password" name="password" id="password" class="form-control"
                                        required="" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <h5>Confirm New Password <span class="text-danger">*</span></h5>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required="" />
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
@endsection
