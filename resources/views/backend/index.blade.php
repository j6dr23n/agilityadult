@extends('backend.layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">DASHBOARD</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 px-0">
                        <div class="card px-3 ps-4">
                            <div class="row index1">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                    <div class="row border-end bd-xs-e-0 p-3">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <div
                                                class="circle-icon bg-primary text-center align-self-center overflow-hidden shadow">
                                                <i class="fe fe-shopping-bag tx-15 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 py-0">
                                            <div class="pt-4 pb-3">
                                                <div class="d-flex">
                                                    <h6 class="mb-2 tx-12">Total Videos</h6>
                                                    <span
                                                        class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"></span>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-18 font-weight-semibold mb-0">{{ $videos->count() }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                    <div class="row border-end bd-md-e-0 bd-xs-e-0 bd-lg-e-0 bd-xl-e-0  p-3">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <div
                                                class="circle-icon bg-warning text-center align-self-center overflow-hidden shadow">
                                                <i class="fe fe-dollar-sign tx-15 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="pt-4 pb-3">
                                                <div class="d-flex">
                                                    <h6 class="mb-2 tx-12">Total Users</h6>
                                                    <span
                                                        class="badge bg-danger-transparent text-danger font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"></span>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-18 font-weight-semibold mb-0">{{ $users->count() }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                    <div class="row  p-3">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <div
                                                class="circle-icon bg-info text-center align-self-center overflow-hidden shadow">
                                                <i class="fe fe-credit-card tx-15 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="pt-4 pb-3">
                                                <div class="d-flex	">
                                                    <h6 class="mb-2 tx-12">Total Earnings</h6>
                                                    <span
                                                        class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"></span>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-18 font-weight-semibold mb-0">
                                                            {{ number_format($users->count() * 4000) }} mmk</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                    <div class="row border-end bd-xs-e-0  p-3">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <div
                                                class="circle-icon bg-secondary text-center align-self-center overflow-hidden shadow">
                                                <i class="fe fe-external-link tx-15 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="pt-4 pb-3">
                                                <div class="d-flex">
                                                    <h6 class="mb-2 tx-12">Profit Gain</h6>
                                                    <span
                                                        class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"></span>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-18 font-weight-semibold mb-0">$8,943</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-xs-12">
                    <div class="card overflow-hidden">
                        <div class="card-header pb-1">
                            <h3 class="card-title mb-2">Recent Customers</h3>
                        </div>
                        <div class="card-body p-0 customers mt-1">
                            <div class="list-group list-lg-group list-group-flush">
                                @foreach ($users->take(3) as $item)
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv9pNGckkhtfLaW1IQD_3pbSUB43mB5_SmyQ&usqp=CAU"
                                                    alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-13 font-weight-sembold text-dark">
                                                                {{ $item->name }}
                                                            </h5>
                                                            <p class="mb-0 tx-12 text-muted">User ID: #{{ $item->id }}
                                                            </p>
                                                        </div>
                                                        <span class="ms-auto wd-45p tx-14">
                                                            <span
                                                                class="float-end badge bg-{{ $item->isAdmin == 1 ? 'success' : 'info' }}">
                                                                <span
                                                                    class="font-weight-semibold">{{ $item->isAdmin == 1 ? 'admin' : 'member' }}</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row  -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Videos Summary</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  table-bordered text-nowrap mb-0" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Created Date</th>
                                            <th>poster</th>
                                            <th>Title </th>
                                            <th>Tags</th>
                                            <th>Embed Link</th>
                                            <th>Drive ID</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos->take(12) as $item)
                                            @php
                                                $image = json_decode($item->poster);
                                            @endphp
                                            <tr>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                                <td><img src="{{ '/storage/videos/images/' . $image[0] }}" alt="" width="100%" height="70px"></td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ Str::limit($item->tags, 40) }}</td>
                                                <td>{{ Str::limit($item->embed_link, 40) }}</td>
                                                <td>{{ Str::limit($item->drive_id, 40) }}</td>
                                                <td>{{ Str::limit($item->link, 40) }}</td>
                                                <td><span
                                                        class="badge badge-{{ $item->status == 'draft' ? 'warning' : 'success' }}-transparent">{{ $item->status }}</span>
                                                </td>
                                                <td class="">
                                                    <a class="btn btn-success btn-sm br-5 me-2"
                                                        href="{{ route('videos.edit', $item->id) }}">
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
            <!-- /row -->


        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
