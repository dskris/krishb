<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    if(Auth::user()){
        return redirect('user');
    }else{
        return view('index');
    }
});*/

 Route::get('/', ['as' => 'index','uses' => 'WebController@index']);

Route::get('authenticity-guarantee', ['as' => 'authenticity','uses' => 'WebController@authenticity']);
Route::get('contact-us', ['as' => 'contact','uses' => 'WebController@contact']);

Route::get('event', ['as' => 'events','uses' => 'WebController@event']);
Route::get('gallery', ['as' => 'gallery','uses' => 'WebController@gallery']);
Route::get('menu', ['as' => 'menu','uses' => 'WebController@menu']);
Route::get('promotion', ['as' => 'promotion','uses' => 'WebController@promotions']);
Route::get('service', ['as' => 'service','uses' => 'WebController@services']);

Route::post('emailsubscription', ['as' => 'subscribe','uses' => 'WebController@subscribe']);
Route::post('postcontactus', ['as' => 'postcontactus','uses' => 'WebController@postcontactus']);

/*Route::get('send_test_email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
    {
        $message->subject('Mailgun and Laravel are awesome!');
        $message->from('postmaster@mailgun.digitalsymphony.it', 'Website Name');
        $message->to('kris@digitalsymphony.it');
    });
});*/

/*Route::get("/email", function() {
   Mail::raw('Now I know how to send emails with Laravel dsdsd', function($message)
    {
        $message->subject('Hi There!!');
        $message->from(config('mail.from.address'), config("app.name"));
        $message->to('kris@digitalsymphony.it');
        try {

        $variable = ['kris@digitalsymphony.it'];

         $message->from('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->to($variable);
                $message->replyTo('thedugoutoasis@gmail.com', 'The Dugout Oasis');
                $message->subject('Booking Confirmation');
                $message->getSwiftMessage();

        } catch (Exception $e) {
            if( count(Mail::failures()) > 0 ) {

               $result = "There was one or more failures. They were: <br />";

               foreach(Mail::failures as $email_address) {
                   $result .=  " - $email_address";
                }

            } else {
                $result =  "No errors, all sent successfully!";
            }
        }

    });*/

 /*$notificationDataReserve = array(
                'fromEmail' => 'thedugoutoasis@gmail.com',
                'fromName' => 'The Dugout Oasis',
                //'toEmail' => ['manager@homeandawayoasis.com','kuhan@digitalsymphony.it'],
                //'toEmail' => ['rudiliu.ds@gmail.com','rudiiliu@gmail.com'],
                'toEmail' => [ 'kris@digitalsymphony.it' ],
                'toName' => 'The Dugout Oasis',
                //'subject' => 'Report Match '.$teamHome.' VS '.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)),
                'subject' => 'Booking Confirmation',
                //'introMessage' => 'For '.$teamHome.' VS'.$teamAway.' on '.date('j M Y  g:i A', strtotime($match->startDateTime)).' winners are below',
                'introMessage' => 'You have successfully reserved a table at The Dugout Oasis, the details of your confirmed booking are as below',
                //'playerCount' => $players,
                //'winners' => $winners,
                'name' => 'name',
                'date' => 'test',
                'time' => 'test',
                'people' => 'test',
                'phone' => 'test',
                'email' => 'test',
            );

     $result = Mail::send(['text'=>'emails.index'],['data' => $notificationDataReserve], function ($message){
                $message->from(config('mail.from.address'), config("app.name"));
                $message->to('kris@digitalsymphony.it');
                $message->replyTo($data['fromEmail'], $data['fromName']);
                $message->subject($data['subject']);
                $message->getSwiftMessage();

                });*/

   

         /*$this->sentEmailNotification($notificationDataReserve);

          public function sentEmailNotification($data, $template='emails.index'){
        try {
            $result = Mail::send($template, ['data' => $notificationDataReserve], function ($message){
                $message->from(config('mail.from.address'), config("app.name"));
                $message->to('kris@digitalsymphony.it');
                $message->replyTo($data['fromEmail'], $data['fromName']);
                $message->subject($data['subject']);
                $message->getSwiftMessage();

            });
        } catch (Exception $e) {
            if( count(Mail::failures()) > 0 ) {

               $result = "There was one or more failures. They were: <br />";

               foreach(Mail::failures as $email_address) {
                   $result .=  " - $email_address";
                }

            } else {
                $result =  "No errors, all sent successfully!";
            }
        }


        return $result;
    }*/


Auth::routes();

Route::group(['middleware' => ['web','auth']], function () {


    //dashboard
    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));

    //subscribers
    Route::get('subscribers', array('as' => 'subscriber', 'uses' => 'DashboardController@subscriber'));

    //user
    Route::post('user/changeStatus', array('as' => 'changeUserStatus', 'uses' => 'UserController@changeStatus'));
    Route::resource('user', 'UserController');

	//post
    Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'));
    Route::resource('posts', 'PostsController');

    //reservation
    Route::post('reservation/changeStatus', array('as' => 'changeReservationStatus', 'uses' => 'ReservationController@changeStatus'));
    Route::resource('reservation', 'ReservationController');

    //gallery
    Route::post('galleries/changeStatus', array('as' => 'changeGalleryStatus', 'uses' => 'GalleryController@changeStatus'));
    Route::resource('galleries', 'GalleryController');

    //services
   /* Route::post('services/changeStatus', array('as' => 'changeServiceStatus', 'uses' => 'GalleryController@changeStatus'));
    Route::resource('services', 'ServicesController');*/

     //promotions
     Route::get('existing', array('as' => 'existing', 'uses' => 'PromotionsController@existingpromotion'));
    Route::post('promotions/existing', array('as' => 'existingPromotion', 'uses' => 'PromotionsController@existing'));
    Route::post('promotions/changeStatus', array('as' => 'changePromotionStatus', 'uses' => 'PromotionsController@changeStatus'));
    Route::resource('promotions', 'PromotionsController');

     //events
    Route::post('events/changeStatus', array('as' => 'changeEventStatus', 'uses' => 'EventsController@changeStatus'));
    Route::resource('events', 'EventsController');

     //menu
    Route::post('menus/changeStatus', array('as' => 'changeMenuStatus', 'uses' => 'MenusController@changeStatus'));
    Route::resource('menus', 'MenusController');

    
});

 //Route::post('/deactivate-user','HomeController@deactivateUser')->name('deactivateUser');


