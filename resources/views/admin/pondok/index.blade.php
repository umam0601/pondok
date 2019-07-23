@extends('main-admin')

@section('main-content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pondok Pesantren</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}">Home</a>
            </li>
            {{-- <li class="breadcrumb-item">
                <a href="{{}}">Pondok Pesantren</a>
            </li> --}}
            <li class="breadcrumb-item active">
                <strong>Master Pondok</strong>
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
                  <h5>Tabel Pondok Pesantren</h5>
                  <div class="ibox-tools" style="margin-top: -5px;">
                      <a href="{{route('admin.pondok.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
              </div>
              <div class="ibox-content">

                  <div class="table-responsive">
			              <table class="table table-striped table-bordered table-hover w-100" id="tb_pondok">
				              <thead>
					              <tr>
					                  <th>No.</th>
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
      </div>
  </div>
</div>
@include('admin.pondok.modal.modal_detail')
@endsection
@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tb_pondok').DataTable({
      responsive: true,
      serverSide: true,
      processing: true,
      ordering: true,
      info: false,
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
    loadingShow()
    $.ajax({
      url: "{{url('admin/pondok/get-detail')}}" + "/" + id,
      type: "get",
      success:function(resp) {
        $('#title').html(resp.data.p_name);
        $('#p_name').text(resp.data.p_name);
        $('#p_pengasuh').text(resp.data.p_pengasuh);
        $('#p_phone').text(resp.data.p_phone);
        $('#p_address').text(resp.data.p_address);
        $('#p_email').text(resp.data.p_email);
        $('#p_web').text(resp.data.p_web);
        $('#description').html(resp.data.p_description);
        if (resp.data.p_image == null || resp.data.p_image == ""){
          $('#p_image').attr("src", "{{asset('public/images/thumbnail.png')}}");
          $('#p_image').attr("onclick", "addImage()");
        }else{
          $('#p_image').attr("src", "{{asset('public/profile/upload')}}"+'/'+resp.data.p_code+'/'+resp.data.p_image+"");
        }
        loadingHide()
        $('#detailPondok').modal('show');
      }
    })
  }

  function galeri(id) {
    window.location.href = "{{url('admin/pondok/add-data-galeri')}}" + "/" + id;
  }

  function edit() {
  }

  function hapus() {
  }
</script>
@endsection