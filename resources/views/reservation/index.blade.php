@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

<style type="text/css">
    #overlay {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background: #000;
    opacity: 0.8;
    z-index: 99999;
    filter: alpha(opacity=80);
}

#loading {
    width: 75px;
    position: fixed;
    top: 50%;
    left: 50%;
    margin: -28px 0 0 -25px;
}

#loading-text {
    top: 60%;
    left: 45%;
    position: absolute;
    color:white;
}

</style>
 
    <div id="page-wrapper">
       
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
        <h2 class="text-center">Reservation Management</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-user"></i> <a href="/reservation">All Current Reservations</a></li>
                    <a href="#" class="add-modal"><li>Add a Reservation</li></a>
                </ul>
            </div>


            <div class="row" style=" margin: auto; width: 96%;  padding: 15px;">

              <select class="wallet btn btn-sp-grey-dropdown  pull-right width-xs-100" id="csv"> 
                                                                        <option selected disabled>Export</option>
                                                                        @if(request()->input('csv') == 'all')
                                                                            <option value="reservation?csv=all&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}" selected>CSV (all)</option>
                                                                            @else
                                                                            <option value="reservation?csv=all&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}">CSV (all)</option>
                                                                            @endif
                                                                        @if(request()->input('csv') == 'filtered')
                                                                        <option value="reservation?csv=filtered&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}" selected>CSV (filtered)</option>
                                                                            @else
                                                                            <option value="reservation?csv=filtered&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}">CSV (filtered)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'all')
                                                                        <option value="reservation?pdf=all&&time={{( request()->input('time'))}}search={{( request()->input('search'))}}" selected>PDF (all)</option>
                                                                            @else
                                                                            <option value="reservation?pdf=all&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}">PDF (all)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'filtered')
                                                                        <option value="reservation?pdf=filtered&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}" selected>PDF (filtered)</option>
                                                                            @else
                                                                            <option value="reservation?pdf=filtered&time={{( request()->input('time'))}}&search={{( request()->input('search'))}}">PDF (filtered)</option>
                                                                            @endif

                                                            </select>

                                                             <select class="wallet btn btn-sp-grey-dropdown  pull-right width-xs-100" id="time-sorting"> 
                                                                        <option selected disabled>Sort By Time</option>
                                                                        @if(request()->input('time') == 'Upcoming')
                                                                            <option value="reservation?time=Upcoming" selected>Upcoming</option>
                                                                            @else
                                                                            <option value="reservation?time=Upcoming">Upcoming</option>
                                                                            @endif
                                                                        @if(request()->input('time') == 'Past')
                                                                        <option value="reservation?time=Past" selected>Past</option>
                                                                            @else
                                                                           <option value="reservation?time=Past">Past</option>
                                                                            @endif
                                                                        @if(request()->input('time') == 'Present')
                                                                        <option value="reservation?time=Present" selected>Present</option>
                                                                            @else
                                                                           <option value="reservation?time=Present">Present</option>
                                                                            @endif

                                                            </select>

                                                            


                                                                <div class="input-group width-200 "> 
                                                                      <input type="text" id="search" placeholder="Search" class="form-control search-trans" value="{{ (request()->has('search') ? request()->input('search') : '') }}">
                                                                </div><!-- /.form-group -->

                                                            </div>
        
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Reservation Name</th>
                                <th class="text-center">Reservation Date</th>
                                <th class="text-center">Reservation Time</th>
                                <th class="text-center">Number Of Pax</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Active?</th>
                                <th class="text-center">Last updated</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($reservation as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <td class="text-center col1">{{ ($reservation->currentpage()-1) * $reservation->perpage() + $indexKey + 1 }}</td>
                                    <td class="text-center">{{$post->reservation_name}}</td>
                                    <td class="text-center">{{date("d F, l", strtotime($post->reservation_date))}}</td>
                                    <td class="text-center">{{date("h:i A", strtotime($post->reservation_time))}}</td>
                                    <td class="text-center">{{$post->number_of_people}}</td>
                                    <td class="text-center">{{$post->phone_number}}</td>
                                    <td class="text-center">{{$post->email}}</td>
                                   <td class="text-center"><!--<input type="checkbox" class="published" id="" data-id="{{$post->id}}" @if ($post->status) checked @endif>--> @if($post->status==0)<button class="status-modal btn btn-success" data-id="{{$post->id}}">
                                        Activate </button>@else <button class="status-modal btn btn-danger" data-id="{{$post->id}}">
                                       Deactivate </button>@endif</td>
                                    <td class="text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->updated_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="show-modal btn btn-success" onclick="$('#reservation_name').val('{{$post->reservation_name}}'); $('#reservation_date').val('{{date('d F, l', strtotime($post->reservation_date))}}'); $('#reservation_time').val('{{date('h:i A', strtotime($post->reservation_time))}}'); $('#number_of_people').val('{{$post->number_of_people}}'); $('#phone_number').val('{{$post->phone_number}}'); $('#email').val('{{$post->email}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                        <button class="edit-modal btn btn-info" onclick="$('#edit_reservation_name').val('{{$post->reservation_name}}'); $('#edit_reservation_date').val('{{date('m/d/Y', strtotime($post->reservation_date))}}'); $('#timepicker2').val('{{date('h:i A', strtotime($post->reservation_time))}}'); $('#edit_number_of_people').val('{{$post->number_of_people}}'); $('#edit_phone_number').val('{{$post->phone_number}}'); $('#edit_email').val('{{$post->email}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button class="delete-modal btn btn-danger" onclick="$('#delete_reservation_name').val('{{$post->reservation_name}}'); $('#delete_reservation_date').val('{{date('m/d/Y', strtotime($post->reservation_date))}}'); $('#delete_reservation_time').val('{{date('h:i A', strtotime($post->reservation_time))}}'); $('#delete_number_of_people').val('{{$post->number_of_people}}'); $('#delete_phone_number').val('{{$post->phone_number}}'); $('#delete_email').val('{{$post->email}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($reservation) > 0)
                                                         <div class="col-xs-12 col-lg-12">
                                                                    <?php
                                                                    $paginationLink = $reservation->links('vendor.pagination.bootstrap-4');

                                                                        if(request()->has('search'))
                                                                            $paginationLink = $reservation->appends(['search' => request()->input('search')])->links('vendor.pagination.bootstrap-4');

                                                                        if(request()->has('time'))
                                                                            $paginationLink = $reservation->appends(['time' => request()->input('time')])->links('vendor.pagination.bootstrap-4');
                                                                    ?>
                                                                    <div class="text-center">{{$paginationLink}}</div>
                                                                </div>
                                                                <!-- <div class="col-xs-12 col-lg-12 p-t-2 p-xs-0 p-xs-t-1 text-center">No Transactions</div> -->
                                                        @endif
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
</div>
</div>

<div id="statusModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"> <h2 class="text-center" id="question">Are you sure you want to change the Reservation status?</h2>
                    <br /></div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                    <input type="hidden" class="form-control" id="id_status">
                </div>
                    </form>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success status" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Yes
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_reservation_name" autofocus>
                                 <p class="erroraddReservationName text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Date:</label>
                            <div class="col-sm-9">
                                 <!--<input type="text" class="form-control" id="add_reservation_date" autofocus>
                                 <p class="erroraddReservationDate text-center alert alert-danger hidden"></p>-->

                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                                <div class="date">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input type="text" class="example1 form-control" id="add_reservation_date" name="pickupdate" placeholder="Pick up Date" required="">
                                                    <span class="input-group-addon"><span class=""><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="erroraddReservationDate text-center alert alert-danger hidden"></p>
                            </div>

                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Time:</label>
                            <div class="col-sm-9">
                                 <!--<input type="text" class="form-control" id="add_reservation_time" autofocus>
                                 <p class="errorsaddReservationTime text-center alert alert-danger hidden"></p>-->
                                 
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->

                                <div class="date bootstrap-timepicker timepicker">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input id="timepicker1" type="text" name="pickuptime" class="form-control input-small" required="">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                </div>

                                            </div>
                                             <p class="erroraddReservationTime text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Number of People:</label>
                            <div class="col-sm-9">
                                 <input type="number" class="form-control" id="add_number_of_people" autofocus>
                                 <p class="erroraddNumberOfPeople text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Phone Number:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_phone_number" autofocus>
                                 <p class="erroraddPhoneNumber text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="email" class="form-control" id="add_email" autofocus>
                                 <p class="erroraddEmail text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<!-- Modal form to show a post -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="id">ID:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="id_show" disabled>
                                <!--<input type="text" class="form-control" id="id_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="reservation_name" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Date:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="reservation_date" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Time:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="reservation_time" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Number of People:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="number_of_people" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Phone Number:</label>
                           <div class="col-sm-9">
                                 <input type="text" class="form-control" id="phone_number" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="email" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_edit" disabled>
                            <label class="control-label col-sm-3" for="title">Reservation Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="edit_reservation_name" autofocus>
                                 <p class="erroreditReservationName text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Date:</label>
                            <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_reservation_date" autofocus>
                                 <p class="erroreditReservationDate text-center alert alert-danger hidden"></p>-->
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                                <div class="date">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input type="text" class="example1 form-control" id="edit_reservation_date" name="pickupdate" placeholder="Pick up Date" required="">
                                                    <span class="input-group-addon"><span class=""><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                             <p class="erroreditReservationDate text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Time:</label>
                            <div class="col-sm-9">
                                 <!--<input type="text" class="form-control" id="edit_reservation_time" autofocus>
                                 <p class="erroreditReservationTime text-center alert alert-danger hidden"></p>-->
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                                 <div class="date bootstrap-timepicker timepicker">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input id="timepicker2" type="text" name="pickuptime" class="form-control input-small" required="">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                </div>

                                            </div>
                                             <p class="erroreditReservationTime text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Number of People:</label>
                            <div class="col-sm-9">
                                 <input type="number" class="form-control" id="edit_number_of_people" autofocus>
                                 <p class="erroreditNumberOfPeople text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Phone Number:</label>
                           <div class="col-sm-9">
                                 <input type="text" class="form-control" id="edit_phone_number" autofocus>
                                 <p class="erroreditPhoneNumber text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="email" class="form-control" id="edit_email" autofocus>
                                 <p class="erroreditEmail text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Save
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Are you sure you want to delete the following Reservation?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="id">ID:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="id_delete" disabled>
                                <!--<input type="text" class="form-control" id="id_show" disabled>-->
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="delete_reservation_name" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Date:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="delete_reservation_date" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Reservation Time:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="delete_reservation_time" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Number of People:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="delete_number_of_people" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Phone Number:</label>
                           <div class="col-sm-9">
                                 <input type="text" class="form-control" id="delete_phone_number" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="delete_email" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('sectionJS')

   

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>

      <script>
        $('.example1').datepicker();
    </script>

    <script type="text/javascript">
        $('#timepicker1').timepicker();
         $('#timepicker2').timepicker();
    </script>


    <script>
        $(document).ready(function(){
            $('.published').iCheck({
                checkboxClass: 'icheckbox_square-yellow',
                radioClass: 'iradio_square-yellow',
                increaseArea: '20%'
            });

            $(document).on('click', '.status-modal', function() {
            $('#id_status').val($(this).data('id'));
            $('#statusModal').modal('show');
        });

             $('.modal-footer').on('click', '.status', function() {
                $("#overlay").removeClass("hide");

                id = $("#id_status").val(),

                //alert(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('changeReservationStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {
                        $("#overlay").addClass("hide");

                         //toastr.success('Successfully updated Reservation status!', 'Success Alert', {timeOut: 5000});

                         location.reload();

                     },

                });
            });

            $('.published').on('ifClicked', function(event){
                $("#overlay").removeClass("hide");

                $('#id_status').val($(this).data('id'));

                 $('#statusModal').modal('show');

                  $('.modal-footer').on('click', '.status', function() {

                id = $("#id_status").val(),

                alert(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('changeReservationStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {
                        $("#overlay").addClass("hide");

                         //toastr.success('Successfully updated Reservation status!', 'Success Alert', {timeOut: 5000});



                     },

                });
            });
            /*$('.published').on('ifToggled', function(event) {
                $(this).closest('tr').toggleClass('warning');
            });*/

            });
        });
        
    </script>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
             $("#overlay").removeClass("hide");

            /*alert($('input[name=_token]').val());
            alert($("#add_reservation_name").val());
            alert($("#add_reservation_date").val());
            alert($("#timepicker1").val());
            alert($("#add_number_of_people").val());
            alert($("#add_phone_number").val());
            alert($("#add_email").val());*/

            $.ajax({
                type: 'POST',
                url: "{{url('reservation')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $("#add_reservation_name").val(),
                    'reservation_date': $("#add_reservation_date").val(),
                    'reservation_time': $("#timepicker1").val(),
                    'number_of_people': $("#add_number_of_people").val(),
                    'phone': $("#add_phone_number").val(),
                    'email': $("#add_email").val()
                },

                success: function(data) {
                    $("#overlay").addClass("hide");
                    $('.erroraddReservationName').addClass('hidden');
                    $('.erroraddReservationDate').addClass('hidden');
                    $('.erroraddReservationTime').addClass('hidden');
                    $('.erroraddNumberOfPeople').addClass('hidden');
                    $('.erroraddPhoneNumber').addClass('hidden');
                    $('.erroraddEmail').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.erroraddReservationName').removeClass('hidden');
                            $('.erroraddReservationName').text(data.errors.name);
                        }
                        if (data.errors.reservation_date) {
                            $('.erroraddReservationDate').removeClass('hidden');
                            $('.erroraddReservationDate').text(data.errors.reservation_date);
                        }
                        if (data.errors.reservation_time) {
                            $('.erroraddReservationTime').removeClass('hidden');
                            $('.erroraddReservationTime').text(data.errors.reservation_time);
                        }
                        if (data.errors.number_of_people) {
                            $('.erroraddNumberOfPeople').removeClass('hidden');
                            $('.erroraddNumberOfPeople').text(data.errors.number_of_people);
                        }
                         if (data.errors.phone) {
                            $('.erroraddPhoneNumber').removeClass('hidden');
                            $('.erroraddPhoneNumber').text(data.errors.phone);
                        }
                         if (data.errors.email) {
                            $('.erroraddEmail').removeClass('hidden');
                            $('.erroraddEmail').text(data.errors.email);
                        }
                    } else {

                        //toastr.success('Successfully added Reservation!', 'Success Alert', {timeOut: 5000});
                        location.reload();
                       /*$('#postTable').prepend("<tr class='item" + data.id + "'><td class='text-center col1'>" + data.id + "</td><td class='text-center'>" + data.reservation_name + "</td><td class='text-center'>  date('d F, l', strtotime("+data.reservation_date +"))</td><td class='text-center'> date('h:i A', strtotime(" + data.reservation_time + ")) </td><td class='text-center'>" + data.number_of_people + "</td><td class='text-center'>" + data.phone_number + "</td><td class='text-center'>" + data.email + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + "'></td><td class='text-center'>Right now</td><td class='text-center'><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");*/

                            $('.new_published').prop('checked', true);
                            $('.new_published').closest('tr').addClass('warning');

                        $('.new_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.new_published').on('ifToggled', function(event){
                            $(this).closest('tr').toggleClass('warning');
                        });
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: "{{ URL::route('changeReservationStatus') }}",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                     //toastr.success('Successfully updated Reservation status!', 'Success Alert', {timeOut: 5000});
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });

        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show Reservation');
            $('#id_show').val($(this).data('id'));
            $('#title_show').val($(this).data('title'));
            $('#content_show').val($(this).data('content'));
            $('#showModal').modal('show');
        });


        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit reservation');
            $('#id_edit').val($(this).data('id'));
            $('#title_edit').val($(this).data('title'));
            $('#content_edit').val($(this).data('content'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {

            $.ajax({
                type: 'PUT',
                url: 'reservation/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $("#edit_reservation_name").val(),
                    'reservation_date': $("#edit_reservation_date").val(),
                    'reservation_time': $("#timepicker2").val(),
                    'number_of_people': $("#edit_number_of_people").val(),
                    'phone': $("#edit_phone_number").val(),
                    'email': $("#edit_email").val()
                },
                success: function(data) {
                    $('.erroreditReservationName').addClass('hidden');
                    $('.erroreditReservationDate').addClass('hidden');
                    $('.errorseditReservationTime').addClass('hidden');
                    $('.erroreditNumberOfPeople').addClass('hidden');
                    $('.erroreditPhoneNumber').addClass('hidden');
                    $('.erroreditEmail').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.erroreditReservationName').removeClass('hidden');
                            $('.erroreditReservationName').text(data.errors.name);
                        }
                        if (data.errors.reservation_date) {
                            $('.erroreditReservationDate').removeClass('hidden');
                            $('.erroreditReservationDate').text(data.errors.reservation_date);
                        }
                        if (data.errors.reservation_time) {
                            $('.erroreditReservationTime').removeClass('hidden');
                            $('.erroreditReservationTime').text(data.errors.reservation_time);
                        }
                        if (data.errors.number_of_people) {
                            $('.erroreditNumberOfPeople').removeClass('hidden');
                            $('.erroreditNumberOfPeople').text(data.errors.number_of_people);
                        }
                         if (data.errors.phone) {
                            $('.erroreditPhoneNumber').removeClass('hidden');
                            $('.erroreditPhoneNumber').text(data.errors.phone);
                        }
                         if (data.errors.email) {
                            $('.erroreditEmail').removeClass('hidden');
                            $('.erroreditEmail').text(data.errors.email);
                        }
                    } else {

                        //toastr.success('Successfully updated Reservation!', 'Success Alert', {timeOut: 5000});
                        location.reload();
                        /*$('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='text-center col1'>" + data.id + "</td><td class='text-center'>" + data.first_name + "</td><td class='text-center'>" + data.last_name +"</td><td class='text-center'>" + data.username + "</td><td class='text-center'>" + data.email + "</td><td class='text-center'><input type='checkbox' class='edit_published' data-id='" + data.id + "'></td><td class='text-center'>Right now</td><td class='text-center'><button class='show-modal btn btn-success' data-id='" + data.id +"'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");*/

                        location.reload();

                        if (data.status) {
                            $('.edit_published').prop('checked', true);
                            $('.edit_published').closest('tr').addClass('warning');
                        }

                        $('.edit_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });

                        $('.edit_published').on('ifToggled', function(event) {
                            $(this).closest('tr').toggleClass('warning');
                        });

                        $('.edit_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: "{{ URL::route('changeReservationStatus') }}",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    //toastr.success('Successfully updated User status!', 'Success Alert', {timeOut: 5000});
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });

        });
        
        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#title_delete').val($(this).data('title'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'reservation/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Reservation!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });
    </script>

    <script> console.log('Hi!'); 

 $("#search").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(location).attr('href', '/reservation/'+'?search='+ $("#search").val())
        } 
    });

    </script>
    <script>
        $('#csv').on('change', function() {
        $(location).attr('href', $(this).find(":selected").val())
    });

    </script>

      <script>
        $('#time-sorting').on('change', function() {
        $(location).attr('href', $(this).find(":selected").val())
    });

    </script>

@endsection

