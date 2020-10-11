@include('front.header')

<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">Shopping Cart</h1>
        </div>
    </div>
</section>

<section class="bg-lightGray section-padding">
    <div class="container">
        <div class="row align-items-top cart">
            
            <form class="col-md-8 col-sm-12" method="post" action="/update-cart">
                @csrf
                <a href="/clear-cart"><i class="ti-close"></i> Remove All</a>
                <table class="table">
                    <tr>
                        <th>Sr #</th>
                        <th>Product</th>
                        <th>Item Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    
                    @php $i = 0; $subTotal = 0; $restaurantId = 0; $items = []; @endphp
                    @foreach(Session::get('cart') as $item)
                    @php 
                        $i++;
                        $restaurantId = $item['restaurant_id'];
                        $itemPrice = $item['item_price'];
                        $itemName = $item['item_name'];
                        $itemQty = $item['item_qty'];
                        $itemTotal = $itemPrice * $itemQty;
                        $itemDetail = $itemQty . ' x ' . $itemName . ' = $' . $itemTotal . '.00';
                        array_push($items, $itemDetail);
                        $subTotal += $itemTotal;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $itemName }}</td>
                        <td>${{ $itemPrice }}.00</td>
                        <td><input class="form-control" min="1" type="number" name="qty[]" value="{{ $itemQty }}" /></td>
                        <td>${{ $itemTotal }}.00</td>
                        <td><a href="/clear-item/{{ $item['item_id'] }}"><i class="ti-close"></i></a></td>
                    </tr>
                    @endforeach
                </table>

                <input type="submit" class="btn btn-sm float-right" value="Update Cart">
            </form>

            <form class="col-md-4 col-sm-12" method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="type" value="order">
                <input type="hidden" name="restaurantID" value="{{ $restaurantId }}">
                <input type="hidden" name="total_amount" value="{{ $subTotal }}">
                @foreach($items as $item)
                <input type="hidden" name="items[]" value="{{ $item }}">
                @endforeach
                <div class="subtotal">
                    <h4>Order Summary</h4>
                    <ul>
                        <li>
                            <span class="left-summary">Sub-Total:</span>
                            <span class="right-summary">${{ $subTotal }}.00</span>
                        </li>
                        <li>
                            <span class="left-summary">Shipping:</span>
                            <span class="right-summary">$0.00</span>
                        </li>
                        <li>
                            <span class="left-summary">Tax:</span>
                            <span class="right-summary">$0.00</span>
                        </li>
                        <li>
                            <span class="left-summary">Total:</span>
                            <span class="right-summary">${{ $subTotal }}.00</span>
                        </li>
                    </ul>
                    
                    <button type="submit" class="button btn-block">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</section>

@include('front.footer')