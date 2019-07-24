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
                <strong>Master Kitab</strong>
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
                  <h5>Tabel Kitab</h5>
                  <div class="ibox-tools" style="margin-top: -5px;">
                      <a class="btn btn-sm btn-primary" onclick="addKitab()"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
              </div>
              <div class="ibox-content">
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
      </div>
  </div>
</div>
@include('admin.kitab.modal.modal_detail')
@include('admin.kitab.modal.modal_add')
@include('admin.kitab.modal.modal_edit')
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
        {data: 'DT_RowIndex', className: 'text-center align-middle'},
        {data: 'k_name', className: 'align-middle'},
        {data: 'k_penulis', className: 'align-middle'},
        {data: 'action', className: 'text-center'}
      ],
      pageLength: 10,
      lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, 'All']
      ]
    });
  });

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

    $('#formEditKitab').on('submit',(function(e) {
      e.preventDefault();
      for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
      }
      var urlUp = new FormData(this);
      $.confirm({
        icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        animation: 'scale',
        type: 'green',
        title: 'Peringatan!',
        content: 'Apakah anda yakin dengan keputusan ini?',
        buttons: {
          confirm: {
              text: 'Ya',
              btnClass: 'btn-green',
              action: function(){
                $.ajax({
                  url: "{{url('admin/kitab/update-data')}}",
                  type: "POST",
                  data: urlUp,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success:function(resp) {
                    if (resp.status == 'success') {
                      $('#editKitab').modal('hide')
                      tb_kitab.ajax.reload()
                      messageSuccess('Data '+resp.data+' berhasil diperbarui!', 'Berhasil!')
                    }else{
                      messageError('Data '+resp.data+' gagal diperbarui!', 'Gagal!')
                    }
                  }
                });
              }
          },
          cancel: {
              text: 'Tidak',
              btnClass: 'btn-orange',
              action: function(){
                
              }
          },
        }
      });
    }));
  })

  function addKitab() {
    $('#addKitab').modal('show');
    get_data_image();
  }

  function detail(id) {
    loadingShow()
    axios.get('{{url('admin/kitab/get-detail?')}}id='+id+'')
    .then(function(resp){
      $('#nameHead').text(resp.data.data.k_name)
      $('#k_image').attr('src', '{{asset('public/kitab/upload')}}/'+resp.data.data.k_code+'/'+resp.data.data.k_image+'');
      $('#mk_name').text(resp.data.data.k_name)
      $('#mk_penulis').text(resp.data.data.k_penulis)
      $('#mk_description').html(resp.data.data.k_description)
      loadingHide()
      $('#detail_kitab').modal('show')
    })
  }

  function edit(id) {
    loadingShow()
    axios.get('{{url('admin/kitab/edit-data?')}}id='+id+'')
    .then(function(resp){
      $('#edit_id').val(resp.data.data.k_id)
      $('#edit_name').val(resp.data.data.k_name)
      $('#edit_penulis').val(resp.data.data.k_penulis)
      $('#edit-img-priview').attr('src', '{{asset('public/kitab/upload')}}/'+resp.data.data.k_code+'/'+resp.data.data.k_image+'');
      CKEDITOR.instances['edit_description'].setData(resp.data.data.k_description)
      loadingHide()
      $('#editKitab').modal('show')
      get_data_edit_image()
    })
  }

  function get_data_edit_image() {
    $('#edit_imageupload').on('change',function(){
      var img = $('#edit_imageupload').val();
      if (img == '' || img == null) {
        $('#edit-img-priview').attr('src', '{{asset('public/images/thumbnail.png')}}');
        $('#imgEditError').addClass('d-none');
        $('.btn-update').removeAttr('disabled');
        $('#edit_imageupload').val('');
        $('.custom-file-label').html('');
      }else{
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {

          var fileName = $(this).val().replace('C:\\fakepath\\', " ");;
          $(this).next('.custom-file-label').html(fileName);

          $('#imgEditError').addClass('d-none');
          $('#edit-img-priview').addClass('animated zoomIn');
          $('.btn-update').removeAttr('disabled');
          readImg(this);

          setTimeout(function(){
            $('#edit-img-priview').removeClass('animated zoomIn');
          }, 1000);
        }else{
          $('.btn-update').attr('disabled', '');
          $('#edit-img-priview').attr('src', '{{asset('public/images/thumbnail.png')}}');
          $('#imgEditError').removeClass('d-none');
          $('#edit_imageupload').val('');
          $('.custom-file-label').html('');
        }
      }
    });

    // Get data image
    function readImg(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#edit-img-priview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  }

  function get_data_image() {
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
</script>
@endsection