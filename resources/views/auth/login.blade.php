@extends('frontend.main-master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-3"></div>
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>


                        <form class="register-form outer-top-xs" method="POST"
                            action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1" name="email" :value="old('email')" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password"
                                    name="password">
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input id="remember_me" name="remember" type="radio" id="optionsRadios2"
                                        value="option2">Remember me!
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot
                                        your Password?</a>
                                @endif

                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                            <a class="btn btn-secondary" href={{ route('register') }}>Register</a>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <div class="col-md-3"></div>

                    <!-- create a new account -->
                    {{-- <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>

                        <form class="register-form outer-top-xs" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" :value="old('name')">
                                @error('name')
                                    <p class="invalid-feedback error-text" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" name="email" :value="old('email')" class="form-control unicase-form-control text-input" id="email">
                                @error('email')
                                    <p class="invalid-feedback error-text" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone">
                                @error('phone')
                                    <p class="invalid-feedback error-text" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" />
                                @error('password')
                                    <p class="invalid-feedback error-text" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation">
                                @error('password_confirmation')
                                    <p class="invalid-feedback error-text" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>

                    </div> --}}
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
