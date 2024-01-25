<?php



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



use Illuminate\Support\Facades\Route;



Route::get('/cache', function () {



    \Artisan::call('cache:clear');



    \Artisan::call('config:clear');



    \Artisan::call('config:cache');



    \Artisan::call('route:clear');



    \Artisan::call('view:clear');



    echo 'done';



});



Route::get('/payments/excel',

    [

        'as' => 'admin.invoices.excel',

        'uses' => 'BookingAgentHistoryController@excel'

    ]);

    Route::get('twilio', ['as' => 'upx.twilio', 'uses' => 'DashboardController@twilio']);

Route::get('/', ['as' => 'home', 'uses' => 'FrontPageManagementController@index']);



Route::get('/quote', ['as' => 'quote', 'uses' => 'FrontPageManagementController@quote']);



Route::get('/track/{id}', ['as' => 'track', 'uses' => 'FrontPageManagementController@track']);

Route::get('/track', ['as' => 'track', 'uses' => 'FrontPageManagementController@track']);

Route::get('/contactus', ['as' => 'contact', 'uses' => 'FrontPageManagementController@contact']);

Route::get('/aboutus', ['as' => 'aboutus', 'uses' => 'FrontPageManagementController@aboutus']);

Route::get('/terms_and_condition', ['as' => 'terms_and_condition', 'uses' => 'FrontPageManagementController@terms_and_condition']);



Route::group(['prefix' => 'service'], function () {

    Route::get('/air_freight', ['as' => 'service.air_freight', 'uses' => 'FrontPageManagementController@air_freight']);

    Route::get('/sea_freight', ['as' => 'service.sea_freight', 'uses' => 'FrontPageManagementController@sea_freight']);

    Route::get('/road_freight', ['as' => 'service.road_freight', 'uses' => 'FrontPageManagementController@road_freight']);

    Route::get('/storage_and_warehousing', ['as' => 'service.storage_and_warehousing', 'uses' => 'FrontPageManagementController@storage_and_warehousing']);

    Route::get('/customs_clearance', ['as' => 'service.customs_clearance', 'uses' => 'FrontPageManagementController@customs_clearance']);

    Route::get('/door_to_door', ['as' => 'service.door_to_door', 'uses' => 'FrontPageManagementController@door_to_door']);

    Route::get('/d2d_India', ['as' => 'service.d2d_India', 'uses' => 'FrontPageManagementController@d2d_India']);

    Route::get('/d2d_pakistan', ['as' => 'service.d2d_pakistan', 'uses' => 'FrontPageManagementController@d2d_pakistan']);

    Route::get('/d2d_tanzania', ['as' => 'service.d2d_tanzania', 'uses' => 'FrontPageManagementController@d2d_tanzania']);

    Route::get('/d2d_kenya', ['as' => 'service.d2d_kenya', 'uses' => 'FrontPageManagementController@d2d_kenya']);

    Route::get('/d2d_malawi', ['as' => 'service.d2d_malawi', 'uses' => 'FrontPageManagementController@d2d_malawi']);

    Route::get('/parcels_courier', ['as' => 'service.parcels_courier', 'uses' => 'FrontPageManagementController@parcels_courier']);

    Route::get('/d2d_srilanka', ['as' => 'service.d2d_srilanka', 'uses' => 'FrontPageManagementController@d2d_srilanka']);

    Route::get('/d2d_bangladesh', ['as' => 'service.d2d_bangladesh', 'uses' => 'FrontPageManagementController@d2d_bangladesh']);

});

Route::post('user/getprice', ['as' => 'user.getprice', 'uses' => 'FrontPageManagementController@getprice']);



Route::post('user/inquiry', ['as' => 'user.inquiry', 'uses' => 'FrontPageManagementController@inquiry']);



Route::post('find/track', ['as' => 'find.track', 'uses' => 'FrontPageManagementController@trackwithnumber']);



Route::post('contact/submit', ['as' => 'contact.submit', 'uses' => 'FrontPageManagementController@submit']);





Auth::routes();





Route::group(['domain' => '{domain}'], function () {

});





