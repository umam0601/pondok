@extends('main-admin')
@section('name-heading')
  Tabel Kitab
@endsection
@section('extra-button')
<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="addKitab()"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</button>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered table-hover table-striped data-table w-100" id="table_kitab" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Kitab</th>
            <th>Nama Penulis</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Modal detail kitab --}}
<div class="modal fade" id="addKitab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h6 class="modal-title" id="myModalLabel"><b>Tambah Data Kitab <span id="title"></span></b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="formAddKitab" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="k_description">Keterangan Kitab</label>
              <textarea name="k_description" id="k_description" cols="30" rows="10" class="form-control ckeditor"></textarea>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="k_name">Nama Kitab</label>
              <input type="text" name="k_name" id="k_name" class="form-control form-control-sm bg-light">
            </div>
            <div class="form-group">
              <label for="k_penulis">Nama Penulis</label>
              <input type="text" name="k_penulis" id="k_penulis" class="form-control form-control-sm bg-light">
            </div>
            <div class="row">
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-12">
                    <label for="imageupload">File Foto</label>
                  </div>
                  <div class="col-12">
                    <input type="file" class="custom-file-input" name="k_image" id="imageupload">
                    <label class="custom-file-label" style="left: 10px; right: 10px;overflow: hidden;">Pilih Foto</label>
                    <span id="imgError" class="text-danger d-none" style="font-size: 12px;">Gambar harus berupa file 'gif', 'jpg', 'png', 'jpeg'</span>
                  </div>
                </div>
              </div>
              <div class="col-12 text-center">
                <img src="{{asset('public/images/thumbnail.png')}}" class="img-fluid img-thumbnail" alt="" id="img-priview">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('extra_script')
<script type="text/Javascript">
	var tb_kitab;
	$(document).ready(function(){
    tb_kitab = $('#table_kitab').DataTable({
      responsive: true,
      serverSide: true,
      ordering: true,
      ajax: {
          url: "{{ route('admin.kitab.get') }}",
          type: "get",
          data: {
              "_token": "{{ csrf_token() }}"
          }
      },
      columns: [
        {data: 'DT_RowIndex', className: 'text-center'},
        {data: 'k_name'},
        {data: 'k_penulis'},
        {data: 'action', className: 'text-center'}
      ],
      pageLength: 10,
      lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, 'All']
      ]
    });
	});

  function addKitab() {
    $('#addKitab').modal('show');

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
    $('#formAddKitab').on('submit',(function(e) {
      e.preventDefault();
      for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
      }
      $.ajax({
        url: "{{url('admin/kitab/save-data')}}",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success:function(resp) {
          if (resp.status == 'success') {
            $('#addKitab').modal('hide');
            messageSuccess('Data berhasil disimpan!');
            setTimeout(function(){
              window.location.href = "{{url('admin/kitab')}}";
            }, 3000);
          }else{
            messageError('Data gagal disimpan!')
          }
        }
      });
    }));
  })
</script>
@endsection