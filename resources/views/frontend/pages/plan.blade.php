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
                                    <th scope="col">1 Month</th>
                                    <th scope="col">3 Months</th>
                                    <th scope="col">6 Months</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Pirce</th>
                                    <td>{{ number_format(4000) }} mmk</td>
                                    <td>{{ number_format(11000) }} mmk</td>
                                    <td>{{ number_format(22000) }} mmk</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">HD available</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Only fan Leaks</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Exantria Leaks</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Pornhub Premium Content</th>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Webcam Girls</th>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Asian 18+ movies</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Hentai with mmsub</th>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-normal text-left">Manga with mmsub</th>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center space-1">
                        <a href=""
                            class="btn btn-primary btn-pill text-lh-1dot25 py-3d font-secondary font-weight-medium font-size-18-r px-md-7d px-6">
                            အကောင့်ဝယ်ယူရန်

                        </a>
                    </div>
                    <div class="text-center">
                        <a href="javascript:;" data-toggle="modal" data-target="#loginModal"
                            class="btn btn-secondary btn-pill text-lh-1dot25 py-3d font-secondary font-weight-medium font-size-18-r px-md-7d px-2">
                            အကောင့်သို့ဝင်ရန်
                        </a>
                    </div>
                </div>


                {{-- <div class="tab-content">

                </div> --}}

            </div>
        </div>
    </main>
@endsection
