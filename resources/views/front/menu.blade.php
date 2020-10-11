@include('front.header')

<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">{{ $categoryName }}</h1>
            <!-- 
            <ul class="hero-info d-none d-lg-block">
               @foreach($foodItems as $list)
                <li>
                    <img src="/public/front/img/banner/fas-service-icon.png" alt="">
                    <h4>{{$list->itemName}}</h4>
                </li>
                @endforeach
            </ul>
            -->
        </div>
        <!--
        <div class="hero-right">
            <div class="owl-carousel owl-theme w-100 hero-carousel">
                <div class="hero-carousel-item">
                    <img class="img-fluid" src="/public/front/img/banner/hero-banner-sm.png" alt="">
                </div>
            </div>
        </div>
        -->
    </div>
</section>

<section class="section-margin">
    <div class="container">
        @if(Session::get('cart') && count(Session::get('cart')))
            <div class="row">
                <div class="col-12 alert alert-info">
                    @php
                        $cartItems = count(Session::get('cart'));
                    @endphp
                    {{ $cartItems == 1 ? $cartItems . ' item' : $cartItems . ' items' }} avialble in cart continue searching for food or <a href="/cart">Go to Cart</a>
                </div>
            </div>
        @endif
        <div class="row mb-75px">
            <div class="col-12">
                <div class="text-center">
                    @if ($searchWith)
                    <h2>Food Items ({{ count($foodItems) }})</h2>
                    @else
                    <h2>Food Items</h2>
                    @endif
                </div>
                <form method="get" class="mb-2">
                    <div class="form-row">
                        <input type="text" class="form-control" name="s" value="{{ $searchWith }}" placeholder="Search Food Items" />
                    </div>
                </form>

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
            </div>
        </div>
        <div class="row">
            @if (count($foodItems))
            @foreach($foodItems as $item)
              <div class="col-lg-6">
                <div class="media align-items-center food-card">
                    <img class="mr-3 mr-sm-4" src="/public/front/img/home/food1.png">
                    <div class="media-body">
                        <div class="d-flex justify-content-between food-card-title">
                            <h4>{{ $item->itemName }}</h4>
                            <h3 class="price-tag">
                                <a href="{{ '/add-to-cart/' . $categoryId . '/' . $item->foodItemsID }}">Add to Cart</a>
                            </h3>
                        </div>
                        <h5>Price: ${{ $item->itemPrice }}.00</h5>
                    </div>
                </div>
            </div>
            @endforeach
            @else

            <div class="col-12">
                <h1 class="display-4">No Result Found</h1>
                <p class="lead">No food item available for {{ $searchWith }}, please search another name.</p>
            </div>

            @endif
        </div>
    </div>
</section>


@include('front.footer')