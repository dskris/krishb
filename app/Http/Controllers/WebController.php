<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;
use App\Menu;
use App\Gallery;
use App\Subscribe;
use App\Event;
use App\Reservation;
use App\Team;
use App\Match;
use App\Promotion;
use Carbon;
use View;
use DB;
use Mail;


class WebController extends Controller
{

        public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * @var array
    */
    protected $rules =
    [
        'name' => 'required|min:2|max:300|regex:/(^[a-zA-Z0-9 ]+$)+/',
        'email' => 'required|min:2|max:300|email',
        'date' => 'required|date|after:yesterday',
        'time' => 'required|min:6|max:10',
        'number_of_people' => 'required|numeric',
        'phone' => 'required|numeric|regex:/(01)[0-9]{7}/'
    ];
   
    public function authenticity(){

        return view('web.authenticity');
    }

    public function contact(){

        return view('web.contact-us');
    }

    public function event(){

        $event = Event::latest()->where('status', 1)->paginate(5);

        return view('web.events', compact('event'));
    }

    public function gallery(){

        $food = Gallery::latest()->where('categoryID', 1)->where('status', 1)->get();

        $drink = Gallery::latest()->where('categoryID', 2)->where('status', 1)->get();

        $event = Gallery::latest()->where('categoryID', 3)->where('status', 1)->get();

        return view('web.gallery', compact('food', 'drink', 'event'));
    }

    public function menu(){

        $dessert = Menu::latest()->where('subCategoryID', 4)->where('status', 1)->paginate(6);

        $maincourse = Menu::latest()->where('subCategoryID', 2)->where('status', 1)->paginate(6);

        $snack = Menu::latest()->where('subCategoryID', 3)->where('status', 1)->paginate(6);

        $starter = Menu::latest()->where('subCategoryID', 1)->where('status', 1)->paginate(6);

        $cocktail = Menu::latest()->where('subCategoryID', 6)->where('status', 1)->paginate(6);

        $mocktail = Menu::latest()->where('subCategoryID', 7)->where('status', 1)->paginate(6);

        $wine = Menu::latest()->where('subCategoryID', 8)->where('status', 1)->paginate(6);

        $beer = Menu::latest()->where('subCategoryID', 9)->where('status', 1)->paginate(6);

        $menu = Menu::orderBy('menu_item_name', 'asc')->paginate(6);

        return view('web.menu', compact('menu', 'dessert', 'maincourse', 'dessert', 'starter', 'snack', 'beer', 'wine', 'cocktail', 'mocktail'));
    }

      public function index(){

        $match = Match::leftjoin('teams AS A', 'A.id', '=', 'matches.homeTeamID')
        ->leftjoin('teams AS B', 'B.id', '=', 'matches.awayTeamID')
        ->select('A.logoURL as homeTeamURL','B.logoURL as awayTeamURL','A.name as homeTeamName', 'B.name as awayTeamName', 'matches.startDateTime as start')
        ->where('matches.startDateTime','>', Carbon\Carbon::now())
        ->orderBy('matches.startDateTime', 'asc')
        ->limit(1)
        ->get();

        $lastmatch = Match::leftjoin('teams AS A', 'A.id', '=', 'matches.homeTeamID')
        ->leftjoin('teams AS B', 'B.id', '=', 'matches.awayTeamID')
        ->select('A.logoURL as homeTeamURL','B.logoURL as awayTeamURL','A.name as homeTeamName', 'B.name as awayTeamName', 'matches.startDateTime as start')
        ->orderBy('matches.startDateTime', 'desc')
        ->limit(1)
        ->get();


        return view('index', compact('match', 'lastmatch'));
    }


    public function image(){

        return view('image');
    }

    public function promotions(){

        $promotion = Promotion::latest()->where('status', 1)->paginate(6);

        return view('web.promotions', compact('promotion'));
    }

    public function services(){

        return view('web.services');
    }

    public function subscribe(Request $request){

        $check = Subscribe::where('email', $request->email)->first();

            if(!$check){

            $subscribe = new Subscribe();
            $subscribe->email = $request->email;
            $subscribe->save();
            $message = "success";
            return response()->json(['return' => $message]);

        }

        $message = "exist";

         return response()->json(['return' => $message]);
    }

     public function postcontactus(Request $request){

         $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

        $datetime = $request->date.' '.$request->time;

            $date = date('Y-m-d',strtotime($request->date));
             $time = date('H:i:s',strtotime($request->time));

             $datetime = $date.' '.$time;

            $reservation = new Reservation();
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
                'toEmail' => ['bartender@thedugoutoasis.com'],
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
             $this->sentEmailNotification($notificationDataManager);

            return response()->json($reservation);

        }

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