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
<!-- Register Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
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
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                @endif
                                <form method="post" action="{{ url('/') }}/admin/changePassword">
                                    @csrf


                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input name="oldPassword" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                    </div>


                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPasswordRepeat"
                                               placeholder="Repeat Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="font-weight-bold small" href="{{url('/')}}/admin/dashboard">Back To dashboard?</a>
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
<!-- Register Content -->
<script src="{{url('/')}}/public/admin/vendor/jquery/jquery.min.js"></script>
<script src="{{url('/')}}/public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{url('/')}}/public/admin/js/ruang-admin.min.js"></script>
</body>

</html>