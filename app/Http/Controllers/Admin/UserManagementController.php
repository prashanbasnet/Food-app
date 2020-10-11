<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HomeConfiguration;
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
class UserManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

	protected $ModuleSlug 		= 'admin_login';
	 
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
        $ModuleSlug					=	 'Login';
        return view('admin.login',compact('ModuleSlug'));
    }
    
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);
        $user = User::where('email',$request->email)->first();
        if (auth()->attempt($credentials))
        {

            Session::put('userID', $user->id);
            Session::put('firstName', $user->firstName);
            Session::put('lastName', $user->lastName);
            Session::put('email', $user->email);
            Session::put('restaurantID', $user->restaurantID);
            return redirect()->route('admindashboard');
        }else{
            session()->flash('error', 'Invalid credentials');
            return redirect()->back();
        }
    }
    public function register()
    {
        $ModuleSlug					=	 'Register';
        return view('admin.register',compact('ModuleSlug'));
    }
    public function process_signup(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
           // 'password' => 'required|confirmed|min:6',
             'password' => [
                'required',
                'string',
                'confirmed',
                'min:6',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
        ]]);

        //insert resturant

        $resturant = array(
            'isArchive'=>0
        );
        $ResInsert = Restaurant::create($resturant);

      //  dd($ResInsert);
        $user = User::create([
            'restaurantID'=>$ResInsert->restaurantID,
            'firstName' => trim($request->input('firstName')),
            'lastName' => trim($request->input('lastName')),
            'email' => strtolower($request->input('email')),
            'password' => Hash::make($request->input('password')),
            'role'     => 'Manager'
        ]);
        session()->flash('success', 'Your account is created. Please login');

        return redirect()->route('adminlogin');
    }

    public function changePassword()
    {
        $ModuleSlug					=	 'Change Password';
        return view('admin.changepassword',compact('ModuleSlug'));
    }
    public function process_changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/' // must contain a special character
        ]
        ]);

       $userID          = Session::get('userID');
       $userPassword    =  \App\User::select('password')->where('id',$userID)->pluck('password')->first();
       //echo '<br>'.Hash::check($request->input('password'),$userPassword);
       if (Hash::check($request->input('oldPassword'), $userPassword))
        {
            $user = User::where('id',Session::get('userID'))->update([
                'password' => Hash::make($request->input('password'))
            ]);
            session()->flash('success', 'Your password updated. Please login');
            return redirect()->route('adminlogin');
        }else
            {
                session()->flash('error', 'Invalid old password');
                return redirect()->back();
            }
         }
    public function forgotPassword()
    {
        $ModuleSlug					=	 'Forgot Password';
        return view('admin.forgotpassword',compact('ModuleSlug'));
    }
    public function getPasswordRandom($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function process_forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $email          = $request->input('email');
         $userPassword    =  \App\User::select('email')->where('role','Manager')->where('email',$email)->get();
        //echo '<br>'.Hash::check($request->input('password'),$userPassword);
        if (count($userPassword) >0)
        {
            $password  = $this->getPasswordRandom(6);
            $user = User::where('email',$email)->where('role','Manager')->update([
                'password' => Hash::make($password)
            ]);

            // the message
            $msg = "Your New Password is ".$password;

// use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

// send email
            mail($email,"Online Restaurant Password Info",$msg);
            session()->flash('success', 'Your password updated. Please check your email for new password');
            return redirect()->route('adminlogin');
        }else
        {
            session()->flash('error', 'Invalid Email address');
            return redirect()->back();
        }
    }

         public function logout(Request $request){

             $request->session()->flush();

             $request->session()->regenerate();
             Auth::logout();

        return redirect()->route('adminlogin');
    }



}
