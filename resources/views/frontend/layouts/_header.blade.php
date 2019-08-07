<header>
  <div class="container ">
    <!-- end toggle link -->
    <div class="row nomargin">
      <div class="span12">
        <div class="headnav" style="margin-top: 10px;">
          <ul>
            @if(!Auth::user())
            <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
            <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
            @endif
          </ul>
        </div>
        <!-- Signup Modal -->
        @include('frontend.layouts._register')
        <!-- end signup modal -->
        <!-- Sign in Modal -->
        @include('frontend.layouts._login')
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
      </div>
    </div>
    <div class="row">
      <div class="span3">
        <div class="logo">
          {{-- <a href=""> <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-logo mb-0" /> </a> &nbsp&nbsp --}}
          <a class="text-logo" href="{{url('/')}}"> <b>P<i class="fa fa-globe-americas" style="margin-left: 2px;margin-right: 2px;"></i>NPES</b> <span style="color: #7E7E7E;"><i><b>MAPS</b></i></span></a>
        </div>
      </div>
      <div class="span9">
        <div class="navbar navbar-static-top">
          <div class="navigation">
            <nav>
              <ul class="nav topnav" style="display: flex; align-items: center;">
                <li>
                  <form id="form-search" style="margin-bottom: 0px;">
                    <input type="text" class="search-query" id="keyword" name="keyword" placeholder="Pencarian pondok ...">
                  </form>
                </li>
                <li class="{{Request::is('/') ? 'active' : ''}}">
                  <a href="{{route('frontend.index')}}">Home</a>
                </li>
                <li class="{{Request::is('pondok-pesantren/*') || Request::is('pondok-pesantren') ? 'active' : ''}}">
                  <a href="{{route('frontend.pondok')}}">Pondok</i></a>
                </li>
                <li class="">
                  <a href="index.html">Kitab</i></a>
                </li>
                <li class="{{Request::is('review/*') || Request::is('review') ? 'active' : ''}}">
                  <a href="{{route('frontend.review')}}">Riview</i></a>
                </li>
                @if(Auth::user())
                <li class="dropdown">
                  <a href="#"><i class="icon-user"></i> {{Auth::user()->name}} <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout <i class="fa fa-sign-out"></i></a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                  </ul>
                </li>
                @endif
              </ul>
            </nav>
          </div>
        <!-- end navigation -->
        </div>
      </div>
    </div>
  </div>
</header>