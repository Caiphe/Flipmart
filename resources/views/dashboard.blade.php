{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.. {{ auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h4>This is </h4>

    </div>
</x-app-layout> --}}


@extends('frontend.main-master')
@section('content')
    <style type="text/css">
        .text-error {
            color: red;
        }

    </style>

    <x-breadcrumb>Dashboard</x-breadcrumb>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row" style="margin-bottom: 60px;">

                    <div class="col-md-3 col-sm-6 create-new-account">
                        <img style="max-width: 100px;height: 100px; border-radius: 50%;" class="card-img-top" src="{{ (!empty(auth()->user()->profile_photo_path)) ? url('upload/user_images/'.auth()->user()->profile_photo_path) : url('upload/no-photo.jpeg') }}" alt="">
                    </div>

                    <div class="col-md-3 col-sm-6 create-new-account">
                        <ul class="list-group list-group-flush">
                            <li class="mb-2" style="margin-bottom: 10px;"><a href="/" class="btn btn-primary btn-sm btn-block">Home</a></li>
                            <li class="mb-2" style="margin-bottom: 10px;"><a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a></li>
                            <li class="mb-2" style="margin-bottom: 10px;"><a class="btn btn-primary btn-sm btn-block">Change Password</a></li>
                            <li class="mb-2" style="margin-bottom: 10px;"><a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h3 class="text-center">  Hi.. {{ auth()->user()->name }}</h3>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
