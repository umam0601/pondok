<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('assets/backend/js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('assets/backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/select2/select2.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{asset('assets/backend/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/backend/js/demo/chart-pie-demo.js')}}"></script>
{{-- Input Mask --}}
<script src="{{asset('assets/backend/js/inputmask.min.js')}}"></script>
{{-- Text Editor Js --}}
<script src="{{asset('assets/backend/js/jquery-te-1.4.0.js')}}"></script>
<script src="{{asset('assets/backend/js/ckeditor/ckeditor.js')}}"></script>
{{-- <script src="{{asset('assets/backend/js/ckeditor/config.js')}}"></script>
<script src="{{asset('assets/backend/js/ckeditor/lang/id.js')}}"></script> --}}

 <!-- Page level plugins -->
<script type="text/JavaScript">
	$(document).ready(function(){
		$('.select2').select2({
      theme: "bootstrap",
      dropdownAutoWidth: true,
      width: '100%'
		});
		$('.data-table').dataTable().fnDestroy();
	});
</script>