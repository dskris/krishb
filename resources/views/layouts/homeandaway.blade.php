<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CRUD Laravel">
    <meta name="author" content="Hector Dolo">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>

    </script>

    <!-- Styles -->
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <!--<script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>-->

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('bower_components/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="{{ url('/css/bootstrap-timepicker.css') }}">

    <!-- toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/guest.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- DataTable CSS -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="{{ URL::asset('bower_components/jquery/src/jquery-ui.min.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('bower_components/jquery/src/css/jquery-ui.min.css') }}">

    <!--<script src="{{ URL::asset('js/jquery.js') }}"></script>-->
    

    @yield('header-scripts')

</head>

<body>
    <div id="overlay" class="hide"> 
        <img id="loading" src="{{url('web/img/loading_gif.gif')}}"> 
    </div>

    <div id="wrapper">
        <div id="overlay" class="hide"> 
            <img id="loading" src="http://pundit.homeandawayoasis.com/img/loading-green.gif"> <span id="loading-text"></span>
        </div>
        <input id="baseURL" type="hidden" value="http://pundit.homeandawayoasis.com">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top hidden-xs" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.thedugoutoasis.com">The Dugout Oasis Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw navbar-header-icon"></i> <i class="fa fa-caret-down navbar-header-icon"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <!--<li>
                            <a href="http://pundit.homeandawayoasis.com/logout"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>
                            <form id="logout-form" action="http://pundit.homeandawayoasis.com/logout" method="POST" style="display: none;">
                            </form>
                        </li>-->
                        <li>
                            <a href="{{ url('/logout') }}" 
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                  Logout
                            </a>
                             <form id="logout-form" 
                                    action="{{ url('/logout') }}" 
                                method="POST" 
                                style="display: none;">
                                            {{ csrf_field() }}
                              </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>-->
                             Hi, {{Auth::user()->username}}
                        </li>

                                                <li>
                            <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/user">User List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Reservation Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/reservation">Reservation List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Menu Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/menus">Menu List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Services Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/services">Services List</a>
                                </li>
                            </ul>
                            
                        </li>-->
                         <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Events Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/events">Events List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Promotions Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/promotions">Promotions List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Gallery Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/galleries">Gallery List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Subscriber Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/subscribers">Subscriber List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                                            </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    @yield('page-content')

 </div>
    <!-- /#wrapper -->

    <!-- Scripts
    <script src="http://pundit.homeandawayoasis.com/js/app.js"></script> -->

    <!-- jQuery -->
    <script src="http://pundit.homeandawayoasis.com/vendor/jquery/jquery.min.js"></script>

     <!-- jQuery DataTable -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://pundit.homeandawayoasis.com/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://pundit.homeandawayoasis.com/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://pundit.homeandawayoasis.com/vendor/raphael/raphael.min.js"></script>
    <!-- <script src="http://pundit.homeandawayoasis.com/vendor/morrisjs/morris.min.js"></script>
    <script src="http://pundit.homeandawayoasis.com/data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="http://pundit.homeandawayoasis.com/dist/js/sb-admin-2.js"></script>

    <script src="{{ url('/js/bootstrap-datepicker.js') }}"></script>
    
    <script src="{{ url('/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ url('/js/bootstrap-timepicker.min.js') }}"></script>

    <script type="text/javascript">

            $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
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

    @yield('sectionJS')

</body>

    
</html>
