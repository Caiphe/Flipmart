@extends('frontend.main-master')
@section('content')
    <style type="text/css">
        .text-error {
            color: red;
        }

    </style>

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Forgot Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row" style="margin-bottom: 60px;">
                    <!-- Sign-in -->
                    <div class="col-md-3 col-sm-6 create-new-account">
                    </div>

                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Forgot Password</h4>
                        <p>Forgot your Passwork ? No problem</p>


                        <form class="register-form outer-top-xs" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    name="email" :value="old('email')" autofocus />
                                @error('email')
                                    <p class="text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password
                                Reset Link</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-3 col-sm-6 create-new-account">
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
