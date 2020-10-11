<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\FoodItems;
use App\Http\Controllers\Controller;
use App\Models\HomeConfiguration;
use App\Reservation;
use App\User;
use App\Models\UserDetail;
use App\Restaurant;
use Config;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Session;
use DB;
use Illuminate\Http\Request;
class ReservationManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

	protected $ModuleSlug 		= 'reservation';
	 
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ModuleSlug					=	 'Reservation History';
        $restaurantID               = Session::get('restaurantID');
        $ReservationData            = Reservation::where('restaurantID',$restaurantID)->get();
        return view('admin.reservation',compact('ModuleSlug','ReservationData'));
    }
    public function addReservation(){

        $ModuleSlug					=	 'Add Reservation';
        $restaurantID               = Session::get('restaurantID');
        return view('admin.addReservation',compact('ModuleSlug'));
    }
    public function process_saveReservation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required',
            'expectedTime' => 'required',
            'size' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        $restaurantID               = Session::get('restaurantID');

        $insertData = array(
            'restaurantID'=>$restaurantID,
            'name'=> trim($request->input('name')),
            'phoneNumber'=> trim($request->input('phoneNumber')),
            'expectedTime'=> trim($request->input('expectedTime')),
            'size'=> trim($request->input('size')),
        );
        $insert = Reservation::create($insertData);
        return redirect()->route('reservationList');

    }


    public function editReservation($id){

        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        $categoryList               = Reservation::where('reservationID',$id)->first();
        return view('admin.editReservation',compact('ModuleSlug','categoryList'));
    }
    public function process_updateReservation(Request $request)
    {
        $request->validate([
            'reservationID'=>'required',
            'name' => 'required',
            'phoneNumber' => 'required',
            'expectedTime' => 'required',
            'size' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        $restaurantID               = Session::get('restaurantID');

        $insertData = array(
            'restaurantID'=>$restaurantID,
            'name'=> trim($request->input('name')),
            'phoneNumber'=> trim($request->input('phoneNumber')),
            'expectedTime'=> trim($request->input('expectedTime')),
            'size'=> trim($request->input('size')),
        );
        $insert = Reservation::where('reservationID',$request->input('reservationID'))->update($insertData);
        return redirect()->route('reservationList');
    }

    public function process_deleteReservation(Request $request){

        $request->validate([
            'reservationID' => 'required',
        ]);
        $reservationID = $request->input('reservationID');
        //delete from Items Table
        $delete1 = Reservation::where('reservationID',$reservationID)->delete();
        return response()->json(array("status" => "success", "message" => "Successfully Deleted"));
    }



}
