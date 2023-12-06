<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />


    <title>Inventaires</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpg') }}" />
    


	<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" />
    
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@yield('style')
	
</head>

<body>


    @include('layout.navbar.preloader')
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">





        @yield('application')




    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


 

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js' )}}"></script>
	
	<!-- Apex Chart -->
	{{-- <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
	
	<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
	<!-- Dashboard 1 -->
	{{-- <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script> --}}
	<script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>
	<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
	
    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js' )}}"></script>
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>

    @stack('script')

</body>

</html>
