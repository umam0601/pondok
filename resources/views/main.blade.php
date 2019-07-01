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
    @yield('content')
    @include('frontend.layouts._footer')
  </div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  @include('frontend.layouts._script')
  @yield('extra_script')

</body>
</html>

