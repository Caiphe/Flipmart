@extends('frontend.main-master')
@section('content')
    <style type="text/css">
        .text-error {
            color: red;
        }

    </style>

    <x-breadcrumb>User Profile</x-breadcrumb>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row" style="margin-bottom: 60px;">

                    <div class="col-md-3 col-sm-6 create-new-account">
                        <img style="max-width: 100px;border-radius: 50%; display: flex;margin: 0px auto;"
                            class="card-img-top"
                            src="{{ !empty(auth()->user()->profile_photo_path)? url('upload/user_images/' . auth()->user()->profile_photo_path): url('upload/no-photo.jpeg') }}"
                            alt="">
                        <ul class="list-group list-group-flush" style="margin-top: 20px;">
                            <li class="mb-2" style="margin-bottom: 10px;"><a href="/"
                                    class="btn btn-primary btn-sm btn-block">Home</a></li>
                            <li class="mb-2" style="margin-bottom: 10px;"><a href="{{ route('dashboard') }}"
                                    class="btn btn-primary btn-sm btn-block">Dashboard</a></li>
                            <li class="mb-2" style="margin-bottom: 10px;"><a
                                    href="{{ route('user.change.password') }}"
                                    class="btn btn-primary btn-sm btn-block">Change Password</a></li>
                            <li class="mb-2" style="margin-bottom: 10px;"><a href="{{ route('user.logout') }}"
                                    class="btn btn-danger btn-sm btn-block">Logout</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-sm-6 create-new-account">

                        <form class="register-form outer-top-xs" method="POST" action="{{ route('user.profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user-id" value="{{ auth()->user()->id }}" />

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name"
                                    name="name" value="{{ auth()->user()->name }}" />
                                @error('name')
                                    <p class="text-error" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    name="email" value="{{ auth()->user()->email }}" />
                                @error('email')
                                    <p class="text-error" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone<span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="phone"
                                    name="phone" value="{{ auth()->user()->phone }}" />
                                @error('phone')
                                    <p class="text-error" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Profile Image <span>*</span></label>
                                <input type="file" class="form-control" id="profile-photo-path" name="profile_photo_path"
                                    value="" />
                                @error('password')
                                    <p class="text-error" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-info checkout-page-button">Update</button>
                        </form>
                    </div>

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
