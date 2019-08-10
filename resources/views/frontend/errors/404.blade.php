<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | 500 Error</title>

    <link href="{{asset('assets/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1 class="animated flash infinite">404</h1>
        <h3 class="font-bold">Internal Server Error</h3>

        <div class="error-desc">
            The server encountered something unexpected that didn't allow it to complete the request. We apologize.<br/>
            You can go back to main page: <br/>
            <div class="row">
                <div class="col-12">
                    <div class="text-center" style="align-self: center;display: inline-block;">
                        <div class="input-group mt-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-home"></i></span>
                          </div>
                          <a href="{{route('frontend.index')}}" class="btn btn-primary">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/backend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap.js')}}"></script>

</body>

</html>
