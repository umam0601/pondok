<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <img alt="image" class="rounded-circle" src="{{asset('assets/backend/img/profile_small.jpg')}}"/>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                <span class="text-muted text-xs block text-capitalize">{{Auth::user()->name}} <b class="caret"></b></span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                {{-- <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                <li class="dropdown-divider"></li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        <div class="logo-element">
            IN+
        </div>
    </li>
    {{-- <li class="active">
        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li class="active"><a href="index.html">Dashboard v.1</a></li>
            <li><a href="dashboard_2.html">Dashboard v.2</a></li>
            <li><a href="dashboard_3.html">Dashboard v.3</a></li>
            <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
            <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
        </ul>
    </li> --}}
    <li class="{{Request::is('admin') ? 'active' : ''}}">
        <a href="{{route('admin')}}"><i class="fa fa-fw fa-th-large"></i>&nbsp <span class="nav-label">Dashboard</span></a>
    </li>
    <li class="{{Request::is('admin/pondok') ? 'active' : '' || Request::is('admin/pondok/*') ? 'active' : ''}}">
        <a href="{{route('admin.pondok')}}"><i class="fa fa-fw fa-mosque"></i>&nbsp <span class="nav-label">Master Pondok</span>  </a>
    </li>
    <li class="{{Request::is('admin/kitab') ? 'active' : '' || Request::is('admin/kitab/*') ? 'active' : ''}}">
        <a href="{{route('admin.kitab')}}"><i class="fa fa-fw fa-quran"></i>&nbsp <span class="nav-label">Master Kitab</span></a>
    </li>
</ul>