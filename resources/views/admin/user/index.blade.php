@extends('main-admin')

@section('main-content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>User Pondok Pesantren</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}">Home</a>
            </li>
            {{-- <li class="breadcrumb-item">
                <a href="{{}}">Pondok Pesantren</a>
            </li> --}}
            <li class="breadcrumb-item active">
                <strong>Master User</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>User Pondok Pesantren</h5>
              </div>
              <div class="ibox-content">

                  <div class="table-responsive">
			              <table class="table table-striped table-bordered table-hover w-100" id="tb_review">
				              <thead>
					              <tr>
					                  <th width="5%">No.</th>
					                  <th width="20%">Nama User</th>
					                  <th width="20%">Email</th>
                            <th width="20%">Role</th>
                            <th width="20%">Status</th>
					                  <th width="15%">Aksi</th>
					              </tr>
				              </thead>
				              <tbody>

				              </tbody>
			              </table>
                  </div>

              </div>
          </div>
      </div>
  </div>
</div>
@include('admin.review.modal.modal_detail')
@endsection
@section('extra_script')
<script type="text/javascript">
var tb_review;
  $(document).ready(function(){
    $('#tb_review').dataTable().fnDestroy()
    tb_review = $('#tb_review').DataTable({
      responsive: true,
      serverSide: true,
      ordering: true,
      ajax: {
          url: "{{ route('admin.user.resource') }}",
          type: "get"
      },
      columns: [
        {data: 'DT_RowIndex', className: 'text-center align-middle'},
        {data: 'name', className: 'text-center align-middle'},
        {data: 'email', className: 'text-center align-middle'},
        {data: 'role', className: 'text-center align-middle'},
        {data: 'status', className: 'text-center align-middle'},
        {data: 'action', className: 'text-center align-middle'}
      ],
      pageLength: 10,
      lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, 'All']
      ]
    });
  });
</script>
@endsection