
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="og:title" content="Contact Us | The Dugout Oasis, Ara Damansara" />
    <meta property="og:image" content="http://www.thedugoutoasis.com/images/dugout-logo-share.png" /> 
    <meta property="og:image:width" content="500" /> 
    <meta property="og:image:height" content="500" /> 
    <meta property="og:description" content="The Dugout is an independently owned restaurant cum sports bar. Explore our exciting selection of food carefully crafted for you, and enjoy our alcohol products that are only sourced from the principal suppliers. All products are guaranteed original. " />  
    <meta property="og:url" content="http://www.thedugoutoasis.com" />
    <link rel="icon" type="image/png" href="{{url('web/img/favicon-dugout.png')}}">
    <title>Contact Us | The Dugout Oasis</title>
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
    <link rel="stylesheet" href="{{url('web/css/style-responsive.css')}}">
    <link rel="stylesheet" href="{{url('web/css/default-theme.css')}}">
    <script src="//cdn.zarget.com/112328/202607.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" /> 

        <!-- FACEBOOK PIXEL -->
   <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1640418842909235');
        fbq('track', "PageView");
    </script>

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1640418842909235&ev=PageView&noscript=1"
        />
    </noscript>

    <!-- ZARGET / FRESHMARKETER (HEATMAP/SCROLLMAP) -->

    <script src='//cdn.freshmarketer.com/112328/202607.js'></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108974152-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-108974152-1');
    </script>

    <style type="text/css">  
        header.l-header {
            background: #000;
        } 
    </style>
</head>

{{ csrf_field() }}

