@extends('frontend.layouts.app')

@section('content')
    <main id="content">
        <div class="space-2 bg-gray-1100">
            <div class="container">

                <div class="text-center">
                    <ul class="nav tab-nav-landing flex-nowrap flex-md-wrap" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">
                                <div class="display-6"><i class="far fa-credit-card"></i></div>
                                <div class="font-secondary font-size-16">Pick our Plan</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="font-secondary text-center space-2">
                        <h1 class="display-6 mb-3 text-white">Choose one plan and watch everything on Agility Adult-</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless text-gray-4700 font-size-23-r font-secondary text-center">
                            <thead>
                                <tr class="text-white font-weight">
                                    <th scope="col"></th>
                                    <th scope="col">BASIC</th>
                                    <th scope="col">STANDARD</th>
                                    <th scope="col">PREMIUM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Monthly price after free
                                        month ends on 15/9/18</th>
                                    <td>Rs. 500</td>
                                    <td>Rs. 650</td>
                                    <td>Rs. 800</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">HD available</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Screens you can watch on at
                                        the same time</th>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Watch on your laptop, TV,
                                        phone and tablet</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Unlimited films and TV
                                        programmes</th>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Cancel at any time</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">First month free</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center space-2">
                        <a href=""
                            class="btn btn-primary btn-pill text-lh-1dot25 py-3d font-secondary font-weight-medium font-size-18-r px-md-7d px-6">Start
                            Contact Agility Adult-</a>
                        <a href="javascript:;" data-toggle="modal" data-target="#loginModal"
                            class="btn btn-primary ml-6 btn-pill text-lh-1dot25 py-3d font-secondary font-weight-medium font-size-18-r px-md-7d px-6">
                            Click here to Sign In Account</a>
                    </div>
                </div>


                {{-- <div class="tab-content">

                </div> --}}

            </div>
        </div>
    </main>
@endsection
