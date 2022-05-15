@extends('admin.admin_master')

@section('admin')
<style>
    .btn-circle {
        width: 35px;
        height: 35px;
        line-height: 33px;
    }
</style>

    <div class="container-full">
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">{{ $product->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>

    <script type="text/javascript" src="{{ asset('backend/js/jquery.js') }}"></script>

@endsection
