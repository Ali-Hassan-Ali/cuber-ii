<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('front_files/img/logo.ico') }}" type="image/png">
    <title>Cybersecurity</title>
    <!-- Bootstrap CSS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin_files/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('front_files/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/vendor/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/vendor/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/vendor/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/vendor/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/vendor/flaticon/flaticon.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('front_files/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('front_files/js/function.js') }}">
</head>

<body>


<div class="login_div" style="height: 100%;">

    <div class="forget_hero" style="top: 6% !important;">

        <div class="control" style="width: 400px;">
            <div class="logo_img" style="margin: 0px !important;">

            </div>
            <br>
            <h3 class="text-primary text-center">Sign In</h3>
            
            <br><br>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.login') }}">
                @csrf
                <div class="form_login">

                    <div class="input_div">
                        <input type="email" value="user@app.com" class="input_form" placeholder=" Email" name="email" required value="{{ old('email') }}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input_div">
                        <input type="password" class="input_form" value="123123123" placeholder="Password" name="password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <div class="btn_login" style="margin: 5% !important;">
                       <button class="login_now">continue</button>
                    </div>



                </div>

            </form>





        </div>
    </div>

    <div class="area" >
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div >


</div>
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>


    </div>

    <!--- <div class="login_div">



    <div class="area" >
                <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                </ul>
        </div >


    </div>-->





    <script src="{{ asset('front_files/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front_files/js/popper.js') }}"></script>
    <script src="{{ asset('front_files/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front_files/js/stellar.js') }}"></script>
    <script src="{{ asset('front_files/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front_files/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front_files/vendor/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front_files/vendor/isotope/isotope-min.js') }}"></script>
    <script src="{{ asset('front_files/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front_files/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('front_files/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front_files/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front_files/js/mail-script.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('front_files/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('front_files/js/theme.js') }}"></script>
    <script src="{{ asset('front_files/js/function.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>



    @section('scripts')
        <script>
            function userStore() {
                axios.post('/user/login', {

                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,

                }).then(function(response) {
                    // handle success
                    console.log(response);
                    window.location.href = '/';
                    //toastr.success(response.data.message);
                }).catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })

            }
        </script>

    </body>

    </html>
