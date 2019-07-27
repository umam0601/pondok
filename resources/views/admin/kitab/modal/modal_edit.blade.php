<div class="modal fade" id="editKitab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="height: 40px; display: flex;align-items: center;">
        <h4 class="modal-title"><b>Edit Data</h4>
        {{-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> --}}
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form action="" id="formEditKitab" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="k_id" id="edit_id">
      <div class="modal-body">
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="k_description">Keterangan Kitab</label>
              <textarea name="k_description" id="edit_description" cols="30" rows="10" class="form-control ckeditor"></textarea>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="edit_name">Nama Kitab</label>
              <input type="text" name="k_name" id="edit_name" class="form-control form-control-sm bg-light">
            </div>
            <div class="form-group">
              <label for="edit_penulis">Nama Penulis</label>
              <input type="text" name="k_penulis" id="edit_penulis" class="form-control form-control-sm bg-light">
            </div>
            <div class="row">
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-12">
                    <label for="edit_imageupload">File Foto</label>
                  </div>
                  <div class="col-12">
                    <input type="file" class="custom-file-input" name="k_image" id="edit_imageupload">
                    <label class="custom-file-label" style="left: 15px; right: 15px;overflow: hidden; height: 31px;">Pilih Foto</label>
                    <span id="imgEditError" class="text-danger d-none" style="font-size: 12px;">Gambar harus berupa file 'gif', 'jpg', 'png', 'jpeg'</span>
                  </div>
                </div>
              </div>
              <div class="col-12 text-center">
                <img src="" class="img-fluid img-thumbnail" alt="" id="edit-img-priview">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-primary btn-update">Simpan</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>