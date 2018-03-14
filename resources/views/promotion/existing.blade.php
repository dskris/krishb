@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

                  <div class="col-md-8 col-md-offset-3">
        <h2 class="text-center">Add Existing Promotion</h2>
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
    <form action="{{ route('promotions.store')}}" method='POST' enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="existingimage" id="existingimage" class='form-control input'>
     <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
                            <h4>Existing Promotions:</h4>
                           
                                  <select id="existing_promotion_dropdown" name="category" class="form-control">
                                        <option selected disabled>Select Promotion</option>
                                         @foreach($existing as $categories)
                                         <option value="{{$categories->id}}" >{{$categories->name}}</option>
                                         @endforeach

                                 </select>
                            
                        </div>

       <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            <h4>Promotion Name:</h4>
        <input type="text" name="name" id="existing_promotion_name" class='form-control input'>
         
    </div>

     <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            <h4>Promotion Description:</h4>
        <textarea type="text" name="description" id="existing_promotion_description" maxlength="250" cols="40" rows="5" class='form-control input' ></textarea>
         
    </div>

     
     <div class="col-xs-12 col-md-7 col-lg-7 form-group">
         <h4>Promotion Photo:</h4>
        <br/><img width="300" id="home_team_change" src="{{url('/assets/img/gallery/placeholder.png')}}"><br/>
        <br/>
        <input type="file" name="image" onchange="readHomeUrl(this);"/>
         <br/>
        <p style="color:red">*If no new image is input, existing image that is displayed will be used.</p>
        <p style="color:red">*Please input an image with minimum dimensions of width 481px and height 297px.</p>
        <p style="color:red">*Please ensure that the image is no larger than 1MB.</p>
    </div>

<div class=" col-xs-12 col-md-6 col-lg-7 form-group">
  <h4>Promotion Start Date:</h4>
        <div class="date">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input type="text" class="example1 form-control" id="existing_promotion_startDate" name="startDate" placeholder="Start Date" required="">
                                                    <span class="input-group-addon"><span class=""><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    </span>
                                                </div>
                                            </div>
        </div>

       <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
        <h4>Promotion End Date:</h4>
        <div class="date">
                                                <div class="input-group date" id="datetimepicker1">
                                                    <input type="text" class="example1 form-control" id="existing_promotion_endDate" name="endDate" placeholder="End Date" required="">
                                                    <span class="input-group-addon"><span class=""><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    </span>
                                                </div>
                                            </div>
        </div>


    <div class="col-xs-12 form-group">
        <input type="submit" value='Add Promotion' class='btn btn-success'>
        <a href="/promotions" class='btn btn-danger'>Go Back</a>
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

             $('#existing_promotion_dropdown').change(function(){
        var id = $(this).val();
    $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('existingPromotion') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {
                         //toastr.success('Successfully updated promotion status!', 'Success Alert', {timeOut: 5000});
                         //var existingstart = date('Y-m-d', strtotime(data.promotion_startDate));
                        convertedstartDate = new Date(data.promotion_startDate);
                        convertedendDate = new Date(data.promotion_endDate);

                        /*hr = ("0" + t.getHours()).slice(-2);
                        min = ("0" + t.getMinutes()).slice(-2);
                        sec = ("0" + t.getSeconds()).slice(-2);*/

                        startdate = ("0" + convertedstartDate.getDate()).slice(-2);
                        enddate = ("0" + convertedendDate.getDate()).slice(-2);

                        newstartdate = convertedstartDate.getMonth()+1+"/"+startdate+"/"+convertedstartDate.getFullYear()
                        newenddate = convertedendDate.getMonth()+1+"/"+enddate+"/"+convertedendDate.getFullYear()
                         /*$existingend = date('Y-m-d', strtotime(data.promotion_endDate));*/
                          $("#existing_promotion_startDate").val(newstartdate);
                           $("#existing_promotion_endDate").val(newenddate);
                           $("#home_team_change").attr('src','{{url('/assets/img/gallery')}}/' + data.photo_path);
                           $("#existingimage").val(data.photo_path);
                           $("#existing_promotion_description").val(data.description);
                           $("#existing_promotion_name").val(data.name);
                           //alert($existingstart);
                           /*alert($existingend);*/
                    },
                });
    });



    </script>


@endsection

