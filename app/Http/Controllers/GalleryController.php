<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Gallery;
use App\Category;
use Validator;
use Response;
use View;
use Hash;
use File;
use Image;
use SoapBox\Formatter\Formatter;
use PDF;
use DB;

class GalleryController extends Controller
{
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
        $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->select('galleries.id', 'galleries.new_photo_path','galleries.original_photo_path','galleries.status','galleries.updated_at','category.name')->orderBy('galleries.id', 'desc')->paginate(10);

          if(request()->has('filter')){

            $filter = request()->input('filter');


                $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->where('category.name', $filter)->select('galleries.id', 'galleries.new_photo_path', 'galleries.original_photo_path','galleries.status','galleries.updated_at','category.name')->orderBy('galleries.id', 'desc')->paginate(10);

                if(count($gallery)<1){
                     $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->select('galleries.id', 'galleries.new_photo_path','galleries.original_photo_path','galleries.status','galleries.updated_at','category.name')->orderBy('galleries.id', 'desc')->paginate(10);

                }

                }

        

          if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `category`.`name` like '%".$searchTerm."%'";

                 $gallery =  Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->whereRaw($whereTerm)->select('galleries.id', 'galleries.original_photo_path','galleries.new_photo_path','galleries.status','galleries.updated_at','category.name')->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

            

                $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->get(array('galleries.id',  'galleries.new_photo_path','galleries.status','galleries.updated_at','category.name' ,DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `category`.`name` like '%".$searchTerm."%'";

                     $gallery =  Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->whereRaw($whereTerm)->get(array('galleries.id',  'galleries.new_photo_path','galleries.status','galleries.updated_at','category.name' ,DB::raw('CURRENT_TIMESTAMP as current',DB::raw('CURRENT_TIMESTAMP as current'))));

            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.gallerypdf',['gallery'=>$gallery]);
                   return $pdf->download('Gallery - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->get(array('galleries.id',  'galleries.new_photo_path','galleries.status','galleries.updated_at','category.name' ,DB::raw('CURRENT_TIMESTAMP as current',DB::raw('CURRENT_TIMESTAMP as current'))));

                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `category`.`name` like '%".$searchTerm."%'";

                     $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->whereRaw($whereTerm)->get(array('galleries.id',  'galleries.new_photo_path','galleries.status','galleries.updated_at','category.name' ,DB::raw('CURRENT_TIMESTAMP as current',DB::raw('CURRENT_TIMESTAMP as current'))));

                }

                 $formatter = Formatter::make($gallery->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "gallery"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('gallery.index', compact('gallery','categories', 'filter'));
    }

      /**
     * Show the form for creating new gallery.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('gallery.create',compact('category'));
    }

     /**
     * Update gallery in storage.
     *
     * @param  \App\Http\Requests\UpdategallerysRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=960,min_height=560',
            'category' => 'required'
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

            //$gallery = gallery::where('id', $id)->first();
            $gallery = Gallery::where('id', $id)->first();

            $old_image = $gallery->original_photo_path;

            $old_second_image = $gallery->new_photo_path;

            //File::delete('assets/img/matches/' . $gallery->photo_path);

            $categoryid = Category::where('name', $request->category)->first();

            $gallery->categoryID = $categoryid->id;

            if($request->image!=null){

            $home_team_filename =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

            $home_team_filename1 =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

            $img = Image::make($request->image->getRealPath());

                  $img->resize(960, 560, function ($constraint) {
                //$constraint->aspectRatio();
            })->save(public_path('assets/img/gallery').'/'.$home_team_filename);

            $request->image->move(public_path('assets/img/gallery'), $home_team_filename1);

            /* if($gallery->original_photo_path != null){
                $gallery->original_photo_path = $gallery->original_photo_path;
            }else{
                $gallery->original_photo_path = $home_team_filename;
            }*/

            $gallery->original_photo_path = $home_team_filename1;

            $gallery->new_photo_path = $home_team_filename;

        }

            $gallery->save();
            
            if($request->image!=null){

                File::delete('assets/img/gallery/' . $old_image);

                File::delete('assets/img/gallery/' . $old_second_image);
            }

        return redirect('galleries');
    }

     /**
     * Remove gallery from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $findgallery = new Gallery();

        $gallery = $findgallery->getSpecificGallery($id);
        $gallery->delete();

        File::delete('assets/img/gallery/' . $gallery->original_photo_path);

        File::delete('assets/img/gallery/' . $gallery->new_photo_path);

        return response()->json($gallery);
    }

    /**
     * Delete all selected gallery at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = gallery::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    
    /**
     * Store a newly created gallery in storage.
     *
     * @param  \App\Http\Requests\StoregallerysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=960,min_height=560',
            'category' => 'required'
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $gallery = new Gallery();

        $home_team_filename =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

            $home_team_filename1 =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

            $img = Image::make($request->image->getRealPath());

                  $img->resize(960, 560, function ($constraint) {
                //$constraint->aspectRatio();
            })->save(public_path('assets/img/gallery').'/'.$home_team_filename);

            $request->image->move(public_path('assets/img/gallery'), $home_team_filename1);

            /* if($gallery->original_photo_path != null){
                $gallery->original_photo_path = $gallery->original_photo_path;
            }else{
                $gallery->original_photo_path = $home_team_filename;
            }*/

            $gallery->original_photo_path = $home_team_filename1;

            $gallery->new_photo_path = $home_team_filename;

        

        $gallery->userID = 1;
         $categoryid = Category::where('name', $request->category)->first();

            $gallery->categoryID = $categoryid->id;
       
        $gallery->save();

       /*if($gallery){
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


         return redirect('galleries');


    }

     /**
     * Show the form for editing gallery.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $gallery = Gallery::leftjoin('category','category.id','=', 'galleries.categoryID')->select('galleries.id','category.name as category_name', 'galleries.new_photo_path','category.name')->find($id);

         $category = Category::all();

         //echo(json_encode($gallery));

        return view('gallery.edit',compact('gallery', 'category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return redirect('galleries');

    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $id = Input::get('id');

        $findgallery = new Gallery();
        $user = $findgallery->getSpecificGallery($id);
        $user->status = !$user->status;
        $user->save();

        return response()->json($user);
    }

  
}
