<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;
use View;
use DB;
use SoapBox\Formatter\Formatter;
use PDF;
use Auth;


class UserController extends Controller
{
    /**
    * @var array
    */
    protected $rules =
    [
        'first_name' => 'required|min:2|max:300|regex:/(^[a-zA-Z0-9 ]+$)+/',
        'last_name' => 'required|min:2|max:300|regex:/(^[a-zA-Z0-9 ]+$)+/',
        'username' => 'required|unique:users,username|min:2|max:300|regex:/(^[a-zA-Z0-9 ]+$)+/',
        'password' => 'required|min:6|max:100',
        'email' => 'required|email|unique:users,email',
        'confirm_password' => 'required|same:password'
    ];

    /**
    * @var array
    */
    protected $updaterules =
    [
        'first_name' => 'required|min:2|max:300|regex:/(^[a-zA-Z0-9 ]+$)+/',
        'last_name' => 'required|min:2|max:300|regex:/(^[a-zA-Z0-9 ]+$)+/',
        'password' => 'required|min:6|max:100',
        'confirm_password' => 'required|same:password'
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(10);

          if(request()->has('search')){


             $searchTerm = request()->input('search');
                  $whereTerm = "  `users`.`first_name` like '%".$searchTerm."%' OR 
                                `users`.`last_name` like '%".$searchTerm."%' OR 
                                `users`.`username` like '%".$searchTerm."%'OR 
                                `users`.`email` like '%".$searchTerm."%'";

                 $user =  User::whereRaw($whereTerm)->paginate(10);

        }

        $date = date("Y-m-d");

        if(request()->has('pdf')){

            

                $user = User::get(array('users.id', 'users.first_name' , 'users.last_name', 'users.username', 'users.email', 'users.updated_at',  'users.status', DB::raw('CURRENT_TIMESTAMP as current')));


                if(request()->has('search')&&request()->input('pdf')=='filtered'){

                         $searchTerm = request()->input('search');
                      $whereTerm = "  `users`.`first_name` like '%".$searchTerm."%' OR 
                                `users`.`last_name` like '%".$searchTerm."%' OR 
                                `users`.`username` like '%".$searchTerm."%'OR 
                                `users`.`email` like '%".$searchTerm."%'";

                     $user =  User::whereRaw($whereTerm)->get(array('users.id as id', 'users.first_name' , 'users.last_name', 'users.username', 'users.email', 'users.updated_at', 'users.status', DB::raw('CURRENT_TIMESTAMP as current')));

            }

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('download.userpdf',['user'=>$user]);
                   return $pdf->download('User - '.$date.'.pdf');
        }

        if(request()->has('csv')){


                $user = User::get(array('users.id as Id', 'users.first_name as First Name' , 'users.last_name as Last Name', 'users.username as Username', 'users.email as Email', 'users.updated_at as Updated_At'));

                if(request()->has('search')&&request()->input('csv')=='filtered'){

                     $searchTerm = request()->input('search');
                      $whereTerm = "  `users`.`first_name` like '%".$searchTerm."%' OR 
                                `users`.`last_name` like '%".$searchTerm."%' OR 
                                `users`.`username` like '%".$searchTerm."%'OR 
                                `users`.`email` like '%".$searchTerm."%'";

                    $user = User::whereRaw($whereTerm)->get(array('users.id as Id', 'users.first_name as First Name' , 'users.last_name as Last Name', 'users.username as Username', 'users.email as Email', 'users.updated_at as Updated_At'));

                }

                 $formatter = Formatter::make($user->toArray(), Formatter::ARR);

                    $csv = $formatter->toCsv();

                    $date = date("Y-m-d");

                    header('Content-Disposition: attachment; filename= "User"'.$date.".csv");
                    header("Cache-control: private");
                    header("Content-type: application/force-download");
                    header("Content-transfer-encoding: binary\n");

                    echo $csv;

                    exit;

        }

        return view('user.index', ['user' => $user]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else{
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json($user);
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

        $user = new User();
        $user = User::findOrFail($id);

        return view('user.show', ['user' => $user]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->updaterules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            //$user = User::where('id', $id)->first();
            $alluser = new User();
            $user = $alluser->getSpecificUser($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json($user);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){

             $message = "exist";
            return response()->json(['return' => $message]);

        }else{

            $alluser = new User();
            $user = $alluser->getSpecificUser($id);
            $user->delete();

             $message = "success";
            return response()->json(['return' => $message]);
        }
    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $alluser = new User();
        $id = Input::get('id');

        $user = $alluser->getSpecificUser($id);
        $user->status = !$user->status;
        $user->save();

        return response()->json($user);
    }
}