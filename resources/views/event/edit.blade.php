@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

                  <div class="col-md-8 col-md-offset-3">
        <h2 class="text-center">Edit Event</h2>
        <br />
           @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="panel panel-default">
           

             <div class="row" style=" margin: auto; width: 90%;  padding: 10px;">
    <form action="{{ route('events.update', [$event->id])}}" method='POST' enctype="multipart/form-data">
    {{csrf_field()}}
     <input type="hidden" name='_method' value='PUT'>
       <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            <h4>Event Name:</h4>
        <input type="text" name="name" class='form-control input' value="{{$event->event_name}}">
         
    </div>

     <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            <h4>Event Description:</h4>
        <textarea type="text" name="description"  maxlength="250" cols="40" rows="5" class='form-control input'>{{$event->description}}</textarea>
         
    </div>

     <div class="col-xs-12 col-md-7 col-lg-7 form-group">
         <h4>Photo Path:</h4>
        <br/><img width="300" id="home_team_change" src="{{url('/assets/img/gallery/placeholder.png')}}"><br/>
        <br/>
        <input type="file" name="image" onchange="readHomeUrl(this);"/>
         <br/>
        <p style="color:red">*Please input an image with minimum dimensions of width 520px and height 360px.</p>
        <p style="color:red">*Please ensure that the image is no larger than 1MB.</p>
    </div>

<div class=" col-xs-12 col-md-6 col-lg-7 form-group">
    <h4>Event Date:</h4>
        <div class="date">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input type="text" class="example1 form-control" id="add_reservation_date" value="{{date('m/d/Y', strtotime($event->event_date))}}" name="pickupdate" placeholder="Event Date" required="">
                                                    <span class="input-group-addon"><span class=""><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    </span>
                                                </div>
                                            </div>
        </div>

        <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            <h4>Event Time:</h4>
 <div class="date bootstrap-timepicker timepicker">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input id="timepicker1" type="text" name="pickuptime" value="{{date('H:i A', strtotime($event->event_time))}}" class="form-control input-small" required="">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                </div>

                                            </div>
                                        </div>

     <div class="col-xs-12 col-md-7 col-lg-7 form-group">
         <h4>Event Location:</h4>
        <input type="text" class='form-control input' value="Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia" disabled>
    </div>

    <div class="col-xs-12 form-group">
        <input type="submit" value='Save' class='btn btn-success'>
        <a href="{{url('events')}}" class='btn btn-danger'>Go Back</a>
</div>
</form>
</div>
                  
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->


@endsection
@section('sectionJS')

   
      <script>
        $('.example1').datepicker();


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

    <script type="text/javascript">
        $('#timepicker1').timepicker();
         $('#timepicker2').timepicker();
    </script>



@endsection

