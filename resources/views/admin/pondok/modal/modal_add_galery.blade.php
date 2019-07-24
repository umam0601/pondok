<div class="modal fade" id="modalAddGalery" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="height: 40px; display: flex;align-items: center;">
        <h4 class="modal-title"><b>Tambah Foto</h4>
        {{-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> --}}
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form action="{{url('admin/pondok/upload-image')}}" method="post" id="form_saveImage" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <input type="hidden" name="pd_pondok" id="idPondok" value="{{$id}}">
        <input type="hidden" name="p_code" value="{{$code}}">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <div class="row mb-2">
                <div class="col-12">
                  <label for="imageupload">File Foto</label>
                </div>
                <div class="col-12">
                  <input type="file" class="custom-file-input" name="pd_image" id="imageupload">
                  <label class="custom-file-label" style="left: 15px; right: 15px;overflow: hidden; height: 31px;">Pilih Foto</label>
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
              <textarea name="pd_imgdesc" id="" cols="30" rows="10" class="form-control form-control-sm" style="height: 170px;"></textarea>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>