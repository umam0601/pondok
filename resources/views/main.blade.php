<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Flattern - Flat and trendy bootstrap site template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  @include('frontend.layouts._head')
  @yield('extra_style')
  <style type="text/css">
    a:hover{
      text-decoration: none !important;
      color: darkgrey;
    }
    .rounded{
      border-radius: 5px;
    }
  </style>
  <!-- =======================================================
  Theme Name: Flattern
  Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  Author: BootstrapMade.com
  Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body>
  <div id="wrapper">
    <!-- start header -->
    <header>
      <div class="container ">
        <div class="row mb-0 align-items-center">
          <div class="span4 header-branded align-items-center">
            <div class="logo align-items-center">
              <a href="" class="align-items-center"> <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-logo mb-0" /> </a> &nbsp&nbsp
              <a class="text-logo" href="index.html"> <b>PONPES</b> <span style="color: #7E7E7E;"><i><b>MAPS</b></i></span></a>
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
                    <a href="{{route('admin')}}">Contact </a>
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
  @yield('content')
  @include('frontend.layouts._footer')
</div>
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
@include('frontend.layouts._script')
@yield('extra_script')
</body>
</html>

