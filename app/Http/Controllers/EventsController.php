<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Event;
use Hash;
use DB;
use SoapBox\Formatter\Formatter;
use PDF;
use Validator;
use File;

class EventsController extends Controller
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
        $event = Event::orderBy('id', 'desc')->paginate(10);

         if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `events`.`event_name` like '%".$searchTerm."%' OR 
                                `events`.`description` like '%".$searchTerm."%' OR 
                                `events`.`photo_path` like '%".$searchTerm."%'OR 
                                `events`.`event_location` like '%".$searchTerm."%'";

                 $event =  Event::whereRaw($whereTerm)->orderBy('id', 'desc')->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

                $event = Event::get(array('events.id', 'events.event_name', 'events.description','events.photo_path' , 'events.event_time', 'events.event_location', 'events.event_date','events.updated_at', 'events.status',DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `events`.`event_name` like '%".$searchTerm."%' OR 
                                `events`.`description` like '%".$searchTerm."%' OR 
                                `events`.`photo_path` like '%".$searchTerm."%'OR 
                                `events`.`event_location` like '%".$searchTerm."%'";

                     $event =  Event::whereRaw($whereTerm)->get(array('events.id', 'events.event_name', 'events.description','events.photo_path' , 'events.event_time', 'events.event_location', 'events.event_date','events.status','events.updated_at',DB::raw('CURRENT_TIMESTAMP as current')));

            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.eventpdf',['event'=>$event]);
                   return $pdf->download('Event - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $event = Event::get(array('events.id', 'events.event_name', 'events.description','events.photo_path' , 'events.event_time', 'events.event_location', 'events.event_date','events.status','events.updated_at',DB::raw('CURRENT_TIMESTAMP as current')));

                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `events`.`event_name` like '%".$searchTerm."%' OR 
                                `events`.`description` like '%".$searchTerm."%' OR 
                                `events`.`photo_path` like '%".$searchTerm."%'OR 
                                `events`.`event_location` like '%".$searchTerm."%'";

                    $event = Event::whereRaw($whereTerm)->get(array('events.id', 'events.event_name', 'events.description','events.photo_path' , 'events.event_time', 'events.event_location', 'events.event_date','events.status','events.updated_at',DB::raw('CURRENT_TIMESTAMP as current')));

                }

                 $formatter = Formatter::make($event->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "Event"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('event.index', compact('event'));
    }

      /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $event = Event::all();
        return view('event.create',compact('event'));
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
            'image' => 'mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=520,min_height=360',
            'name' => 'required|min:5|max:200|regex:/^[a-z ,.\'-]+$/i',
            'description' => 'required|min:5|max:200|regex:/^[a-z ,.\'-]+$/i',
            'pickuptime' => 'required',
            'pickupdate' => 'required',
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $findevent = new Event();

        $event = $findevent->getSpecificEvent($id);

        $old_image = $event->photo_path;

          $date = date('Y-m-d',strtotime($request->pickupdate));
             $time = date('H:i:s',strtotime($request->pickuptime));

             $datetime = $date.' '.$time;

             if($request->image!=null){

             $image_name =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

             $request->image->move(public_path('assets/img/gallery'), $image_name);
             $event->photo_path = $image_name;

             File::delete('assets/img/gallery/' . $old_image);
         }


        $event->userID = 1;
        $event->event_name = $request->name;
        $event->description = $request->description;
        
        $event->event_time = $datetime;
        $event->event_date = $datetime;
        $event->event_location = 'Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia';
       
        $event->save();

       return redirect('events');

        

    }

    

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,bmp,png,gif|max:1024|dimensions:min_width=520,min_height=360',
            'name' => 'required|min:5|max:200|regex:/^[a-z ,.\'-]+$/i',
            'description' => 'required|min:5|max:200|regex:/^[a-z ,.\'-]+$/i',
            'pickuptime' => 'required',
            'pickupdate' => 'required',
        ]);

          if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

       $event = new Event();

          $date = date('Y-m-d',strtotime($request->pickupdate));
             $time = date('H:i:s',strtotime($request->pickuptime));

             $datetime = $date.' '.$time;

             $image_name =  str_pad(rand(0, pow(10, 17)-1), 7, '0', STR_PAD_LEFT).'.'.$request->image->getClientOriginalExtension();

             $request->image->move(public_path('assets/img/gallery'), $image_name);



        $event->userID = 1;
        $event->event_name = $request->name;
        $event->description = $request->description;
        $event->photo_path = $image_name;
        $event->event_time = $datetime;
        $event->event_date = $datetime;
        $event->event_location = 'Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia';
       
        $event->save();

        return redirect('events');

        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         return redirect('events');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $findevent = new Event();

        $event = $findevent->getSpecificEvent($id);
        return view('event.edit',compact('event'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findevent = new Event();

        $event = $findevent->getSpecificEvent($id);
        $event->delete();

        File::delete('assets/img/gallery/' . $event->photo_path);

        return response()->json($event);
    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $id = Input::get('id');

        $findevent = new Event();

        $event = $findevent->getSpecificEvent($id);
        $event->status = !$event->status;
        $event->save();

        return response()->json($event);
    }
}