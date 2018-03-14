
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
     <link rel="icon" type="image/png" href="{{url('web/img/favicon.png')}}">
    <title>Home & Away Oasis | Promotions</title>
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
                        <li class=""><a href="{{route('menu')}}">MENU </a></li>
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
        <section class="page-title background-title-promotion dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-uppercase">PROMOTIONS</h1>
                    </div>
                </div>
            </div>
        </section>
        <!--hero section-->

        <!--body content start-->
        <section class="body-content list-grids">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="m-bot-10 inline-block">
                            <div class="heading-title-alt border-short-bottom text-center">
                                <h1 class="text-uppercase">ONGOING PROMOTIONS</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                       @if(count($promotion)!=0)
                        @foreach($promotion as $promotions)

                        <div class="col-md-4 col-sm-6">
                            <a href="#" data-toggle="modal" data-direction="right" data-target="#modalpop" onclick="setModal('{{$promotions->name}}','{{$promotions->description}}','{{url('/assets/img/gallery').'/'.$promotions->photo_path}}','{{date('d F, Y', strtotime($promotions->promotion_startDate))}} to {{ date('d F, Y', strtotime($promotions->promotion_endDate ))}}');" data-whatever="@mdo" name="sa">
                                <div class="list-grid">
                                    <img class="img-100" style="height:232px;" src="{{url('/assets/img/gallery').'/'.$promotions->photo_path}}">
                                    <div class="list-data">
                                        <h3>{{$promotions->name}}</h3>
                                        <hr>
                                        <p>{{$promotions->description}}</p>
                                        <div class="m-btn">
                                            <a href="#" data-toggle="modal" data-direction="right" data-target="#modalpop" onclick="setModal('{{$promotions->name}}','{{$promotions->description}}','{{url('/assets/img/gallery').'/'.$promotions->photo_path}}','{{date('d F, Y', strtotime($promotions->promotion_startDate))}} to {{ date('d F, Y', strtotime($promotions->promotion_endDate ))}}');" data-whatever="@mdo" name="sa" class="btn btn-medium btn-circle btn-dark-border btn-transparent"> READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @endif

                        <!--List ends-->

                    </div>
                </div>
            </div>

           
            <div class="modal fade" id="modalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="concept-modal">
                            <div class="col-md-6 col-sm-12">
                                <img id="modalImage" class="img-100" style="width:481px; height:297px;" src="">
                            </div>
                            <div class="col-md-6 col-sm-12 mobile-textcenter">
                                <h3 id="title">50% OFF FOR SECOND PINT OF STOUT</h3>
                                <ul>
                                    <li><img src="{{url('web/img/time-01.svg')}}"><p id="date"><p></li>
                                    <li><img src="{{url('web/img/venue-01.svg')}}">Home and Away Oasis, Ara Damansara</li>
                                </ul>
                                <p id="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
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
       /*
 function required(){

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

        function setModal(title,description,img,date){
        $('#description').html(description);
        $('#date').html(date);
        $('#title').html(title);
        $('#modalImage').attr("src", img);
    }
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


