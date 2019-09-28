@extends('main')
@section('extra_style')
<style type="text/css">
  .cover-slide{
    width: 100%;
    height: 100%;
    position: absolute;
    filter: blur(5px);
    /*background: #0000002b;*/
  }
  .da-slide h2 {
    text-shadow: 0px 0px 5px black;
  }
  .da-slide p{
    top: 120px;    
    text-shadow: 2px 2px 2px black;
  }
  .da-img img{
    box-shadow: 0px 0px 20px 7px #505050;
  }
  .link-button:hover {
    color: white !important;
  }
  .btn-theme:hover {
    border: none;
  }
  .d-none {
    display: none;
  }
  .text-danger {
    color: #980000 !important;
  }
  .da-slide .da-link{
    background: white;
    box-shadow: 0px 0px 10px 3px #505050;
  }
  #featured{
    background: #fff;
  }
  .modal{
    z-index: 99999;
  }
  .modal-backdrop, .modal-backdrop.fade.in {
    z-index: 9999;
  }
  .overlay > .text-center > a.da-link.link-button {
    background: white;
    border: 4px solid rgba(255,255,255,0.8);
    border-radius: 30px;
    padding: 2px 20px 0px;
    font-size: 16px;
    line-height: 30px;
    width: 80px;
    text-align: center;
    box-shadow: 0px 0px 5px #505050;
  }
  .overlay > .text-center > a.da-link.link-button:hover {
    color: white;
    background: #2acb20;
    border: 4px solid #2acb20;
  }
  .show-overlay{
    border: 0px solid #e9e9e9;
  }
  #maps{
    border: 4px solid #e9e9e9;
  }
  ul.clients li{
     border: 1px solid lightgrey !important;
  }
  ul.clients li:hover {
     border: 1px solid lightgrey !important;
  }
  .wraping{
    padding: 5px !important;
    border-radius: 5px;
    text-align: center;
  }
  .picture-wrap{
      width: 155px;
      height: 155px;
      background: #fff;
      position: relative;
      cursor: pointer;
      text-align: center;
      margin-bottom: 10px;
  }

  .picture-wrap img{
      background: white;
      object-fit: scale-down;
      width: 155px !important;
      height: 155px !important;
  }
  h4 {
    text-transform: capitalize;
    color: darkgreen;
    font-family: sans-serif;
    text-decoration:underline; 
  }
  h6{
    font-family: sans-serif;
    background-size: cover;
    padding: 10px;

  }
  .displaysatu{
    display: inline-block;
    margin-right: 20px;
    float: left;
  }
  .lisatu li{
    font-size: 15px;
    font-weight: bold;
  }
  label{
    font-size: 15px;
    text-decoration-line: underline;
    font-weight: bold;
  }
</style>
@endsection
@section('content')
<section id="featured">
  <!-- start slider -->
  <div class="container">
    <div id="da-slider" class="da-slider">
      @foreach($pondok_slide as $no => $ps)
      <div class="da-slide">
        <div class="cover-slide" style="background: url('{{asset('public/profile/upload')}}/{{$ps->p_code.'/'.$ps->p_image}}') center center no-repeat;background-size: cover;"></div>
        <h2>{{$ps->p_name}}</h2>
        <p>
          {!! \Illuminate\Support\Str::words($ps->p_description, 30,'...')  !!}
        </p>
        <a href="{{url('/pondok-pesantren/context-of')}}/{{Crypt::encrypt($ps->p_id)}}" class="da-link link-button">Read more</a>
        <div class="da-img">
          <img src="{{asset('public/profile/upload')}}/{{$ps->p_code.'/'.$ps->p_image}}" alt=""/>
        </div>
      </div>
      @endforeach
      <nav class="da-arrows">
        <span class="da-arrows-prev"></span>
        <span class="da-arrows-next"></span>
      </nav>
    </div>
  </div>
  <!-- end slider -->