<body>

    <div id="overlay" class="hide"> 
        <img id="loading" src="{{url('web/img/loading_gif.gif')}}">
    </div>

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
                                    <li><img src="{{url('web/img/time.svg')}}">05 November 2017 - 19 November 2017</li>
                                    <li><img src="{{url('web/img/pin.svg')}}">Home and Away Oasis, Ara Damansara</li>
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

    <!-- Modal form to delete a form -->
    <div id="thankyouModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img src="{{url('web/img/dugout-logo-share.png')}}" class="img-responsive center-block" alt="The Dugout">
                    </div>

                    <div class="row text-center">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-top-30">
                            <h2>Thank you for your reservation.</h2>
                            <p>Your reservation has been confirmed! <br> See you soon!</p>
                        </div>
                    </div> 
                </div> 


            </div>
        </div>
    </div>

    <!-- Modal form to delete a form -->
    <div id="emailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h2 class="text-center" id="titlemessage"></h2>
                </div>
            </div>
        </div>
    </div>


    <div class="wrapper"> 
       <!--header start-->
        <header class="l-header l-header_overlay"> 
            <div class="l-navbar l-navbar_expand l-navbar_t-dark-trans js-navbar-sticky">
                <div class="container">
                    <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                        <!--logo start-->
                        <a href="{{url('/')}}" class="logo-brand">
                            <img  src="{{url('web/img/logo.svg')}}" alt="The Dugout Oasis">
                        </a>
                        <!--logo end-->

                        <!--mega menu start-->
                        <ul class="menuzord-menu menuzord-right c-nav_s-underline">
                        <li class=""><a href="{{route('menu')}}">MENU </a></li>
                        <li class=""><a href="{{route('promotion')}}">PROMOTIONS  </a></li>    
                        <li class=""><a href="{{route('service')}}">SERVICES  </a></li>   
                        <li class=""><a href="{{route('gallery')}}">GALLERY  </a></li>     
                        <li class=""><a href="{{route('events')}}">EVENTS  </a></li>      
                        <li class="last active"><a href="{{route('contact')}}">CONTACT</a></li>
                        </ul>
                    </nav>
                </div>
            </div> 
        </header>
        <!--header end-->

        <div id="map" class="height-450"></div>

    <section class="body-content">
      <div class="page-content">
        <div class="container">
          <div class="row">
            <div class="m-bot-10 inline-block">
              <div class="heading-title-alt border-short-bottom text-center">
                <h1 class="text-uppercase">CONTACT US</h1>
                <div class="half-txt">We are always available to receive any complaints, feedback , reservations or even just a friendly chat 
                </div>
              </div>
              <div class="row p-top-80 p-xs-top-30">
                <div class="col-md-4 col-xs-12 col-sm-12 text-center m-xs-bot-30 ">
                  <img class="contact-us__text--icon" src="{{url('web/img/Asset-1.svg')}}" alt="location icon">
                  <div class="contact-us__text">
                    Oasis Square, Jalan PJU 1A/7A, Ara Damansara,  Petaling Jaya, Malaysia
                  </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-12 text-center m-xs-bot-30 ">
                  <img class="contact-us__text--icon" src="{{url('web/img/Asset-2.svg')}}" alt="telephone icon">
                  <div class="contact-us__text">
                    03-7832 0668
                  </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-12 text-center m-xs-bot-30 ">
                  <img class="contact-us__text--icon" src="{{url('web/img/Asset-3.svg')}}" alt="clock icon">
                  <div class="contact-us__text">
                    <ul>
                      <li>Mon - Thu</li>
                      <li>Fri - Sat</li>
                      <li>Sunday</li>
                    </ul>
                    <ul>
                      <li>11.00am - 1.30am</li>
                      <li>11.00am - 2.30am</li>
                      <li>11.00am - 1.00am</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Form starts here-->
      <div class='page-content bg-grey'>
        <div>
          <div class='container'>

            <div class="row">

              <div id='reservation__box' class="col-xs-12 col-sm-12 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2">
                <div class="reservation text-center">
                  <h2>Reservations</h2>
                  <p>Please fill in the form to book a table with us</p>
                </div>

                 <form class="contact-comments m-top-10 js-Mailer width-100 " method="post" id="contactform">  
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">  
                                <div class='input-group date' id='date-selection'>
                                    <input class="form-control border-right-none" type="text" placeholder="Pick a Date" id="datepicker" required="Date is required"/>
                                    <span class="input-group-addon">
                                       <i class="fa fa-calendar" aria-hidden="true"></i> 
                                    </span> 
                                </div>
                                <p class="errorDate text-center alert alert-dugout hidden"></p>
                            </div>
                        </div>
                        

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <div class="date bootstrap-timepicker timepicker">
                                    <div class="input-group date" id="time-selection">
                                        <input id="timepicker1" type="text" class="form-control input-small border-right-none">
                                        <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div> 
                                </div>
                                 <p class="errorTime text-center alert alert-dugout hidden"></p>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-6  ">
                            <div class="form-group">
                                <input type="text" placeholder="Number of people" name="number_of_people" id="number_of_people" class="form-control" maxlength="100" required data-error="You must enter number of people">
                                <p class="errorPeople text-center alert alert-dugout hidden"></p>
                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <input type="text" placeholder="Phone Number" name="phone" id="phone" class="form-control" maxlength="15" required data-error="You must enter phone number">
                                <p class="errorPhone text-center alert alert-dugout hidden"></p>
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" placeholder="Full Name" name="name" id="name" class="form-control" maxlength="100" required data-error="You must enter a name">
                                <p class="errorName text-center alert alert-dugout hidden"></p>
                            </div>
                        </div>  

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email address" id="bookingemail" class="form-control" maxlength="100" required data-error="Invalid email address!">
                                <p class="errorEmail text-center alert alert-dugout hidden"></p>
                            </div>
                        </div>   
                    </div>

                    <div class="row">   
                        <div class="form-group col-md-12 text-xs-center text-center"> 
                            <button type="button" class="btn btn-medium btn-circle btn-theme-color light-hover dugout-btn booktable">BOOK A TABLE</button>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="FORM_ALT">
                    </div>
                </form>
              </div>

            </div>

          </div>
        </div>
      </div>

    </section>
        <!--body content end-->

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
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +03 7832 0668</a></li>
                            <li><a href="mailto:bartender@thedugoutoasis.com"><i class="fa fa-envelope" aria-hidden="true"></i> bartender@thedugoutoasis.com</a></li>
                            <li><a target="_blank" href="http://www.thedugoutoasis.com/"><i class="fa fa-globe" aria-hidden="true"></i> www.thedugoutoasis.com</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-12 hidden-sm hidden-xs">
                        <h5>Promotions</h5>

                          <div class="subscribe-form">
                                <form class="form-inline" id="emailform">
                                    <input type="text" class="form-control" id="email" placeholder="Leave email for promotion updates ">
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
                            Copyright @ 2018 <span><a href="#">The Dugout Oasis</a></span>
                        </div>
                        <div class="col-md-5 col-sm-4 col-xs-3">
                            <div class="social-link circle pull-right">
                                <a href="https://www.facebook.com/thedugoutoasis/" target="_blank"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer 1 end-->
    </div>
 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    <script src="{{url('web/js/modernizr.js')}}"></script>
    <script src="{{url('web/js/bootstrap.min.js')}}"></script>
    <script src="{{url('web/js/validator.min.js')}}"></script>
    <script src="{{url('web/js/breakpoint.js')}}"></script>
    <script src="{{url('web/js/jquery.flexslider-min.js')}}"></script>
    <script src="{{url('web/js/imagesloaded.js')}}"></script>
    <script src="{{url('web/js/jquery.isotope.js')}}"></script>
    <script src="{{url('web/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('web/js/menuzord.js')}}"></script>
    <script src="{{url('web/js/jquery.nav.js')}}"></script>
    <script src="{{url('web/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('web/js/smooth.js')}}"></script>
    <script src="{{url('web/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('web/js/jquery.sticky.min.js')}}"></script>
    <script src="{{url('web/js/wow.min.js')}}"></script>
    <script src="{{url('web/js/scripts.js')}}"></script>
    <script src="{{url('web/js/main.js')}}"></script>  
    <script>
       $(document).ready(function() {
        $(function () {
            $('#date-selection').datetimepicker({
                allowInputToggle: true,
                format: 'DD/MM/YYYY' 
            }); 
        });
    });
    </script>

    <script>
       $(document).ready(function() {
        $(function () {
            $('#time-selection').datetimepicker({
                allowInputToggle: true,
                format: 'HH:mm',
                minDate:moment({h:11}),
                maxDate:moment({h:23})
            }); 
        });
    });
    </script> 

    <script>
      function initMap() {
        var uluru = {lat: 3.115117, lng:  101.574915};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHS1_5OrvXLsQR-blCbEO9CUNEGcOomzo&callback=initMap">
    </script>

        <script>

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

            $('.emailfooter2').on('click', function() {

            /*alert('emailfooter2');
            alert('yes');
            alert($("#email2").val());
            alert($('input[name=_token]').val());*/

            $email = $("#email2").val();

            if ($email==null||!$email.match( /\S+@\S+\.\S+/)){

                $("#titlemessage").html("Please enter an email address!");
                $('#emailModal').modal("show");
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

                        $("#titlemessage").html("Please enter an email address!");
                        $('#emailModal').modal("show");

                        $("#emailform2")[0].reset();
                   
                    }else if(status == "exist"){

                            $("#titlemessage").html("You have previously subscribed!");
                            $('#emailModal').modal("show");

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

                $("#titlemessage").html("Please insert a proper email address!");
                $('#emailModal').modal("show");

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

                        $("#titlemessage").html("Thank you for subscribing!");
                        $('#emailModal').modal("show");

                        $("#emailform")[0].reset();
                   
                    }else if(status == "exist"){

                            $("#titlemessage").html("You have previously subscribed!");
                            $('#emailModal').modal("show");

                            $("#emailform")[0].reset();

                        }
                    },
                          error: function(jqXHR, exception){
                    ajax_error_handling(jqXHR, exception);
                }
            });
            
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

         $('.booktable').on('click', function() {

             $("#overlay").removeClass("hide");


            if ($('#timepicker1').val()!=''){



                 var newtime = $('#timepicker1').val();

                //alert(newtime);

                 var result = newtime.substring(0,2);

                //alert(result);

                var result2 = newtime.substring(3,5);

                //alert(result2);

                var a = parseInt(result);

                //alert(a);


                if(a>12){

                  var b = a-12;

                //alert(b);

                var newvariable = b.toString();

                if(newvariable<12){

                    var finalvariable = newvariable + ':' + result2+' '+'PM';
                }

               

                }else if(a==0){

                    var finalvariable = '12:' + result2+' '+'AM';

                     //alert(finalvariable);


                }else if(a==12){

                     var finalvariable = '12:' + result2+' '+'PM';

                     //alert(finalvariable);

                }else{

                  
                    var finalvariable = a+ ':' + result2+' '+'AM';


                }

            }

                //finalvariable = thenewvariable+$result2+' '+'AM';

                //alert(finalvariable);





            var date = $("#datepicker").val();

            var replaced = date.split('/').join('-');

            //alert(replaced);
            //alert(finalvariable);
            //$time = $("#timepicker1").val();

            //$newdate = date('d/m/Y',strtotime('12/12/2017'));
            //strin

            //var newtime = $("#timepicker1").val();

             //converttopropertime(newtime);

            
            //alert(newtime);
            //alert(replaced);
            //alert(typeof $("#timepicker1").val());
            //alert($("#timepicker1").val());

            //alert(date('H:i:s',strtotime($time)));
            /*alert($("#number_of_people").val());
            alert($("#phone").val());
            alert($("#name").val());
            alert($("#bookingemail").val());
            alert($('input[name=_token]').val());*/

            $.ajax({
                type: 'POST',
                url: "{{route('postcontactus')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $("#name").val(),
                    'date': replaced,
                    'time': finalvariable,
                    'phone': $("#phone").val(),
                    'number_of_people': $("#number_of_people").val(),
                    'email': $("#bookingemail").val()
                },

                success: function(data) {
                    $("#overlay").addClass("hide");

                    $('.errorDate').addClass('hidden');
                    $('.errorName').addClass('hidden');
                    $('.errorPeople').addClass('hidden');
                    $('.errorTime').addClass('hidden');
                    $('.errorEmail').addClass('hidden');
                    $('.errorPhone').addClass('hidden');

                    if ((data.errors)) {

                        if (data.errors.date) {
                            $('.errorDate').removeClass('hidden');
                            $('.errorDate').text(data.errors.date);
                        }
                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.time) {
                            $('.errorTime').removeClass('hidden');
                            $('.errorTime').text(data.errors.time);
                        }
                        if (data.errors.phone) {
                            $('.errorPhone').removeClass('hidden');
                            $('.errorPhone').text(data.errors.phone);
                        }
                         if (data.errors.number_of_people) {
                            $('.errorPeople').removeClass('hidden');
                            $('.errorPeople').text(data.errors.number_of_people);
                        }
                         if (data.errors.email) {
                            $('.errorEmail').removeClass('hidden');
                            $('.errorEmail').text(data.errors.email);
                        }
                    }else{

                        $('#thankyouModal').modal("show");

                        $("#contactform")[0].reset();
                    }
                   
                    },
                          error: function(jqXHR, exception){
                    ajax_error_handling(jqXHR, exception);
                }
            });
        });
       

        
    </script> 

</body>

</html>
