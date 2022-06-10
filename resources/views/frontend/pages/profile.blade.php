@extends('frontend.layouts.app')

@section('content')
    <main id="content">
        <div class="bg-gray-1500 py-4 pt-lg-4 pb-lg-4 mb-4 mb-lg-4">
            <div class="container px-md-5 mb-lg-2">
                <h6 class="font-size-30 font-weight-semi-bold text-center mb-1">
                    Profile
                </h6>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pages.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="space-bottom-1 space-bottom-lg-2">
            <div class="container px-md-5 pb-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5 mb-lg-0">
                            <h5 class="font-size-18 font-weight-medium mb-4">
                                User Infromation
                            </h5>

                            <form action="{{ route('pages.profile_update',auth()->id()) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="js-form-message">
                                            <label
                                                class="input-label font-size-15 font-weight-medium font-size-15 font-weight-medium">
                                                Your name
                                            </label>
                                            <input type="text" name="name" class="form-control rounded-0" value="{{ auth()->user()->name }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="js-form-message">
                                            <label class="input-label font-size-15 font-weight-medium">
                                                Your email address
                                            </label>
                                            <input type="email" name="email" class="form-control rounded-0" value="{{ auth()->user()->email }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="js-form-message">
                                            <label class="input-label font-size-15 font-weight-medium">
                                                Contact Information
                                            </label>
                                            <input type="text" class="form-control rounded-0" name="info" value="{{ auth()->user()->info }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="js-form-message">
                                            <label class="input-label font-size-15 font-weight-medium">
                                                New Password
                                            </label>
                                            <input type="password" name="password" class="form-control rounded-0" />
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="js-form-message">
                                            <label class="input-label font-size-15 font-weight-medium">
                                                Expiry Date
                                            </label>
                                            <input type="text" class="form-control rounded-0" value="{{ \Carbon\Carbon::parse(auth()->user()->expiry_date)->diffForHumans() }} = ({{ auth()->user()->expiry_date }})" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button type="submit"
                                            class="btn btn-block btn-primary px-3 transition-3d-hover border-radius-sm font-size-1">
                                            <span class="mx-1">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
