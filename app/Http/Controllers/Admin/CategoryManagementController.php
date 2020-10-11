<?php
namespace App\Http\Controllers\Admin;
use App\FoodItems;
use App\Http\Controllers\Controller;
use App\Models\HomeConfiguration;
use App\User;
use App\Category;
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
class CategoryManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $ModuleSlug 		= 'category';

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
        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        $CategoryList                   = Category::where('restaurantID',$restaurantID)->get();
        return view('admin.categoryList',compact('ModuleSlug','CategoryList'));
    }
    public function addCategory(){

        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        return view('admin.addCategory',compact('ModuleSlug'));
    }
    public function process_saveCategory(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        $restaurantID               = Session::get('restaurantID');
        $CategoryList                   = Category::where('restaurantID',$restaurantID)->where('categoryName',$request->input('categoryName'))->get();
        if (count($CategoryList) == 0)
        {
            $insertData = array(
                'restaurantID'=>$restaurantID,
                'categoryName'=> trim($request->input('categoryName')),
            );
            $insert = Category::create($insertData);
            return redirect()->route('categoryList');
        }else{
            session()->flash('error', 'Category name already exist...');
            return redirect()->back();
        }
    }


    public function editCategory($id){

        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        $categoryList               = Category::where('categoryID',$id)->first();
        return view('admin.editCategory',compact('ModuleSlug','categoryList'));
    }
    public function process_updateCategory(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'categoryID' => 'required',
        ]);
        $restaurantID               = Session::get('restaurantID');
        $id                         = $request->input('categoryID');
        $CategoryList                   = Category::where('categoryName',$request->input('categoryName'))->get();
        if (count($CategoryList) >= 0)
        {
            $insertData = array(
                'restaurantID'=>$restaurantID,
                'categoryName'=> trim($request->input('categoryName')),
            );
            $insert = Category::where('categoryID',$id)->update($insertData);
            return redirect()->route('categoryList');
        }else{
            session()->flash('error', 'Category name already exist...');
            return redirect()->back();
        }
    }

    public function process_deleteCategory(Request $request){

        $request->validate([
            'categoryID' => 'required',
        ]);
        $categoryID = $request->input('categoryID');
        //delete from Items Table
        $delete1 = FoodItems::where('categoryID',$categoryID)->delete();
        $delete2 = Category::where('categoryID',$categoryID)->delete();
        return response()->json(array("status" => "success", "message" => "Successfully Deleted"));
    }
    public function viewItems($categoryID)
    {
        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        $CategoryList               = FoodItems::where('categoryID',$categoryID)->get();
        return view('admin.itemsList',compact('ModuleSlug','CategoryList','categoryID'));
    }


    public function addItem($categoryID){

        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        return view('admin.addItem',compact('ModuleSlug','categoryID'));
    }
    public function process_saveItem(Request $request)
    {
        $request->validate([
            'categoryID' => 'required',
            'itemName' => 'required',
            'itemPrice' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        $restaurantID               = Session::get('restaurantID');
        $CategoryList                   = FoodItems::where('restaurantID',$restaurantID)
                                         ->where('categoryID',$request->input('categoryID'))
                                         ->where('itemName',$request->input('itemName'))
                                         ->get();
        if (count($CategoryList) == 0)
        {
            $insertData = array(
                'restaurantID'=>$restaurantID,
                'categoryID'=> trim($request->input('categoryID')),
                'itemName'=> trim($request->input('itemName')),
                'itemPrice'=> trim($request->input('itemPrice')),
            );
            $insert = FoodItems::create($insertData);
            return redirect()->route('categoryList');
        }else{
            session()->flash('error', 'Category name already exist...');
            return redirect()->back();
        }
    }


    public function editItem($itemID){

        $ModuleSlug					=	 'Category';
        $restaurantID               = Session::get('restaurantID');
        $itemData =  FoodItems::where('foodItemsID',$itemID)->first();
        return view('admin.editItem',compact('ModuleSlug','itemID','itemData'));
    }
    public function process_updateItem(Request $request)
    {
        $request->validate([
            'itemID' => 'required',
            'itemName' => 'required',
            'itemPrice' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        $restaurantID               = Session::get('restaurantID');
        $CategoryList                   = FoodItems::where('restaurantID',$restaurantID)
            ->where('categoryID',$request->input('categoryID'))
            ->where('itemName',$request->input('itemName'))
            ->get();
        if (count($CategoryList) >= 0)
        {
            $insertData = array(
              //  'restaurantID'=>$restaurantID,
              //  'categoryID'=> trim($request->input('categoryID')),
                'itemName'=> trim($request->input('itemName')),
                'itemPrice'=> trim($request->input('itemPrice')),
            );
            $insert = FoodItems::where('foodItemsID',$request->input('itemID'))->update($insertData);
            return redirect()->route('categoryList');
        }else{
            session()->flash('error', 'Item name already exist...');
            return redirect()->back();
        }
    }
    public function process_deleteItem(Request $request){

        $request->validate([
            'itemID' => 'required',
        ]);
        $itemID = $request->input('itemID');
        //delete from Items Table
        $delete1 = FoodItems::where('foodItemsID',$itemID)->delete();
      // $delete2 = Category::where('categoryID',$categoryID)->delete();
        return response()->json(array("status" => "success", "message" => "Successfully Deleted"));
    }
}
