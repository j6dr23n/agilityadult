@extends('backend.layouts.app')

@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">View All Category</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View All Category</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row  -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Category</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  table-bordered text-nowrap mb-0" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Created Date</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                                <td>{{ Str::limit($item->title, 100) }}</td>
                                                <td class="actions">
                                                    <a class="btn btn-info btn-sm br-5 me-2" href="{{ route('sub-categories.create',$item->id) }}">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                    <a class="btn btn-warning btn-sm br-5 me-2" href="{{ route('categories.show',$item->id) }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-sm br-5 me-2"
                                                        href="{{ route('categories.edit', $item->id) }}">
                                                        <i>
                                                            <svg class="table-edit" xmlns="http://www.w3.org/2000/svg"
                                                                height="20" viewBox="0 0 24 24" width="16">
                                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                                <path
                                                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z">
                                                                </path>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                    <form action="{{ route('categories.destroy', $item->id) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm br-5" type="submit">
                                                            <i>
                                                                <svg class="table-delete"
                                                                    xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    viewBox="0 0 24 24" width="16">
                                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                                    <path
                                                                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z">
                                                                    </path>
                                                                </svg>
                                                            </i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $categories->onEachSide(0)->links('backend.partials._pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->


        </div>
        <!-- Container closed -->
    </div>
    <!-- main content end-->
@endsection

@section('extra-js')
    @include('backend.partials._toastr-script')
@endsection
