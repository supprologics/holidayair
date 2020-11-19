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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function(){
    //tours route,country,area
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('countries','CountriesController');
    Route::resource('categories','CategoriesController');
    Route::resource('areas','AreasController');
    Route::resource('users','UsersController')->middleware(['sysAdmin']);
    Route::resource('tours','ToursController');
    Route::resource('itineraries','ItinerariesController');
    Route::get('setitineraries/{tour}','ItinerariesController@setitineraries')->name('setitineraries');
    Route::get('newitinerary/{tour}','ItinerariesController@newitinerary')->name('newitinerary');

    #itinerary ajax routes
    Route::post('additinerary','ItinerariesController@additinerary')->name('additinerary');
    Route::post('edititinerary','ItinerariesController@edititinerary')->name('edititinerary');
    Route::post('deleteitinerary','ItinerariesController@deleteitinerary')->name('deleteitinerary');

    Route::get('setinculdes/{tour}','Txt_detailsController@setinculdes')->name('setinculdes');
    Route::get('setexcludes/{tour}','Txt_detailsController@setexcludes')->name('setexcludes');
    Route::get('setconditions/{tour}','Txt_detailsController@setconditions')->name('setconditions');
    Route::get('setcancellations/{tour}','Txt_detailsController@setcancellations')->name('setcancellations');
    Route::get('sethints/{tour}','Txt_detailsController@sethints')->name('sethints');

    #txt ajax routes
    Route::post('addtxt_detail','Txt_detailsController@addtxt_detail')->name('addtxt_detail');
    Route::post('edittxt_detail','Txt_detailsController@edittxt_detail')->name('edittxt_detail');
    Route::post('deletetxt_detail','Txt_detailsController@deletetxt_detail')->name('deletetxt_detail');

    Route::resource('gallery','GalleryController');
    Route::get('galleryview/{tour}','GalleryController@galleryview')->name('galleryview');


    Route::get('dropzone', 'GalleryController@index');
    Route::post('dropzone/upload', 'GalleryController@upload')->name('dropzone.upload');
    Route::get('dropzone/fetch', 'GalleryController@fetch')->name('dropzone.fetch');
    Route::get('dropzone/delete', 'GalleryController@delete')->name('dropzone.delete');
    

    Route::get('route/{tour}','RoutesController@index')->name('route.index');
    #txt ajax routes
    Route::post('addroute','RoutesController@addroute')->name('addroute');
    Route::post('editroute','RoutesController@editroute')->name('editroute');
    Route::post('deleteroute','RoutesController@deleteroute')->name('deleteroute');
    #publish
    Route::get('publish/{tour}','ToursController@publish')->name('tours.publish');
    Route::get('active/{tour}','ToursController@active')->name('tours.active');
    Route::get('inactive/{tour}','ToursController@inactive')->name('tours.inactive');


    //blog routes
    Route::resource('blogcategories','BlogCategoriesController');
    Route::resource('blogs','BlogsController');

    Route::get('bloggalleryview/{blog}','GalleryController@bloggalleryview')->name('bloggalleryview');


    //flight
    Route::resource('airlines','AirlinesController');
    Route::resource('flightticketcategories','FlightTicketCategoriesController');
    Route::resource('tickets','TicketsController');
    Route::resource('deals','DealsController');
    #flight plan ajax routes
    Route::get('setflightplan/{deal}','FlightPlansController@setflightplan')->name('setflightplan');
    Route::post('addflightplan','FlightPlansController@addflightplan')->name('addflightplan');
    Route::post('editflightplan','FlightPlansController@editflightplan')->name('editflightplan');
    Route::post('deleteflightplan','FlightPlansController@deleteflightplan')->name('deleteflightplan');
    #deal rules ajax routes
    Route::get('setdealrule/{deal}','DealRulesController@setdealrule')->name('setdealrule');
    Route::post('adddealrule','DealRulesController@adddealrule')->name('adddealrule');
    Route::post('editdealrule','DealRulesController@editdealrule')->name('editdealrule');
    Route::post('deletedealrule','DealRulesController@deletedealrule')->name('deletedealrule');

    Route::get('dealgalleryview/{deal}','GalleryController@dealgalleryview')->name('dealgalleryview');

});
