<div class="modal fade" id="modalAddMap" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="height: 40px; display: flex;align-items: center;">
        <h4 class="modal-title"><b>Masukkan data Latitude & Longitude</h4>
        {{-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> --}}
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form action="{{url('admin/pondok/save-map')}}" method="post" id="form_saveMap">
      @csrf
      <div class="modal-body">
        <input type="hidden" name="pm_pondok" id="idPondok" value="{{$pondok->p_id}}">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="latitude">Latitude</label>
              <input type="text" name="pm_latitude" id="latitude" class="form-control form-control-sm">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="longitude">Longitude</label>
              <input type="text" name="pm_longitude" id="longitude" class="form-control form-control-sm">
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>