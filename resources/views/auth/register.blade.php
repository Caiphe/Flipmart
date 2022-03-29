@extends('frontend.main-master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Register</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row" style="padding-bottom: 30px;padding-top: 20px;">
                    <!-- Sign-in -->
                    <div class="col-md-3"></div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>

                        <form class="register-form outer-top-xs" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" :value="old('name')">
                                @error('name')
                                    <p style="color: red;font-size: 13px;" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" name="email" :value="old('email')" class="form-control unicase-form-control text-input" id="email">
                                @error('email')
                                    <p style="color: red;font-size: 13px;" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number</label>
                                <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone">
                                @error('phone')
                                    <p style="color: red;font-size: 13px;" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" />
                                @error('password')
                                    <p style="color: red;font-size: 13px;" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation">
                                @error('password_confirmation')
                                    <p style="color: red;font-size: 13px;" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                            <a href="{{ route('login') }}" class="btn-upper btn btn-secondary checkout-page-button">Sign In</a>
                        </form>

                    </div>

                    <div class="col-md-3"></div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
