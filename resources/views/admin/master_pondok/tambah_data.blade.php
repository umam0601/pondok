@extends('main-admin')
@section('extra_style')
<style type="text/css">
  .select2-container--bootstrap .select2-selection--single {
    height: calc(1.5em + .5rem + 2px) !important;
  }
</style>
@endsection
@section('name-heading')
Tambah Data Pondok
@endsection
@section('extra-button')
<a href="{{route('admin.pondok')}}" class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
  </div>
  <div class="card-body">
    <form action="" id="formAdd">
      <div class="row">
        <div class="col-6 col-md-6">
          <div class="form-group">
            <label for="p_name"><span class="text-danger">*</span>Nama Pondok</label>
            <input type="text" name="p_name" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="p_pengasuh"><span class="text-danger">*</span>Nama Pengasuh</label>
            <input type="text" name="p_pengasuh" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="p_phone"><span class="text-danger">*</span>No Telepon</label>
            <input type="text" name="p_phone" class="form-control form-control-sm" id="phone">
          </div>
          <div class="form-group">
            <label for="p_email">Alamat Email</label>
            <input type="email" name="p_email" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="p_web">Situs Web</label>
            <input type="text" name="p_web" class="form-control form-control-sm">
          </div>
        </div>
        <div class="col-6 col-md-6">
          <div class="form-group">
            <label for="p_prov"><span class="text-danger">*</span>Provinsi</label>
            <select name="p_prov" id="provId" class="form-control form-control-sm select2">
              <option value="" selected="" disabled="">=== Pilih Provinsi ===</option>
              @foreach($prov as $key => $p)
                <option value="{{$p->wp_id}}">{{$p->wp_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="p_kab"><span class="text-danger">*</span>Kabupaten/Kota</label>
            <select name="p_kab" id="kabId" class="select2">
              <option value="" selected="" disabled="">=== Pilih Kabupaten / Kota ===</option>
            </select>
          </div>
          <div class="form-group">
            <label for="p_kec"><span class="text-danger">*</span>Kecamatan</label>
            <select name="p_kec" id="kecId" class="select2">
              <option value="" selected="" disabled="">=== Pilih Kecamatan ===</option>
            </select>
          </div>
          <div class="form-group">
            <label for="p_address"><span class="text-danger">*</span>Alamat Lengkap</label>
            <textarea name="p_address" id="address" cols="30" rows="5" class="form-control form-control-sm" style="height: 110px;" placeholder="Tuliskan alamat lengkap"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="form-group">
            <label for="p_description">Keterangan Pondok Pesantren</label>
            <textarea name="p_description" id="description" placeholder="Tuliskan keterangan seputar Pondok Pesantren"></textarea>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-6"><span><span class="text-danger">*</span> Wajib diisi.</span></div>
      <div class="col-6">
        <div class="text-right">
          <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('extra_script')
<script type="text/Javascript">
	var tb_pondok;
	$(document).ready(function(){    
    $('#phone').inputmask("9999 9999 9999 9",{
      autoUnmask: true
    });
    CKEDITOR.replace('description');
	});

  function save() {
    alert($('#phone').val());
  }

  $('#provId').on('change', function() {
    var provId = $('#provId').val();
    $.ajax({
      url: "{{url('/get-city')}}" + "/" + provId,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#kabId').empty();
        $("#kabId").append('<option value="" selected disabled>=== Pilih Kabupaten / Kota ===</option>');
        $.each(resp.kota, function(key, val){
          $("#kabId").append('<option value="'+val.wc_id+'">'+val.wc_name+'</option>');
        });
        $('#kabId').select2('open');
      }
    });
  });

  $('#kabId').on('change', function() {
    var kabId = $('#kabId').val();
    $.ajax({
      url: "{{url('/get-kecamatan')}}" + "/" + kabId,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#kecId').empty();
        $("#kecId").append('<option value="" selected disabled>=== Pilih Kecamatan ===</option>');
        $.each(resp.camat, function(key, val){
          $("#kecId").append('<option value="'+val.wk_id+'">'+val.wk_name+'</option>');
        });
        $('#kecId').select2('open');
      }
    });
  });
</script>
@endsection