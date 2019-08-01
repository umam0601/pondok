<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Ponpes Maps</title>
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
    .search-query{
      width: 400px;
      border-radius: 50px !important;
      position: relative;
      right: 0px;
    }
    input[type="text"]:focus{
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgb(42, 203, 32);
      border-color: #2acb20;
    }
    .notif-error{
      height: auto;
      padding-top: 10px;
      padding-bottom: 10px;
      border-top: 1px solid red;
      border-bottom: 1px solid red;
      background-color: #FCB8BE;
      margin-bottom: 10px;
      display: none;
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
    @include('frontend.layouts._header')
    <!-- end header -->
    @yield('content')
    @include('frontend.layouts._footer')
  </div>
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
@include('frontend.layouts._script')
@yield('extra_script')
</body>
</html>

