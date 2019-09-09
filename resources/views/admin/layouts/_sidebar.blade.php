<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <img alt="image" class="rounded-circle" src="{{asset('assets/backend/img/profile_small.jpg')}}"/>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                {{-- <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span> --}}
                <span class="text-muted text-xs block text-capitalize">{{Auth::user()->name}} <b class="caret"></b></span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                {{-- <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                <li class="dropdown-divider"></li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('login.signout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('login.signout') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="username" value="{{Auth::user()->name}}">
                </form>
            </ul>
        </div>
        <div class="logo-element">
            <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-fluid">
        </div>
    </li>
    <li class="{{Request::is('admin') ? 'active' : ''}}">
        <a href="{{route('admin')}}"><i class="fa fa-fw fa-th-large"></i>&nbsp <span class="nav-label">Dashboard</span></a>
    </li>
    <li class="{{Request::is('admin/user') ? 'active' : '' || Request::is('admin/user/*') ? 'active' : ''}}">
        <a href="{{route('admin.user')}}"><i class="fa fa-fw fa-user"></i>&nbsp <span class="nav-label">Master User</span>  </a>
    </li>
    <li class="{{Request::is('admin/pondok') ? 'active' : '' || Request::is('admin/pondok/*') ? 'active' : ''}}">
        <a href="{{route('admin.pondok')}}"><i class="fa fa-fw fa-mosque"></i>&nbsp <span class="nav-label">Master Pondok</span>  </a>
    </li>
    <li class="{{Request::is('admin/kitab') ? 'active' : '' || Request::is('admin/kitab/*') ? 'active' : ''}}">
        <a href="{{route('admin.kitab')}}"><i class="fa fa-fw fa-quran"></i>&nbsp <span class="nav-label">Master Kitab</span></a>
    </li>
    <li class="{{Request::is('admin/review') ? 'active' : '' || Request::is('admin/review/*') ? 'active' : ''}}">
        <a href="{{route('admin.review')}}"><i class="fa fa-fw fa-paper-plane"></i>&nbsp <span class="nav-label">Master Review</span></a>
    </li>
</ul>