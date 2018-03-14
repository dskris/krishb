<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Menu;
use App\Category;
use App\SubCategory;
use Validator;
use Response;
use View;
use Hash;
use File;
use Image;
use SoapBox\Formatter\Formatter;
use PDF;
use DB;

class MenusController extends Controller
{
    /**
    * @var array
    */
    /*protected $rules =
    [
        'image' => 'mimes:jpeg,bmp,png,gif|max:1024'
    ];*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $categories = Category::all();
         $subcategories = SubCategory::all();
        $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->select('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status')->orderBy('menus.id', 'desc')->paginate(10);

          if(request()->has('filter')){

            $filter = request()->input('filter');

                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->where('category.name', $filter)->select('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status')->orderBy('menus.id', 'desc')->paginate(10);

                }

            if(request()->has('filtersubcategory')){

            $subfilter = request()->input('filtersubcategory');

                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->where('subcategory.name', $subfilter)->select('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status')->orderBy('menus.id', 'desc')->paginate(10);

                }


          if(request()->has('search')){

             $searchTerm = request()->input('search');
                  $whereTerm = "  `subcategory`.`name` like '%".$searchTerm."%' OR 
                   `category`.`name` like '%".$searchTerm."%' OR 
                   `menus`.`menu_item_name` like '%".$searchTerm."%' OR 
                   `menus`.`menu_item_description` like '%".$searchTerm."%'  OR 
                   `menus`.`price` like '%".$searchTerm."%'";

                 $menu =  Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->whereRaw($whereTerm)->select('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status')->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

            
                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `subcategory`.`name` like '%".$searchTerm."%' OR 
                                   `category`.`name` like '%".$searchTerm."%' OR 
                                   `menus`.`menu_item_name` like '%".$searchTerm."%' OR 
                                   `menus`.`menu_item_description` like '%".$searchTerm."%'  OR 
                                   `menus`.`price` like '%".$searchTerm."%'";

                     $menu =  Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->whereRaw($whereTerm)->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status', DB::raw('CURRENT_TIMESTAMP as current')));


            }

             if(request()->has('filter')&&request()->input('pdf')=='filtered'){

            $filter = request()->input('filter');

                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->where('category.name', $filter)->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status', DB::raw('CURRENT_TIMESTAMP as current')));

                }

                 if(request()->has('filtersubcategory')&&request()->input('pdf')=='filtered'){

            $subfilter = request()->input('filtersubcategory');

                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->where('subcategory.name', $subfilter)->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status', DB::raw('CURRENT_TIMESTAMP as current')));

                }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.menupdf',['menu'=>$menu]);
                   return $pdf->download('Menu - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm =  "  `subcategory`.`name` like '%".$searchTerm."%' OR 
                                   `category`.`name` like '%".$searchTerm."%' OR 
                                   `menus`.`menu_item_name` like '%".$searchTerm."%' OR 
                                   `menus`.`menu_item_description` like '%".$searchTerm."%'  OR 
                                   `menus`.`price` like '%".$searchTerm."%'";

                     $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->whereRaw($whereTerm)->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  DB::raw('CURRENT_TIMESTAMP as current')));

                }

                  if(request()->has('filter')&&request()->input('csv')=='filtered'){

            $filter = request()->input('filter');

                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->where('category.name', $filter)->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',   DB::raw('CURRENT_TIMESTAMP as current')));

                }

                 if(request()->has('filtersubcategory')&&request()->input('csv')=='filtered'){

            $subfilter = request()->input('filtersubcategory');

                $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->where('subcategory.name', $subfilter)->get(array('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',   DB::raw('CURRENT_TIMESTAMP as current')));

                }

                 $formatter = Formatter::make($menu->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "Menu"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('menu.index', compact('menu','categories', 'subcategories'));
    }

      /**
     * Show the form for creating new Menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
       $category = Category::all();
         $subcategory = SubCategory::all();
        $menu = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->select('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status');

        return view('menu.create',compact('menu', 'category', 'subcategory'));
    }

     /**
     * Update Menu in storage.
     *
     * @param  \App\Http\Requests\UpdateMenusRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


 $validator = Validator::make($request->all(), [
            /*'image' => 'mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=188,min_height=268,max_width=1000,max_height=1000',*/
            'menu_item_name' => 'required|min:2|max:300',
            'menu_item_description' => 'required|min:10|max:250',
            'price' =>  'required|min:1'
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

            //$menu = Menu::where('id', $id)->first();
            $menu = Menu::where('id', $id)->first();

           /* $old_image = $menu->photo_path;

            if($request->image!=null){

          $home_team_filename =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/img/gallery'), $home_team_filename);
        $menu->photo_path = $home_team_filename;
    }*/

        $menu->userID = 1;
        $menu->menu_item_name = $request->menu_item_name;
        $menu->menu_item_description = $request->menu_item_description;
        $menu->price = $request->price;
        $subcategoryid = SubCategory::where('name', $request->subcategory)->first();
        $menu->subCategoryID = $subcategoryid->id;
        

        $menu->save();

       /* if($request->image!=null){

                File::delete('assets/img/gallery/' . $old_image);
            }*/

       /*if($menu){
            $result = array(
                'status' => 'success',
                'message' => '',
            );

        }else{
            $result = array(
                'status' => 'error',
                'message' => 'Internal system error'
            );
        }

        */


         return redirect('menus');
    }

     /**
     * Remove Menu from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findmenu = new Menu();
        $menu = $findmenu->getSpecificMenu($id);
        $menu->delete();

        File::delete('assets/img/gallery/' . $menu->photo_path);

        return response()->json($menu);
    }

    /**
     * Delete all selected Menu at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Menu::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    
    /**
     * Store a newly created Menu in storage.
     *
     * @param  \App\Http\Requests\StoreMenusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

              $validator = Validator::make($request->all(), [
            /*'image' => 'required|mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=188,min_height=268,max_width=1000,max_height=1000',*/
            'menu_item_name' => 'required|min:2|max:300',
            'menu_item_description' => 'required|min:10|max:250',
            'price' =>  'required'
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        /*$home_team_filename =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/img/gallery'), $home_team_filename);*/

        $menu = new Menu();

        $menu->userID = 1;
        $menu->menu_item_name = $request->menu_item_name;
        $menu->menu_item_description = $request->menu_item_description;
        $menu->price = $request->price;
        $subcategoryid = SubCategory::where('name', $request->subcategory)->first();
        $menu->subCategoryID = $subcategoryid->id;
        

        $menu->save();

       /*if($menu){
            $result = array(
                'status' => 'success',
                'message' => '',
            );

        }else{
            $result = array(
                'status' => 'error',
                'message' => 'Internal system error'
            );
        }

        */


         return redirect('menus');


    }

     /**
     * Show the form for editing Menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $category = Category::all();
         $subcategory = SubCategory::all();
        $menus = Menu::leftjoin('subcategory','subcategory.id','=', 'menus.subCategoryID')->leftjoin('category','category.id','=', 'subcategory.categoryID')->select('menus.id', 'menus.menu_item_name','menus.updated_at','menus.menu_item_description', 'menus.price', 'category.name as category_name', 'subcategory.name as subcategory_name',  'menus.status')->find($id);

        return view('menu.edit',compact('menus', 'category', 'subcategory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return redirect('menus');

    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $findmenu = new Menu();

        $id = Input::get('id');
        
        $user = $findmenu->getSpecificMenu($id);
        $user->status = !$user->status;
        $user->save();

        return response()->json($user);
    }
  
}
