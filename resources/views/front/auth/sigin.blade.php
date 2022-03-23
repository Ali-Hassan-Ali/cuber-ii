<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('front_files/img/logo.ico') }}" type="image/png">
        <title>Cybersecurity</title>
        <!-- Bootstrap CSS -->
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
                                <!-- <img src="./img/logo.png" class="logo_design"> -->
                                <h3>LOGO</h3>
                        </div>
    <br>
                        <div class="form_login">

                            <div class="input_div">
                                <input type="text" class="input_form" id="name" placeholder="Name">
                            </div>

                            <div class="input_div">
                                <input type="email" class="input_form" id="email" placeholder=" Email">
                            </div>

                            <div class="input_div">
                                <input type="password" class="input_form" id="password" placeholder="Password">
                            </div>

                            <div class="input_div">
                                <input type="password" class="input_form" id="password_confirmation" placeholder="Confirm Password">
                            </div>
                        <div class="btn_login" style="margin: 5% !important;">
                            <button href="#" onclick="userStore()" class="login_now">continue</button>
                        </div>

                        <div class="have_account">
                            <p>I already have an account <span><a href="{{ route('user.login.page') }}">Login now</a></span></p>
                        </div>


                    </div>





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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin_files/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>


@section('scripts')
<script>
    function userStore() {
        axios.post('/register',{
            name:document.getElementById('name').value,
            email:document.getElementById('email').value,
            password:document.getElementById('password').value,
            password_confirmation:document.getElementById('password_confirmation').value,
            {{--  remember_me:document.getElementById('remember').checked,  --}}
        }).then(function (response) {
                // handle success
                console.log(response);
                window.location.href = '/';
                //toastr.success(response.data.message);
            }).catch(function (error) {
                // handle error
                console.log(error);
                toastr.error(error.response.data.message);
            })

    }
</script>

</body>

</html>
