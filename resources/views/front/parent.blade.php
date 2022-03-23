<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{ asset('front_files/img/logo.ico') }}" type="image/png">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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

	<style type="text/css">
		.checked {
		  color: orange;
		}
	</style>
</head>

<body>

	<!--================Header Menu Area =================-->



	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="{{ asset('front_files/"img/.png') }}" style="height: 50px;">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        {{--  @auth  --}}

						<ul class="nav navbar-nav menu_nav justify-content-center">
							<li class="nav-item active"><a class="nav-link" href="{{ url('') }}">Home</a></li>
							<li class="nav-item "><a class="nav-link" href="{{ route('cyberPages') }}">Cybersecurity</a></li>
							<li class="nav-item "><a class="nav-link" href="{{ route('grcPages') }}">GRC</a></li>

							<li class="nav-item"><a class="nav-link" href="{{ route('ksa') }}">KSA Cybersecurity </a>
							<li class="nav-item"><a class="nav-link" href="{{ route('international') }}">international Cybersecurity </a>
							<li class="nav-item"><a class="nav-link" href="{{ route('certificate') }}">certificate </a>
						</ul>
						<div class="dropdown user_name_div">
							<a class="btn  btn-outline-light "  href="#" role="button"
								id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{@ Auth::user()->name }}
							</a>
						</div>
                       <a  href="{{ route('user.logout') }}"> <i class="fa fa-sign-out" style="font-size:40px;color:rgb(80, 76, 76)"></i></a>

                        {{--  @else  --}}


                        {{--  @endauth  --}}





					</div>
                    @guest
                    <ul class="nav navbar-nav navbar-right" style="margin-bottom: 10px;margin-top: 10px" >
                        <li class="nav-item"><a href="{{ route('user.register') }}" class="primary_btn " style=" text-transform: capitalize" > Register/Login</a></li>
                    </ul>

                    @endguest
                    <br><br>

				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->



@yield('content')

	<!--================ Srart Brand Area ===============-->

	<!--================ End Brand Area =================-->


	<!--================Footer Area =================-->






<!-- Footer -->

  <!-- Footer -->



	<!--================End Footer Area =================-->


	<div class="footer-basic">
        <footer>
            <div class="social">
				<a href="#"><i class="icon ion-social-linkedin"></i></a>
				<a href="#"><i class="icon ion-social-twitter"></i></a>

				</div>

            <p class="copyright"><a style="color: aliceblue;" target="_blank" href="https://ksu.edu.sa">copyright : King Saud university</a> © 2022</p>
        </footer>
    </div>





	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin_files/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>


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

    <script type="text/javascript">
    	$(document).ready(function() {

    		$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

    		$('.fa-star').on('click', function (e) {
    			e.preventDefault();

    			var count = $(this).data('count');
    			var id    = $(this).data('id');
    			var userId= $(this).data('user-id');
    			var method= 'post';
    			var url   = "{{ asset('ratings') }}";
    			
    			$.ajax({
					url: url,
					method: method,
					data: {
						cybersecurity_id : id,
						count : count,
						user_id : userId,
					},
					success: function (data) {

						location.reload();
					}
				});

    			// alert($(this).data('rating'));
    		});
    	});
    </script>

</body>

</html>
