<!DOCTYPE html>
<html>
<head>
    <title>Matches</title>
    <style type="text/css">
    table {
    border-collapse: collapse;
}

    table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 5px;
    text-align: left;
}

.invoice-title h2, .invoice-title h3 {

    display: inline-block;

}

.pull-right {

    float: right !important;

}

.centerTable { 

    margin-left: auto;
    margin-right: auto;
    width: 100%;
}

th {
    height: 50px;
}

#widget-hr {

    margin: 0.5rem;

    border: 1px solid #e1e1e1;

}

#footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
}

</style>
</head>
<body>


<div class="page">

<div class="row">
                            <div class="col-xs-12">
                                <div class="invoice-title"> 
                                    <div class="pull-right"><h2>Event Management</h2></div>
                                    <br/>
                                    <br/>

                                </div>
                            </div>
                        </div>
                        
@if(count($event)!=0)
<h3>Printed Date: {{date('M j, Y', strtotime($event[0]->current))}}</h3>
<table class="center">
    <thead>
    <tr>
         <th class="text-center">#</th>
                                <th class="text-center">Event Name</th>
                                <th class="text-center">Event Description</th>
                                <th class="text-center">Event Photo</th>
                                <th class="text-center">Event Date</th>
                                <th class="text-center">Event Time</th>
                                <th class="text-center">Event Location</th>
                                <th class="text-center">Active?</th>
                                <th class="text-center">Last updated</th>
    </tr>
    </thead>
<tbody>
@foreach($event as $galleries)
<tr>
    <td>{{$galleries->id}}</td>
    <td>{{$galleries->event_name}}</td>
    <td>{{$galleries->description}}</td>
    <td><img width="65" src="{{url('/assets/img/gallery').'/'.$galleries->photo_path}}"></td>
    <td>{{date('M j, Y', strtotime($galleries->event_date))}}</td>
    <td>{{date('h:i A', strtotime($galleries->event_time))}}</td>
    <td>{{$galleries->event_location}}</td>
    <td>@if($galleries->status==1) Yes @else No @endif</td>
    <td>{{$galleries->updated_at}}</td>
</tr>
@endforeach
</tbody>
</table>
<div>
    <br/>
    <br/>
    <br/>
@endif
    


</body>
</html>
