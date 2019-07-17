<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/toast/dist/jquery.toast.min.js')}}"></script>
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
	var newNotif = new Audio('{{ asset('assets/backend/sound/newNotif.mp3') }}');
	var notifAlert = new Audio('{{ asset('assets/backend/sound/newNotif.mp3') }}');
	var notifSuccess = new Audio('{{ asset('assets/backend/sound/notifSuccess.mp3') }}');
	var notifUnsuccess = new Audio('{{ asset('assets/backend/sound/notifUnsuccess.mp3') }}');

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

	function messageSuccess(text) {
        $.toast({
            text: text,
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'success',
            hideAfter: 5000,
            beforeShow: function(){
                notifSuccess.play();
            }
        });
	}

	function messageWarning(text) {
        $.toast({
            text: text,
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'warning',
            hideAfter: 5000,
            beforeShow: function(){
                notifUnsuccess.play();
            }
        });
	}

	function messageError(text) {
        $.toast({
            text: 'Contoh Notifikasi Saat Error',
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'error',
            hideAfter: 5000,
            beforeShow: function(){
                notifUnsuccess.play();
            }
        });
	}

	function messageInfo(text) {
        $.toast({
            text: text,
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'info',
            hideAfter: 5000,
            beforeShow: function(){
                notifAlert.play();
            }
        });
	}
</script>