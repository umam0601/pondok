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
      <table class="table table-sm table-bordered data-table" id="table_pondok" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Pondok</th>
            <th>Nama Pengasuh</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
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
            ordering: false,
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
	})
</script>
@endsection