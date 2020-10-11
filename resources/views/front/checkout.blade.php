@include('front.header')
<section class="bg-lightGray section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-xl-5 mb-4 mb-md-0">
                <div class="section-intro">
                    <h4 class="intro-title">Checkout</h4>
                    <h2 class="mb-3">{{ $restaurant->restaurantName }}</h2>
                </div>
                <p>{{ $restaurant->description }}</p>
                <div class="section-intro">

                    @if($type == 'reservation')
                        <h4 class="intro-title">Reservation Detail</h4>
                        <h6 class="mb-3">Name: {{ $name }}</h6>
                        <h6 class="mb-3">Persons: {{ $total_people }}</h6>
                        <h6 class="mb-3">Dated: {{ date('M d, Y H:i A', strtotime($reservation_datetime)) }}</h6>
                    @else
                        <h4 class="intro-title">Order Detail</h4>
                        @foreach ($items as $item)
                        <h6 class="mb-3">{{ $item }}</h6>
                        @endforeach
                        <h6 class="mb-3">Total Amount: ${{ $total_amount }}.00</h6>
                        <a href="/cart">Back to Cart</a>
                    @endif
                </div>
            </div>

            <div class="col-md-6 offset-xl-2 col-xl-5">
                <div class="search-wrapper">
                    <h3>Checkout</h3>
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

                    @if(count($errors))
                        <div class="alert alert-danger">
                            <ul>
                                @if(count($errors))
                                    @foreach ($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endif

                    <form class="search-form" action="/{{ $type == 'reservation' ? 'reservation' : 'complete-order' }}" method="POST">
                        
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">
                        <input type="hidden" name="type" value="{{ $type }}">
                        
                        @if ($type == 'reservation')
                        
                        <input type="hidden" name="name" value="{{ $name }}">
                        <input type="hidden" name="phone_number" value="{{ $phone_number }}">
                        <input type="hidden" name="reservation_datetime" value="{{ $reservation_datetime }}">
                        <input type="hidden" name="total_people" value="{{ $total_people }}">

                        @else

                        <input type="hidden" name="total_amount" value="{{ $total_amount }}">

                        @foreach($items as $item)
                        <input type="hidden" name="items[]" value="{{ $item }}">
                        @endforeach
                        
                        @endif

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="card_name" placeholder="Name on Card" value="{{old('card_name')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="0" max="9999999999999999" class="form-control" name="card_number" placeholder="Card Number" value="{{old('card_number')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-credit-card"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row form-group">
                            <div class="col">
                                <select class="custom-select" name="exp_month">
                                    <option selected>Exp Month</option>
                                    <option value="1">January</option>
                                    <option value="2">Febuary</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="custom-select" name="exp_year">
                                    <option selected>Exp Year</option>
                                    @php
                                        $dateYear = date('Y');
                                        for ($i = $dateYear; $i < ($dateYear + 12) ; $i++) {
                                        @endphp
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @php
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" name="card_cvc" min="0" max="999" class="form-control" placeholder="Card CVC" value="{{old('card_cvc')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-layout-column3"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-position">
                            <button class="button border-0" type="submit">{{ $type == 'reservation' ? 'Make Reservation' : 'Confirm Order'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.footer')