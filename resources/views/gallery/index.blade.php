@extends('layouts.homeandaway')

@section('title')
    Welcome
@endsection

@section('page-content')


             <div id="page-wrapper">
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
        <h2 class="text-center">Gallery Management</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                       <li><i class="fa fa-user"></i><a href="{{url('galleries')}}"> All Current Gallery</a></li>
                    <a href="{{url('galleries/create')}}"><li>Add a Gallery</li></a>
                </ul>
            </div>

            <div class="row" style=" margin: auto; width: 96%;  padding: 15px;">

             <select class="wallet btn btn-sp-grey-dropdown  pull-right width-xs-100" id="csv"> 
                                                                        <option selected disabled>Export</option>
                                                                        @if(request()->input('csv') == 'all')
                                                                            <option value="galleries?csv=all&search={{( request()->input('search'))}}" selected>CSV (all)</option>
                                                                            @else
                                                                            <option value="galleries?csv=all&search={{( request()->input('search'))}}">CSV (all)</option>
                                                                            @endif
                                                                        @if(request()->input('csv') == 'filtered')
                                                                        <option value="galleries?csv=filtered&search={{( request()->input('search'))}}" selected>CSV (filtered)</option>
                                                                            @else
                                                                            <option value="galleries?csv=filtered&search={{( request()->input('search'))}}">CSV (filtered)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'all')
                                                                        <option value="galleries?pdf=all&search={{( request()->input('search'))}}" selected>PDF (all)</option>
                                                                            @else
                                                                            <option value="galleries?pdf=all&search={{( request()->input('search'))}}">PDF (all)</option>
                                                                            @endif
                                                                         @if(request()->input('pdf') == 'filtered')
                                                                        <option value="galleries?pdf=filtered&search={{( request()->input('search'))}}" selected>PDF (filtered)</option>
                                                                            @else
                                                                            <option value="galleries?pdf=filtered&search={{( request()->input('search'))}}">PDF (filtered)</option>
                                                                            @endif

                                                            </select>

                                                             <select class="wallet btn btn-sp-grey-dropdown  pull-right width-xs-100" id="category"> 
                                                                        <option selected disabled>Category</option>
                                                                        @if(request()->input('filter') == 'Food')
                                                                            <option value="galleries?filter=Food" selected>Food</option>
                                                                            @else
                                                                            <option value="galleries?filter=Food">Food</option>
                                                                            @endif
                                                                        @if(request()->input('filter') == 'Drinks')
                                                                        <option value="galleries?filter=Drinks" selected>Drinks</option>
                                                                            @else
                                                                           <option value="galleries?filter=Drinks">Drinks</option>
                                                                            @endif
                                                                         @if(request()->input('filter') == 'Events')
                                                                        <option value="galleries?filter=Events" selected>Events</option>
                                                                            @else
                                                                           <option value="galleries?filter=Events">Events</option>
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
                                <th class="text-center">Category</th>
                                <th class="text-center">Big Photo</th>
                                <th class="text-center">Thumbnail Image</th>
                                <th class="text-center">Active?</th>
                                <th class="text-center">Last updated</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($gallery as $indexKey => $post)
                                <tr class="item{{$post->id}} @if($post->status) warning @endif">
                                    <td class="text-center col1">{{ ($gallery->currentpage()-1) * $gallery->perpage() + $indexKey + 1 }}</td>
                                    <td class="text-center">{{$post->name}}</td>
                                    <td class="text-center"><img width="180" src="{{url('/assets/img/gallery').'/'.$post->original_photo_path}}"></td>
                                     <td class="text-center"><img width="180" src="{{url('/assets/img/gallery').'/'.$post->new_photo_path}}"></td>
                                     <td class="text-center"><!--<input type="checkbox" class="published" id="" data-id="{{$post->id}}" @if ($post->status) checked @endif>--> @if($post->status==0)<button class="status-modal btn btn-success" data-id="{{$post->id}}">
                                        Activate </button>@else <button class="status-modal btn btn-danger" data-id="{{$post->id}}">
                                       Deactivate </button>@endif</td>
                                    <td class="text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->updated_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="show-modal btn btn-success" onclick="$('#category_show').val('{{$post->name}}'); $('#photo_path').attr('src','{{url('/assets/img/gallery').'/'.$post->new_photo_path}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                        <a  href="galleries/{{$post->id}}/edit" ><button class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> Edit</button></a>
                                        <button class="delete-modal btn btn-danger" onclick="$('#delete_category').val('{{$post->name}}'); $('#delete_photo_path').val('{{$post->photo_path}}');" data-id="{{$post->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($gallery) > 0)
                                                         <div class="col-xs-12 col-lg-12">
                                                                    <?php
                                                                    $paginationLink = $gallery->links('vendor.pagination.bootstrap-4');

                                                                        if(request()->has('search'))
                                                                            $paginationLink = $gallery->appends(['search' => request()->input('search')])->links('vendor.pagination.bootstrap-4');

                                                                        if(request()->has('filter'))
                                                                            $paginationLink = $gallery->appends(['filter' => request()->input('filter')])->links('vendor.pagination.bootstrap-4');
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
                <div class="modal-body"> <h2 class="text-center" id="question">Are you sure you want to change the Gallery status?</h2>
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
                            <input type="hidden" class="form-control" id="id_add" disabled>
                            <label class="control-label col-sm-3" for="title">Category:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="add_category" autofocus>
                                 <p class="errorCategory text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Image:</label>
                            <div class="col-sm-9">
                                <input type="file" name="home_team_image1" onchange="readHomeUrl(this);"/><br/>
                                 <img width="100" id="home_team_change1" src="{{url('/assets/img/gallery').'/'.$post->new_photo_path}}">
                                 <p class="errorhomeimage text-center alert alert-danger hidden"></p>
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
                    <h4 class="modal-title">Show Gallery</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                         <div class="form-group">
                            <input type="hidden" class="form-control" id="id_edit" disabled>
                            <label class="control-label col-sm-3" for="title">Category:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="category_show" disabled>
                                 <p class="errorCategory text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Image:</label>
                            <div class="col-sm-9">
                                
                                 <img width="300" id="photo_path">
                                 <p class="errorHomeTeamImage text-center alert alert-danger hidden"></p>
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
                    <form class="form-horizontal" role="form" enctype="multipart/form-data">
                       <div class="form-group">
                            <input type="hidden" class="form-control" id="id_edit" disabled>
                            <label class="control-label col-sm-3" for="title">Category:</label>
                            <div class="col-sm-9">
                                 <input type="text" class="form-control" id="category" autofocus>
                                 <p class="errorCategory text-center alert alert-danger hidden"></p>
                                <!--<input type="name" class="form-control" id="title_show" disabled>-->
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Image:</label>
                            <div class="col-sm-9">
                                
                                 <img width="100" id="photo_path" src="">
                                 <p class="errorHomeTeamImage text-center alert alert-danger hidden"></p>
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
                            <span class='glyphicon glyphicon-check'></span> Edit
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
                    <h2 class="text-center">Are you sure you want to delete the following gallery?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                           
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                                <!--<input type="text" class="form-control" id="id_show" disabled>-->
                            </div>
                        </div>
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
                    url: "{{ URL::route('changeGalleryStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {

                         toastr.success('Successfully updated Gallery status!', 'Success Alert', {timeOut: 5000});

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
                    url: "{{ URL::route('changeGalleryStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {

                         toastr.success('Successfully updated Gallery status!', 'Success Alert', {timeOut: 5000});



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
            $('.modal-title').text('Add Gallery');
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

                        location.reload();
                        /*toastr.success('Successfully added User!', 'Success Alert', {timeOut: 5000});
                       $('#postTable').prepend("<tr class='item" + data.id + "'><td class='text-center col1'>" + data.id + "</td><td class='text-center'>" + data.first_name + "</td><td class='text-center'>" + data.last_name +"</td><td class='text-center'>" + data.username + "</td><td class='text-center'>" + data.email + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + "'></td><td class='text-center'>Right now</td><td class='text-center'><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");*/

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


            /*alert($home_team_image);
            alert($category);
            alert($is);*/

            var id = $('#id_edit').val();
            var image = $('#home_team_image')[0].files[0];
            var category = $("#edit_category").val();

            alert(id);
            alert(image);
            alert(category);
            
            form = new FormData();
            form.append('id', id);
            form.append('image', image);
            form.append('category', category);

            $.ajax({
                url: 'user/' + id,
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                type: 'PUT',

                success: function(data) {
                    $('.errorCategory').addClass('hidden');
                    $('.errorHomeTeamImage').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                       
                    } else {
                        /*toastr.success('Successfully updated Gallery!', 'Success Alert', {timeOut: 5000});
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
                                url: "{{ URL::route('changeGalleryStatus') }}",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    toastr.success('Successfully updated Gallery status!', 'Success Alert', {timeOut: 5000});
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
                url: 'galleries/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Gallery!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });
    </script>

     <script type="text/javascript">

         function readHomeUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#edit_photo_path').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

     <script> console.log('Hi!'); 

 $("#search").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(location).attr('href', '/galleries/'+'?search='+ $("#search").val())
        } 
    });

    </script>
    <script>
        $('#csv').on('change', function() {
        $(location).attr('href', $(this).find(":selected").val())
    });

</script>

 <script>
        $('#category').on('change', function() {
        $(location).attr('href', $(this).find(":selected").val())
    });

    </script>


@endsection

