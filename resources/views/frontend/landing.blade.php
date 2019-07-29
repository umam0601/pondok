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
          {!!$ps->p_description!!}
        </p>
        <a href="#" class="da-link link-button">Read more</a>
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
<section id="content">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h4>Very satisfied <strong>clients</strong></h4>
        <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
          <li>
            <a href="#" style="padding: 10px; height: 35px; display: flex; align-items: center;">
              <span style="width: 100%; text-align: center;">Silawesi</span>
              {{-- <img src="{{asset('assets/frontend/img/dummies/clients/client1.png')}}" class="client-logo" alt="" /> --}}
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client2.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client3.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client4.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client5.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client6.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client1.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client2.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client3.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client4.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client5.png')}}" class="client-logo" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client6.png')}}" class="client-logo" alt="" />
            </a>
          </li>
        </ul>
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
    <div class="row">
      <div class="span12">
        <h4 class="heading">Some of recent <strong>works</strong></h4>
        <div class="row">
          <section id="projects">
            <ul id="thumbs" class="portfolio">
              @foreach($pondok_latest as $pl)
              <li class="span3"style="background: url('{{asset('public/profile/upload')}}/{{$pl->p_code.'/'.$pl->p_image}}') center center no-repeat;background-size: cover;">
                <img src="{{asset('assets/frontend/img/img-thumb.png')}}" alt="" class="img-fluid">
              </li>
              <!-- Item Project and Filter Name -->
              {{-- <li class="item-thumbs span3 design rounded" data-id="id-0" data-type="web" style="background: url('{{asset('public/profile/upload')}}/{{$pl->p_code.'/'.$pl->p_image}}') center center no-repeat;background-size: cover;"> --}}
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                {{-- <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="{{asset('public/profile/upload')}}/{{$pl->p_code.'/'.$pl->p_image}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a> --}}
                <!-- Thumb Image and Description -->
                {{-- <img class="rounded" src="{{asset('assets/frontend/img/img-thumb.png')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque <a href='{{url('/')}}'>Link</a>" style="max-width: 750px;">
              </li> --}}
              <!-- End Item Project -->
              @endforeach
            </ul>
          </section>
        </div>
      </div>
    </div>
    <!-- End Portfolio Projects -->
    <!-- divider -->
    <div class="row">
      <div class="span12">
        <div class="solidline">
        </div>
      </div>
    </div>
    <!-- end divider -->
    <div class="row">
      <div class="span12">
        <h4>Very satisfied <strong>clients</strong></h4>
        <ul id="mycarousel2" class="jcarousel-skin-tango recent-jcarousel clients">
          <li>
            <a href="#">
              <img src="{{asset('assets/frontend/img/dummies/clients/client1.png')}}" class="client-logo" style="height: 250px;" alt="" />
            </a>
          </li>
        </ul>
      </div>
      <div class="span12">
          <div class="aligncenter">
            <button class="btn btn-theme">Lihat lebih banyak</button>
          </div>
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