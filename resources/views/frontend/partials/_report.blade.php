<div class="modal fade" id="reportForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="close position-absolute top-0 right-0 z-index-2 mt-3 mr-3" data-dismiss="modal"
                aria-label="Close">
                <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                </svg>
            </button>

            <div class="modal-body">
                <form class="js-validate" method="POST" action="{{ route('reports.store') }}">
                @csrf
                    <input type="hidden" value="{{ $video->id }}" name="video_id">
                    <div id="login">
                        <div class="text-center mb-7">
                            <h3 class="mb-0">Content removal form.</h3>
                            <p>Please fill all of the forms below.</p>
                        </div>

                        <div class="js-form-message mb-4">
                            <label class="input-label">Full Legal Name <span class="text-sm">(required)</span></label>
                            <div class="input-group input-group-sm mb-2">
                                <input type="name" class="form-control" name="name" id="legalName"
                                    placeholder="Enter your legal full name" aria-label="Legal Name" required value="{{ old('name') }}"
                                    data-msg="Please enter a valid legal name.">
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <label class="input-label">Email <span class="text-sm">(required)</span></label>
                            <div class="input-group input-group-sm mb-2">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email address" aria-label="Email" required
                                    data-msg="Your email is invalid. Please try again.">
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <label class="input-label">Phone Number <span class="text-sm">(required)</span></label>
                            <div class="input-group input-group-sm mb-2">
                                <input type="number" class="form-control" name="ph_number" id="phNumber"
                                    placeholder="+95912345678" aria-label="Email" required
                                    data-msg="Your phone number is invalid. Please try again.">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="input-label">Information for remove content <span class="text-sm">(required)</span></label>
                            <div class="input-group input-group-sm mb-2">
                                <textarea type="text" class="form-control" name="info" required placeholder="Enter your information to remove this content..."></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-info btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
