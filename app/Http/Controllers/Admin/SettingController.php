<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HomeConfiguration;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Department;
use App\Restaurant;
use Config;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Session;
use DB;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

	protected $ModuleSlug 		= 'setting';
	 
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
        $restaurantID = Session::get('restaurantID');
        $ResData      = Restaurant::where('restaurantID',$restaurantID)->first();
        $ModuleSlug					=	 'Setting';
        return view('admin.setting',compact('ModuleSlug','ResData'));
    }

    public function process_settings(Request $request){

        $request->validate([
            'restaurantName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $restaurantID = Session::get('restaurantID');
        $updateArr = array(
            'restaurantName' => $request->restaurantName,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        );
        Restaurant::where('restaurantID',$restaurantID)->update($updateArr);
        session()->flash('success', 'information updated successfully ');
        return redirect()->route('adminsettings');
    }

}
