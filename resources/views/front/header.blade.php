<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Restaurant - Home</title>
    <link rel="icon" href="{{url('/')}}/public/front/img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="{{url('/')}}/public/front/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/public/front/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{url('/')}}/public/front/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('/')}}/public/front/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('/')}}/public/front/vendors/Magnific-Popup/magnific-popup.css">

    <link rel="stylesheet" href="{{url('/')}}/public/front/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/public/front/css/custom.css">
</head>
<body>

<!--================ Header Menu Area start =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <a class="navbar-brand logo_h" href="{{url('/')}}">
                    {{--                    <img src="{{url('/')}}/public/front/img/logo.png" alt="">--}}
                    <b style="
color: black;
    font-size: 20px;
    font-family: cursive;">Food & Restaurant</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        {{--                        <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a>--}}
                        {{--                        <li class="nav-item"><a class="nav-link" href="chef.html">Chef</a>--}}

                        @if(Session::get('firstName'))
                            <li class="nav-item"><a class="nav-link" href="{{url('/')}}/restaurant">Restaurant</a></li>
                        @endif
                       @if(Session::get('firstName'))
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Welcome {{Session::get('firstName').' '.Session::get('lastName') }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}/changePassword">Change Password</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}/logout">Logout</a></li>
                                </ul>
                            </li>

                        @else
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Account</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}/login">User</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}/admin/login">Restaurant/Admin</a></li>
                                </ul>
                            </li>
                        @endif

                    

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
