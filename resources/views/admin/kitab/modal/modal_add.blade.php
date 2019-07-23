<div class="modal fade" id="addKitab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
                    <label class="custom-file-label" style="left: 15px; right: 15px;overflow: hidden; height: 31px;">Pilih Foto</label>
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