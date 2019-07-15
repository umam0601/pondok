@extends('main-admin')
@section('name-heading')
Galeri Foto {{$pondok->p_name}}
@endsection
@section('extra-button')
<a href="{{route('admin.pondok')}}" class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row align-items-center">
  		<div class="col-6">
    		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-image"></i> Galeri Foto</h6>
    	</div>
  		<div class="col-md-6">
  			<div class="text-right">
  				<button class="btn btn-sm btn-primary" onclick="addGalery()"><i class="fa fa-plus"></i> Tambah</button>
  			</div>
  		</div>
  	</div>
  </div>
  <div class="card-body">
    <div class="row">
		  @if(count($galeri) == 0)
      <div class="col-12 tex-center align-items-center">
        <p class="text-secondary text-center mb-0">Data masih kosong</p>
      </div>
      @else
        @foreach($galeri as $key => $g)
          <div class="col-3 col-md-3 col-sm-3">
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>

{{-- Modal add Galery --}}
<div class="modal fade" id="modalAddGalery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h6 class="modal-title" id="myModalLabel"><b>Tambah Foto <span id="title"></span></b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idPondok" value="{{$pondok->p_id}}">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <div class="row mb-2">
                <div class="col-12">
                  <label for="imageupload">File Foto</label>
                </div>
                <div class="col-12">
                  <input type="file" class="custom-file-input" name="filephoto" id="imageupload">
                  <label class="custom-file-label" style="left: 10px; right: 10px;overflow: hidden;">Pilih Foto</label>
                  <span id="imgError" class="text-danger d-none" style="font-size: 12px;">Gambar harus berupa file 'gif', 'jpg', 'png', 'jpeg'</span>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <img id="img-priview" class="img-fluid img-thumbnail d-none" src="#" alt="">
                  </div>
                </div>
              </div>
            </div>            
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea name="pd_imgdesc" id="" cols="30" rows="10" class="form-control form-control-sm"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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

    function saveImage() {
      
    }
  }
</script>
@endsection