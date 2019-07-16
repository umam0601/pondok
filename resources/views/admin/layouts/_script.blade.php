<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
{{-- <script src="{{asset('assets/alert/js/jquery-1.8.2.min.js')}}"></script> --}}
<script src="{{asset('assets/backend/js/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('assets/backend/js/sb-admin-2.min.js')}}"></script>
<!-- Plugin Axios -->
<script src="{{asset('node_modules/axios/dist/axios.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('assets/backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/select2/select2.js')}}"></script>
<!-- Page level custom scripts -->
{{-- <script src="{{asset('assets/backend/vendor/chart.js/Chart.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/backend/js/demo/chart-area-demo.js')}}"></script> --}}
{{-- <script src="{{asset('assets/backend/js/demo/chart-pie-demo.js')}}"></script> --}}
{{-- Input Mask --}}
<script src="{{asset('assets/backend/js/inputmask.min.js')}}"></script>
{{-- Text Editor Js --}}
<script src="{{asset('assets/backend/js/jquery-te-1.4.0.js')}}"></script>
{{-- <script src="{{asset('assets/ckeditor/ckeditor.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('assets/backend/js/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
{{-- Alert Plugin --}}
<script src="{{asset('assets/alert/js/jquery.notify.min.js')}}"></script>

 <!-- Page level plugins -->
<script type="text/JavaScript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
	$(document).ready(function(){
		$('.select2').select2({
      theme: "bootstrap",
      dropdownAutoWidth: true,
      width: '100%'
		});

		$('.data-table').dataTable().fnDestroy();
		
    $('.phone').inputmask("9999 - 9999 - 9999 - 9",{
      autoUnmask: true
    });

    $('[data-toggle="tooltip"]').tooltip();
	});

	function messageSuccess(a, b) {
		notify({
			//alert | success | error | warning | info
			type: "success", 
			title: a,
			//custom message
			message: b,
			position: {
			  //right | left | center
			  x: "right",
			  //top | bottom | center
			  y: "top" 
			},
			// notify icon
			icon: '<img src="{{asset('assets/alert/images/check.png')}}" />',
			//normal | full | small
			size: "normal",
			overlay: false, 
			closeBtn: true, 
			overflowHide: false, 
			spacing: 20,
			//default | dark-theme
			theme: "default",
			//auto-hide after a timeout
			autoHide: true,
			// timeout
			delay: 2500
		});
	}

	function messageWarning(a, b) {
		notify({
			//alert | success | error | warning | info
			type: "warning", 
			title: a,
			//custom message
			message: b,
			position: {
			  //right | left | center
			  x: "right",
			  //top | bottom | center
			  y: "top" 
			},
			// notify icon
			icon: '<img src="{{asset('assets/alert/images/warning.png')}}" />',
			//normal | full | small
			size: "normal",
			overlay: false, 
			closeBtn: true, 
			overflowHide: false, 
			spacing: 20,
			//default | dark-theme
			theme: "default",
			//auto-hide after a timeout
			autoHide: true,
			// timeout
			delay: 2500
		});
	}

	function messageError(a, b) {
		notify({
			//alert | success | error | warning | info
			type: "error", 
			title: a,
			//custom message
			message: b,
			position: {
			  //right | left | center
			  x: "right",
			  //top | bottom | center
			  y: "top" 
			},
			// notify icon
			icon: '<img src="{{asset('assets/alert/images/error.png')}}" />',
			//normal | full | small
			size: "normal",
			overlay: false, 
			closeBtn: true, 
			overflowHide: false, 
			spacing: 20,
			//default | dark-theme
			theme: "default",
			//auto-hide after a timeout
			autoHide: true,
			// timeout
			delay: 2500
		});
	}

	function messageInfo(a, b) {
		notify({
			//alert | success | error | warning | info
			type: "Info", 
			title: a,
			//custom message
			message: b,
			position: {
			  //right | left | center
			  x: "right",
			  //top | bottom | center
			  y: "top" 
			},
			// notify icon
			icon: '<img src="{{asset('assets/alert/images/info.svg')}}" />',
			//normal | full | small
			size: "normal",
			overlay: false, 
			closeBtn: true, 
			overflowHide: false, 
			spacing: 20,
			//default | dark-theme
			theme: "default",
			//auto-hide after a timeout
			autoHide: true,
			// timeout
			delay: 2500
		});
	}
</script>