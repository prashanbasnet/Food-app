@include('front.header')
<section class="bg-lightGray section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-xl-5 mb-4 mb-md-0">
                <div class="section-intro">
                    <h4 class="intro-title">Reservation</h4>
                    <h2 class="mb-3">{{$RestaurantList->restaurantName}}</h2>
                </div>
                <p>{{$RestaurantList->description}}</p>
            </div>
            <div class="col-md-6 offset-xl-2 col-xl-5">
                <div class="search-wrapper">
                    <h3>Book A Table</h3>
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
                    <form class="search-form" method="post" action="{{ url('/checkout') }}">
                        @csrf
                        <input type="hidden" name="type" value="reservation">
                        
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{old('name')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{old('email')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-email"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control" name="phoneNumber" placeholder="Phone Number" value="{{old('phoneNumber')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-headphone-alt"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="datetime-local" class="form-control" name="expectedTime" placeholder="Select Date" value="{{old('expectedTime')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" name="size" class="form-control" placeholder="Select People" value="{{old('size')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-layout-column3"></i></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="restaurantID" value="{{$restaurantID}}">
                        <div class="form-group form-group-position">
                            <button class="button border-0" type="submit">Go To Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Reservation section end =================-->


<!--================Blog section start =================-->
{{--<section class="section-margin">--}}
{{--    <div class="container">--}}
{{--        <div class="section-intro mb-75px">--}}
{{--            <h4 class="intro-title">Our Blog</h4>--}}
{{--            <h2>Latest food and recipe news</h2>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">--}}
{{--                <div class="card-blog">--}}
{{--                    <img class="card-img rounded-0" src="{{url('/')}}/public/front/img/blog/blog1.png" alt="">--}}
{{--                    <div class="blog-body">--}}
{{--                        <ul class="blog-info">--}}
{{--                            <li><a href="#">Admin post</a></li>--}}
{{--                            <li><a href="#">Jan 10, 2019</a></li>--}}
{{--                        </ul>--}}
{{--                        <a href="#">--}}
{{--                            <h3>Huge cavity in antarctic glacie signals rapid</h3>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">--}}
{{--                <div class="card-blog">--}}
{{--                    <img class="card-img rounded-0" src="{{url('/')}}/public/front/img/blog/blog2.png" alt="">--}}
{{--                    <div class="blog-body">--}}
{{--                        <ul class="blog-info">--}}
{{--                            <li><a href="#">Admin post</a></li>--}}
{{--                            <li><a href="#">Jan 10, 2019</a></li>--}}
{{--                        </ul>--}}
{{--                        <a href="#">--}}
{{--                            <h3>Researcher unearths age--}}
{{--                                in the desert</h3>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">--}}
{{--                <div class="card-blog">--}}
{{--                    <img class="card-img rounded-0" src="{{url('/')}}/public/front/img/blog/blog3.png" alt="">--}}
{{--                    <div class="blog-body">--}}
{{--                        <ul class="blog-info">--}}
{{--                            <li><a href="#">Admin post</a></li>--}}
{{--                            <li><a href="#">Jan 10, 2019</a></li>--}}
{{--                        </ul>--}}
{{--                        <a href="#">--}}
{{--                            <h3>High-protein rice brings--}}
{{--                                value, nutrition</h3>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--================Blog section end =================-->

@include('front.footer')