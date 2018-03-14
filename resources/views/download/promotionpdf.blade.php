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
                                    <div class="pull-right"><h2>Promotion</h2></div>
                                    <br/>
                                    <br/>

                                </div>
                            </div>
                        </div>
                        
@if(count($promotions)!=0)
<h3>Printed Date: {{date('M j, Y', strtotime($promotions[0]->current))}}</h3>
<table class="center">
    <thead>
    <tr>
         <th class="text-center">#</th>
                                <th class="text-center">Promotion Name</th>
                                <th class="text-center">Promotion Photo</th>
                                <th class="text-center">Promotion Start Date</th>
                                <th class="text-center">Promotion End Date</th>
                                <th class="text-center">Promotion Description</th>
                                <th class="text-center">Active?</th>
                                <th class="text-center">Last updated</th>
    </tr>
    </thead>
<tbody>
@foreach($promotions as $promotion)
<tr>
    <td>{{$promotion->id}}</td>
    <td>{{$promotion->name}}</td>
    <td><img width="180" src="{{url('/assets/img/gallery').'/'.$promotion->photo_path}}"></td>
    <td>{{date('Y-m-d', strtotime($promotion->promotion_startDate))}}</td>
    <td>{{date('Y-m-d', strtotime($promotion->promotion_endDate))}}</td>
    <td>{{$promotion->description}}</td>
    <td>@if($promotion->status==1) Yes @else No @endif</td>
    <td>{{$promotion->updated_at}}</td>
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
