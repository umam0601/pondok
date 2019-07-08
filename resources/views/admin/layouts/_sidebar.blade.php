<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-home"></i>
    </div>
    <div class="sidebar-brand-text mx-3">PonPes Maps</div>
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
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>
  <!-- Nav Item - Pondok-->
  <li class="nav-item {{Request::is('admin/pondok') ? 'active' : '' || Request::is('admin/pondok/*') ? 'active' : ''}}">
    <a class="nav-link" href="{{route('admin.pondok')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Pondok Pesantren</span></a>
  </li>
</ul>
<!-- End of Sidebar