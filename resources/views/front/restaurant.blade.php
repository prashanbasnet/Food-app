@include('front.header')

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
                    <h2>Restaurant List ({{ count($RestaurantList) }})</h2>
                    @else
                    <h2>Restaurant List</h2>
                    @endif
                </div>
                <form method="get" class="mb-5">
                    <div class="form-row">
                        <input type="text" class="form-control" name="s" value="{{ $searchWith }}" placeholder="Search By Restaurant" />
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
            </div>
        </div>
        <div class="row">
            @if (count($RestaurantList))
            @foreach($RestaurantList as $MainList)
              <div class="col-lg-6">
                <div class="media align-items-center food-card">
                    <img class="mr-3 mr-sm-4" src="{{url('/')}}/public/front/img/home/food1.png" alt="">
                    <div class="media-body">
                        <div class="d-flex justify-content-between food-card-title">
                            <h4>
                                @if($MainList->restaurantName)
                                <a href="/restaurant/{{$MainList->restaurantID}}">{{$MainList->restaurantName}}</a>
                                @else Unknown @endif
                            </h4>
                            <h3 class="price-tag"><a href="{{url('/').'/book/'.$MainList->restaurantID.'/seats'}}">Book Your Seat</a></h3>
                        </div>
                       <?php
                         $getCategory = \App\Category::where('restaurantID',$MainList->restaurantID)->get();
                        ?>
                        @foreach($getCategory as $list)
                            <p><a href="{{url('/').'/view/'.$list->categoryID.'/foodItems'}}">{{$list->categoryName}}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="col-12">
                    <h1 class="display-4">No Result Found</h1>
                    <p class="lead">No restaurent available for {{ $searchWith }}, please search another name.</p>
                </div>
            @endif

        </div>
    </div>
</section>

<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
       $("#formId").submit();
    }
</script>

@include('front.footer')