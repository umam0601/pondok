@extends('main')
@section('extra_style')
<style type="text/css">
  h6 {
    font-size: 18px;
    margin-bottom: 0rem;
  }
  .dropdown-menu > li > .list-pondok{
    color: #828282 !important;
  }
  .dropdown-menu > li > .list-pondok:hover{
    color: white !important;
    cursor: pointer;
  }
  #list-pondok > li > a{
    border-radius: 5px;
  }
</style>
@endsection
@section('content')
<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="span4">
        <div class="inner-heading">
          <h2>Review Pondok</h2>
        </div>
      </div>
      <div class="span8">
        <ul class="breadcrumb">
          <li><a href="{{route('frontend.index')}}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
          <li class="active">Review Pondok</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="content">
  <div class="container">
    <div class="row" style="margin-left: -20px; ">
      {{-- Left Sidebar --}}
      <div class="span3" style="border: 1px solid lightgrey; padding: 10px 20px 10px 20px;">
        <div class="marginbot20">
          <h6><b>Filter Review</b></h6>
        </div>
        <div class="">
          {{-- <h6>Pilih Provinsi</h6> --}}
          <select name="f_prov" id="f_prov" class="select2">
            <option value="" selected="" disabled="">Pilih Provinsi</option>
            @foreach($provinsi as $prov)
              <option value="{{$prov->wp_id}}">{{$prov->wp_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="margintop10">
          {{-- <h6>Pilih Kabupaten / Kota</h6> --}}
          <select name="f_kab" id="f_kab" class="select2">
              <option value="" selected="" disabled="">Pilih Kabupaten / Kota</option>
          </select>
        </div>
        <div class="margintop10">
          {{-- <h6>Pilih Kecamatan</h6> --}}
          <select name="f_kec" id="f_kec" class="select2">
              <option value="" selected="" disabled="">Pilih Kecamatan</option>
          </select>
        </div>
        <div class="margintop10">
          {{-- <h6>Pilih Pondok</h6> --}}
          <select name="f_pondok" id="f_pondok" class="select2">
              <option value="" selected="" disabled="">Pilih Pondok</option>
          </select>
        </div>
        <div class="margintop10">
          <div class="row">
            <div class="span1">
              <button class="btn btn-theme" onclick="filtering()" type="button">Filter</button>
            </div>
            <div class="span2">
              <div class="align-right">
                <button class="btn btn-theme" id="btn-reset" onclick="resetReview()" type="button">Reset</button>
              </div>
            </div>  
            <div class="span3 margintop10">
              <div class="text-center">
                <button class="btn btn-theme w-100" id="btn-create" onclick="createReview()" type="button">Tulis Review</button>
                <button class="btn btn-danger w-100 d-none" id="btn-cancel" onclick="cancelReview()" type="button">Batal</button>
              </div>
            </div>          
          </div>
        </div>
      </div>
      {{-- End --}}
      <div class="span8" style="border: 1px solid lightgrey; padding: 10px 20px 10px 20px;">
        <div class="marginbot20">
          <div id="content-review">
            <div class="marginbot20">
              <h6><b>Review Pondok Pesantren</b></h6>
            </div>
            <div id="list-review">
              @foreach($data as $review)
              <div class="marginbot20">
                <div class="w-100">
                  <div class="wrapper">
                    <div class="testimonial">
                      <p class="text">
                        <i class="icon-quote-left icon-48"></i> {{$review->r_description}}
                      </p>
                      <div class="author">
                        <img src="{{asset('assets/frontend/img/dummies/testimonial-author1.png')}}" class="img-circle bordered" alt="" />
                        <p class="name"> 
                          {{$review->username}}
                        </p>
                        <span class="info"><a href="{{url('/pondok-pesantren/context-of')}}/{{Crypt::encrypt($review->p_id)}}">{{$review->p_name}}</a></span>
                        <hr> 
                        <span>{{$review->r_date}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              {{ $data->links() }}
            </div>
            <hr>
          </div>

          {{-- Create Riview --}}
          <div id="create-review" class="d-none">
            <div class="marginbot20">
              <h6><b>Tulis Review Anda</b></h6>
            </div>
            <form id="form-review">
              @csrf
              @if(Auth::user())
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              @endif
              <div class="row">
                <div class="span7">
                  
                  <ul style="margin: 0px;">
                    <li class="dropdown">
                      <input type="text" class="input-block-level pondok" style="padding: 0px 0px 0px 10px; margin-bottom: 5px;" placeholder="Tulis nama pondok untuk mencari...">
                      <input type="hidden" name="r_pondok" id="r_pondok">
                      <ul class="dropdown-menu w-100 header-list" id="list-pondok" style="background-color: white;">
                        
                      </ul>
                    </li>
                  </ul>

                  <small id="msgError1" class="text-danger d-none">Harap pilih pondok pesantren!</small>
                </div>
                <div class="span1">
                  {{-- <button type="button" class="btn btn-theme" onclick="search_filter()"><i class="fa fa-filter"></i></button> --}}
                </div>
                <div class="span8 margintop10">
                  <textarea id="r_description" name="r_description" rows="12" class="input-block-level" placeholder="Tuliskan review disini ..."></textarea>
                  <small id="msgError2" class="text-danger d-none">Harap tuliskan review anda!</small>
                  <p>
                    <button class="btn btn-theme margintop10" onclick="saveReview()" type="button">Simpan Review</button>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Modal filter create review --}}
<div id="modal-search" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="modalSearchPondok" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="modalSearchPondok">Cari Pondok</h4>
  </div>
  <div class="modal-body">
    <div class="span2">
      <select name="r_prov" id="r_prov" class="select2">
        <option value="" selected="" disabled="">Pilih Provinsi</option>
        @foreach($provinsi as $r_prov)
          <option value="{{$r_prov->wp_id}}">{{$r_prov->wp_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="span2">
      <select name="r_kab" id="r_kab" class="select2">
        <option value="" selected="" disabled="">Pilih Kabupaten / Kota</option>
      </select>
    </div>
    <div class="span2">
      <div class="margintop10">
        <select name="r_kec" id="r_kec" class="select2">
          <option value="" selected="" disabled="">Pilih Kecamatan</option>
        </select>
      </div>
    </div>
    <div class="span2">
      <div class="margintop10">
        <select name="r_pondok" id="r_pondok" class="select2">
          <option value="" selected="" disabled="">Pilih Pondok</option>
        </select>
        <small id="msgError1" class="text-danger d-none">Harap pilih pondok pesantren!</small>
      </div>
    </div>
  </div>
</div>
@endsection
@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){
    // grapReview();
    $('.loading').fadeOut();
    $('.pondok').on('keyup', function(){
      var term = $('.pondok').val();
      if (term != '') {        
        $.ajax({
          url: "{{url('/review/cari-pondok')}}",
          type: "get",
          data: {term: term.toString()},
          success:function(resp) {
            listPondok(resp.data);
          }
        })
      }else{
        $('#list-pondok').removeClass('d-block');
        $('#list-pondok').addClass('d-none');
      }
    })
  });

  function listPondok(pondok) {
    $('.header-list').empty();
    if (pondok.length > 0) {
      
      $('#list-pondok').removeClass('d-none');
      $('#list-pondok').addClass('d-block');
      $.each(pondok, function(key, val){
        $('.header-list').append(
          `<li><a class="list-pondok" onclick="setPondok(`+val.p_id+`)" style="border: 1px solid lightgrey;">`+val.p_name+`</a></li>`
        )
      })
    }else{
      $('.header-list').append(
        `<li><a class="list-pondok" style="border: 1px solid lightgrey;">Tidak ada pondok terkait ...</a></li>`
      )
    }
  }

  function setPondok(id) {

    $('#list-pondok').removeClass('d-block');
    $('#list-pondok').addClass('d-none');

    $.ajax({
      url: "{{url('/review/set-pondok')}}?p_id="+id,
      type: "get",
      success:function(resp){
        $('.pondok').val(resp.data.name);
        $('#r_pondok').val(resp.data.id);

        $('#r_description').focus();
      }
    })
  }

  function search_filter() {
    $('#modal-search').modal('show');
  }

  $('#f_prov').on('change', function(){
    let id = $('#f_prov').val();
    $.ajax({
      url: "{{url('/get-city')}}" + "/" + id,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#f_kab').empty();
        $("#f_kab").append('<option value="" selected disabled>Pilih Kabupaten / Kota</option>');
        $.each(resp.kota, function(key, val){
          $("#f_kab").append('<option value="'+val.wc_id+'">'+val.wc_name+'</option>');
        });
        $('#f_kab').select2('open');
      }
    });
  })
  $('#f_kab').on('change', function(){
    let id = $('#f_kab').val();
    $.ajax({
      url: "{{url('/get-kecamatan')}}" + "/" + id,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#f_kec').empty();
        $("#f_kec").append('<option value="" selected disabled>Pilih Kecamatan</option>');
        $.each(resp.camat, function(key, val){
          $("#f_kec").append('<option value="'+val.wk_id+'">'+val.wk_name+'</option>');
        });
        $('#f_kec').select2('open');
      }
    });
  })
  $('#f_kec').on('change', function(){
    let id = $('#f_kec').val();
    $.ajax({
      url: "{{url('/get-pondok')}}" + "/" + id,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#f_pondok').empty();
        $("#f_pondok").append('<option value="" selected disabled>Pilih Pondok</option>');
        $.each(resp.pondok, function(key, val){
          $("#f_pondok").append('<option value="'+val.p_id+'">'+val.p_name+'</option>');
        });
        $('#f_pondok').select2('open');
      }
    });
  })

  function filtering() {
    let id = $('#f_pondok').val();
    window.location.href = "{{url('review/get-review?')}}id="+id;
  }

  // Form Review
  $('#r_prov').on('change', function(){
    let id = $('#r_prov').val();
    $.ajax({
      url: "{{url('/get-city')}}" + "/" + id,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#r_kab').empty();
        $("#r_kab").append('<option value="" selected disabled>Pilih Kabupaten / Kota</option>');
        $.each(resp.kota, function(key, val){
          $("#r_kab").append('<option value="'+val.wc_id+'">'+val.wc_name+'</option>');
        });
        $('#r_kab').select2('open');
      }
    });
  })
  $('#r_kab').on('change', function(){
    let id = $('#r_kab').val();
    $.ajax({
      url: "{{url('/get-kecamatan')}}" + "/" + id,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#r_kec').empty();
        $("#r_kec").append('<option value="" selected disabled>Pilih Kecamatan</option>');
        $.each(resp.camat, function(key, val){
          $("#r_kec").append('<option value="'+val.wk_id+'">'+val.wk_name+'</option>');
        });
        $('#r_kec').select2('open');
      }
    });
  })
  $('#r_kec').on('change', function(){
    let id = $('#r_kec').val();
    $.ajax({
      url: "{{url('/get-pondok')}}" + "/" + id,
      type: "get",
      dataType: "json",
      success:function(resp){
        $('#r_pondok').empty();
        $("#r_pondok").append('<option value="" selected disabled>Pilih Pondok</option>');
        $.each(resp.pondok, function(key, val){
          $("#r_pondok").append('<option value="'+val.p_id+'">'+val.p_name+'</option>');
        });
        $('#r_pondok').select2('open');
      }
    });
  })

  function saveReview() {
    let pondok = $('#r_pondok').val();
    let desc = $('#r_description').val();
    var values = 1;

    if (pondok == "" || pondok == null) {
      values = 0;
      $('#msgError1').removeClass('d-none');
      $('#r_pondok').focus();
    }else{
      $('#msgError1').addClass('d-none');
    }
    if (desc == "" || desc == null) {
      values = 0;
      $('#msgError2').removeClass('d-none');
      $('#r_description').focus();
    }else{
      $('#msgError2').addClass('d-none');
    }

    if (values == 1) {
      var auth = checkAuth();

      if (auth == true) {
        $.confirm({
          icon: 'fa fa-question',
          theme: 'material',
          closeIcon: true,
          animation: 'scale',
          type: 'green',
          title: 'Peringatan!',
          content: 'Apakah anda yakin dengan review ini?',
          buttons: {
            confirm: {
                text: 'Ya',
                btnClass: 'btn-orange',
                action: function(){
                  cuss_review()
                }
            },
            cancel: {
                text: 'Tidak',
                btnClass: 'btn-default',
                action: function(){
                  
                }
            },
          }
        });
      }else{
        $('#mySignin').modal('show');
      }
    }
  }

  function checkAuth() {
    var check = "{{Auth::user()}}";

    if (check) {
      return true
    }else{
      return false
    }
  }

  function cuss_review(){
    var formData = $('#form-review').serialize();

    $.ajax({
      url: "{{route('frontend.save_review')}}",
      type: "post",
      data: formData,
      success:function(resp){
        if (resp.status == 'success'){
          loadingShow()
          setTimeout(function(){
            window.location.href = "{{route('frontend.review')}}"
            loadingHide()
          }, 500)

        }
      }
    })
  }

  // End Form

  function createReview() {
    loadingShow()
    setTimeout(function(){
      $('#content-review').addClass('d-none');
      $('#create-review').removeClass('d-none');
      $('#btn-create').addClass('d-none');
      $('#btn-cancel').removeClass('d-none');
    }, 500)
    loadingHide()
  }
  function cancelReview() {
    loadingShow()
    setTimeout(function(){
      $('#content-review').removeClass('d-none');
      $('#create-review').addClass('d-none');
      $('#btn-create').removeClass('d-none');
      $('#btn-cancel').addClass('d-none');
    }, 500)
    loadingHide()
  }

  // Reg & Log
  $('.btn-register').on('click', function(){
    var nama = $('#inputName').val();
    var email = $('#inputEmail').val();
    var pass1 = $('#password').val();
    var pass2 = $('#password-confirm').val();

    var result = 1;
    if (nama == "" || nama == null) {
      $('.errorNama').removeClass('d-none')
      $('#inputName').focus()
      result = 0;
    }else{
      $('.errorNama').addClass('d-none')
    }
    if (email == "" || email == null) {
      $('.errorEmail').removeClass('d-none')
      $('#inputEmail').focus()
      result = 0;
    }else{
      $('.errorEmail').addClass('d-none')
    }
    if (pass1 == "" || pass1 == null) {
      $('.errorPassword').removeClass('d-none')
      $('#password').focus()
      result = 0;
    }else{
      $('.errorPassword').addClass('d-none')
    }
    if (pass2 == "" || pass2 == null) {
      $('.errorPassword2null').removeClass('d-none')
      $('.errorPassword2').addClass('d-none')
      $('#password-confirm').focus()
      result = 0;
    }else{
      $('.errorPassword2null').addClass('d-none')
      if (pass2 != pass1) {
        $('.errorPassword2').removeClass('d-none')
        $('#password-confirm').focus()
        result = 0;
      }else{
        $('.errorPassword2').addClass('d-none')
      }
    }
    // console.log(result);
    if (result == 1) {
      cuss_register();
    }
  })

  function cuss_register() {
    $.ajax({
      url: "{{route('register')}}",
      data: $('#form-register').serialize(),
      type: "POST"
    })
  }

  $('.btn-login').on('click', function(){
    var p_id = $('#p_id').val();
    var data = $('#form-login').serialize();
    $.ajax({
      url: "{{route('login.auth_user')}}",
      type: "POST",
      data: data,
      success:function(resp){
        if (resp == 'gagal') {
          $('.notif-error').css('display', 'block');
        } else {
          $('#mySignin').modal('hide');
          setTimeout(function(){
            window.location.href = "{{route('frontend.review')}}";
          }, 1000);
        }
      }
    })
  });
  function resetReview() {
    window.location.href = "{{route('frontend.review')}}";
  }
</script>
@endsection