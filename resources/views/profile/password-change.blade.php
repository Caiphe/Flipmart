@extends('frontend.main-master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Password Change</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-3 col-sm-6 create-new-account">
                        {{-- <img style="max-width: 100px;height: 100px; border-radius: 50%;" class="card-img-top" src="{{ (!empty(auth()->user()->profile_photo_path)) ? url('upload/user_images/'.auth()->user()->profile_photo_path) : url('upload/no-photo.jpeg') }}" alt=""> --}}
                    </div>
                    
                    <div class="col-md-6 col-sm-6 sign-in" style="padding-bottom: 50px;padding-top: 20px;">
                        <h4 class="">Change Password</h4>

                        <form class="register-form outer-top-xs" method="POST"
                            action="{{ route('user.password.update') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"/>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Current Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="old_password" name="old_password">
                                @error('old_password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">New Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                                @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                          
                            <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update password</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-3 col-sm-6 create-new-account"></div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
