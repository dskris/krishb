<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Promotion;
use Hash;
use DB;
use SoapBox\Formatter\Formatter;
use PDF;
use Validator;
use File;

class PromotionsController extends Controller
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
        $promotions = Promotion::orderBy('id', 'desc')->paginate(10);

         if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `promotions`.`name` like '%".$searchTerm."%' OR 
                                `promotions`.`description` like '%".$searchTerm."%'";

                 $promotions =  Promotion::whereRaw($whereTerm)->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

                $promotions = Promotion::get(array('promotions.id', 'promotions.name', 'promotions.photo_path', 'promotions.promotion_startDate' , 'promotions.promotion_endDate', 'promotions.description', 'promotions.status','promotions.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `promotions`.`name` like '%".$searchTerm."%' OR 
                                `promotions`.`description` like '%".$searchTerm."%'";

                     $promotions =  Promotion::whereRaw($whereTerm)->get(array('promotions.id', 'promotions.photo_path', 'promotions.name','promotions.promotion_startDate' , 'promotions.promotion_endDate', 'promotions.description', 'promotions.status','promotions.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));
            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.promotionpdf',['promotions'=>$promotions]);
                   return $pdf->download('Promotion - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $promotions = Promotion::get(array('promotions.id', 'promotions.name', 'promotions.photo_path', 'promotions.promotion_startDate' , 'promotions.promotion_endDate', 'promotions.description', 'promotions.status','promotions.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `promotions`.`name` like '%".$searchTerm."%' OR 
                                `promotions`.`description` like '%".$searchTerm."%'";


                    $promotions =Promotion::whereRaw($whereTerm)->get(array('promotions.id', 'promotions.name','promotions.photo_path', 'promotions.promotion_startDate' , 'promotions.promotion_endDate', 'promotions.description', 'promotions.status','promotions.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));

                }

                 $formatter = Formatter::make($promotions->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "Promotion"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('promotion.index', compact('promotions','existing'));
    }


      /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('promotion.create');
    }

       /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        //return view('admin.create');
        $promotion = new Promotion();
        $id = Input::get('id');
        $user = $promotion->getSpecificPromotion($id);
         return response()->json($user);
    }




     /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=481,min_height=297,max_width=1000,max_height=1000',
            'name' => 'required|min:2|max:20',
            'description' => 'required|min:10|max:250',
            'startDate' =>  'required|date|after:yesterday',
            'endDate' =>  'required|date|after:yesterday'
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $promotion = new Promotion();

        $user = $promotion->getSpecificPromotion($id);

        $old_image = $user->photo_path;

        $startDate = date('Y-m-d H:i:s',strtotime($request->startDate));
        $endDate = date('Y-m-d H:i:s',strtotime($request->endDate));

        if($request->image!=null){

        $home_team_filename =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/gallery'), $home_team_filename);

        $user->photo_path = $home_team_filename;

    }

        $user->userID = 1;
        $user->name = $request->name;
        $user->description = $request->description;
        $user->promotion_startDate = $startDate;
        $user->promotion_endDate = $endDate;
       
        $user->save();


        if($request->image!=null){

        File::delete('assets/img/gallery/' . $old_image);

    }

        return redirect('promotions');
    }

     /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = new Promotion();
        $user = $promotion->getSpecificPromotion($id);
        $user->delete();

        File::delete('assets/img/gallery/' . $user->photo_path);

        return response()->json($user);
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    
    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=481,min_height=297,max_width=1000,max_height=1000',
            'name' => 'required|min:2|max:20',
            'description' => 'required|min:10|max:250',
            'startDate' =>  'required|date|after:yesterday',
            'endDate' =>  'required|date|after:yesterday'
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new Promotion();

        $startDate = date('Y-m-d H:i:s',strtotime($request->startDate));
        $endDate = date('Y-m-d H:i:s',strtotime($request->endDate));

        if($request->image==null){

             $user->photo_path = $request->existingimage;

        }else{

            $home_team_filename =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('assets/img/gallery'), $home_team_filename);

             $user->photo_path = $home_team_filename;

        }

        $user->userID = 1;
        $user->name = $request->name;
       
        $user->description = $request->description;
        $user->promotion_startDate = $startDate;
        $user->promotion_endDate = $endDate;
       
        $user->save();

        return redirect('promotions');
    }

     /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = new Promotion();
         $promotions = $promotion->getSpecificPromotion($id);

        return view('promotion.edit',compact('promotions'));
    }

   /* public function existing()
    {
        $id = Input::get('id');
        $promotions = Promotion::findOrFail($id);

        return response()->json($promotions);

    }*/

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function existing()
    {
        $promotion = new Promotion();
        $id = Input::get('id');
        $user = $promotion->getSpecificPromotion($id);
         return response()->json($user);
     }

       public function existingpromotion()
    {
         $promotion = new Promotion();
         $existing = $promotion->getAllPromotions();

         return view('promotion.existing', compact('existing'));
     }

    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {

        $promotion = new Promotion();

        $id = Input::get('id');

        $post = $promotion->getSpecificPromotion($id);
        $post->status = !$post->status;
        $post->save();

        return response()->json($post);
    }

  
}
