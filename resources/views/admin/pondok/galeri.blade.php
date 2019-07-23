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
                <a href="{{route('admin.pondok')}}">Mster Pondok</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Galeri Pondok {{$pondok->p_name}}</strong>
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
                                <h5>Galeri Pondok {{$pondok->p_name}}</h5>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" id="toggleSpinners" class="btn btn-sm btn-primary btn-rounded" data-toggle="tooltip" data-placement="top" title="Tambah Gambar" onclick="addGalery()"><i class="fa fa-plus"></i> Tambah Gambar</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        @if(count($galeri) == 0)
                            <div class="col-12 tex-center align-items-center">
                                <p class="text-secondary text-center mb-0">Data masih kosong</p>
                            </div>
                        @else
                            @foreach($galeri as $key => $g)
                            <div class="col-2 col-md-2 col-sm-2">
                                <div class="w-100 border p-1">
                                    <div style="background: url('{{asset('public/galeri/upload/'.$g->p_code.'/'.$g->pd_image.'')}}') no-repeat center center; background-size: cover;">
                                        <a data-gallery="" onclick="showImage('{{asset('public/galeri/upload/'.$g->p_code.'/'.$g->pd_image.'')}}')">
                                            <img src="{{asset('assets/images/img-transparent.png')}}" alt="" class="img-fluid">
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="ibox-footer">
                    <a href="{{route('admin.pondok')}}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.pondok.modal.modal_add_galery')
@include('admin.pondok.modal.modal_show_image')
@endsection
@section('extra_script')
<script type="text/javascript">
function addGalery() {
    $('#modalAddGalery').modal('show');

    $('#imageupload').on('change',function(){
      var fileName = $(this).val().replace('C:\\fakepath\\', " ");;
      $(this).next('.custom-file-label').html(fileName);

      var img = $('#imageupload').val();
      if (img == '' || img == null) {
        $('#img-priview').attr('src', '#');
        $('#img-priview').addClass('d-none');
      }else{
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          $('#imgError').addClass('d-none');
          $('#img-priview').removeClass('d-none');
          $('#img-priview').addClass('animated zoomIn');

          readImg(this);
          setTimeout(function(){
            $('#img-priview').removeClass('animated zoomIn');
          }, 1000);
        }else{
          $('#imgError').removeClass('d-none');
          $('#img-priview').addClass('d-none');
          $('#img-priview').attr('src', '#');
        }
      }
    });

    // Get data image
    function readImg(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#img-priview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
}

$(document).ready(function() {
    $('#form_saveImage').on('submit',(function(e) {
      var id = $('#idPondok').val();
      e.preventDefault();
      $.ajax({
        url: "{{url('admin/pondok/upload-image')}}",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success:function(resp) {
          if (resp.status == 'success') {
            $('#modalAddGalery').modal('hide');
            messageSuccess('Gambar berhasil diunggah!');
            setTimeout(function(){
              window.location.href = "{{url('admin/pondok/add-data-galeri')}}"+"/"+id;
            }, 3000);
          }else{
            messageError('Gagal unggah gambar!')
          }
        }
      });
    }));
})

function showImage(url) {
    $('#get_image').attr('src', url)
    $('#show_image').modal('show')
}
</script>
@endsection