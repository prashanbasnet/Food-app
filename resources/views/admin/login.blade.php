<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{url('/')}}/public/admin/img/logo/logo.png" rel="icon">
    <title>Online Restaurant  - {{$ModuleSlug}}</title>
    <link href="{{url('/')}}/public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/public/admin/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
<!-- Login Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif


                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <form class="user" method="post" action="{{ url('/') }}/admin/login">
                                    @csrf
                                    <div class="form-group">
                                        <input value="{{old('email')}}" name="email" type="email" class="form-control" required id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" required id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                                    </div>
                                    <hr>
                                    <input type="hidden" name="role" value="Manager">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="font-weight-bold small" href="{{url('/')}}/admin/register">Register a Restaurant</a>  |  <a class="font-weight-bold small" href="{{url('/')}}/admin/forgotPassword">Forgot Password</a>
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Content -->
<script src="{{url('/')}}/public/admin/vendor/jquery/jquery.min.js"></script>
<script src="{{url('/')}}/public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{url('/')}}/public/admin/js/ruang-admin.min.js"></script>
</body>

</html>