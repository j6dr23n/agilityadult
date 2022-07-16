@extends('frontend.layouts.app')

@section('extra-css')
    <style>
        .ads-container {
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ads-button {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
@endsection
@section('content')
    <main>
        <div class="bg-gray-4500 dark">
            <div class="container">
                @foreach ($errors->all() as $error)
                    <p class="text-red-700 text-danger text-bold text-center">{{ $error }}</p>
                @endforeach
                <!-- adsterra ads native start -->
                <script type="text/javascript">
                    atOptions = {
                        'key': 'ce6eb5a7d8a9e4cd6486f5b6a97f4cef',
                        'format': 'iframe',
                        'height': 250,
                        'width': 300,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') +
                        '://silldisappoint.com/ce6eb5a7d8a9e4cd6486f5b6a97f4cef/invoke.js"></scr' + 'ipt>');
                </script>
                <!-- adsterra ads native end -->
                <!-- adsterra ads native start -->
                <script type="text/javascript">
                    atOptions = {
                        'key': 'ce6eb5a7d8a9e4cd6486f5b6a97f4cef',
                        'format': 'iframe',
                        'height': 250,
                        'width': 300,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') +
                        '://silldisappoint.com/ce6eb5a7d8a9e4cd6486f5b6a97f4cef/invoke.js"></scr' + 'ipt>');
                </script>
                <!-- adsterra ads native end -->
                <div class="ads-container">
                    <div class="ads-button text-center">
                        <p class="font-size-2 text-white" id="countdown"></p>
                        <a id="ads-btn" class="btn btn-primary btn-pills ads-a" style="display: none;">ဒေါင်းရန်နှိပ်ပါ။</a>
                    </div>
                </div>
                <!-- adsterra ads native start -->
                <script type="text/javascript">
                    atOptions = {
                        'key': 'ce6eb5a7d8a9e4cd6486f5b6a97f4cef',
                        'format': 'iframe',
                        'height': 250,
                        'width': 300,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') +
                        '://silldisappoint.com/ce6eb5a7d8a9e4cd6486f5b6a97f4cef/invoke.js"></scr' + 'ipt>');
                </script>
                <!-- adsterra ads native end -->
                <!-- adsterra ads native start -->
                <script type="text/javascript">
                    atOptions = {
                        'key': 'ce6eb5a7d8a9e4cd6486f5b6a97f4cef',
                        'format': 'iframe',
                        'height': 250,
                        'width': 300,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') +
                        '://silldisappoint.com/ce6eb5a7d8a9e4cd6486f5b6a97f4cef/invoke.js"></scr' + 'ipt>');
                </script>
                <!-- adsterra ads native end -->
            </div>
        </div>
    </main>
@endsection
@section('extra-js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $('#ads-btn').delay(10000).show(0);
        var timeleft = 9;
        var downloadTimer = setInterval(function() {
            if (timeleft <= 0) {
                clearInterval(downloadTimer);
                $("#countdown").hide();
                $(".ads-a").prop("href", '{{ $download_link }}');
            } else {
                document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
            }
            timeleft -= 1;
        }, 1000);
    </script>
@endsection
