@extends('main-admin')
@section('name-heading')
  Tabel Pondok Pesantren
@endsection
@section('extra-button')
<a href="{{route('admin.pondok.add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered table-hover table-striped data-table" id="table_pondok" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Pondok</th>
            <th>Nama Pengasuh</th>
            <th>Alamat</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Modal detail pondok --}}
<div class="modal fade" id="detailPondok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h6 class="modal-title" id="myModalLabel"><b>Detail Pondok <span id="title"></span></b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_name">Nama Pondok</label>
                  <input type="text" id="p_name" disabled="" readonly="" class="form-control form-control-sm bg-light">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="p_pengasuh">Nama Pengasuh</label>
                  <input type="text" id="p_pengasuh" disabled="" readonly="" class="form-control form-control-sm bg-light">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_phone">No Telepon</label>
                  <input type="text" id="p_phone" disabled="" readonly="" class="form-control form-control-sm bg-light phone">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="p_address">Alamat</label>
                  <input type="text" id="p_address" disabled="" readonly="" class="form-control form-control-sm bg-light">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_email">Email</label>
                  <input type="text" id="p_email" disabled="" readonly="" class="form-control form-control-sm bg-light">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="p_web">Website</label>
                  <input type="text" id="p_web" disabled="" readonly="" class="form-control form-control-sm bg-light">
                </div>
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="p_description">Keterangan Pondok Pesantren</label>
                  <div id="description" class="w-100 border border-secondary p-1 rounded text-dark bg-light"></div>
                </div>
              </div>
            </div>
          </div>
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
    tb_pondok = $('#table_pondok').DataTable({
      responsive: true,
      serverSide: true,
      ordering: true,
      ajax: {
          url: "{{ route('admin.pondok.get') }}",
          type: "get",
          data: {
              "_token": "{{ csrf_token() }}"
          }
      },
      columns: [
        {data: 'DT_RowIndex', className: 'text-center'},
        {data: 'p_name'},
        {data: 'p_pengasuh'},
        {data: 'p_address'},
        {data: 'action', className: 'text-center'}
      ],
      pageLength: 10,
      lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, 'All']
      ]
    });
	});

  function detail(id) {
    $.ajax({
      url: "{{url('admin/pondok/get-detail')}}" + "/" + id,
      type: "get",
      success:function(resp) {
        $('#title').html(resp.data.p_name);
        $('#p_name').val(resp.data.p_name);
        $('#p_pengasuh').val(resp.data.p_pengasuh);
        $('#p_phone').val(resp.data.p_phone);
        $('#p_address').val(resp.data.p_address);
        $('#p_email').val(resp.data.p_email);
        $('#p_web').val(resp.data.p_web);
        $('#description').html(resp.data.p_description);

        $('#detailPondok').modal('show');
      }
    })
  }

  function galeri(id) {
    window.location.href = "{{url('admin/pondok/add-data-galeri')}}" + "/" + id;
  }
</script>
@endsection