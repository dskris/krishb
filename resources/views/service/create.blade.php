@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

     <div class="col-md-8 col-md-offset-3">
        <h2 class="text-center">Create Services</h2>
        <br />
        <div class="panel panel-default">
           

            <div class="row">
    <form action="{{ route('services.store')}}" method='POST' enctype="multipart/form-data">
    {{csrf_field()}}
     <div class="col-xs-12 col-md-7 col-lg-7 form-group">
        Name:
        <input type="text" name="name" class='form-control input' >
    </div>
     <div class="col-xs-12 col-md-7 col-lg-7 form-group">
        Description:
        <input type="text" name="description" class='form-control input' >
    </div>

     <div class="col-xs-12 col-md-7 col-lg-7 form-group">
         Photo Path:
        <img width="65" id="profile-img-tag" src="">
        <input type="file" name="image" id="profile-img">
    </div>

    <div class="col-xs-12 form-group">
        <input type="submit" value='Add Task' class='btn btn-success'>
        <a href="#" class='btn btn-danger'>Go Back</a>
</div>
</form>
</div>
                  
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->


@endsection

@section('customJS')

<script>

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
         $("#profile-img").change(function(){
        readURL(this);
    });

</script>

@endsection

