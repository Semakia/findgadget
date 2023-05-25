<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'ClientController@home');

Route::get('/home', 'ClientController@home');

Route::get('/shop', 'ClientController@shop');

Route::get('/shopByCategory/{category}', 'ClientController@shopByCategory'); 

Route::get('/shopByName', 'ClientController@ShopByAZ');

Route::get('/shopByAlphabet', 'ClientController@ShopByZA');

Route::get('/shopByPH', 'ClientController@ShopByPriceAsc');

Route::get('/shopByPL', 'ClientController@shopByPriceDesc');

Route::get('/newgadgets','ClientController@shopByNew');

Route::get('/cart', 'ClientController@cart');

Route::get('/add_to_cart/{id}', 'ClientController@add_to_cart');

Route::post('/modifier_qty/{id}', 'ClientController@edit_panier');

Route::get('/remove_product/{id}', 'ClientController@remove_product');

Route::get('/about', 'ClientController@about');

Route::get('/client_login', 'ClientController@client_login');

Route::get('/signup', 'ClientController@signup');

Route::get('/checkout', 'ClientController@paiement');

Route::get('/ordertracking', 'ClientController@ordertracking');
Route::get('/contact', 'ClientController@contact');

Route::get('/voir_pdf/{id}', 'ClientController@view_pdf');

Route::get('/checkout', 'ClientController@checkout');

Route::post('/myprofile', 'ClientController@save_profile');

Route::post('/to_pay', 'ClientController@to_pay');

Route::get('/account' , 'ClientController@accountpage');

Route::get('/admin-panel', 'AdminController@dashboard');

Route::get('/userslist', 'AdminController@userstable');

Route::get('/gadgetslist', 'AdminController@gadgetstable');

Route::get('/profile', 'AdminController@account');

Route::get('/addcategory', 'CategoryController@addcategory');

Route::get('/edit_category/{id}', 'CategoryController@edit_category');

Route::post('/editcategory', 'CategoryController@editcategory');

Route::post('savecategory', 'CategoryController@savecategory');

Route::get('/deletecategory/{id}', 'CategoryController@deletecategory');

Route::post('savegadget', 'GadgetController@savegadget');

Route::get('/addgadget', 'GadgetController@addgadget');

Route::get('/edit_gadget/{id}', 'GadgetController@edit_gadget');

Route::post('/editgadget', 'GadgetController@editgadget');

Route::get('/deletegadget/{id}', 'GadgetController@deletegadget');

Route::get('/activer_gadget/{id}', 'GadgetController@activer_gadget');

Route::get('/desactiver_gadget/{id}', 'GadgetController@desactiver_gadget');


Route::get('/addslider', 'SliderController@addslider');

Route::get('/sliders', 'SliderController@sliders');

Route::post('saveslider', 'SliderController@saveslider');

Route::get('/edit_slider/{id}' ,'SliderController@edit_slider');

Route::post('/editslider' , 'SliderController@editslider' );

Route::get('/deleteslider/{id}' ,'SliderController@deleteslider');

Route::get('/orderslist', 'OrderController@orderslist');

Route::get('/activer_slider/{id}', 'SliderController@activer_slider');

Route::get('/desactiver_slider/{id}', 'SliderController@desactiver_slider');

Route::get('/voir_pdf/{id}', 'PdfController@view_pdf');

Route::get('/login', 'ClientController@client_login');

Route::post('/create_account', 'ClientController@create_account');

Route::post('/connect_account', 'ClientController@connect_acount');

Route::get('/logout',  'ClientController@logout');

Route::get('/admin-logout',  'AdminController@logout');

Route::get('/admin', 'AdminController@adminlogin');

Route::get('/admin-signup', 'AdminController@adminsignup');

Route::post('/admin-create', 'AdminController@create_account');

Route::post('/admin_connect', 'AdminController@admin_connect');

Route::get('/thankyoupage', 'ClientController@thankyou');

Route::get('/add_to_wishlist/{id}', 'ClientController@add_to_whish');


//Route::get('/admin', 'HomeController@index')->name('home');
