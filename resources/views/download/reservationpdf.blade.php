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
                                    <div class="pull-right"><h2>Reservation</h2></div>
                                    <br/>
                                    <br/>

                                </div>
                            </div>
                        </div>
                        
@if(count($reservation)!=0)
<h3>Printed Date: {{date('M j, Y', strtotime($reservation[0]->current))}}</h3>
<table class="center">
    <thead>
    <tr>
         <th class="text-center">Id</th>
                                <th class="text-center">Reservation Name</th>
                                <th class="text-center">Reservation Date</th>
                                <th class="text-center">Reservation Time</th>
                                <th class="text-center">Number Of Pax</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Active?</th>
                                <!--<th class="text-center">Reservations Created At</th>-->
    </tr>
    </thead>
<tbody>
@foreach($reservation as $reservations)
<tr>
    <td>{{$reservations->id}}</td>
    <td>{{$reservations->reservation_name}}</td>
    <td>{{date('M j, Y', strtotime($reservations->reservation_date))}}</td>
    <td>{{date('h:i A', strtotime($reservations->reservation_time))}}</td>
    <td>{{$reservations->number_of_people}}</td>
    <td>{{$reservations->phone_number}}</td>
    <td>{{$reservations->email}}</td>
    <td>@if($reservations->status==1) Yes @else No @endif</td>
    <!--<td>{{$reservations->created_at}}</td>-->
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
