<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="{{asset('assets/images/logo-light.png')}}" alt="" class="img-fluid" style="width: 50px;">
      {{-- <i class="fas fa-home"></i> --}}
    </div>
    <div class="sidebar-brand-text mx-1" style="font-size: 20px; line-height: 20px;">PONPES MAPS</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{Request::is('admin') ? 'active' : ''}}">
    <a class="nav-link" href="{{route('admin')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
  </li>
    <!-- Divider -->
  <hr class="sidebar-divider mb-0">
  <!-- Heading -->
  {{-- <div class="sidebar-heading">
    Interface
  </div> --}}
  <!-- Nav Item - Pondok-->
  <li class="nav-item {{Request::is('admin/pondok') ? 'active' : '' || Request::is('admin/pondok/*') ? 'active' : ''}} mb-0">
    <a class="nav-link" href="{{route('admin.pondok')}}">
    <i class="fas fa-fw fa-mosque"></i>
    <span>Pondok Pesantren</span></a>
  </li>
  <!-- Nav Item - Kitab-->
  <li class="nav-item {{Request::is('admin/kitab') ? 'active' : '' || Request::is('admin/kitab/*') ? 'active' : ''}}">
    <a class="nav-link pt-0" href="{{route('admin.kitab')}}">
    <i class="fas fa-fw fa-quran"></i>
    <span>Kitab</span></a>
  </li>
</ul>
<!-- End of Sidebar