</section>
<!-- Wilayah Pondok Berdasarkan Geografis -->
<section id="content">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h4>Wilayah Geografis <strong>Pondok Pesantren</strong></h4>
        <!-- <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients"> -->
          <!-- Pulau Jawa -->
          <div class="displaysatu">
            <ul>
            <li class="lisatu" style="list-style-type: square;"><label>Wilayah Pulau Jawa :</label>
              <ul>
                <li style="list-style-type: disc;" ><a href="{{url('pondok-pesantren/wilayah')}}?prov=35"><span style="width: 100%; text-align: center;">Jawa Timur</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=33"><span style="width: 100%; text-align: center;">Jawa Tengah</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=32"><span style="width: 100%; text-align: center;">Jawa Barat</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=31"><span style="width: 100%; text-align: center;">DKI Jakarta</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=34"><span style="width: 100%; text-align: center;">DI Yogyakarta</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=36"><span style="width: 100%; text-align: center;">Banten</span></a>
              </ul>
            </li>
            </ul>
          </div>
          <div class="displaysatu">
            <ul>
            <li class="lisatu" style="list-style-type: square;"><label>Wilayah Pulau Sumatra :</label> 
              <ul>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=11"><span style="width: 100%; text-align: center;">Aceh</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=12"><span style="width: 100%; text-align: center;">Sumatra Utara</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=13"><span style="width: 100%; text-align: center;">Sumatra Barat</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=16"><span style="width: 100%; text-align: center;">Sumatra Selatan</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=14"><span style="width: 100%; text-align: center;">Riau</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=21"><span style="width: 100%; text-align: center;">Kepulauan Riau</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=15"><span style="width: 100%; text-align: center;">Jambi</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=17"><span style="width: 100%; text-align: center;">Bengkulu</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=19"><span style="width: 100%; text-align: center;">Bangka Belitung</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=18"><span style="width: 100%; text-align: center;">Lampung</span></a>
              </ul>
            </li>
            </ul>
          </div>
          <div class="displaysatu">
            <ul>
            <li class="lisatu" style="list-style-type: square;"><label>Wilayah Pulau Kalimantan :</label>
              <ul>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=61"><span style="width: 100%; text-align: center;">Kalimantan Barat</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=64"><span style="width: 100%; text-align: center;">Kalimantan Timur</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=62"><span style="width: 100%; text-align: center;">Kalimantan Tengah</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=63"><span style="width: 100%; text-align: center;">Kalimantan Selatan</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=65"><span style="width: 100%; text-align: center;">Kalimantan Utara</span></a>
              </ul>
            </li>
            </ul>
          </div>
          <div class="displaysatu">
            <ul>
            <li class="lisatu" style="list-style-type: square;"><label>Wilayah Pulau Sulawesi :</label>
              <ul>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=74"><span style="width: 100%; text-align: center;">Sulawesi Tenggara</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=76"><span style="width: 100%; text-align: center;">Sulawesi Barat</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=72"><span style="width: 100%; text-align: center;">Sulawesi Tengah</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=71"><span style="width: 100%; text-align: center;">Sulawesi Utara</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=73"><span style="width: 100%; text-align: center;">Sulawesi Selatan</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=75"><span style="width: 100%; text-align: center;">Gorontalo</span></a>
              </ul>
            </li>
            </ul>
          </div>
          <div class="displaysatu">
            <ul>
            <li class="lisatu" style="list-style-type: square;"><label>Wilayah Pulau Bali dan Nusa Tenggara :</label>
              <ul>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=51"><span style="width: 100%; text-align: center;">Bali</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=53"><span style="width: 100%; text-align: center;">Nusa Tenggara Timur</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=52"><span style="width: 100%; text-align: center;">Nusa Tenggara Barat</span></a>
              </ul>
            </li>
            </ul>
          </div>
          <div class="displaysatu">
            <ul>
            <li class="lisatu" style="list-style-type: square;"><label>Wilayah Kepulauan Maluku dan Papua :</label>
              <ul>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=81"><span style="width: 100%; text-align: center;">Maluku</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=82"><span style="width: 100%; text-align: center;">Maluku Utara</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=91"><span style="width: 100%; text-align: center;">Papua</span></a>
                <li style="list-style-type: disc;"><a href="{{url('pondok-pesantren/wilayah')}}?prov=92"><span style="width: 100%; text-align: center;">Papua Barat</span></a>
              </ul>
            </li>
            </ul>
          </div>          
      </div>
    </div>

    <!-- divider -->
    <div class="row">
      <div class="span12">
        <div class="solidline">
        </div>
      </div>
    </div>
    <!-- end divider -->

    <!-- Portfolio Projects -->
    <!-- DATA TERBARU PONDOK PESANTREN -->
    <div class="row">
      <div class="span12">
        <h4 class="heading">Data Terbaru <strong>Pondok Pesantren</strong></h4>
        <div class="row">
          <section id="projects">
            <ul id="thumbs" class="portfolio">
              @foreach($pondok_latest as $pl)
              <li class="item-thumbs span3 show-overlay"" data-id="id-0" data-type="web"style="background: url('{{asset('public/profile/upload')}}/{{$pl->p_code.'/'.$pl->p_image}}') center center no-repeat;background-size: cover; border-radius: 10px;">
                <img src="{{asset('assets/frontend/img/img-thumb.png')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                <div class="overlay">
                  <div class="text-center">
                    <p>{{$pl->p_name}}</p>
                    <a href="{{url('/pondok-pesantren/context-of')}}/{{Crypt::encrypt($pl->p_id)}}" class="da-link link-button">Read more</a>
                  </div>
                </div>
              </li>
              {{-- <li class="span3 show-overlay" style="background: url('{{asset('public/profile/upload')}}/{{$pl->p_code.'/'.$pl->p_image}}') center center no-repeat;background-size: cover; border-radius: 10px;">
                <img src="{{asset('assets/frontend/img/img-thumb.png')}}" alt="" class="img-fluid">
                <div class="overlay">
                  <div class="text-center">
                    <p>{{$pl->p_name}}</p>
                    <a href="{{url('/pondok-pesantren/context-of')}}/{{Crypt::encrypt($pl->p_id)}}" class="da-link link-button">Read more</a>
                  </div>
                </div>
              </li> --}}
              @endforeach
            </ul>
          </section>
        </div>
      </div>
    </div>
    <!-- End Portfolio Projects -->
    <!-- divider -->
   <!--  <div class="row">
      <div class="span12">
        <div class="solidline">
        </div>
      </div>
    </div>
    --> <!-- end divider -->
    <!-- <div class="row">
      <div class="span12">
        <h4 style="height: auto; display: flex; align-items: start;">Kumpulan <strong>Kitabiyah</strong> &nbsp &nbsp &nbsp <a href="" style="font-size: 12px;"><i class="fa fa-angle-double-right"></i> Tampilkan Semua</a></h4>
        <ul id="mycarousel2" class="jcarousel-skin-tango recent-jcarousel clients">
          @foreach($kitab as $k)
          <li class="wraping" style="background-color: #efefef">
            <div class="picture-wrap">
              <img src="{{asset('public/kitab/upload')}}/{{$k->k_code}}/{{$k->k_image}}" class="" alt="" />
            </div>            
            <a href="#">
              {{$k->k_name}}
            </a>
            <p>{{$k->k_penulis}}</p>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
     --><!-- divider -->
    <div class="row">
      <div class="span12">
        <div class="solidline">
        </div>
      </div>
    </div>
    <!-- end divider -->
    <div class="row">
      <div class="span12">
        <h4>Lokasi pondok dalam <strong>Map</strong></h4>
        <div id="maps" style="height: 400px;" class="w-100"></div>
      </div>
    </div>
  </div>
</section>
<section id="bottom">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="aligncenter">
          <div id="twitter-wrapper">
            <div id="twitter">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
  var map, marker;
  $(document).ready(function() {
    map = L.map('maps').setView([-0.789275, 113.9213257], 5);
    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=JrA8XZ6ajy9lV3aT8OeF', {
      attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'})
        .addTo(map);
    get_allMap();
  })

  function get_allMap(){    
    axios.get('{{route('frontend.get_maps')}}')
    .then(function(resp){
      $.each(resp.data, function(key, val){
        marker = new L.marker([val.pm_latitude, val.pm_longitude])
          .bindPopup(val.p_name)
          .addTo(map);
      })
    })
  }
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
            window.location.href = "{{route('frontend.index')}}";
          }, 1000);
        }
      }
    })
  })
</script>
@endsection