Route::group(['prefix' => 'upx'], function () {



    //************************************ check unique Email ************************************//

    Route::post('uniquecodenumber', ['as' => 'upx.uniquecodenumber', 'uses' => 'DashboardController@checkUniqueCodeNumber']);



    //************************************ Dashboard ************************************//

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);



    //************************************ Update Profile ************************************//

    Route::get('profile', ['as' => 'profile', 'uses' => 'DashboardController@profile']);

    Route::post('profile/update', ['as' => 'profile.store', 'uses' => 'DashboardController@profilestore']);
    Route::post('profile/changepassword', ['as'=> 'profile.changepassword', 'uses'=>'DashboardController@changepassword']);


    //************************************ Agent Management ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('agent', 'AgentsController');

        Route::group(['prefix' => 'agent'], function () {

            Route::post('getall', ['as' => 'agent.getall', 'uses' => 'AgentsController@getall']);

            Route::post('changestatus', ['as' => 'agent.changestatus', 'uses' => 'AgentsController@changestatus']);

            Route::post('getmodel', ['as' => 'agent.getmodel', 'uses' => 'AgentsController@getmodel']);

            Route::post('change_password', ['as' => 'agent.changepassword', 'uses' => 'AgentsController@changePassword']);

            Route::post('update_password', ['as' => 'agent.updatepassword', 'uses' => 'AgentsController@updatePassword']);



        });

    });



    Route::group(['prefix' => 'agent'], function () {

        Route::get('password/{token}', 'PublicAccessController@password');

        Route::post('new/generatepw', ['as' => 'agent.generatepw', 'uses' => 'PublicAccessController@generatepw']);

    });





    //************************************ Zone management ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('zone', 'ZoneController');

        Route::group(['prefix' => 'zone'], function () {

            Route::post('getall', ['as' => 'zone.getall', 'uses' => 'ZoneController@getall']);

            Route::post('getmodel', ['as' => 'zone.getmodel', 'uses' => 'ZoneController@getmodel']);

            Route::post('getcountries', ['as' => 'zone.getcountries', 'uses' => 'ZoneController@getcountries']);

        });

    });





    //************************************ Weight Management ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('weight', 'WeightController');

        Route::group(['prefix' => 'weight'], function () {

            Route::post('getmodel', ['as' => 'weight.getmodel', 'uses' => 'WeightController@getmodel']);

            Route::post('getall', ['as' => 'weight.getall', 'uses' => 'WeightController@getall']);

            Route::post('multidelete', ['as' => 'weight.multidelete', 'uses' => 'WeightController@multidelete']);





        });

    });





    //************************************ Ship Management ************************************//

    Route::group(['middleware' => 'check-permission:admin|agent'], function () {



        Route::group(['prefix' => 'booking'], function () {

            Route::get('/', ['as' => 'booking.index', 'uses' => 'ShipController@index']);

            Route::post('getall', ['as' => 'booking.getall', 'uses' => 'ShipController@getall']);

            Route::post('search', ['as' => 'addressbook.search', 'uses' => 'ShipController@addressbooksearch']);

            Route::post('bookingprostore', ['as' => 'bookingpro.store', 'uses' => 'ShipController@bookingprostore']);

            Route::post('bookingupdate/{id}', ['as' => 'bookingpro.update', 'uses' => 'ShipController@update']);

            Route::post('bookingcopy', ['as' => 'bookingpro.copy', 'uses' => 'ShipController@bookingcopy']);

            Route::get('edit/{id}', ['as' => 'booking.edit', 'uses' => 'ShipController@edit']);

            

            Route::post('openform', ['as' => 'quotation.openform', 'uses' => 'ShipController@quotation_modal']);

            Route::post('quotation', ['as' => 'quotation.calculate', 'uses' => 'ShipController@quotationcalculate']);

            Route::post('timeline', ['as' => 'booking.timeline', 'uses' => 'ShipController@timeline']);

        });

    });





    //************************************ Price Slab Management ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('price', 'PricesSlabController');

        Route::group(['prefix' => 'price'], function () {

            Route::post('table/load', ['as' => 'table.load', 'uses' => 'PricesSlabController@tableload']);

            Route::post('change', ['as' => 'price.change', 'uses' => 'PricesSlabController@change']);

            Route::post('documentchange', ['as' => 'price.documentchange', 'uses' => 'PricesSlabController@documentchange']);





        });

    });





    Route::group(['middleware' => 'check-permission:admin|agent'], function () {

        Route::group(['prefix' => 'price'], function () {

            Route::post('receiver', ['as' => 'price.receiver', 'uses' => 'PricesSlabController@receiver']);

            Route::post('sender', ['as' => 'price.sender', 'uses' => 'PricesSlabController@sender']);

        });

    });





    //************************************ Address Book ************************************//

    Route::group(['middleware' => 'check-permission:admin|agent'], function () {

        Route::resource('addressbook', 'AddressBookController');

        Route::group(['prefix' => 'addressbook'], function () {

            Route::post('getall', ['as' => 'addressbook.getall', 'uses' => 'AddressBookController@getall']);

            Route::post('getmodel', ['as' => 'addressbook.getmodel', 'uses' => 'AddressBookController@getmodel']);
            Route::post('download', ['as' => 'addressbook.download', 'uses' => 'AddressBookController@download']);



        });

    });



    //************************************ Report ************************************//

    Route::group(['middleware' => 'check-permission:admin|agent'], function(){

        Route::get('report', ['as' => 'report.index', 'uses' => 'ReportController@index']);

        Route::post('getall', ['as' => 'report.getall', 'uses' => 'ReportController@getall']);

        Route::get('reportprint', ['as' => 'report.reportprint', 'uses' => 'ReportController@reportprint']);



    });



    //************************************ Booking History ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {



        Route::group(['prefix' => 'bookinghistory'], function () {



            Route::get('/', ['as' => 'bookinghistory.index', 'uses' => 'BookingHistoryController@index']);



            //===============================  List of all booking history ==========================================//

            Route::post('getall', ['as' => 'bookinghistory.getall', 'uses' => 'BookingHistoryController@getall']);

            Route::post('getmodel', ['as' => 'bookinghistory.getmodel', 'uses' => 'BookingHistoryController@getmodel']);



            Route::post('changestatus', ['as' => 'booking.changestatus', 'uses' => 'BookingHistoryController@changestatus']);

            Route::post('changestatusmodal', ['as' => 'booking.changestatusmodal', 'uses' => 'BookingHistoryController@changestatusmodal']);



            Route::post('notifystatus', ['as' => 'booking.notifystatus', 'uses' => 'BookingHistoryController@notifystatus']);

            Route::post('changemultiplestatus', ['as' => 'booking.changemultiplestatus', 'uses' => 'BookingHistoryController@changemultiplestatus']);

            Route::post('updatepaymentstatus', ['as' => 'booking.updatepaymentstatus', 'uses' => 'BookingHistoryController@updatepaymentstatus']);





            Route::post('changemultipletrack', ['as' => 'booking.changemultipletrack', 'uses' => 'BookingHistoryController@changemultipletrack']);





            Route::post('updatetrackstatus', ['as' => 'booking.updatetrackstatus', 'uses' => 'BookingHistoryController@updatetrackstatus']);



            Route::post('uploaddocimage', ['as' => 'bookinghistory.uploaddocimage', 'uses' => 'BookingHistoryController@uploaddocimage']);

            Route::post('sendinvoicemodel', ['as' => 'bookinghistory.sendinvoicemodel', 'uses' => 'BookingHistoryController@sendinvoicemodel']);

            Route::post('sendinvoicemail', ['as' => 'bookinghistory.sendinvoicemail', 'uses' => 'BookingHistoryController@sendinvoicemail']);







        });

    });





    Route::group(['middleware' => 'check-permission:admin|agent'], function () {

        Route::group(['prefix' => 'bookinghistory'], function () {



            Route::post('/cancel', ['as' => 'bookinghistory.cancel', 'uses' => 'BookingHistoryController@cancelBooking']);

            Route::get('/show/{id}', ['as' => 'bookinghistory.show', 'uses' => 'BookingHistoryController@show']);



            Route::post('getstickyprice', ['as' => 'booking.getstickyprice', 'uses' => 'BookingHistoryController@getstickyprice']);



            //==========================================  Payment history =======================================//

            Route::post('checkhistory', ['as' => 'bookinghistory.checkhistory', 'uses' => 'BookingHistoryController@checkhistory']);



            Route::any('download', ['as' => 'booking.download', 'uses' => 'BookingHistoryController@download']);



            //================================  Download invoice ========================================================//

            Route::get('invoice/view/{id}', ['as' => 'invoice.view', 'uses' => 'BookingHistoryController@invoiceview']);

            Route::get('invoice/download/{id}', ['as' => 'invoice.download', 'uses' => 'BookingHistoryController@invoice']);



            Route::get('invoice/open/{id}', ['as' => 'invoice.open', 'uses' => 'BookingHistoryController@open']);



            Route::get('awb/view/{id}/{box}', ['as' => 'awb.view', 'uses' => 'BookingHistoryController@awbview']);

            Route::get('awb/download/{id}/{box}', ['as' => 'awb.download', 'uses' => 'BookingHistoryController@awb']);

            Route::get('proforma/view/{id}/{box}', ['as' => 'proforma.view', 'uses' => 'BookingHistoryController@proformaview']);

            Route::get('agentinvoice/view/{id}', ['as' => 'agentinvoice.view', 'uses' => 'BookingHistoryController@agentinvoiceview']);

        });

    });





    //************************************ Booking History Agent ************************************//

    Route::group(['middleware' => 'check-permission:agent'], function () {

        Route::resource('agentbookinghistory', 'BookingAgentHistoryController');

        Route::group(['prefix' => 'agentbookinghistory'], function () {

            Route::post('getall', ['as' => 'agentbook.getall', 'uses' => 'BookingAgentHistoryController@getall']);

            Route::post('changemultiplestatus', ['as' => 'agentbookinghistory.changemultiplestatus', 'uses' => 'BookingAgentHistoryController@changemultiplestatus']);

            Route::post('payamount', ['as' => 'agentbookinghistory.payamount', 'uses' => 'BookingAgentHistoryController@payamount']);

            Route::post('balancefromwallet', ['as' => 'agentbookinghistory.balancefromwallet', 'uses' => 'BookingAgentHistoryController@balancefromwallet']);

            Route::post('walletpayment', ['as' => 'agentbookinghistory.walletpayment', 'uses' => 'BookingAgentHistoryController@walletpayment']);



        });

    });





    //************************************ Payment History ************************************//

    Route::group(['middleware' => 'check-permission:admin|agent'], function () {

        Route::resource('paymenthistory', 'PaymentHistoryController');

        Route::group(['prefix' => 'paymenthistory'], function () {

            Route::post('getall', ['as' => 'paymenthistory.getall', 'uses' => 'PaymentHistoryController@getall']);

            Route::post('getpaymentdetail', ['as' => 'paymenthistory.getpaymentdetail', 'uses' => 'PaymentHistoryController@getpaymentdetail']);

            Route::post('readmultiple', ['as' => 'paymenthistory.readmultiple', 'uses' => 'PaymentHistoryController@readmultiple']);



        });

    });





    //************************************ Wallet ************************************//

    Route::group(['middleware' => 'check-permission:admin|agent'], function () {

        Route::resource('wallet', 'WalletController');

        Route::group(['prefix' => 'wallet'], function () {

            Route::post('getall', ['as' => 'wallet.getall', 'uses' => 'WalletController@getall']);

            Route::post('add', ['as' => 'wallet.add', 'uses' => 'WalletController@add']);



        });

    });





    //************************************ Contact Us ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('contact', 'ContactUsController');

        Route::group(['prefix' => 'contact'], function () {

            Route::post('getall', ['as' => 'contact.getall', 'uses' => 'ContactUsController@getall']);

        });

    });





    //************************************ Setting Tab ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('setting', 'SettingController');

    });



    Route::get('payment', 'BookingAgentHistoryController@payment');



    //************************************ Inquiry ************************************//

    Route::group(['middleware' => 'check-permission:admin'], function () {

        Route::resource('inquiry', 'InquiryController');

        Route::group(['prefix' => 'inquiry'], function () {

            Route::post('getall', ['as' => 'inquiry.getall', 'uses' => 'InquiryController@getall']);

            Route::post('getmodel', ['as' => 'inquiry.getmodel', 'uses' => 'InquiryController@getdetails']);

        });

    });

});





