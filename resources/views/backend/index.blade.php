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
                                        <div class="circle-icon bg-primary text-center align-self-center overflow-hidden shadow">
                                            <i class="fe fe-shopping-bag tx-15 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 py-0">
                                        <div class="pt-4 pb-3">
                                            <div class="d-flex">
                                                <h6 class="mb-2 tx-12">Today Orders</h6>
                                                <span class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"><i class="fa fa-caret-up me-1"></i>0.11%</span>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-18 font-weight-semibold mb-0">5,472</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="row border-end bd-md-e-0 bd-xs-e-0 bd-lg-e-0 bd-xl-e-0  p-3">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="circle-icon bg-warning text-center align-self-center overflow-hidden shadow">
                                            <i class="fe fe-dollar-sign tx-15 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="pt-4 pb-3">
                                            <div class="d-flex">
                                                <h6 class="mb-2 tx-12">Today Earnings</h6>
                                                <span class="badge bg-danger-transparent text-danger font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"><i class="fa fa-caret-up me-1"></i>0.23%</span>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-18 font-weight-semibold mb-0">$47,589</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="row border-end bd-xs-e-0  p-3">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="circle-icon bg-secondary text-center align-self-center overflow-hidden shadow">
                                            <i class="fe fe-external-link tx-15 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="pt-4 pb-3">
                                            <div class="d-flex">
                                                <h6 class="mb-2 tx-12">Profit Gain</h6>
                                                <span class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"><i class="fa fa-caret-up me-1"></i>1.57%</span>
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
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="row  p-3">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="circle-icon bg-info text-center align-self-center overflow-hidden shadow">
                                            <i class="fe fe-credit-card tx-15 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="pt-4 pb-3">
                                            <div class="d-flex	">
                                                <h6 class="mb-2 tx-12">Total Earnings</h6>
                                                <span class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"><i class="fa fa-caret-up me-1"></i>0.45%</span>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-18 font-weight-semibold mb-0">$57.12M</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="row border-end bd-xs-e-0  p-3">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="circle-icon bg-secondary text-center align-self-center overflow-hidden shadow">
                                            <i class="fe fe-external-link tx-15 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="pt-4 pb-3">
                                            <div class="d-flex">
                                                <h6 class="mb-2 tx-12">Profit Gain</h6>
                                                <span class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"><i class="fa fa-caret-up me-1"></i>1.57%</span>
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
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="row  p-3">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="circle-icon bg-info text-center align-self-center overflow-hidden shadow">
                                            <i class="fe fe-credit-card tx-15 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="pt-4 pb-3">
                                            <div class="d-flex	">
                                                <h6 class="mb-2 tx-12">Total Earnings</h6>
                                                <span class="badge bg-success-transparent text-success font-weight-semibold ms-auto rounded-pill lh-maincard px-2 my-auto"><i class="fa fa-caret-up me-1"></i>0.45%</span>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-18 font-weight-semibold mb-0">$57.12M</h4>
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
                            <a href="javascript:void(0);" class="border-0">
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle me-3 my-auto shadow" src="assets/img/faces/2.jpg" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-13 font-weight-sembold text-dark">Samantha Melon</h5>
                                                <p class="mb-0 tx-12 text-muted">User ID: #1234</p>
                                            </div>
                                            <span class="ms-auto wd-45p tx-14">
                                                <span class="float-end badge bg-success">
                                                <span class="font-weight-semibold">paid </span>
                                            </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <a href="javascript:void(0);" class="border-0">
                                <div class="list-group-item list-group-item-action border-0" >
                                    <div class="media mt-0">
                                        <img class="avatar-lg rounded-circle me-3 my-auto shadow" src="assets/img/faces/1.jpg" alt="Image description">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-1">
                                                    <h5 class="mb-1 tx-13 font-weight-sembold text-dark">Allie Grater</h5>
                                                    <p class="mb-0 tx-12 text-muted">User ID: #1234</p>
                                                </div>
                                                <span class="ms-auto wd-45p tx-14">
                                                    <span class="float-end badge bg-danger">
                                                    <span class="font-weight-semibold">Pending</span>
                                                </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="border-0">
                                <div class="list-group-item list-group-item-action border-0" >
                                    <div class="media mt-0">
                                        <img class="avatar-lg rounded-circle me-3 my-auto shadow" src="assets/img/faces/5.jpg" alt="Image description">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-1">
                                                    <h5 class="mb-1 tx-13 font-weight-sembold text-dark">Gabe Lackmen</h5>
                                                    <p class="mb-0 tx-12 text-muted">User ID: #1234</p>
                                                </div>
                                                <span class="ms-auto wd-45p  tx-14">
                                                    <span class="float-end badge bg-danger">
                                                    <span class="font-weight-semibold">Pending</span>
                                                </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="border-0 mb-3">
                                <div class="list-group-item list-group-item-action border-0" >
                                    <div class="media mt-0">
                                        <img class="avatar-lg rounded-circle me-3 my-auto shadow" src="assets/img/faces/7.jpg" alt="Image description">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-1">
                                                    <h5 class="mb-1 tx-13 font-weight-sembold text-dark">Manuel Labor</h5>
                                                    <p class="mb-0 tx-12 text-muted">User ID: #1234</p>
                                                </div>
                                                <span class="ms-auto wd-45p tx-14">
                                                <span class="float-end badge bg-success">
                                                <span class="font-weight-semibold">Paid</span>
                                                </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
                        <h4 class="card-title">Product Summary</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table  table-bordered text-nowrap mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th class="text-center">Purchase Date</th>
                                        <th>Client Name</th>
                                        <th>Product ID</th>
                                        <th>Product</th>
                                        <th>Product Cost</th>
                                        <th>Payment Mode</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">#01</td>
                                        <td>Sean Black</td>
                                        <td>PRO12345</td>
                                        <td>Mi LED Smart TV 4A 80</td>
                                        <td>$14,500</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge badge-success-transparent">Delivered</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#02</td>
                                        <td>Evan Rees</td>
                                        <td>PRO8765</td>
                                        <td>Thomson R9 122cm (48 inch) Full HD LED TV </td>
                                        <td>$30,000</td>
                                        <td>Cash on delivered</td>
                                        <td><span class="badge badge-primary-transparent">Add Cart</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#03</td>
                                        <td>David Wallace</td>
                                        <td>PRO54321</td>
                                        <td>Vu 80cm (32 inch) HD Ready LED TV</td>
                                        <td>$13,200</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge badge-danger-transparent">Pending</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#04</td>
                                        <td>Julia Bower</td>
                                        <td>PRO97654</td>
                                        <td>Micromax 81cm (32 inch) HD Ready LED TV</td>
                                        <td>$15,100</td>
                                        <td>Cash on delivered</td>
                                        <td><span class="badge badge-warning-transparent">Delivering</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#05</td>
                                        <td>Kevin James</td>
                                        <td>PRO4532</td>
                                        <td>HP 200 Mouse &amp; Wireless Laptop Keyboard </td>
                                        <td>$5,987</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge badge-danger-transparent">Shipped</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#06</td>
                                        <td>Theresa	Wright</td>
                                        <td>PRO6789</td>
                                        <td>Digisol DG-HR3400 Router </td>
                                        <td>$11,987</td>
                                        <td>Cash on delivered</td>
                                        <td><span class="badge badge-primary-transparent">Delivering</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#07</td>
                                        <td>Sebastian	Black</td>
                                        <td>PRO4567</td>
                                        <td>Dell WM118 Wireless Optical Mouse</td>
                                        <td>$4,700</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge badge-info-transparent">Add to Cart</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#08</td>
                                        <td>Kevin Glover</td>
                                        <td>PRO32156</td>
                                        <td>Dell 16 inch Laptop Backpack </td>
                                        <td>$678</td>
                                        <td>Cash On delivered</td>
                                        <td><span class="badge badge-pink-transparent">Delivered</span></td>
                                        <td class="">
                                            <a class="btn btn-success btn-sm br-5 me-2" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z"></path></svg>
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm br-5" href="javascript:void(0)">
                                                <i>
                                                    <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"></path></svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
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