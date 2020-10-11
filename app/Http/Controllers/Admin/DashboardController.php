<?php
namespace App\Http\Controllers\Admin;
use DB;
use File;
use Config;
use Session;
use App\Order;
use App\Category;
use App\Models\User;
use App\Reservation;
use App\Models\Department;
use App\Models\UserDetail;
use App\Models\HomeConfiguration;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

	protected $ModuleSlug 		= 'dashboard';
	 
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ModuleSlug = 'Dashboard';
        $restaurantId = Session::get('restaurantID');
        $categoryCount = Category::where('restaurantID', $restaurantId)->count();
        $orderCount = Order::where('restaurant_id', $restaurantId)->count();
        $reservationCount = Reservation::where('restaurantID', $restaurantId)->count();

        return view('admin.dashboard',compact('ModuleSlug', 'categoryCount', 'orderCount', 'reservationCount'));
    }

}
