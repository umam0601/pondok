@extends('main-admin')
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
                <strong>Tambah Data Pondok Pesantren</strong>
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
                <div class="ibox-title">
                  <h5>Tambah Data</h5>
                  <div class="ibox-tools" style="margin-top: -5px;">
                    <a href="{{route('admin.pondok')}}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                  </div>
                </div>
                <form action="" id="formAdd" enctype="multipart/form-data">
                @csrf
                <div class="ibox-content">
                  <div class="row">
                    <div class="col-6 col-md-6">
                      <div class="form-group">
                        <label for="p_name"><span class="text-danger">*</span>Nama Pondok</label>
                        <input type="text" name="p_name" class="form-control form-control-sm" id="p_name">
                        <span class="text-danger error-name d-none">Nama tidak boleh kosong!</span>
                      </div>
                      <div class="form-group">
                        <label for="p_pengasuh"><span class="text-danger">*</span>Nama Pengasuh</label>
                        <input type="text" name="p_pengasuh" class="form-control form-control-sm" id="p_pengasuh">
                        <span class="text-danger error-pengasuh d-none">Nama Pengasuh tidak boleh kosong!</span>
                      </div>
                      <div class="form-group">
                        <label for="p_phone"><span class="text-danger">*</span>No Telepon</label>
                        <input type="text" name="p_phone" class="form-control form-control-sm phone" id="p_phone" placeholder="Ex: 0895 3364 1658 6">
                        <span class="text-danger error-phone d-none">Telepon tidak boleh kosong!</span>
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
                        <select name="p_prov" id="provId" class="form-control select2">
                          <option value="" selected="" disabled="">Pilih Provinsi</option>
                          @foreach($prov as $key => $p)
                            <option value="{{$p->wp_id}}">{{$p->wp_name}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger error-prov d-none">Harap memilih provinsi!</span>
                      </div>
                      <div class="form-group">
                        <label for="p_kab"><span class="text-danger">*</span>Kabupaten/Kota</label>
                        <select name="p_kab" id="kabId" class="select2">
                          <option value="" selected="" disabled="">Pilih Kabupaten / Kota</option>
                        </select>
                        <span class="text-danger error-kab d-none">Harap memilih kabupaten!</span>
                      </div>
                      <div class="form-group">
                        <label for="p_kec"><span class="text-danger">*</span>Kecamatan</label>
                        <select name="p_kec" id="kecId" class="select2">
                          <option value="" selected="" disabled="">Pilih Kecamatan</option>
                        </select>
                        <span class="text-danger error-kec d-none">Harap memilih kecamatan!</span>
                      </div>
                      <div class="form-group">
                        <label for="p_address"><span class="text-danger">*</span>Alamat Lengkap</label>
                        <textarea name="p_address" id="address" cols="30" rows="5" class="form-control form-control-sm" style="height: 110px;" placeholder="Tuliskan alamat lengkap, ex: nama jalan, RT/RW dll."></textarea>
                        <span class="text-danger error-address d-none">Harap mengisi alamat lengkapa!</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-md-8">
                      <div class="form-group">
                        <label for="p_description">Keterangan Pondok Pesantren</label>
                        <textarea name="p_description" id="p_description" class="form-control form-control-sm ckeditor">Tuliskan keterangan seputar Pondok Pesantren</textarea>
                      </div>
                    </div>
                    <div class="col-4 col-md-4">
                      <div class="w-100">
                        <div class="row">
                          <div class="col-12 col-md-12">
                            <div class="form-group">
                              <label for="p_image">Upload Foto</label>
                              <img src="{{asset('public/images/thumbnail.png')}}" alt="" id="img-priview" class="img-fluid img-thumbnail">
                              <span id="imgError" class="text-danger d-none" style="font-size: 12px;">Gambar harus berupa file 'gif', 'jpg', 'png', 'jpeg'</span>
                            </div>
                          </div>
                          <div class="col-10 col-md-10">
                            <input type="file" class="custom-file-input" name="p_image" id="imageupload" style="height: 31px;">
                            <label class="custom-file-label" style="left: 15px; right: 0px;overflow: hidden; height: 31px;">Pilih Foto</label>
                          </div>
                          <div class="col-2 col-md-2 align-items-center" style="display: flex;">
                            <button type="button" class="btn btn-sm btn-block btn-reset btn-warning hint--top" aria-label="Reset Gambar"><i class="fa fa-sync-alt"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ibox-footer text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-simpan">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra_script')
<script type="text/Javascript">
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

  $('.btn-simpan').on('click', function(e) {
    // e.preventDefault();
    var name     = $('#p_name').val();
    var pengasuh = $('#p_pengasuh').val();
    var phone    = $('#p_phone').val();
    var prov     = $('#provId').val();
    var kab      = $('#kabId').val();
    var kec      = $('#kecId').val();
    var address  = $('#address').val();

    var result = 1;
    if (name == '' || name == null) {
      $('.error-name').removeClass('d-none');
      $('#p_name').focus();
      result = 0;
    } else {
      $('.error-name').addClass('d-none');
    }
    if (pengasuh == '' || pengasuh == null) {
      $('.error-pengasuh').removeClass('d-none');
      $('#p_pengasuh').focus();
      result = 0;
    } else {
      $('.error-pengasuh').addClass('d-none');
    }
    if (phone == '' || phone == null) {
      $('.error-phone').removeClass('d-none');
      $('#p_phone').focus();
      result = 0;
    } else {
      $('.error-phone').addClass('d-none');
    }
    if (prov == '' || prov == null) {
      $('.error-prov').removeClass('d-none');
      $('#provId').focus();
      result = 0;
    } else {
      $('.error-prov').addClass('d-none');
    }
    if (kab == '' || kab == null) {
      $('.error-kab').removeClass('d-none');
      $('#kabId').focus();
      result = 0;
    } else {
      $('.error-kab').addClass('d-none');
    }
    if (kec == '' || kec == null) {
      $('.error-kec').removeClass('d-none');
      $('#kecId').focus();
      result = 0;
    } else {
      $('.error-kec').addClass('d-none');
    }
    if (address == '' || address == null) {
      $('.error-address').removeClass('d-none');
      $('#address').focus();
      result = 0;
    } else {
      $('.error-address').addClass('d-none');
    }

    if (result == 1) {
      for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
      }
      $.ajax({
        url: "{{url('admin/pondok/save-data')}}",
        type: "post",
        data: new FormData(document.getElementById("formAdd")),
        contentType: false,
        cache: false,
        processData:false,
        success:function(resp) {
          if (resp.status == 'success') {
            messageSuccess('Data '+resp.data+' berhasil disimpan!', 'Berhasil!');
            setTimeout(function(){
              window.location.href = "{{route('admin.pondok')}}"
            }, 2000)
          } else {
            messageError('Gagal menyimpan data!', 'Gagal!');
          }        
        }
      });
    }
  });

  $('#imageupload').on('change',function(){
    var img = $('#imageupload').val();
    if (img == '' || img == null) {
      $('#img-priview').attr('src', '{{asset('public/images/thumbnail.png')}}');
      $('#imgError').addClass('d-none');
      $('.btn-simpan').removeAttr('disabled');
      $('#imageupload').val('');
      $('.custom-file-label').html('');
    }else{
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {

        var fileName = $(this).val().replace('C:\\fakepath\\', " ");;
        $(this).next('.custom-file-label').html(fileName);

        $('#imgError').addClass('d-none');
        $('#img-priview').addClass('animated zoomIn');
        $('.btn-simpan').removeAttr('disabled');
        readImg(this);

        setTimeout(function(){
          $('#img-priview').removeClass('animated zoomIn');
        }, 1000);
      }else{
        $('.btn-simpan').attr('disabled', '');
        $('#img-priview').attr('src', '{{asset('public/images/thumbnail.png')}}');
        $('#imgError').removeClass('d-none');
        $('#imageupload').val('');
        $('.custom-file-label').html('');
      }
    }
  });

  // Show image selected -->
  function readImg(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#img-priview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('.btn-reset').on('click', function(){
    $('#img-priview').attr('src', '{{asset('public/images/thumbnail.png')}}');
    $('#imgError').addClass('d-none');
    $('.btn-simpan').removeAttr('disabled');
    $('#imageupload').val('');
    $('.custom-file-label').html('');
  });
</script>
@endsection