@extends('layouts.homeandaway')

@section('title', 'Create User')

@section('content_header')
    <h1>Create New User</h1>
@stop

@section('page-content')

        <div id="page-wrapper">

            
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Edit User</h1>
                </div>
            </div>

   <form action="{{ route('user.update', [$taskUnderEdit->id]) }}" method='POST'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value='PUT'>
       <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            First Name:
        <input type="text" name="first_name" class='form-control input' value='{{$taskUnderEdit->first_name}}'>
    </div>

    <div class="col-xs-12 col-md-7 col-lg-7 form-group">
         Last Name:
        <input type="text" name="last_name" class='form-control input' value='{{$taskUnderEdit->last_name}}'>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-7 form-group">
        Username:
        <input type="text" name="username" class='form-control input'  value='{{$taskUnderEdit->username}}'>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-7 form-group">
        Email:
        <input type="text" name="email" class='form-control input' value='{{$taskUnderEdit->email}}'>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-7 form-group">
        Password:
        <input type="password" name="password" class='form-control input' value="password">
    </div>

    <div class="col-xs-12 form-group">
        <input type="submit" value='Edit User' class='btn btn-success'>
        <a href="/home" class='btn btn-danger'>Go Back</a>
</div>
</form>

        </div>
        <!-- /#page-wrapper -->

@endsection
