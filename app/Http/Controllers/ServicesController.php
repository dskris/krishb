<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Service;
use Hash;
use DB;
use SoapBox\Formatter\Formatter;
use PDF;

class ServicesController extends Controller
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
        $services = Service::orderBy('id', 'desc')->paginate(10);

         if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `services`.`service_name` like '%".$searchTerm."%' OR 
                                `services`.`service_description` like '%".$searchTerm."%'";

                 $services =  Service::whereRaw($whereTerm)->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

                $services = Service::get(array('services.id', 'services.service_name','services.service_description' , 'services.photo_path', 'services.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `services`.`service_name` like '%".$searchTerm."%' OR 
                                `services`.`service_description` like '%".$searchTerm."%'";

                     $services =  Service::whereRaw($whereTerm)->get(array('services.id', 'services.service_name','services.service_description' , 'services.photo_path', 'services.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));
            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.servicepdf',['services'=>$services]);
                   return $pdf->download('Service - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $services = Service::get(array('services.id', 'services.service_name','services.service_description' , 'services.photo_path', 'services.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `services`.`service_name` like '%".$searchTerm."%' OR 
                                `services`.`service_description` like '%".$searchTerm."%'";

                    $services = Service::whereRaw($whereTerm)->get(array('services.id', 'services.service_name','services.service_description' , 'services.photo_path', 'services.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));

                }

                 $formatter = Formatter::make($services->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "Service"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('service.index', compact('services'));
    }

      /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('service.create');
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

        /*$validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

        }*/

        $services = Service::findOrFail($id);

        $home_team_filename1 =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/gallery'), $home_team_filename1);

        $services = new Service();

        $services->userID = 1;
        $services->service_name = $request->name;
        $services->service_description = $request->description;
        $services->photo_path = $home_team_filename1;
       
        $services->save();

        return redirect('services');

        

    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $home_team_filename1 =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/gallery'), $home_team_filename1);

        $services = new Service();

        $services->userID = 1;
        $services->service_name = $request->name;
        $services->service_description = $request->description;
        $services->photo_path = $home_team_filename1;
       
        $services->save();

       return redirect('services');

        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $services = Service::findOrFail($id);

        return view('service.index', ['service' => $services]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $services = Service::findOrFail($id);
         //echo(json_encode($gallery));

        return view('service.edit',compact('services'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();

        return response()->json($services);
    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $id = Input::get('id');

        $services = Service::findOrFail($id);
        $services->status = !$services->status;
        $services->save();

        return response()->json($services);
    }
}