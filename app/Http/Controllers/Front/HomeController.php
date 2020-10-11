<?php
namespace App\Http\Controllers\Front;
use DB;
use File;
use Config;
use Session;
use App\Order;
use App\Category;
use App\FoodItems;
use App\CardDetail;
use App\Restaurant;
use App\Models\User;
use App\Reservation;
use App\Models\Department;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\HomeConfiguration;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $ModuleSlug = 'home';  
	 
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $ModuleSlug = $this->ModuleSlug;
        $RestaurantList = Restaurant::where('restaurant.isArchive',0)->get();
        return view('front.home', compact('ModuleSlug','RestaurantList'));
    }

    public function restaurant(Request $request)
    {
        $ModuleSlug = $this->ModuleSlug;
        $searchWith = '';

        if ($request->input('s')) {
            $searchWith = $request->input('s');

            $RestaurantList = Restaurant::selectRaw('foodItems.restaurantID,restaurant.restaurantName')
            ->join('category','category.restaurantID', '=', 'restaurant.restaurantID')
            ->join('foodItems','foodItems.categoryID', '=', 'category.categoryID')
            ->where('restaurant.isArchive', 0)
            ->where('restaurant.restaurantName', 'like', "%$searchWith%")
            ->whereNotNull('restaurant.restaurantName')
            ->groupBy('foodItems.restaurantID')
            ->get();

        } else {

            $RestaurantList = Restaurant::selectRaw('foodItems.restaurantID,restaurant.restaurantName')
            ->join('category','category.restaurantID','=','restaurant.restaurantID')
            ->join('foodItems','foodItems.categoryID','=','category.categoryID')
            ->where('restaurant.isArchive',0)
            ->whereNotNull('restaurant.restaurantName')
            ->groupBy('foodItems.restaurantID')
            ->get();
        }
      
        return view('front.restaurant', compact('ModuleSlug','RestaurantList', 'searchWith'));
    }

    public function restaurantDetail(Request $request, $id)
    {
        $ModuleSlug = $this->ModuleSlug;
        $searchWith = '';
        $restaurantName = Restaurant::where('restaurantID', $id)->pluck('restaurantName')->first();

        if ($request->input('s')) {
            $searchWith = $request->input('s');

            $foodItems = FoodItems::select('foodItems.*', 'c.categoryName as category')
            ->join('category as c', 'c.categoryID', '=', 'foodItems.categoryID')
            ->where('foodItems.itemName', 'like', "%$searchWith%")
            ->where('foodItems.restaurantID', $id)->get();

        } else {

            $foodItems = FoodItems::select('foodItems.*', 'c.categoryName as category')
            ->join('category as c', 'c.categoryID', '=', 'foodItems.categoryID')
            ->where('foodItems.restaurantID', $id)->get();
        }

        $foodItems = $foodItems->groupBy('category');
        return view('front.restaurant-detail', compact('ModuleSlug','restaurantName', 'searchWith', 'foodItems'));
    }

    public function listItems(Request $request, $id)
    {
        $ModuleSlug     = $this->ModuleSlug;
        $categoryName   = Category::where('categoryID', $id)->pluck('categoryName')->first();
        $categoryId     = $id;
        $searchWith = '';
        
        if ($request->input('s')) {
            $searchWith = $request->input('s');
            $foodItems = FoodItems::where('categoryID', $id)->where('itemName', 'like', "%$searchWith%")->get();
        } else {
            $foodItems = FoodItems::where('categoryID', $id)->get();
        }

        return view('front.menu', compact('ModuleSlug', 'foodItems', 'categoryName', 'categoryId', 'searchWith'));
    }

    public function bookSeats($id)
    {
        $ModuleSlug = $this->ModuleSlug;
        // $categoryName = Category::where('categoryID',$id)->pluck('categoryName')->first();
        $RestaurantList = Restaurant::where('restaurantID',$id)->first();
        $restaurantID = $id;
        return view('front.bookSeats',compact('ModuleSlug','RestaurantList','restaurantID'));
    }

    public function goToCheckout(Request $request)
    {
        $request->validate([
            'restaurantID' => 'required',
            'type' => 'required|in:reservation,order',
            'name' => 'string',
            'phoneNumber' => 'string',
            'expectedTime' => 'string',
            'size' => 'integer',
            'items' => 'array',
            'total_amount' => 'integer'
        ]);

        $restaurant = Restaurant::where('restaurantID', $request->restaurantID)->first();

        if ($request->type == 'reservation') {
            return view('front.checkout', [
                'type' => $request->type,
                'restaurant_id' => $request->restaurantID,
                'name' => $request->name,
                'phone_number' => $request->phoneNumber,
                'reservation_datetime' => $request->expectedTime,
                'total_people' => $request->size,
                'restaurant' => $restaurant
            ]);
        } else {
            return view('front.checkout', [
                'type' => $request->type,
                'restaurant_id' => $request->restaurantID,
                'restaurant' => $restaurant,
                'items' => $request->items,
                'total_amount' => $request->total_amount,
            ]);
        }
    }

    public function process_order(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'type' => 'required',
            'restaurant_id'=>'required',
            'card_name' => 'required|string',
            'card_number' => 'required|size:16',
            'exp_month' => 'required|integer',
            'exp_year' => 'required|integer',
            'card_cvc' => 'required|size:3',
            'items' => 'array',
            'total_amount' => 'integer'
        ], [
            'integer' => 'Please select :attribute field'
        ]);

        if ($validateData->fails()) {
            $restaurant = Restaurant::where('restaurantID', $request->restaurant_id)->first();

            return view('front.checkout', [
                'restaurant_id' => $request->restaurant_id,
                'restaurant' => $restaurant,
                'type' => $request->type,
                'items' => $request->items,
                'total_amount' => $request->total_amount,
                'errors' => $validateData->errors()->all()
            ]);
        }

        $order = Order::create([
            'restaurant_id'     => $request->restaurant_id,
            'subtotal'          => $request->total_amount,
            'total_items'       => count($request->items),
            'items'             => json_encode(Session::get('cart')),
            'user_id'           => auth()->id()
        ]);

        CardDetail::create([
            'name'              =>  $request->card_name,
            'number'            =>  $request->card_number,
            'exp_month'         =>  $request->exp_month,
            'exp_year'          =>  $request->exp_year,
            'cvc'               =>  $request->card_cvc,
            'user_id'           =>  auth()->id(),
            'order_id'          =>  $order->id,
        ]);
        
        Session::forget('cart');
        session()->flash('success', 'Thank you for order! You will received an update form us, shortly :)');
        return redirect()->route('restaurant');
    }

    public function process_saveReservation(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'restaurant_id' => 'required',
            'type' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'reservation_datetime' => 'required',
            'total_people' => 'required',
            'card_name' => 'required|string',
            'card_number' => 'required|size:16',
            'exp_month' => 'required|integer',
            'exp_year' => 'required|integer',
            'card_cvc' => 'required|size:3',
        ], [
            'integer' => 'Please select :attribute field'
        ]);
        
        if ($validateData->fails()) {
            $restaurant = Restaurant::where('restaurantID', $request->restaurant_id)->first();

            return view('front.checkout', [
                'restaurant_id' => $request->restaurant_id,
                'type' => $request->type,
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'reservation_datetime' => $request->reservation_datetime,
                'total_people' => $request->total_people,
                'restaurant' => $restaurant,
                'errors' => $validateData->errors()->all()
            ]);
        }

        $reservation = Reservation::create([
            'restaurantID'      => $request->input('restaurant_id'),
            'name'              => trim($request->input('name')),
            'phoneNumber'       => trim($request->input('phone_number')),
            'expectedTime'      => trim($request->input('reservation_datetime')),
            'size'              => trim($request->input('total_people')),
        ]);

        CardDetail::create([
            'name'              =>  $request->card_name,
            'number'            =>  $request->card_number,
            'exp_month'         =>  $request->exp_month,
            'exp_year'          =>  $request->exp_year,
            'cvc'               =>  $request->card_cvc,
            'user_id'           =>  auth()->id(),
            'reservation_id'    =>  $reservation->reservationID,
        ]);

        session()->flash('success', 'your Seat booked...');
        return redirect()->route('restaurant');
    }

    public function goToCart()
    {
        if (Session::get('cart') && count(Session::get('cart'))) return view('front.cart');
        else return redirect()->route('restaurant');
    }

    public function addToCart($categoryId, $foodItemId)
    {
        $item = FoodItems::where('foodItemsID', $foodItemId)->first();

        if (!$item || $item->categoryID != $categoryId) {
            session()->flash('error', 'Invalid Food item selected.');
            return redirect()->route('restaurant');
        } else {

            $addItem = $this->addItemInCart($item->foodItemsID, $item->itemName, $item->categoryID, $item->itemPrice, $item->restaurantID);
            if ($addItem === true) {
                session()->flash('success', "$item->itemName Added to cart");
            } else {

                // dd($addItem);
                session()->flash('error', $addItem);
            }
        }

        return redirect()->back();
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('restaurant');
    }

    public function clearItem($itemId)
    {
        $cartItems = $this->previousCartItems();
        $existingItems = array_column($cartItems, 'item_id');

        $index = array_search($itemId, $existingItems);
        unset($cartItems[$index]);
        Session::put('cart', $cartItems);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $itemQuantities = $request->qty;
        $cartItems = $this->previousCartItems();

        $updateCartItems = [];
        foreach ($cartItems as $key => $item) {
            array_push($updateCartItems, [
                'item_id' => $item['item_id'],
                'restaurant_id' => $item['restaurant_id'],
                'item_name' => $item['item_name'],
                'item_category' => $item['item_category'],
                'item_price' => $item['item_price'],
                'item_qty' => $itemQuantities[$key]
            ]);
        }

        Session::put('cart', $updateCartItems);
        return redirect()->back();
    }

    private function addItemInCart($itemId, $itemName, $categoryId, $price, $restaurantId, $quantity = 1)
    {
        $cartItems = $this->previousCartItems();

        if (count($cartItems) == 0) {
            
            array_push($cartItems, [
                'item_id' => $itemId,
                'restaurant_id' => $restaurantId,
                'item_name' => $itemName,
                'item_category' => $categoryId,
                'item_price' => $price,
                'item_qty' => $quantity
            ]);

        } else {
            $existingRestaurant = $cartItems[0]['restaurant_id'];
            if ($existingRestaurant != $restaurantId) {
                return "You have already selected products from a different restaurant. Please complete that order or clear it from Cart";
            }
            
            $itemIds = array_column($cartItems, 'item_id');
            if (in_array($itemId, $itemIds)) {
                return "You have already selected this product, Update cart item quantity from Cart";
            }

            array_push($cartItems, [
                'item_id' => $itemId,
                'restaurant_id' => $restaurantId,
                'item_name' => $itemName,
                'item_category' => $categoryId,
                'item_price' => $price,
                'item_qty' => $quantity
            ]);
        }

        Session::put('cart', $cartItems);
        return true;
    }

    private function previousCartItems()
    {
        $cartItems = Session::get('cart');
        $cartData = [];

        if ($cartItems && count($cartItems)) {
            foreach ($cartItems as $item) {
                array_push($cartData, [
                    'item_id' => $item['item_id'],
                    'restaurant_id' => $item['restaurant_id'],
                    'item_name' => $item['item_name'],
                    'item_category' => $item['item_category'],
                    'item_price' => $item['item_price'],
                    'item_qty' => $item['item_qty']
                ]);
            }
        }

        return $cartData;
    }
}
