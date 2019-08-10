@extends('main')
@section('extra_style')
<style type="text/css">
  #map-location{
    height: 250px;
  }
  article .post-heading h3 a {
    font-weight: 700;
    color: #353535 !important;
  }
  .post-heading > p {
    padding-left: 10px;
    margin-bottom: 20px;
    line-height: 2rem;
    border-left: 3px solid #2acb20;
  }
  .list-pondok {
    width: 40% !important;
    border: 4px solid #e9e9e9;
    margin-bottom: 5px !important;
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
          <h2>Pondok Pesantren</h2>
        </div>
      </div>
      <div class="span8">
        <ul class="breadcrumb">
          <li><a href="{{route('frontend.index')}}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
          <li class="active">Pondok</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="content">
  <div class="container">
    <div class="row">
      {{-- Left Sidebar --}}
      <div class="span4">
        <aside class="left-sidebar">
          @include('frontend.layouts.sidebar._wilayah')
          @include('frontend.layouts.sidebar._kitab')
        </aside>
      </div>
      {{-- End --}}
      <div class="span8">
        @if(count($data) > 0)
          @foreach($data as $p)
          <article class="marginbot10">
            <div class="row" style="margin-bottom: 10px;">
              <div class="span8">
                <div class="post-image">
                  <div class="post-heading">
                    <h3 style="margin-bottom: 5px;">{{$p->p_name}}</h3>
                    <p style="margin-bottom: 20px;">Pengasuh : &nbsp <b>{{$p->p_pengasuh}}</b></p>
                  </div>
                  <div class="align-left list-pondok" style="background: url('{{asset('public/profile/upload')}}/{{$p->p_code.'/'.$p->p_image}}') center center no-repeat;background-size: cover;">
                    <img src="{{asset('assets/frontend/img/img-thumb-context-all.png')}}" class="" alt="" />
                  </div>
                  <p>{!! \Illuminate\Support\Str::words($p->p_description, 130,'...')  !!}</p>          
                </div>
                <div class="bottom-article">
                  <ul class="meta-post">
                    <li><i class="fa fa-map-marked"></i><a href="#">{{$p->wp_name}}</a></li>
                    <li><i class="fa fa-comment-dots"></i><a href="#">({{count($p->review)}}) Reviews</a></li>
                  </ul>
                  <a href="{{url('pondok-pesantren/context-of')}}/{{Crypt::encrypt($p->p_id)}}" class="pull-right">Lanjut membaca <i class="icon-angle-right"></i></a>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        @else
          <article class="marginbot10">
            <div class="row" style="margin-bottom: 10px;">
              <div class="span8">
                <div class="post-image">
                  <p>Maaf belum ada data.untuk wilayah tersebut ..</p>          
                </div>
              </div>
            </div>
          </article>
        @endif
        <div class="w-100 text-center">
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
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
            window.location.href = "{{route('frontend.pondok.wilayah')}}";
          }, 1000);
        }
      }
    })
  })
</script>
@endsection