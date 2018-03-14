
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="og:title" content="Promotions | The Dugout Oasis" />
    <meta property="og:image" content="http://www.thedugoutoasis.com/images/dugout-logo-share.png" /> 
    <meta property="og:image:width" content="500" /> 
    <meta property="og:image:height" content="500" /> 
    <meta property="og:description" content="The Dugout is an independently owned restaurant cum sports bar. Explore our exciting selection of food carefully crafted for you, and enjoy our alcohol products that are only sourced from the principal suppliers. All products are guaranteed original. " />  
    <meta property="og:url" content="http://www.thedugoutoasis.com" />
    <link rel="icon" type="image/png" href="{{url('web/img/favicon-dugout.png')}}">
    <title>Promotions | The Dugout Oasis</title>
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
</head>

<body>

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
                        <li class="active"><a href="{{route('promotion')}}">PROMOTIONS  </a></li>    
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
                         @else
                                    <h2 class="text-center">COMING SOON</h2>

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
                                <img id="modalImage" class="img-100" src="{{url('web/img/promotion-1.jpg')}}">
                            </div>
                            <div class="col-md-6 col-sm-12 mobile-textcenter">
                                <h3 id="title">50% OFF FOR SECOND PINT OF STOUT</h3>
                                <ul>
                                    <li><p id="date">05 November 2017 - 19 November 2017</p></li>
                                    <li><img src="{{url('web/img/pin.svg')}}">The Dugout, Ara Damansara</li>
                                </ul>
                                <p id="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                <a href="{{route('contact')}}#reservation__box" class="btn btn-medium btn-circle btn-theme-color light-hover dugout-btn hidden-lg hidden-md">BOOK A TABLE</a>
                                <a href="{{route('contact')}}#reservation__box" class="btn btn-medium btn-circle btn-dark-border btn-transparent hidden-sm hidden-xs"> Book a table</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
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


    <script src="{{url('web/js/modernizr.js')}}"></script>
    <script src="{{url('web/js/jquery-1.10.2.min.js')}}"></script>
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

    <script type="text/javascript">

         function setModal(title,description,img,date){
        $('#description').html(description);
        $('#date').html('<img src="{{url('web/img/time.svg')}}">'+date);
        $('#title').html(title);
        $('#modalImage').attr("src", img);
    }

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

    
       
        //website
        $('.emailfooter').on('click', function() {

            /*alert('emailfooter');
            alert('yes');
            alert($("#email").val());
            alert($('input[name=_token]').val());*/
              $email = $("#email").val();

            if ($email==null||!$email.match( /\S+@\S+\.\S+/)){

               $("#titlemessage").html("Please enter an email address!");
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

        </script>



</body>

</html>
