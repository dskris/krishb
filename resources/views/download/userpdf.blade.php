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
                                    <div class="pull-right"><h2>User Management</h2></div>
                                    <br/>
                                    <br/>

                                </div>
                            </div>
                        </div>
                        
@if(count($user)!=0)
<h3>Printed Date: {{date('M j, Y', strtotime($user[0]->current))}}</h3>
<table class="center">
    <thead>
    <tr>
        <th class="text-center">Id</th>
        <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Active?</th>
                                <th class="text-center">Last updated</th>
    </tr>
    </thead>
<tbody>
@foreach($user as $users)
<tr>
    <td>{{$users->id}}</td>
    <td>{{$users->first_name}}</td>
    <td>{{$users->last_name}}</td>
    <td>{{$users->username}}</td>
    <td>{{$users->email}}</td>
    <td>@if($users->status==1) Yes @else No @endif</td>
    <td>{{$users->updated_at}}</td>
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
