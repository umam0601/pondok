@extends('main')
@section('content')
@section('extra_style')
<style type="text/css">
  header .logo{
    margin-top: 20px !important;
  }

  .navbar-static-top{
    margin-top: 30px !important;
  }
</style>
@endsection
<!-- start header -->
<header>
  <div class="container ">
    {{-- <div class="row nomargin">
      <div class="span12"> --}}
        {{-- <div class="headnav">
          <ul>
            <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
            <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
          </ul>
        </div> --}}
        <!-- Signup Modal -->
        {{-- <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input type="text" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputSignupPassword">Password</label>
                <div class="controls">
                  <input type="password" id="inputSignupPassword" placeholder="Password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                <div class="controls">
                  <input type="password" id="inputSignupPassword2" placeholder="Password">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn">Sign up</button>
                </div>
                <p class="aligncenter margintop20">
                  Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                </p>
              </div>
            </form>
          </div>
        </div> --}}
        <!-- end signup modal -->
        <!-- Sign in Modal -->
        {{-- <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="inputText">Username</label>
                <div class="controls">
                  <input type="text" id="inputText" placeholder="Username">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputSigninPassword">Password</label>
                <div class="controls">
                  <input type="password" id="inputSigninPassword" placeholder="Password">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn">Sign in</button>
                </div>
                <p class="aligncenter margintop20">
                  Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                </p>
              </div>
            </form>
          </div>
        </div> --}}
        <!-- end signin modal -->
        <!-- Reset Modal -->
        {{-- <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="inputResetEmail">Email</label>
                <div class="controls">
                  <input type="text" id="inputResetEmail" placeholder="Email">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn">Reset password</button>
                </div>
                <p class="aligncenter margintop20">
                  We will send instructions on how to reset your password to your inbox
                </p>
              </div>
            </form>
          </div>
        </div> --}}
        <!-- end reset modal -->
      {{-- </div>
    </div> --}}
    <div class="row">
      <div class="span4">
        <div class="logo">
          <a href="index.html"><img src="{{asset('assets/frontend/img/logo.png')}}" alt="" class="logo" /></a>
        </div>
      </div>
      <div class="span8">
        <div class="navbar navbar-static-top">
          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <li class="dropdown active">
                  <a href="index.html">Home <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="index-alt2.html">Homepage 2</a></li>
                    <li><a href="index-alt3.html">Homepage 3</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Features <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="table.html">Table</a></li>
                    <li><a href="components.html">Components</a></li>
                    <li><a href="animations.html">56 Animations</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="icon-variations.html">Icon variations</a></li>
                    <li class="dropdown"><a href="#">3 Sliders <i class="icon-angle-right"></i></a>
                      <ul class="dropdown-menu sub-menu-level1">
                        <li><a href="index.html">Nivo slider</a></li>
                        <li><a href="index-alt2.html">Slit slider</a></li>
                        <li><a href="index-alt3.html">Parallax slider</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Pages <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="about.html">About us</a></li>
                    <li><a href="pricingbox.html">Pricing boxes</a></li>
                    <li><a href="testimonials.html">Testimonials</a></li>
                    <li><a href="404.html">404</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Portfolio <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="portfolio-2cols.html">Portfolio 2 columns</a></li>
                    <li><a href="portfolio-3cols.html">Portfolio 3 columns</a></li>
                    <li><a href="portfolio-4cols.html">Portfolio 4 columns</a></li>
                    <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Blog <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                    <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                    <li><a href="post-left-sidebar.html">Post left sidebar</a></li>
                    <li><a href="post-right-sidebar.html">Post right sidebar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="contact.html">Contact </a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- end navigation -->
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end header -->
<section id="featured">
  <!-- start slider -->
  <!-- Slider -->
  <div id="nivo-slider">
    <div class="nivo-slider">
      <!-- Slide #1 image -->
      <img src="{{asset('assets/frontend/img/slides/nivo/bg-1.jpg')}}" alt="" title="#caption-1" />
      <!-- Slide #2 image -->
      <img src="{{asset('assets/frontend/img/slides/nivo/bg-2.jpg')}}" alt="" title="#caption-2" />
      <!-- Slide #3 image -->
      <img src="{{asset('assets/frontend/img/slides/nivo/bg-3.jpg')}}" alt="" title="#caption-3" />
    </div>
    <div class="container">
      <div class="row">
        <div class="span12">
          <!-- Slide #1 caption -->
          <div class="nivo-caption" id="caption-1">
            <div>
              <h2>Awesome <strong>features</strong></h2>
              <p>
                Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
              </p>
              <a href="#" class="btn btn-theme">Read More</a>
            </div>
          </div>
          <!-- Slide #2 caption -->
          <div class="nivo-caption" id="caption-2">
            <div>
              <h2>Fully <strong>responsive</strong></h2>
              <p>
                Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
              </p>
              <a href="#" class="btn btn-theme">Read More</a>
            </div>
          </div>
          <!-- Slide #3 caption -->
          <div class="nivo-caption" id="caption-3">
            <div>
              <h2>Very <strong>customizable</strong></h2>
              <p>
                Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
              </p>
              <a href="#" class="btn btn-theme">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end slider -->
</section>
<section id="content">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="row">
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <i class="icon-briefcase icon-circled icon-64 active"></i>
              </div>
              <div class="text">
                <h6>Corporate business</h6>
                <p>
                  Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                </p>
                <a href="#">Learn more</a>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <i class="icon-desktop icon-circled icon-64 active"></i>
              </div>
              <div class="text">
                <h6>Responsive theme</h6>
                <p>
                  Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                </p>
                <a href="#">Learn more</a>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <i class="icon-beaker icon-circled icon-64 active"></i>
              </div>
              <div class="text">
                <h6>Coded carefully</h6>
                <p>
                  Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                </p>
                <a href="#">Learn more</a>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <i class="icon-coffee icon-circled icon-64 active"></i>
              </div>
              <div class="text">
                <h6>Sit and enjoy</h6>
                <p>
                  Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                </p>
                <a href="#">Learn more</a>
              </div>
            </div>
          </div>
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
    <div class="row">
      <div class="span12">
        <h4>Very satisfied <strong>clients</strong></h4>
        <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
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
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="{{asset('assets/frontend/img/works/full/image-01-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-01.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="{{asset('assets/frontend/img/works/full/image-02-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-02.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="{{asset('assets/frontend/img/works/full/image-03-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-03.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="{{asset('assets/frontend/img/works/full/image-04-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-04.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 photography" data-id="id-4" data-type="web">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Sea" href="{{asset('assets/frontend/img/works/full/image-05-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-05.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 photography" data-id="id-5" data-type="icon">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Clouds" href="{{asset('assets/frontend/img/works/full/image-06-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-06.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="{{asset('assets/frontend/img/works/full/image-07-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-07.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
              <!-- Item Project and Filter Name -->
              <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Dark" href="{{asset('assets/frontend/img/works/full/image-08-full.jpg')}}">
                  <span class="overlay-img"></span>
                  <span class="overlay-img-thumb font-icon-plus"></span>
                </a>
                <!-- Thumb Image and Description -->
                <img class="rounded" src="{{asset('assets/frontend/img/works/thumbs/image-08.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
              </li>
              <!-- End Item Project -->
            </ul>
          </section>
        </div>
      </div>
    </div>
    <!-- End Portfolio Projects -->
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