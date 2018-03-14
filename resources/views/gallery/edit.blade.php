@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

    <div class="col-md-8 col-md-offset-3">
        <h2 class="text-center">Gallery Edit</h2>
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
    <form action="{{ route('galleries.update', [$gallery->id])}}" method='POST' enctype="multipart/form-data">
    {{csrf_field()}}
     <input type="hidden" name='_method' value='PUT'>
       <div class=" col-xs-12 col-md-6 col-lg-7 form-group">
            <h4>Category:</h4>
        <!--<input type="text" name="category" class='form-control input' value='{{$gallery->name}}'>-->
         <select id="category" name="category" class="form-control">
                                         @foreach($category as $categories)
                                           <option {{($gallery->category_name == $categories->name) ? 'selected="selected"' : '' }} value="{{$categories->name}}" >{{$categories->name}}</option>
                                         @endforeach
                                 </select>

    </div>

     
      <div class="col-xs-12 col-md-7 col-lg-7 form-group">
         <h4>Photo Path:</h4>
        <br/><img width="300" id="home_team_change" src="{{url('/assets/img/gallery').'/'.$gallery->new_photo_path}}"><br/>
        <br/>
        <input type="file" name="image" onchange="readHomeUrl(this);"/>
         <br/>
        <p style="color:red">*Please input an image with minimum dimensions of width 960px and height 560px.</p>
        <p style="color:red">*Please ensure that the image is no larger than 1MB.</p>
    </div>


    <div class="col-xs-12 form-group">
        <input type="submit" value='Save' class='btn btn-success'>
        <a href="{{url('galleries')}}" class='btn btn-danger'>Go Back</a>
</div>
</form>
</div>
                  
        </div><!-- /.panel panel-default -->
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

