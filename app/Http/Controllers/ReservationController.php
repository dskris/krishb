<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Reservation;
use Hash;
use DB;
use SoapBox\Formatter\Formatter;
use PDF;
use Carbon;
use Validator;
use Response;
use View;
use Mail;

class ReservationController extends Controller
{
     /**
    * @var array
    */
    protected $rules =
    [
        'name' => 'required|min:2|max:300|regex:/^[a-z ,.\'-]+$/i',
        'phone' => 'required|numeric|regex:/(01)[0-9]{7}/',
        'email' => 'required|email',
        'number_of_people' => 'required|numeric',
        'reservation_time' => 'required|after:yesterday',
        'reservation_date' => 'required|after:yesterday'
    ];
    
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
        $reservation = Reservation::orderBy('id', 'desc')->paginate(10);

         if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `reservations`.`reservation_name` like '%".$searchTerm."%' OR
                                `reservations`.`number_of_people` like '%".$searchTerm."%' OR 
                                `reservations`.`phone_number` like '%".$searchTerm."%' OR 
                                `reservations`.`email` like '%".$searchTerm."%'";

                 $reservation =  Reservation::whereRaw($whereTerm)->paginate(10);

        }


             if(request()->input('time')=='Upcoming'){


                 $reservation =  Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'desc')->paginate(10);

             }
            else if(request()->input('time')=='Present'){


                 $reservation =  Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::today()->toDateString())->whereDate('reservation_time', '<', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'asc')->paginate(10);

             }
              if(request()->input('time')=='Past'){


                 $reservation =  Reservation::whereDate('reservation_time', '<', Carbon\Carbon::today()->toDateString())->orderBy('id', 'asc')->orderBy('id', 'desc')->paginate(10);

             }

        

        $date = date("Y-m-d");

        if(request()->has('pdf')){

                $reservation = Reservation::get(array('reservations.id', 'reservations.reservation_name','reservations.reservation_date' , 'reservations.reservation_time', 'reservations.number_of_people', 'reservations.phone_number','reservations.email', 'reservations.created_at','reservations.status', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `reservations`.`reservation_name` like '%".$searchTerm."%' OR
                                `reservations`.`number_of_people` like '%".$searchTerm."%' OR 
                                `reservations`.`phone_number` like '%".$searchTerm."%' OR 
                                `reservations`.`email` like '%".$searchTerm."%'";

                     $reservation =  Reservation::whereRaw($whereTerm)->get(array('reservations.id', 'reservations.reservation_name','reservations.reservation_date' , 'reservations.reservation_time', 'reservations.number_of_people', 'reservations.phone_number','reservations.email','reservations.status', 'reservations.created_at',DB::raw('CURRENT_TIMESTAMP as current')));

            }

             if((request()->input('time')=='Upcoming')&&request()->input('pdf')=='filtered'){


                     $reservation =  Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'desc')->get(array('reservations.id', 'reservations.reservation_name','reservations.reservation_date' , 'reservations.reservation_time', 'reservations.number_of_people', 'reservations.phone_number','reservations.email','reservations.status', 'reservations.created_at',DB::raw('CURRENT_TIMESTAMP as current')));

            }

             if((request()->input('time')=='Present')&&request()->input('pdf')=='filtered'){


                     $reservation =  Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::today()->toDateString())->whereDate('reservation_time', '<', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'asc')->get(array('reservations.id', 'reservations.reservation_name','reservations.reservation_date' , 'reservations.reservation_time', 'reservations.number_of_people', 'reservations.phone_number','reservations.email','reservations.status', 'reservations.created_at',DB::raw('CURRENT_TIMESTAMP as current')));

            }

             if((request()->input('time')=='Past')&&request()->input('pdf')=='filtered'){


                     $reservation = Reservation::whereDate('reservation_time', '<', Carbon\Carbon::today()->toDateString())->orderBy('id', 'asc')->orderBy('id', 'desc')->get(array('reservations.id', 'reservations.reservation_name','reservations.reservation_date' , 'reservations.reservation_time', 'reservations.number_of_people', 'reservations.phone_number','reservations.email','reservations.status', 'reservations.created_at',DB::raw('CURRENT_TIMESTAMP as current')));

            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.reservationpdf',['reservation'=>$reservation]);
                   return $pdf->download('Reservation - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $reservation = Reservation::get(array('reservations.id as Id','reservations.reservation_name as Reservation_Name', 'reservations.reservation_date as Reservation_DateTime' , 'reservations.number_of_people as Number_of_People', 'reservations.phone_number as Phone_Number','reservations.email as Email', 'reservations.updated_at as Updated_At'));

                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `reservations`.`reservation_name` like '%".$searchTerm."%' OR
                                `reservations`.`number_of_people` like '%".$searchTerm."%' OR 
                                `reservations`.`phone_number` like '%".$searchTerm."%' OR 
                                `reservations`.`email` like '%".$searchTerm."%'";

                    $reservation = Reservation::whereRaw($whereTerm)->get(array('reservations.id as Id','reservations.reservation_name as Reservation_Name', 'reservations.reservation_date as Reservation_DateTime' , 'reservations.number_of_people as Number_of_People', 'reservations.phone_number as Phone_Number','reservations.email as Email', 'reservations.updated_at as Updated_At'));

                }

                if((request()->input('time')=='Upcoming')&&request()->input('csv')=='filtered'){

                      $reservation = Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'desc')->get(array('reservations.id as Id','reservations.reservation_name as Reservation_Name', 'reservations.reservation_date as Reservation_DateTime' , 'reservations.number_of_people as Number_of_People', 'reservations.phone_number as Phone_Number','reservations.email as Email', 'reservations.updated_at as Updated_At'));

                }

                if((request()->input('time')=='Present')&&request()->input('csv')=='filtered'){

                      $reservation = Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::today()->toDateString())->whereDate('reservation_time', '<', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'asc')->get(array('reservations.id as Id','reservations.reservation_name as Reservation_Name', 'reservations.reservation_date as Reservation_DateTime' , 'reservations.number_of_people as Number_of_People', 'reservations.phone_number as Phone_Number','reservations.email as Email', 'reservations.updated_at as Updated_At'));

                }

                if((request()->input('time')=='Past')&&request()->input('csv')=='filtered'){

                      $reservation = Reservation::whereDate('reservation_time', '<', Carbon\Carbon::today()->toDateString())->orderBy('id', 'asc')->orderBy('id', 'desc')->get(array('reservations.id as Id','reservations.reservation_name as Reservation_Name', 'reservations.reservation_date as Reservation_DateTime' , 'reservations.number_of_people as Number_of_People', 'reservations.phone_number as Phone_Number','reservations.email as Email', 'reservations.updated_at as Updated_At'));

                }

                 $formatter = Formatter::make($reservation->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "Reservation"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('reservation.index', compact('reservation'));
    }

      /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
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

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

        
        $findreservation = new Reservation();
        $reservation = $findreservation->getSpecificReservation($id);

          $date = date('Y-m-d',strtotime($request->reservation_date));
             $time = date('H:i:s',strtotime($request->reservation_time));

             $datetime = $date.' '.$time;

        $reservation->userID = 1;
        $reservation->reservation_name = $request->name;
        $reservation->reservation_date = $datetime;
        $reservation->reservation_time = $datetime;
        $reservation->number_of_people = $request->number_of_people;
        $reservation->phone_number = $request->phone;
        $reservation->email = $request->email;
       
        $reservation->save();

        return response()->json($reservation);

    }

        

    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {


        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
        

        $reservation = new Reservation();

         $date = date('Y-m-d',strtotime($request->reservation_date));
             $time = date('H:i:s',strtotime($request->reservation_time));

             $datetime = $date.' '.$time;

        $reservation->userID = 1;
        $reservation->reservation_name = $request->name;
        $reservation->reservation_date = $datetime;
        $reservation->reservation_time = $datetime;
        $reservation->number_of_people = $request->number_of_people;
        $reservation->phone_number = $request->phone;
        $reservation->email = $request->email;

       
        $reservation->save();

         Mail::raw('You have successfully reserved a table at The Dugout Oasis, the details of your confirmed booking are as follows, Name:'.$request->name.', Date:'.$date.', Time:'.$time.', Number Of People:'.$request->number_of_people.', Phone:'.$request->phone.', Email:'.$request->email.'', function($message) use ($request)
    {
                $message->from('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->to($request->email);
                //$message->to('kris@digitalsymphony.it');
                $message->replyTo('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->subject('Booking Confirmation');
                $message->getSwiftMessage();


    });



           Mail::raw('A customer has reserved a table at The Dugout Oasis, the details of their confirmed booking are as follows, Name:'.$request->name.', Date:'.$date.', Time:'.$time.', Number Of People:'.$request->number_of_people.', Phone:'.$request->phone.', Email:'.$request->email.'', function($message)
    {


         $message->from('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->to('bartender@thedugoutoasis.com');
                $message->replyTo('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->subject('Booking Confirmation');
                $message->getSwiftMessage();


    });




        return response()->json($reservation);
    
    }
        
    }*/

     public function store(Request $request){

         $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
        

        $reservation = new Reservation();

         $date = date('Y-m-d',strtotime($request->reservation_date));
             $time = date('H:i:s',strtotime($request->reservation_time));

             $datetime = $date.' '.$time;

        $reservation->userID = 1;
        $reservation->reservation_name = $request->name;
        $reservation->reservation_date = $datetime;
        $reservation->reservation_time = $datetime;
        $reservation->number_of_people = $request->number_of_people;
        $reservation->phone_number = $request->phone;
        $reservation->email = $request->email;

       
        $reservation->save();

            $notificationData = array(
                'fromEmail' => 'bartender@thedugoutoasis.com',
                'fromName' => 'The Dugout Oasis',
                //'toEmail' => ['manager@homeandawayoasis.com','kuhan@digitalsymphony.it'],
                //'toEmail' => ['rudiliu.ds@gmail.com','rudiiliu@gmail.com'],
                'toEmail' => [ $request->email],
                //'toEmail' => [ 'kris26ooi@gmail.com'],
                'toName' => 'The Dugout Oasis',
                //'subject' => 'Report Match '.$teamHome.' VS '.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)),
                'subject' => 'Reservation Confirmation',
                //'introMessage' => 'For '.$teamHome.' VS'.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)).' winners are below',
                'heading' => 'Thank you for your reservation!',
                'introMessage' => 'You have successfully reserved a table at The Dugout Oasis. The details of your confirmed reservation are as below:',
                //'playerCount' => $players,
                //'winners' => $winners,
                'name' => $request->name,
                'date' => date('j M Y', strtotime($datetime)),
                'time' => date('g:i A', strtotime($datetime)),
                'people' => $request->number_of_people,
                'phone' => $request->phone,
                'email' => $request->email,
            );

             $notificationDataManager = array(
                'fromEmail' => 'bartender@thedugoutoasis.com',
                'fromName' => 'The Dugout Oasis',
                //'toEmail' => ['manager@homeandawayoasis.com','kuhan@digitalsymphony.it'],
                //'toEmail' => ['rudiliu.ds@gmail.com','rudiiliu@gmail.com'],
                'toEmail' => [ 'bartender@thedugoutoasis.com'],
                //'toEmail' => [ 'kris26ooi@gmail.com'],
                //'toEmail' => 'kris26ooi@gmail.com',
                'toName' => 'The Dugout Oasis',
                //'subject' => 'Report Match '.$teamHome.' VS '.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)),
                'subject' => 'New Reservation Alert',
                //'introMessage' => 'For '.$teamHome.' VS'.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)).' winners are below',
                'heading' => 'New Reservation Alert!',
                'introMessage' => 'A customer has reserved a table at The Dugout Oasis. The details of their confirmed reservation are as below:',
                //'playerCount' => $players,
                //'winners' => $winners,
                'name' => $request->name,
                'date' => date('j M Y', strtotime($datetime)),
                'time' => date('g:i A', strtotime($datetime)),
                'people' => $request->number_of_people,
                'phone' => $request->phone,
                'email' => $request->email,
            );

            $this->sentEmailNotification($notificationData);
             //$this->sentEmailNotification($notificationDataManager);

            return response()->json($reservation);

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $findreservation = new Reservation();
        $reservation = $findreservation->getSpecificReservation($id);

        return view('reservation.index', ['reservation' => $reservation]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findreservation = new Reservation();
        $reservation = $findreservation->getSpecificReservation($id);
        $reservation->delete();

        return response()->json($reservation);
    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $id = Input::get('id');

        $findreservation = new Reservation();
        $reservation = $findreservation->getSpecificReservation($id);
        
        /*if($reservation->status==1){

             Mail::raw('Your reservation at The Dugout Oasis has been cancelled due to full house. Thank you for your interest. Please call our customer service at 03-12345679 if you have any further enquiries. The details of your requested booking are as follows, Name:'.$reservation->reservation_name.', Date:'.date('j M Y', strtotime($reservation->reservation_date)).', Time:'.date('j M Y', strtotime($reservation->reservation_time)).', Number Of People:'.$reservation->number_of_people.', Phone:'.$reservation->phone_number.', Email:'.$reservation->email.'', function($message) use ($reservation)
    {
                $message->from('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->to($reservation->email);
                //$message->to('kris@digitalsymphony.it');
                $message->replyTo('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->subject('Booking Confirmation');
                $message->getSwiftMessage();


    });

              Mail::raw('This customer`s reservation at The Dugout Oasis has been cancelled due to full house. The following are the customer details, Name:'.$reservation->reservation_name.', Date:'.date('j M Y', strtotime($reservation->reservation_date)).', Time:'.date('j M Y', strtotime($reservation->reservation_time)).', Number Of People:'.$reservation->number_of_people.', Phone:'.$reservation->phone_number.', Email:'.$reservation->email.'', function($message) use ($reservation)
    {
                $message->from('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->to('bartender@thedugoutoasis.com');
                //$message->to('kris@digitalsymphony.it');
                $message->replyTo('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->subject('Booking Confirmation');
                $message->getSwiftMessage();


    });*/

             /*$notificationData = array(
                'fromEmail' => 'bartender@thedugoutoasis.com',
                'fromName' => 'The Dugout Oasis',
                //'toEmail' => ['manager@homeandawayoasis.com','kuhan@digitalsymphony.it'],
                //'toEmail' => ['rudiliu.ds@gmail.com','rudiiliu@gmail.com'],
                'toEmail' => [$reservation->email],
                'toName' => 'The Dugout Oasis',
                //'subject' => 'Report Match '.$teamHome.' VS '.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)),
                'subject' => 'Booking Cancellation',
                //'introMessage' => 'For '.$teamHome.' VS'.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)).' winners are below',
                'introMessage' => 'Your reservation at The Dugout Oasis has been cancelled due to full house. Thank you for your interest. Please call our customer service at 03-12345679 if you have any further enquiries.',
                //'playerCount' => $players,
                //'winners' => $winners,
                'name' => $reservation->reservation_name,
                'date' => date('j M Y', strtotime($reservation->reservation_date)),
                'time' => date('g:i A', strtotime($reservation->reservation_time)),
                'people' => $reservation->number_of_people,
                'phone' => $reservation->phone_number,
                'email' => $reservation->email,
            );

             $notificationDataCancel = array(
                'fromEmail' => 'bartender@thedugoutoasis.com',
                'fromName' => 'The Dugout Oasis',
                //'toEmail' => ['manager@homeandawayoasis.com','kuhan@digitalsymphony.it'],
                //'toEmail' => ['rudiliu.ds@gmail.com','rudiiliu@gmail.com'],
                'toEmail' => [ 'bartender@thedugoutoasis.com'],
                'toName' => 'The Dugout Oasis',
                //'subject' => 'Report Match '.$teamHome.' VS '.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)),
                'subject' => 'Booking Cancellation',
                //'introMessage' => 'For '.$teamHome.' VS'.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)).' winners are below',
                'introMessage' => 'This customer`s reservation at The Dugout Oasis has been cancelled due to full house. Below are the customer details',
                //'playerCount' => $players,
                //'winners' => $winners,
                'name' => $reservation->reservation_name,
                'date' => date('j M Y', strtotime($reservation->reservation_date)),
                'time' => date('g:i A', strtotime($reservation->reservation_time)),
                'people' => $reservation->number_of_people,
                'phone' => $reservation->phone_number,
                'email' => $reservation->email,
            );

            $this->sentEmailNotification($notificationData);
            $this->sentEmailNotification($notificationDataCancel);
        }*/

        $reservation->status = !$reservation->status;
        $reservation->save();




        return response()->json($reservation);
    }

   private function sentEmailNotification($data, $template='emails.index'){
        try {
            $result = Mail::send($template, ['data' => $data], function ($message) use ($data){
                $message->from($data['fromEmail'], $data['fromName']);
                $message->to($data['toEmail'], $data['toName']);
                $message->replyTo($data['fromEmail'], $data['fromName']);
                $message->subject($data['subject']);
                $message->getSwiftMessage();

            });
        } catch (Exception $e) {
            if( count(Mail::failures()) > 0 ) {

               $result = "There was one or more failures. They were: <br />";

               foreach(Mail::failures as $email_address) {
                   $result .=  " - $email_address";
                }

            } else {
                $result =  "No errors, all sent successfully!";
            }
        }


        return $result;
    }
}