@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

    <div class="col-md-8 col-md-offset-3">
        <h2 class="text-center">Dashboard</h2>
 
            @if(count($match)!=0)
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Upcoming Match</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>{{date('M j, Y',strtotime($match[0]->start))}}</span> {{date('h:i A',strtotime($match[0]->start))}}</h3> 
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 text-center">
                    <h3>Home Team</h3> 
                </div>
                <div class="col-lg-2 text-center"></div>
                <div class="col-lg-5 text-center">
                    <h3>Away Team</h3> 
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 text-center">
                    <img width="180px" height="180px" src="http://pundit.homeandawayoasis.com{{$match[0]->homeTeamURL}}" alt="Manchester United Logo">
                </div>
                <div class="col-lg-2 text-center" style="font-size: 50px; font-weight: 700;"><br>
                    VS
                </div>
                <div class="col-lg-5 text-center">
                    <img width="180px" height="180px" src="http://pundit.homeandawayoasis.com{{$match[0]->awayTeamURL}}" alt="Burnley Logo">
                </div>
                <!-- /.col-lg-12 -->
            </div><br>
            <div class="row">
                <div class="col-lg-5 text-center" style="font-size: 30px; font-weight: 400;">
                    {{$match[0]->homeTeamName}}
                </div>
                <div class="col-lg-2 text-center"></div>
                <div class="col-lg-5 text-center" style="font-size: 30px; font-weight: 400;">
                    {{$match[0]->awayTeamName}}
                </div>
                <!-- /.col-lg-12 -->
            </div>

            @endif
            

            <div class="row text-center">
                <div class="col-lg-3 col-md-6 col-md-push-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$reservationcount}}</div>
                                    <div>Today`s Reservation</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('reservation')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        
            <br>

                        <div class="panel-body">

                          <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Today`s Reservation</h1>
                </div>
            </div>
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                <!--<th class="text-center">#</th>-->
                                <th class="text-center">Reservation Name</th>
                                <th class="text-center">Reservation Date</th>
                                <th class="text-center">Reservation Time</th>
                                <th class="text-center">Number Of Pax</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Email</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($reservationtoday as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <!--<td class="text-center col1">{{ $post->id }}</td>-->
                                    <td class="text-center">{{$post->reservation_name}}</td>
                                    <td class="text-center">{{date("d F, l", strtotime($post->reservation_date))}}</td>
                                    <td class="text-center">{{date("h:i A", strtotime($post->reservation_time))}}</td>
                                    <td class="text-center">{{$post->number_of_people}}</td>
                                    <td class="text-center">{{$post->phone_number}}</td>
                                    <td class="text-center">{{$post->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            </div><!-- /.panel-body -->

            <div class="panel-body">

                          <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Last 10 Pundit Winner`s</h1>
                </div>
            </div>
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                <!--<th class="text-center">#</th>-->
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Home Team Score</th>
                                <th class="text-center">Away Team Score</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($winner as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <!--<td class="text-center col1">{{ $post->id }}</td>-->
                                    <td class="text-center">{{$post->name}}</td>
                                    <td class="text-center">{{$post->email}}</td>
                                    <td class="text-center">{{$post->phoneNumber}}</td>
                                    <td class="text-center">{{$post->homeTeamResult}}</td>
                                    <td class="text-center">{{$post->awayTeamResult}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            </div><!-- /.panel-body -->

             <div class="panel-body">

                          <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Last 10 Reservation</h1>
                </div>
            </div>
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                <!--<th class="text-center">#</th>-->
                                <th class="text-center">Reservation Name</th>
                                <th class="text-center">Reservation Date</th>
                                <th class="text-center">Reservation Time</th>
                                <th class="text-center">Number Of Pax</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Email</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($lasttenreservation as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <!--<td class="text-center col1">{{ $post->id }}</td>-->
                                    <td class="text-center">{{$post->reservation_name}}</td>
                                    <td class="text-center">{{date("d F, l", strtotime($post->reservation_date))}}</td>
                                    <td class="text-center">{{date("h:i A", strtotime($post->reservation_time))}}</td>
                                    <td class="text-center">{{$post->number_of_people}}</td>
                                    <td class="text-center">{{$post->phone_number}}</td>
                                    <td class="text-center">{{$post->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            </div><!-- /.panel-body -->
        <!-- /#page-wrapper -->

    </div><!-- /.col-md-8 -->


@endsection

@section('sectionJS')
 <script>
 
 function readHomeUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#home_team_change').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>

@endsection

