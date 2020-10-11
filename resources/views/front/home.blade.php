@include('front.header')
<!--================Hero Banner Section start =================-->
<section class="hero-banner">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">Online Food & Restaurant </h1>
            <div class="d-sm-flex flex-wrap">
                
{{--                <a class="hero-banner__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Watch Video</a>--}}
            </div>
{{--            <ul class="hero-info d-none d-lg-block">--}}
{{--                <li>--}}
{{--                    <img src="{{url('/')}}/public/front/img/banner/fas-service-icon.png" alt="">--}}
{{--                    <h4>Fast Service</h4>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="{{url('/')}}/public/front/img/banner/fresh-food-icon.png" alt="">--}}
{{--                    <h4>Fresh Food</h4>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="{{url('/')}}/public/front/img/banner/support-icon.png" alt="">--}}
{{--                    <h4>24/7 Support</h4>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
       

</section>
<!--================Hero Banner Section end =================-->


{{--<!--================About Section start =================-->--}}
<section class="about section-margin pb-xl-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
                <div class="img-styleBox">
                    <div class="styleBox-border">
                        <img class="styleBox-img1 img-fluid" src="{{url('/')}}/public/front/img/home/about-img1.png" alt="">
                    </div>
                    <img class="styleBox-img2 img-fluid" src="{{url('/')}}/public/front/img/home/about-img2.png" alt="">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
                <div class="section-intro mb-lg-4">
                    <h4 class="intro-title">About Us</h4>
                    <h2>We speak the good food language</h2>
                </div>
                <ul type="disc">
                    <li>	Restaurants will have a portal on which they can register their business.</li>
<li>	Restaurants will be able to enter their business information, update their information.</li>
<li>Restaurants can add food options and assign categories to the food items (Indian food, Mexican food etc).</li>
<li>Users will also have an option to signup and login from the user portal.</li>
<li>Once user logins, they will be able to select from multiple restaurants and then they can make seat reservations.</li>
<li>Users can also pre-order food along with seat reservations.</li>
<li>Users can also select a food category and then it will bring the restaurants which offer that category type.</li> 
<li>After selection of restaurant, user can also see the available reservations.</li>
<li>Users can also pay for their reservations and food through the web application if they want (Needs discussion for payment module).</li>

                </ul>
                <p>Living first us creepeth she'd earth second be sixth hath likeness greater image said sixth was without male place fowl evening an grass form living fish and rule lesser for blessed can't saw third one signs moving stars light divided was two you him appear midst cattle for they are gathering.</p>
                <a class="button button-shadow mt-2 mt-lg-4" href="#">Learn More</a>
            </div>
        </div>
    </div>
</section>
{{--<!--================About Section End =================-->--}}


@include('front.footer')