<div class="modal inmodal fade" id="detailPondok" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><b><span id="title"></span></b></h4>
        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_name">Nama Pondok</label>
                  <div id="p_name" class="w-100 border-bottom" style="height: auto;"></div>
                  {{-- <input type="text" id="p_name" disabled="" readonly="" class="form-control form-control-sm bg-light"> --}}
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="p_pengasuh">Nama Pengasuh</label>
                  <div id="p_pengasuh" class="w-100 border-bottom" style="height: auto;"></div>
                  {{-- <input type="text" id="p_pengasuh" disabled="" readonly="" class="form-control form-control-sm bg-light"> --}}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_phone">No Telepon</label>
                  <div id="p_phone" class="w-100 border-bottom phone" style="height: auto;"></div>
                  {{-- <input type="text" id="p_phone" disabled="" readonly="" class="form-control form-control-sm bg-light phone"> --}}
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="p_address">Alamat</label>
                  <div id="p_address" class="w-100 border-bottom" style="height: auto;"></div>
                  {{-- <textarea type="text" id="p_address" disabled="" readonly="" class="form-control form-control-sm bg-light"></textarea> --}}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_email">Email</label>
                  <div id="p_email" class="w-100 border-bottom" style="height: auto;"></div>
                  {{-- <input type="text" id="p_email" disabled="" readonly="" class="form-control form-control-sm bg-light"> --}}
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="p_web">Website</label>
                  <div id="p_web" class="w-100 border-bottom" style="height: auto;"></div>
                  {{-- <input type="text" id="p_web" disabled="" readonly="" class="form-control form-control-sm bg-light"> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_description">Keterangan Pondok Pesantren</label>
                  <div class="w-100 border p-1" style="height: auto;">
                    <div class="row">
                      <div class="col-4">
                        <img src="" class="img-fluid img-thumbnail" alt="" id="p_image">
                      </div>
                      <div class="col-8">
                        <div id="description"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>