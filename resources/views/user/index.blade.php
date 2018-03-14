@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')

  <div id="page-wrapper">
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
        <h2 class="text-center">User Management</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-user"></i><a href="{{url('user')}}">  All Current Users</a></li>
                    @if (Auth::id()==1)<a href="#" class="add-modal"><li> Add a User</li></a>@endif
                </ul>
            </div>

             <div class="row" style=" margin: auto; width: 96%;  padding: 15px;">

                                                        <select class="wallet btn btn-sp-grey-dropdown  pull-right width-xs-100" id="csv"> 
                                                                        <option selected disabled>Export</option>
                                                                        @if(request()->input('csv') == 'all')
                                                                            <option value="user?csv=all&search={{( request()->input('search'))}}" selected>CSV (all)</option>
                                                                            @else
                                                                            <option value="user?csv=all&search={{( request()->input('search'))}}">CSV (all)</option>
                                                                            @endif
                                                                        @if(request()->input('csv') == 'filtered')
                                                                        <option value="user?csv=filtered&search={{( request()->input('search'))}}" selected>CSV (filtered)</option>
                                                                            @else
                                                                            <option value="user?csv=filtered&search={{( request()->input('search'))}}">CSV (filtered)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'all')
                                                                        <option value="user?pdf=all&search={{( request()->input('search'))}}" selected>PDF (all)</option>
                                                                            @else
                                                                            <option value="user?pdf=all&search={{( request()->input('search'))}}">PDF (all)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'filtered')
                                                                        <option value="user?pdf=filtered&search={{( request()->input('search'))}}" selected>PDF (filtered)</option>
                                                                            @else
                                                                            <option value="user?pdf=filtered&search={{( request()->input('search'))}}">PDF (filtered)</option>
                                                                            @endif

                                                            </select>

                                                            


                                                                <div class="input-group width-200 "> 
                                                                      <input type="text" id="search" placeholder="Search" class="form-control search-trans" value="{{ (request()->has('search') ? request()->input('search') : '') }}">
                                                                </div><!-- /.form-group -->

                                                        </div>

        
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Last updated</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($user as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <td class="text-center col1">
  {{ ($user->currentpage()-1) * $user->perpage() + $indexKey + 1 }}
</td>
                                    <td class="text-center">{{$post->first_name}}</td>
                                    <td class="text-center">{{$post->last_name}}</td>
                                    <td class="text-center">{{$post->username}}</td>
                                    <td class="text-center">{{$post->email}}</td>
                                    <td class="text-center">@if (Auth::id()!=$post->id&&Auth::id()==1)<!--<input type="checkbox" class="published" id="" data-id="{{$post->id}}" @if ($post->status) checked @endif>--> @if($post->status==0)<button class="status-modal btn btn-success" data-id="{{$post->id}}">
                                        Activate </button>@else <button class="status-modal btn btn-danger" data-id="{{$post->id}}">
                                       Deactivate </button>@endif @endif</td> 
                                    <td class="text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->updated_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="show-modal btn btn-success" onclick="$('#first_name').val('{{$post->first_name}}'); $('#last_name').val('{{$post->last_name}}'); $('#username').val('{{$post->username}}'); $('#email').val('{{$post->email}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                       @if (Auth::id()==$post->id||Auth::id()==1) <button class="edit-modal btn btn-info" onclick="$('#edit_first_name').val('{{$post->first_name}}'); $('#edit_last_name').val('{{$post->last_name}}'); $('#edit_username').val('{{$post->username}}'); $('#edit_email').val('{{$post->email}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                         @if ($post->id!=1)<button class="delete-modal btn btn-danger" onclick="$('#delete_first_name').val('{{$post->first_name}}'); $('#delete_last_name').val('{{$post->last_name}}'); $('#delete_username').val('{{$post->username}}'); $('#delete_email').val('{{$post->email}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>@endif @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($user) > 0)
                                                         <div class="col-xs-12 col-lg-12">
                                                                    <?php
                                                                    $paginationLink = $user->links('vendor.pagination.bootstrap-4');

                                                                        if(request()->has('search'))
                                                                            $paginationLink = $user->appends(['search' => request()->input('search')])->links('vendor.pagination.bootstrap-4');
                                                                    ?>
                                                                    <div class="text-center">{{$paginationLink}}</div>
                                                                </div>
                                                                <!-- <div class="col-xs-12 col-lg-12 p-t-2 p-xs-0 p-xs-t-1 text-center">No Transactions</div> -->
                                                        @endif
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
</div>
</div>

    <div id="statusModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"> <h2 class="text-center" id="question">Are you sure you want to change the user status?</h2>
                    <br /></div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                    <input type="hidden" class="form-control" id="id_status">
                </div>
                    </form>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success status" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Yes
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">First Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_first_name" autofocus>
                                 <p class="erroraddFirstName text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Last Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_last_name" autofocus>
                                 <p class="erroraddLastName text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Username:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_username" autofocus>
                                 <p class="erroraddUsername text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_email" autofocus>
                                 <p class="erroraddEmail text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Password:</label>
                            <div class="col-sm-9">
                                 <input type="password" class="form-control" id="add_password" autofocus>
                                 <p class="erroraddPassword text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Confirm Password:</label>
                            <div class="col-sm-9">
                                 <input type="password" class="form-control" id="add_confirm_password" autofocus>
                                 <p class="erroraddConfirmPassword text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal form to show a post -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="id">ID:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="id_show" disabled>
                                <!--<input type="text" class="form-control" id="id_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">First Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="first_name" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Last Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="last_name" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Username:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="username" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="email" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title_edit" autofocus>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_edit" cols="40" rows="5"></textarea>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>-->

    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_edit" disabled>
                            <label class="control-label col-sm-3" for="title">First Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="edit_first_name" autofocus>
                                 <p class="errorFirstName text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Last Name:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="edit_last_name" autofocus>
                                 <p class="errorLastName text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <!--<div class="form-group">
                            <label class="control-label col-sm-3" for="title">Username:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="edit_username" autofocus>
                                 <p class="errorUsername text-center alert alert-danger hidden"></p>
                                
                            </div>
                        </div>-->
                        <!--<div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="edit_email" autofocus>
                                 <p class="errorEmail text-center alert alert-danger hidden"></p>
                            </div>
                        </div>-->
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">New Password:</label>
                            <div class="col-sm-9">
                                 <input type="password" class="form-control" id="edit_password" autofocus>
                                 <p class="errorPassword text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Confirm Password:</label>
                            <div class="col-sm-9">
                                 <input type="password" class="form-control" id="confirm_password" autofocus>
                                 <p class="errorConfirmPassword text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Save
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Are you sure you want to delete the following user?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="id">ID:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="id_delete" disabled>
                                <!--<input type="text" class="form-control" id="id_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">First Name:</label>
                            <div class="col-sm-9">
                                 <input type="name" class="form-control" id="delete_first_name" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Last Name:</label>
                            <div class="col-sm-9">
                                 <input type="name" class="form-control" id="delete_last_name" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Username:</label>
                            <div class="col-sm-9">
                                 <input type="name" class="form-control" id="delete_username" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Email:</label>
                            <div class="col-sm-9">
                                 <input type="email" class="form-control" id="delete_email" disabled>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>-->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('sectionJS')

   

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>


    <script>
        $(document).ready(function(){
            $('.published').iCheck({
                checkboxClass: 'icheckbox_square-yellow',
                radioClass: 'iradio_square-yellow',
                increaseArea: '20%'
            });

            $(document).on('click', '.status-modal', function() {
            $('#id_status').val($(this).data('id'));
            $('#statusModal').modal('show');
        });

             $('.modal-footer').on('click', '.status', function() {

                id = $("#id_status").val(),

                //alert(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('changeUserStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {

                         toastr.success('Successfully updated User status!', 'Success Alert', {timeOut: 5000});

                         location.reload();

                     },

                });
            });

            $('.published').on('ifClicked', function(event){

                $('#id_status').val($(this).data('id'));

                 $('#statusModal').modal('show');

                  $('.modal-footer').on('click', '.status', function() {

                id = $("#id_status").val(),

                alert(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('changeUserStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {

                         toastr.success('Successfully updated User status!', 'Success Alert', {timeOut: 5000});



                     },

                });
            });
            /*$('.published').on('ifToggled', function(event) {
                $(this).closest('tr').toggleClass('warning');
            });*/

            });
        });
        
    </script>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'user',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'first_name': $("#add_first_name").val(),
                    'last_name': $("#add_last_name").val(),
                    'username': $("#add_username").val(),
                    'email': $("#add_email").val(),
                    'password': $("#add_password").val(),
                    'confirm_password': $("#add_confirm_password").val()
                },

                success: function(data) {
                    $('.erroraddFirstName').addClass('hidden');
                    $('.erroraddLastName').addClass('hidden');
                    $('.erroraddUsername').addClass('hidden');
                    $('.erroraddEmail').addClass('hidden');
                    $('.erroraddPassword').addClass('hidden');
                    $('.erroraddConfirmPassword').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.first_name) {
                            $('.erroraddFirstName').removeClass('hidden');
                            $('.erroraddFirstName').text(data.errors.first_name);
                        }
                        if (data.errors.last_name) {
                            $('.erroraddLastName').removeClass('hidden');
                            $('.erroraddLastName').text(data.errors.last_name);
                        }
                        if (data.errors.username) {
                            $('.erroraddUsername').removeClass('hidden');
                            $('.erroraddUsername').text(data.errors.username);
                        }
                        if (data.errors.email) {
                            $('.erroraddEmail').removeClass('hidden');
                            $('.erroraddEmail').text(data.errors.email);
                        }
                         if (data.errors.password) {
                            $('.erroraddPassword').removeClass('hidden');
                            $('.erroraddPassword').text(data.errors.password);
                        }
                         if (data.errors.confirm_password) {
                            $('.erroraddConfirmPassword').removeClass('hidden');
                            $('.erroraddConfirmPassword').text(data.errors.confirm_password);
                        }
                    } else {
                         /*toastr.success('Successfully added User!', 'Success Alert', {timeOut: 5000});
                       $('#postTable').prepend("<tr class='item" + data.id + "'><td class='text-center col1'>" + data.id + "</td><td class='text-center'>" + data.first_name + "</td><td class='text-center'>" + data.last_name +"</td><td class='text-center'>" + data.username + "</td><td class='text-center'>" + data.email + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + "'></td><td class='text-center'>Right now</td><td class='text-center'><button class='show-modal btn btn-success' data-id='" + data.id + "' onclick='$('#last_name').val('" + data.last_name + "'); $('#username').val('" + data.username + "'); $('#email').val('" + data.email+ "');' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' onclick='$('#edit_first_name').val('" + data.first_name + "'); $('#edit_last_name').val('" + data.last_name + "'); $('#edit_username').val('" + data.username + "'); $('#edit_email').val('" + data.email+ "');' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' onclick='$('#delete_first_name').val('" + data.first_name + "'); $('#delete_last_name').val('" + data.last_name + "'); $('#delete_username').val('" + data.username + "'); $('#delete_email').val('" + data.email+ "');' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");*/

                       location.reload();

                            $('.new_published').prop('checked', true);
                            $('.new_published').closest('tr').addClass('warning');

                        $('.new_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.new_published').on('ifToggled', function(event){
                            $(this).closest('tr').toggleClass('warning');
                        });
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: "{{ URL::route('changeUserStatus') }}",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                     toastr.success('Successfully updated User status!', 'Success Alert', {timeOut: 5000});
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });

        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show User');
            $('#id_show').val($(this).data('id'));
            $('#title_show').val($(this).data('title'));
            $('#content_show').val($(this).data('content'));
            $('#showModal').modal('show');
        });


        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit User');
            $('#id_edit').val($(this).data('id'));
            $('#title_edit').val($(this).data('title'));
            $('#content_edit').val($(this).data('content'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {

            $.ajax({
                type: 'PUT',
                url: 'user/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'first_name': $("#edit_first_name").val(),
                    'last_name': $("#edit_last_name").val(),
                    'username': $("#edit_username").val(),
                    'email': $("#edit_email").val(),
                    'password': $("#edit_password").val(),
                    'confirm_password': $("#confirm_password").val()
                },
                success: function(data) {
                    $('.errorFirstName').addClass('hidden');
                    $('.errorLastName').addClass('hidden');
                    $('.errorUsername').addClass('hidden');
                    $('.errorEmail').addClass('hidden');
                    $('.errorPassword').addClass('hidden');
                    $('.errorConfirmPassword').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.first_name) {
                            $('.errorFirstName').removeClass('hidden');
                            $('.errorFirstName').text(data.errors.first_name);
                        }
                        if (data.errors.last_name) {
                            $('.errorLastName').removeClass('hidden');
                            $('.errorLastName').text(data.errors.last_name);
                        }
                        if (data.errors.username) {
                            $('.errorUsername').removeClass('hidden');
                            $('.errorUsername').text(data.errors.username);
                        }
                        if (data.errors.email) {
                            $('.errorEmail').removeClass('hidden');
                            $('.errorEmail').text(data.errors.email);
                        }
                         if (data.errors.password) {
                            $('.errorPassword').removeClass('hidden');
                            $('.errorPassword').text(data.errors.password);
                        }
                         if (data.errors.confirm_password) {
                            $('.errorConfirmPassword').removeClass('hidden');
                            $('.errorConfirmPassword').text(data.errors.confirm_password);
                        }
                    } else {
                       /* toastr.success('Successfully updated User!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='text-center col1'>" + data.id + "</td><td class='text-center'>" + data.first_name + "</td><td class='text-center'>" + data.last_name +"</td><td class='text-center'>" + data.username + "</td><td class='text-center'>" + data.email + "</td><td class='text-center'><input type='checkbox' class='edit_published' data-id='" + data.id + "'></td><td class='text-center'>Right now</td><td class='text-center'><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");*/

                        location.reload();

                        if (data.status) {
                            $('.edit_published').prop('checked', true);
                            $('.edit_published').closest('tr').addClass('warning');
                        }

                        $('.edit_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });

                        $('.edit_published').on('ifToggled', function(event) {
                            $(this).closest('tr').toggleClass('warning');
                        });

                        $('.edit_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: "{{ URL::route('changeUserStatus') }}",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    toastr.success('Successfully updated User status!', 'Success Alert', {timeOut: 5000});
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });

        });
        
        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#title_delete').val($(this).data('title'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'user/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },

                 success: function(_response) {

                     var status = _response.return;

                      if(status == "success"){

                        location.reload();

                            toastr.success('Successfully deleted User!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data['id']).remove();
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                   
                    }else if(status == "exist"){

                             toastr.error('Unable to delete logged in user!', 'Failure Alert', {timeOut: 5000});
                        }

                    }, error: function(jqXHR, exception){
                    ajax_error_handling(jqXHR, exception);
                }
            });
        });
    </script>

     <script> console.log('Hi!'); 

 $("#search").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(location).attr('href', '/user/'+'?search='+ $("#search").val())
        } 
    });

    </script>
    <script>
        $('#csv').on('change', function() {
        $(location).attr('href', $(this).find(":selected").val())
    });

         function ajax_error_handling(jqXHR, exception){
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        }

    </script>

@endsection

