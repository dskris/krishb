<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Reservation;
use App\Match;
use App\Winner;
use App\Subscribe;

use Carbon;
use View;
use DB;


use SoapBox\Formatter\Formatter;
use PDF;
use Auth;
use Response;

class DashboardController extends Controller
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

    public function index(){

    	$reservation = Reservation::whereDate('reservation_time', '>=', Carbon\Carbon::today()->toDateString())->whereDate('reservation_time', '<', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'asc');

    	$reservationcount = $reservation->count();

    	$lasttenreservation = Reservation::limit(10)->latest()->get();

    	 $reservationtoday = Reservation::limit(10)->whereDate('reservation_time', '>=', Carbon\Carbon::today()->toDateString())->whereDate('reservation_time', '<', Carbon\Carbon::tomorrow()->toDateString())->orderBy('id', 'asc')->get();

    	$match = Match::leftjoin('teams AS A', 'A.id', '=', 'matches.homeTeamID')
        ->leftjoin('teams AS B', 'B.id', '=', 'matches.awayTeamID')
        ->select('A.logoURL as homeTeamURL','B.logoURL as awayTeamURL','A.name as homeTeamName', 'B.name as awayTeamName', 'matches.startDateTime as start')
        ->where('matches.startDateTime','>', Carbon\Carbon::now())
        ->orderBy('matches.startDateTime', 'asc')
        ->limit(1)
        ->get();

        $winner = Winner::leftjoin('matches', 'matches.id', '=', 'players.matchID')->limit(10)->where('players.isWinner',1)->orderBy('players.updated_at', 'desc')->get();

        return view('dashboard', compact('winner', 'reservationcount', 'reservationtoday', 'lasttenreservation', 'match'));
    }

    public function subscriber(){

        $subscribe = Subscribe::latest()->paginate(10);

                if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `subscribe`.`email` like '%".$searchTerm."%'";

                  $subscribe =  Subscribe::whereRaw($whereTerm)->latest()->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

            

                $subscribe = Subscribe::get(array('subscribe.id', 'subscribe.email' ,'subscribe.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `subscribe`.`email` like '%".$searchTerm."%'";

                     $subscribe =  Subscribe::whereRaw($whereTerm)->get(array('subscribe.id', 'subscribe.email' ,'subscribe.updated_at', DB::raw('CURRENT_TIMESTAMP as current')));
            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.subscribepdf',['subscribe'=>$subscribe]);
                   return $pdf->download('Subscribers - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $subscribe = Subscribe::get(array('subscribe.id', 'subscribe.email' ,'subscribe.updated_at'));

                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `subscribe`.`email` like '%".$searchTerm."%'";

                    $subscribe = Subscribe::whereRaw($whereTerm)->get(array('subscribe.id', 'subscribe.email' ,'subscribe.updated_at'));
                }

                 $formatter = Formatter::make($subscribe->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "Subscribe"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('subscribe', compact('subscribe'));

    }


}
