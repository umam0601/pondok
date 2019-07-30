@extends('main-admin')
@section('extra_style')
<style type="text/css">
.map-content {
  height: 400px;
}
</style>
@endsection
@section('main-content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pondok Pesantren</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.pondok')}}">Master Pondok</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Map Pondok {{$pondok->p_name}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title pr-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-left">
                                <h5>Map Pondok {{$pondok->p_name}}</h5>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('admin.pondok')}}" class="btn btn-sm btn-default btn-rounded"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <form action="" id="save-map">
                  @csrf
                <div class="ibox-content">
                    <div class="row">
                      <div class="col-8 col-md-8 col-sm-12 map-content" id="PonPesMap">
                        
                      </div>
                      <div class="col-4 col-md-4 col-sm-12">
                        <div class="row">
                          <div class="col-12 col-md-12 col-sm-6">
                            <div class="form-group mb-1">
                              <label for="latitude">Latitude</label>
                              @if($pondok_map)
                                <input type="text" name="pm_latitude" id="latitude" class="form-control form-control-sm" value="{{$pondok_map->pm_latitude}}">
                              @else
                                <input type="text" name="pm_latitude" id="latitude" class="form-control form-control-sm">
                              @endif
                              <input type="hidden" name="pm_pondok" id="pm_pondok" value="{{$pondok->p_id}}">
                              <input type="hidden" name="pm_id" id="pm_id">
                            </div>
                            <span class="text-danger lat-error d-none">Latitue tidak boleh kosong!</span>
                          </div>
                          <div class="col-12 col-md-12 col-sm-6 mb-2">
                            <div class="form-group mt-3 mb-1">
                              <label for="longitude">Longitude</label>
                              @if($pondok_map)
                                <input type="text" name="pm_longitude" id="longitude" class="form-control form-control-sm" value="{{$pondok_map->pm_longitude}}">
                              @else
                                <input type="text" name="pm_longitude" id="longitude" class="form-control form-control-sm">
                              @endif
                            </div>
                            <span class="text-danger long-error d-none">Longitude tidak boleh kosong!</span>
                          </div>
                          <div class="col-12">
                            <div class="row">
                              <div class="col-6 col-md-6 col-sm-6">
                                @if($pondok_map)
                                  <button type="button" class="btn btn-sm btn-warning btn-update d-none" onclick="saveMap()">Update</button>
                                @else
                                  <button type="button" class="btn btn-sm btn-primary btn-save" onclick="saveMap()">Simpan</button>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.pondok.modal.modal_map')
@endsection
@section('extra_script')
<script type="text/javascript">
  var map;
  $(document).ready(function() {
    get_map();
  })

  function get_map() {
    var id = $('#pm_pondok').val();
    $.ajax({
      url: '{{url('admin/pondok/get-latlng')}}',
      type: 'get',
      data: {id: id},
      dataType: 'json',
      success:function(resp){
        if (resp.length > 0) {
          $('#pm_id').val(resp[0].pm_id)
          map = L.map('PonPesMap').setView([resp[0].pm_latitude, resp[0].pm_longitude], 15);
          L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=JrA8XZ6ajy9lV3aT8OeF', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'})
            .addTo(map);
          marker = new L.marker([resp[0].pm_latitude, resp[0].pm_longitude])
            .bindPopup(resp[0].p_name)
            .addTo(map);

          check_latlng()
        }else{
          map = L.map('PonPesMap').setView([-0.789275, 113.9213257], 5);
          L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=JrA8XZ6ajy9lV3aT8OeF', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'})
            .addTo(map);
        }
      }
    })
  }

  function check_latlng() {
    $('#latitude').on('keyup', function(){
      var lat = $('#latitude').val()
      var id = $('#pm_pondok').val()
      $.ajax({
        url: "{{route('admin.pondok.check_latlng')}}?id=" + id,
        type: "get",
        success:function(resp) {
          console.log(lat, resp[0].pm_latitude)
          if (lat !== resp[0].pm_latitude) {
            $('.btn-update').removeClass('d-none')
          }else{
            $('.btn-update').addClass('d-none')
          }
        }
      })
    });

    $('#longitude').on('keyup', function(){
      var lat = $('#longitude').val()
      var id = $('#pm_pondok').val()
      $.ajax({
        url: "{{route('admin.pondok.check_latlng')}}?id=" + id,
        type: "get",
        success:function(resp) {
          console.log(lat, resp[0].pm_latitude)
          if (lat !== resp[0].pm_latitude) {
            $('.btn-update').removeClass('d-none')
          }else{
            $('.btn-update').addClass('d-none')
          }
        }
      })
    });
  }

  function saveMap(){
    var result = 1;
    var lat = $('#latitude').val()
    var long = $('#longitude').val()

    if (lat == "" || lat == null) {
      $('.lat-error').removeClass('d-none')
      $('#latitude').focus();
      result = 0;
    }else{
      $('.lat-error').addClass('d-none')
    }
    if (long == "" || long == null) {
      $('.long-error').removeClass('d-none')
      $('#longitude').focus();
      result = 0;
    }else{
      $('.long-error').addClass('d-none')
    }

    if (result == 1) {
      save();
    }
  }

  function save() {
    var formData = $('#save-map').serialize();
    axios.post('{{route('admin.pondok.save_map')}}', formData)
    .then(function(resp){
      if (resp.data.status == 'success') {
        messageSuccess('Map berhasil disimpan...', 'Berhasil!');
        setTimeout(function(){
          window.location.href = "{{url('admin/pondok/map')}}"+"/"+resp.data.data
        }, 2000)
      }else{
        messageError('Gagal menyimpan data ...', 'Gagal!')
      }
    })
  }
</script>
@endsection