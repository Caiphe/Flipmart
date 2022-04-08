@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Brand List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                    style="width:100%">
                                    <thead>
                                        <tr class="text-uppercase bg-lightest">
                                            <th style="min-width: 250px"><span class="text-white">Products</span></th>
                                            <th style="min-width: 80px"><span class="text-fade">Price</span></th>
                                            <th style="min-width: 100px"><span class="text-fade">Quantity</span></th>
                                            <th style="min-width: 90px"><span class="text-fade">status</span></th>
                                            <th style="min-width: 120px">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $item)

                                        <tr>
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mr-20">
                                                        <div class="bg-img h-50 w-50"
                                                            style="background-image: url('{{ asset($item->thumbanail) }}')">

                                                        </div>
                                                    </div>

                                                    <div>
                                                        <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">{{ $item->name }}</a>
                                                        <span class="text-fade d-block">{{ $item->tags  }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if( $item->discount_price)
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    R {{ $item->discount_price }}
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    <s>R {{ $item->price }}</s>
                                                </span>
                                                @else
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    R {{ $item->price }}
                                                </span>
                                                @endif
                                            </td>
                                            <td>

                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                   {{ $item->quantity }}
                                                </span>
                                            </td>

                                            <td>
                                                @if($item->status === 1)
                                                    <span class="badge badge-primary-light badge-lg">Approved</span>
                                                @else
                                                    <span class="badge badge-danger-light badge-lg">Pending</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('product.edit', $item->slug) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5">
                                                    <i class="fa fa-pencil"></i>
                                                   </a>
                                                <a class="waves-effect waves-light btn btn-danger btn-circle mx-5" id="delete" href="{{ route('product.delete', $item->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>

    <script type="text/javascript" src="{{ asset('backend/js/jquery.js') }}"></script>

@endsection
