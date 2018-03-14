
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
     <link rel="icon" type="image/png" href="{{url('web/img/favicon.png')}}">
    <title>Home & Away Oasis | Menu</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="{{url('web/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('web/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('web/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('web/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('web/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{url('web/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('web/css/shortcodes.css')}}">
    <link rel="stylesheet" href="{{url('web/css/style.css')}}">
    <link rel="stylesheet" href="{{url('web/css/default-theme.css')}}">
    <script src="//cdn.zarget.com/112328/202607.js"></script>

</head>

<body>


    <div class="wrapper">
        <!--header start-->
        <header class="l-header l-header_overlay">

            <div class="l-navbar l-navbar_expand l-navbar_t-dark-trans js-navbar-sticky">
                <div class="container">
                    <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                        <!--logo start-->
                        <a href="{{url('/')}}" class="logo-brand">

                            <img width="164" src="{{url('web/img/logo.svg')}}" alt="Home & Away">
                        </a>
                        <!--logo end-->

                        <!--mega menu start-->
                        <ul class="menuzord-menu menuzord-right c-nav_s-underline">
                        <li class=""><a href="{{url('/')}}">HOME </a></li> 
                        <li class="active"><a href="{{route('menu')}}">MENU </a></li>
                         <li class=""><a href="{{route('service')}}">SERVICES  </a></li>     
                        <li class=""><a href="{{route('gallery')}}">GALLERY  </a></li>     
                        <li class=""><a href="{{route('events')}}">EVENTS  </a></li>      
                        <li class="last"><a href="{{route('contact')}}">CONTACT</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!--header end-->

        <!--page title start-->
        <section class="page-title background-title-menu dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-uppercase">MENU</h1>
                    </div>
                </div>
            </div>
        </section>
        <!--page title end-->

        <!--body content start-->
        <section class="body-content">
            <div class="page-content our-menu">
                <div class="container">

                    <div class="row">
                        <div class="m-bot-10 inline-block">
                            <div class="heading-title-alt border-short-bottom text-center">
                                <h1 class="text-uppercase">OUR SPECIAL MENU</h1>
                                <div class="half-txt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="round-tabs text-center">
                                <ul class="nav nav-pills mobile-pills-padding">
                                    <li class="active"><a data-toggle="tab" href="#tab-9">FOODS</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-10">DRINKS</a></li>
                                </ul>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="tab-9" class="tab-pane active">
                                            <div class="normal-tabs line-tab">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a data-toggle="tab" href="#tab-01">DESSERT</a></li>
                                                    <li class=""><a data-toggle="tab" href="#tab-02">MAIN COURSE</a></li>
                                                    <li class=""><a data-toggle="tab" href="#tab-03">SNACK</a></li>
                                                    <li class=""><a data-toggle="tab" href="#tab-04">STARTER</a></li>
                                                </ul>

                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div id="tab-01" class="tab-pane active">

                                                            <div class="row">
                                                                @if(count($dessert)!=0)
                                                                @foreach($dessert as $desserts)
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3 style="text-transform: uppercase;">{{$desserts->menu_item_name}}<span>RM{{$desserts->price}}</span></h3>
                                                                            <hr>
                                                                            <p>{{$desserts->menu_item_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif

                                                                <!--item ends-->

                                                            </div>

                                                            <!--<div class="full-btn">
                                                                <div class="m-bot-10">
                                                                    <a class="show btn btn-small btn-circle btn-theme-color">Load More</a>
                                                                </div>
                                                            </div>-->


                                                            <div class="show-more">
                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                            <hr>
                                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>


                                                            </div>



                                                        </div>

                                                        <div id="tab-02" class="tab-pane">

                                                            <div class="row">

                                                                 @if(count($maincourse)!=0)
                                                                @foreach($maincourse as $maincourses)
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3 style="text-transform: uppercase;">{{$maincourses->menu_item_name}}<span>RM{{$maincourses->price}}</span></h3>
                                                                            <hr>
                                                                            <p>{{$maincourses->menu_item_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                                <!--item ends-->

                


                                                            </div>
                                                        </div>

                                                        <div id="tab-03" class="tab-pane">

                                                            <div class="row">

                                                                @if(count($snack)!=0)
                                                                @foreach($snack as $snacks)
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3 style="text-transform: uppercase;">{{$snacks->menu_item_name}}<span>RM{{$snacks->price}}</span></h3>
                                                                            <hr>
                                                                            <p>{{$snacks->menu_item_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                                <!--item ends-->

                                                            </div>



                                                        </div>

                                                        <div id="tab-04" class="tab-pane">

                                                            <div class="row">

                                                                @if(count($starter)!=0)
                                                                @foreach($starter as $starters)
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3 style="text-transform: uppercase;">{{$starters->menu_item_name}}<span>RM{{$starters->price}}</span></h3>
                                                                            <hr>
                                                                            <p>{{$starters->menu_item_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                                <!--item ends-->



                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tab-10" class="tab-pane">

                                            <div class="normal-tabs line-tab">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a data-toggle="tab" href="#tab-06">ALCOHOLIC</a></li>
                                                    <li class=""><a data-toggle="tab" href="#tab-07">NON-ALCOHOLIC</a></li>
                                                    <!--<li class=""><a data-toggle="tab" href="#tab-08">SNACK</a></li>
                                                    <li class=""><a data-toggle="tab" href="#tab-09">STARTER</a></li>-->
                                                </ul>

                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div id="tab-06" class="tab-pane active">
                                                            <div class="row">

                                                                 @if(count($alcohol)!=0)
                                                                @foreach($alcohol as $alcohols)
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3 style="text-transform: uppercase;">{{$alcohols->menu_item_name}}<span>RM{{$alcohols->price}}</span></h3>
                                                                            <hr>
                                                                            <p>{{$alcohols->menu_item_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                                <!--item ends-->


                                                            </div>

                                                        </div>

                                                        <div id="tab-07" class="tab-pane">
                                                            <div class="row">

                                                                @if(count($nonalcohol)!=0)
                                                                @foreach($nonalcohol as $nonalcohols)
                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3 style="text-transform: uppercase;">{{$nonalcohols->menu_item_name}}<span>RM{{$nonalcohols->price}}</span></h3>
                                                                            <hr>
                                                                            <p>{{$nonalcohols->menu_item_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                                <!--item ends-->


                                                            </div>

                                                          
                                                        </div>

                                                        <div id="tab-08" class="tab-pane">

                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                            <hr>
                                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--item ends-->

                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                            <hr>
                                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <div class="menu-item-list">
                                                                            <div class="menu-item">
                                                                                <img src="{{url('web/img/menu-item.png')}}">
                                                                            </div>
                                                                            <div class="menu-data">
                                                                                <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                                <hr>
                                                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--item ends-->

                                                                    <div class="col-md-6">
                                                                        <div class="menu-item-list">
                                                                            <div class="menu-item">
                                                                                <img src="{{url('web/img/menu-item.png')}}">
                                                                            </div>
                                                                            <div class="menu-data">
                                                                                <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                                <hr>
                                                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div id="tab-09" class="tab-pane">

                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                            <hr>
                                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--item ends-->

                                                                <div class="col-md-6">
                                                                    <div class="menu-item-list">
                                                                        <div class="menu-item">
                                                                            <img src="{{url('web/img/menu-item.png')}}">
                                                                        </div>
                                                                        <div class="menu-data">
                                                                            <h3>COCKTAIL 01 <span>RM29.90</span></h3>
                                                                            <hr>
                                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--tabs round end-->

                        </div>
                    </div>

                </div>
            </div>

            <!--parallax-->
            <div class="parallax-inner-sm parallax-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-7 col-md-push-5">
                                <div class="heading-title-alt m-bot-0 inline-block">
                                    <h3>ST. PATRICK DAY CELEBRATION</h3>
                                    <h1 class="text-uppercase light-txt"><span>50%</span> OFF FOR SECOND<br> PINT OF STOUT</h1>
                                    <div class="m-top-30 inline-block">
                                        <a href={{url('promotion')}} class="btn btn-medium btn-circle btn-theme-color light-hover">FIND OUT MORE</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-5 col-md-pull-7">
                                <img class="img-100" src="{{url('web/img/menu-bg.jpg')}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--parallax-->


        </section>
        <!--body content end-->



         <div class="modal fade" id="promotion2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="concept-modal">
                            <div class="col-md-6 col-sm-12">
                                <img class="img-100" src="{{url('web/img/promotion-1.jpg')}}">
                            </div>
                            <div class="col-md-6 col-sm-12 mobile-textcenter">
                                <h3>50% OFF FOR SECOND PINT OF STOUT</h3>
                                <ul>
                                    <li><img src="{{url('web/img/time-01.svg')}}">05 November 2017 - 19 November 2017</li>
                                    <li><img src="{{url('web/img/venue-01.svg')}}">Home and Away Oasis, Ara Damansara</li>
                                </ul>
                                <p id="modalNotificationText"></p>
                                <p></p>
                                <a href="{{route('contact')}}" class="btn btn-medium btn-circle btn-dark-border btn-transparent"> BOOK A TABLE </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

     <!--footer 1 start -->
       <footer id="footer" class="dark">
            <div class="primary-footer">
                <div class="container">
                    <div class="row">
                    <div class="col-md-3 col-sm-12 hidden-sm hidden-xs">
                    <a href="{{url('/')}}" class="m-bot-20 footer-logo">
                    <img src="{{url('web/img/logo.svg')}}" alt="" />
                    </a>
                    </div>
                        {{ csrf_field() }}
                    <div class="col-md-3 col-sm-12 visible-sm visible-xs">
                    <h5>Promotions</h5>
                    <div class="subscribe-form">
                          <form class="form-inline" id="emailform2">
                                    <input type="text" class="form-control" id="email2" placeholder="Leave email for promotion...">
                                    <button type="button" class="btn btn-theme-color text-uppercase emailfooter2"><img src="{{url('web/img/send.png')}}"></button>
                                </form>
                    </div>   
                    </div>

                        <div class="col-md-3 col-sm-12">
                            <h5>Opening Hours</h5>
                            <ul class="f-list">
                            <li>Mon - Thu <span>11.00am - 1.30am</span></li>
                            <li>Fri - Sat <span>11.00am - 2.30am</span></li>
                            <li>Sunday <span>11.00am - 1.00am</span></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <h5>Contact Us</h5>
                            <ul class="f-list">
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +03 3333 3333</a></li>
                            <li><a href="mailto:homeandaway@gmail.com.my"><i class="fa fa-envelope" aria-hidden="true"></i> homeandaway@gmail.com.my</a></li>
                            <li><a target="_blank" href="http://www.homeandaway.com.my/"><i class="fa fa-globe" aria-hidden="true"></i> www.homeandaway.com.my</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-12 hidden-sm hidden-xs">
                        <h5>Promotions</h5>

                          <div class="subscribe-form">
                                <form class="form-inline" id="emailform">
                                    <input type="text" class="form-control" id="email" placeholder="Leave email for promotion...">
                                    <button type="button" class="btn btn-theme-color text-uppercase emailfooter"><img src="{{url('web/img/send.png')}}"></button>
                                </form>
                            </div>   
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="secondary-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-9 text-right">
                            Copyright @ 2017 <span><a href="#">Home and Away</a></span>
                        </div>
                        <div class="col-md-5 col-sm-4 col-xs-3">
                            <div class="social-link circle pull-right">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer 1 end-->
    </div>


    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{url('web/js/modernizr.js')}}"></script>
    <script src="{{url('web/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{url('web/js/bootstrap.min.js')}}"></script>
    <script src="{{url('web/js/validator.min.js')}}"></script>
    <script src="{{url('web/js/breakpoint.js')}}"></script>
    <script src="{{url('web/js/jquery.flexslider-min.js')}}"></script>
    <script src="{{url('web/js/jquery.gmap.min.js')}}"></script>
    <script src="{{url('web/js/imagesloaded.js')}}"></script>
    <script src="{{url('web/js/jquery.isotope.js')}}"></script>
    <script src="{{url('web/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('web/js/menuzord.js')}}"></script>
    <script src="{{url('web/js/jquery.nav.js')}}"></script>
    <script src="{{url('web/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('web/s/smooth.js')}}"></script>
    <script src="{{url('web/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('web/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{url('web/js/jquery.sticky.min.js')}}"></script>
    <script src="{{url('web/js/wow.min.js')}}"></script>
    <script src="{{url('web/js/scripts.js')}}"></script>
    <script src="{{url('web/js/bootstrapvalidator.min.js')}}"></script>

    <script>
        /*function check(){

            var email = $("#emailfooter").val();

            alert(email);

            if(email.match( /\S+@\S+\.\S+/)){

                send(email);
            }else{

                alert('please insert a proper email');
            }
        }

            function send(email){
                 $('#submitemail').on('click', function() {

        $.ajax({
            type: 'POST',
            url: 'emailsubscription',
            data: {'_token': $('input[name=_token]').val(),
                    'email': $("#emailfooter").val()
                },
            success:function(data){
                alert('success');

            }
        });

    });*/



        //var email = document.getElementById('emailfooter').value;

        //mobile
         $('.emailfooter2').on('click', function() {

            /*alert('emailfooter2');
            alert('yes');
            alert($("#email2").val());
            alert($('input[name=_token]').val());*/

            $email = $("#email2").val();

            if ($email==null||!$email.match( /\S+@\S+\.\S+/)){

                alert('please insert email');

            }else{

            $.ajax({
                type: 'POST',
                url: "{{route('subscribe')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'email': $("#email2").val()
                },

                success: function(_response) {

                     var status = _response.return;

                      if(status == "success"){

                        $("#modalNotificationText").html("Thank you for subscribing!");
                        $('#promotion2').modal("show");

                        $("#emailform2")[0].reset();
                   
                    }else if(status == "exist"){

                            $("#modalNotificationText").html("You have previously subscribed!");
                            $('#promotion2').modal("show");

                            $("#emailform2")[0].reset();

                        }
                    },
                          error: function(jqXHR, exception){
                    ajax_error_handling(jqXHR, exception);
                }
            });

            }
        });

    
       
        //website
        $('.emailfooter').on('click', function() {

            /*alert('emailfooter');
            alert('yes');
            alert($("#email").val());
            alert($('input[name=_token]').val());*/
              $email = $("#email").val();

            if ($email==null||!$email.match( /\S+@\S+\.\S+/)){

                alert('please insert email');

            }else{
            $.ajax({
                type: 'POST',
                url: "{{route('subscribe')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'email': $("#email").val()
                },

                success: function(_response) {

                     var status = _response.return;

                      if(status == "success"){

                        $("#modalNotificationText").html("Thank you for subscribing!");
                        $('#promotion2').modal("show");

                        $("#emailform")[0].reset();
                   
                    }else if(status == "exist"){

                            $("#modalNotificationText").html("You have previously subscribed!");
                            $('#promotion2').modal("show");

                            $("#emailform")[0].reset();

                        }

                    }, error: function(jqXHR, exception){
                    ajax_error_handling(jqXHR, exception);
                }
            });
            
            }
        });


        /*
        return false;
    }*/
    </script>

    <script>
        $('.example1').datepicker();
    </script>

    <script type="text/javascript">
        $('#timepicker1').timepicker();
    </script>

    <script>
        // Map Markers
        var mapMarkers = [{
            address: "Home & Away,Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia",
            html: "<strong>Home and Away<br>Oasis Square, Jalan PJU 1A/7A,<br> Ara Damansara, Petaling Jaya, Malaysia",
            icon: {
                image: "{{url('web/img/pin.png')}}",
                iconsize: [55, 71],
                iconanchor: [55, 71]
            },
            popup: true
        }];

        // Map Initial Location
        var initLatitude = 3.115074;
        var initLongitude = 101.574959;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 18,
        };

        styles: [{
            "featureType": "landscape",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 65
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 51
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.highway",
            "stylers": [{
                "saturation": -100
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.arterial",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 30
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "road.local",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 40
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "transit",
            "stylers": [{
                "saturation": -100
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "administrative.province",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [{
                "visibility": "on"
            }, {
                "lightness": -25
            }, {
                "saturation": -100
            }]
        }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "hue": "#ffff00"
            }, {
                "lightness": -25
            }, {
                "saturation": -97
            }]
        }];



        var map = $('#googlemaps').gMap(mapSettings);

        // Map text-center At
        var mapCenterAt = function(options, e) {
            e.preventDefault();
            $('#googlemaps').gMap("centerAt", options);
        }
    </script>

</body>

</html>


