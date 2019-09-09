@extends('main')
@section('extra_style')
<style type="text/css">
  #map-location{
    height: 250px;
  }
  article .post-heading h3 {
    font-weight: 700;
    color: #353535 !important;
  }
  .post-heading > p {
    padding-left: 10px;
    margin-bottom: 20px;
    line-height: 2rem;
    border-left: 3px solid #2acb20;
  }
</style>
@endsection
@section('content')
<input type="hidden" name="p_id" id="p_id" value="{{$id_crypted}}">
<input type="hidden" name="p_name" id="p_name" value="{{$pondok->p_name}}">
<input type="hidden" name="pm_latitude" id="pm_latitude" value="{{$pondok->pm_latitude}}">
<input type="hidden" name="pm_longitude" id="pm_longitude" value="{{$pondok->pm_longitude}}">

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
          <li><a href="{{route('frontend.pondok')}}">Pondok</a><i class="icon-angle-right"></i></li>
          <li class="active">{{$pondok->p_name}}</li>
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
          @include('frontend.layouts.sidebar._pondok')
          @include('frontend.layouts.sidebar._kitab')
          @include('frontend.layouts.sidebar._map')
        </aside>
      </div>
      {{-- End --}}
      <div class="span8">
        <article class="marginbot10">
          <div class="row">
            <div class="span8">
              <div class="post-image">
                <div class="post-heading">
                  <h3 style="margin-bottom: 5px;">{{$pondok->p_name}}</h3>
                  <p style="margin-bottom: 20px;">Pengasuh : &nbsp <b>{{$pondok->p_pengasuh}}</b></p>
                </div>
                <div class="" style="background: url('{{asset('public/profile/upload')}}/{{$pondok->p_code.'/'.$pondok->p_image}}') center center no-repeat;background-size: cover; border-radius: 5px;">
                  <img src="{{asset('assets/frontend/img/img-thumb-context.png')}}" class="w-100" alt="" />
                </div>
              </div>
              <div class="w-100">
                {!! $pondok->p_description!!}
              </div>
              <div class="bottom-article">
                <ul class="meta-post">
                  <li><i class="fa fa-map-marked"></i>&nbsp<a>{{$pondok->p_address}}</a></li>
                  <li><i class="fa fa-fw fa-phone"></i>&nbsp<a>{{$pondok->p_phone}}</a></li>
                  <li><i class="fa fa-fw fa-globe"></i>&nbsp<a>{{($pondok->p_web) ? $pondok->p_web : '-'}}</a></li>
                  <li><i class="fa fa-fw fa-envelope"></i>&nbsp<a>{{($pondok->p_email) ? $pondok->p_email : '-'}}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </article>
        <!-- author info -->
        <div class="comment-area">
          <div class="align-right margintop10"><a href="{{route('frontend.review')}}" style="font-size: 14px !important;">Tulis review disini...</a></div>
          <h4>{{count($review)}} Reviews</h4>
          @foreach($review as $rev)
          <div class="media">
            <a href="#" class="thumbnail pull-left"><img src="{{asset('assets/frontend/img/avatar.png')}}" alt="" /></a>
            <div class="media-body">
              <div class="media-content">
                <h6><span>{{$rev->r_date}}</span> &nbsp{{$rev->name}}</h6>
                <p>
                  {{$rev->r_description}}
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
  var map, marker;
  $(document).ready(function(){
    var lat  = $('#pm_latitude').val();
    var long = $('#pm_longitude').val();
    var name = $('#p_name').val();

    map = L.map('map-location').setView([lat, long], 17);
          L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=JrA8XZ6ajy9lV3aT8OeF', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'})
            .addTo(map);
    marker = new L.marker([lat, long])
      .bindPopup(name)
      .addTo(map);

  })
  $('.btn-register').on('click', function(){
    var nama  = $('#inputName').val();
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
            window.location.href = "{{url('/pondok-pesantren/context-of')}}"+"/"+p_id;
          }, 1000);
        }
      }
    })
  })
</script>
@endsection