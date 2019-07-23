<!-- Mainly scripts -->
<script src="{{asset('assets/backend/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/backend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{asset('assets/backend/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/flot/jquery.flot.pie.js')}}"></script>

<!-- Peity -->
<script src="{{asset('assets/backend/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/backend/js/demo/peity-demo.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('assets/backend/js/inspinia.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/pace/pace.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('assets/backend/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- GITTER -->
<script src="{{asset('assets/backend/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('assets/backend/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{asset('assets/backend/js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{asset('assets/backend/js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('assets/backend/js/plugins/toastr/toastr.min.js')}}"></script>

{{-- Data Table --}}
<script src="{{asset('assets/backend/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

<!-- SUMMERNOTE -->
<script src="{{asset('assets/backend/js/plugins/summernote/summernote-bs4.js')}}"></script>

{{-- CK Editor --}}
<script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>

{{-- Input Mask--}}
<script src="{{asset('assets/js/input-mask/dist/jquery.mask.js')}}"></script>
{{-- Axios--}}
<script src="{{asset('assets/js/axios/dist/axios.min.js')}}"></script>

{{-- Font Awesome--}}
<script src="{{asset('assets/js/font-awesome/all.min.js')}}"></script>

<script src="{{asset('assets/select2/select2.full.min.js')}}"></script>

{{-- Jquery Confirm --}}
<script src="{{asset('assets/js/jquery-confirm/dist/jquery-confirm.min.js')}}"></script>
{{-- Leaflet Map --}}
<script src="{{asset('assets/js/leaflet/leaflet.js')}}"></script>

<script type="text/javascript">
var notifInfo = new Audio('{{ asset('assets/sound/newNotif.mp3') }}');
var notifSuccess = new Audio('{{ asset('assets/sound/notifSuccess.mp3') }}');
var notifError = new Audio('{{ asset('assets/sound/notifUnsuccess.mp3') }}');
$(document).ready(function() {
    var data1 = [
        [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
    ];
    var data2 = [
        [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
    ];
    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
        data1, data2
    ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis:{
                },
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            }
    );

    var doughnutData = {
        labels: ["App","Software","Laptop" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
        }]
    } ;


    var doughnutOptions = {
        responsive: false,
        legend: {
            display: false
        }
    };

    var doughnutData = {
        labels: ["App","Software","Laptop" ],
        datasets: [{
            data: [70,27,85],
            backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
        }]
    } ;


    var doughnutOptions = {
        responsive: false,
        legend: {
            display: false
        }
    };
    $('.select2').select2({
        // theme: "bootstrap",
        dropdownAutoWidth: true,
        width: '100%'
    });
    $('.phone').mask('9999 9999 9999 9')

});

function messageSuccess(desc, title) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "linear",
        "hideEasing": "swing",
        "showMethod": "show",
        "hideMethod": "hide"
    };
    toastr.success(desc, title);
    notifSuccess.play();
}

function messageWarning(desc, title) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "linear",
        "hideEasing": "swing",
        "showMethod": "show",
        "hideMethod": "hide"
    };
    toastr.warning(desc, title);
    notifError.play()
}

function messageInfo(desc, title) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "linear",
        "hideEasing": "swing",
        "showMethod": "show",
        "hideMethod": "hide"
    };
    toastr.info(desc, title);
    notifInfo.play()
}

function messageError(desc, title) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "linear",
        "hideEasing": "swing",
        "showMethod": "show",
        "hideMethod": "hide"
    };
    toastr.error(desc, title);
    notifError.play()
}

function loadingShow() {
    $('#cover-spin').fadeIn();
}

function loadingHide() {
    $('#cover-spin').fadeOut();
}
</script>