<!-- javascript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('assets/frontend/js/jquery.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/frontend/js/jcarousel/jquery.jcarousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('assets/frontend/js/google-code-prettify/prettify.js')}}"></script>
<script src="{{asset('assets/frontend/js/portfolio/jquery.quicksand.js')}}"></script>
<script src="{{asset('assets/frontend/js/portfolio/setting.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.nivo.slider.js')}}"></script>
<script src="{{asset('assets/frontend/js/modernizr.custom.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.ba-cond.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.slitslider.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.cslider.js')}}"></script>
<script src="{{asset('assets/frontend/js/animate.js')}}"></script>

<script src="{{asset('assets/select2/select2.full.min.js')}}"></script>
{{-- Axios--}}
<script src="{{asset('assets/js/axios/dist/axios.min.js')}}"></script>
{{-- Leaflet Map --}}
<script src="{{asset('assets/js/leaflet/leaflet.js')}}"></script>

{{-- Jquery Confirm --}}
<script src="{{asset('assets/js/jquery-confirm/dist/jquery-confirm.min.js')}}"></script>
<!-- Template Custom JavaScript File -->
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>
{{-- Reg & Log --}}
<script type="text/JavaScript">
	$(document).ready(function(){
		$('.select2').select2();
		$('.loading').fadeOut();
	});

	function loadingShow() {
		$('.loading').fadeIn();
	}
	function loadingHide() {
		$('.loading').fadeOut();
	}

	$('#keyword').keypress(function(e){
    if(e.which == 13) {
      e.preventDefault();
      searching();
    }
  });

	function searching(){
		var keyword = $('#keyword').val();
		loadingShow()
		setTimeout(function(){
			window.location.href= "{{url('pondok-pesantren/search?')}}keyword="+keyword+"";
		}, 1500);
	}
</script>
