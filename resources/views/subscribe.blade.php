@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

<div class="col-md-8 col-md-offset-3">

 <div class="panel-body">

                          <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Subscribers</h1>
                </div>
            </div>
            <div class="row" style=" margin: auto; width: 96%;  padding: 15px;">

                                                        <select class="wallet btn btn-sp-grey-dropdown  pull-right width-xs-100" id="csv"> 
                                                                        <option selected disabled>Export</option>
                                                                        @if(request()->input('csv') == 'all')
                                                                            <option value="subscribers?csv=all&search={{( request()->input('search'))}}" selected>CSV (all)</option>
                                                                            @else
                                                                            <option value="subscribers?csv=all&search={{( request()->input('search'))}}">CSV (all)</option>
                                                                            @endif
                                                                        @if(request()->input('csv') == 'filtered')
                                                                        <option value="subscribers?csv=filtered&search={{( request()->input('search'))}}" selected>CSV (filtered)</option>
                                                                            @else
                                                                            <option value="subscribers?csv=filtered&search={{( request()->input('search'))}}">CSV (filtered)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'all')
                                                                        <option value="subscribers?pdf=all&search={{( request()->input('search'))}}" selected>PDF (all)</option>
                                                                            @else
                                                                            <option value="subscribers?pdf=all&search={{( request()->input('search'))}}">PDF (all)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'filtered')
                                                                        <option value="subscribers?pdf=filtered&search={{( request()->input('search'))}}" selected>PDF (filtered)</option>
                                                                            @else
                                                                            <option value="subscribers?pdf=filtered&search={{( request()->input('search'))}}">PDF (filtered)</option>
                                                                            @endif

                                                            </select>

                                                            


                                                                <div class="input-group width-200 "> 
                                                                      <input type="text" id="search" placeholder="Search" class="form-control search-trans" value="{{ (request()->has('search') ? request()->input('search') : '') }}">
                                                                </div><!-- /.form-group -->

                                                        </div>
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Email</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($subscribe as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <td class="text-center col1"> {{ ($subscribe->currentpage()-1) * $subscribe->perpage() + $indexKey + 1 }}</td>
                                    <td class="text-center">{{$post->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            </div><!-- /.panel-body -->
          </div>

@endsection
@section('sectionJS')

<script> console.log('Hi!'); 

 $("#search").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(location).attr('href', '/subscribers/'+'?search='+ $("#search").val())
        } 
    });

   $('#csv').on('change', function() {
        $(location).attr('href', $(this).find(":selected").val())
    });

    </script>

@endsection

