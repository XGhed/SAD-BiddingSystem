<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('homepage');
});


//POST
Route::post('/confirmSupplier', 'SupplierController@confirmSupplier');

Route::post('/confirmCategory', 'CategoryController@confirmCategory');

Route::post('/confirmSubCategory', 'SubCategoryController@confirmSubCategory');

Route::post('/confirmDelivery3rdParty', 'Delivery3rdPartyController@confirmDelivery3rdParty');

Route::post('/confirmAccountType', 'AccountTypeController@confirmAccountType');

Route::post('/confirmKeyword', 'KeywordController@confirmKeyword');

Route::post('/confirmItem', 'ItemController@confirmItem');

Route::post('/confirmProvince', 'ProvinceController@confirmProvince');

Route::post('/confirmCity', 'CityController@confirmCity');

Route::post('/confirmShipment', 'ShipmentController@confirmShipment');

Route::post('/confirmWarehouse', 'WarehouseController@confirmWarehouse');


//GET
Route::get('/supplier', 'SupplierController@manageSupplier');

Route::get('/category', 'CategoryController@manageCategory');

Route::get('/subcategory', 'SubCategoryController@manageSubcategory');

Route::get('/accountType', 'AccountTypeController@manageAccountType');

Route::get('/keyword', 'KeywordController@ManageKeyword');

Route::get('/item', 'ItemController@manageItem');

Route::get('/shipment', 'ShipmentController@manageShipment');

Route::get('/registerContainer', 'RegisterContainerController@manageRegContainer');

Route::get('/places', 'ProvinceController@manageProvince');

Route::get('/registerItem', 'RegisterItemController@manageRegItem');
//Route::get('/shipment', 'PageController@shipment');

//AJAX
Route::get('/cityOptions', 'DropDowns@cityOptions');

Route::get('/subcatOptions', 'DropDowns@subcatOptions');

Route::get('/status_Supplier', 'StatusUpdate@Supplier');

Route::get('/status_Item', 'StatusUpdate@Item');

Route::get('/status_AccountType', 'StatusUpdate@AccountType');

Route::get('/status_Category', 'StatusUpdate@Category');

Route::get('/status_SubCategory', 'StatusUpdate@SubCategory');

Route::get('/status_Warehouse', 'StatusUpdate@Warehouse');

Route::get('/registration', 'PageController@registration');

Route::get('/paymentMethod', 'PageController@paymentMethod');


Route::get('/category', 'CategoryController@manageCategory');

Route::get('/bidItems', 'PageController@bidItems');



Route::post('/addMember', 'PageController@addMember');

Route::get('/insertMember', 'PageController@insertMember');

Route::get('/home', 'PageController@homepage');

Route::get('/deliveryCompany', 'PageController@deliveryCompany');

Route::get('/bidEvent', 'PageController@bidEvent');

Route::get('/warehouse', 'WarehouseController@manageWarehouse');

Route::post('/edit', 'ShipmentController@editShipment');

Route::get('/add', 'ShipmentController@addShipment');

Route::get('/accounts', 'PageController@manageAccounts');

Route::get('/tryLoad', 'SupplierController@tryLoad');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
