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
Route::get('/insertPlaces', 'InsertSqlController@insertPlaces');

Route::get('/', 'HomepageController@displayHomepage');


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

Route::post('/confirmInventory', 'InventoryController@confirmItem');

Route::post('/confirmDiscount', 'DiscountController@confirmDiscount');

Route::post('/confirmRegister', 'RegisterController@confirmRegister');

Route::post('/addItemDefect', 'ItemDefectController@insert');

Route::post('/editItemDefect', 'ItemDefectController@update');

Route::post('/deleteItemDefect', 'ItemDefectController@delete');

Route::post('/updateReward', 'DiscountController@updateReward');

Route::post('/updateShipment', 'ShipmentController@updateShipment');

Route::post('/updateShipmentFee', 'ShipmentController@updateShipmentFee');

Route::post('/insertAccount', 'RegisterController@insertRegister');

Route::post('/loginAccount', 'LoginController@login');

Route::post('/addContainer', 'OrderedController@addContainer');

Route::post('/editContainer', 'OrderedController@editContainer');

Route::post('/addItemToContainer', 'ContainerController@addItemToContainer');

Route::post('/editItemToContainer', 'ContainerController@editItemToContainer');

Route::post('/addUnexpectedItem', 'ContainerController@addUnexpectedItem');

Route::post('/itemMoveRequest', 'MovingController@itemMoveRequest');

Route::post('/approveMovingOfItems', 'MovingController@approveMovingOfItems');

Route::post('/approveAllMovingOfItems', 'MovingController@approveAllMovingOfItems');

Route::post('/addBiddingEvent', 'BiddingEventController@addBiddingEvent');

Route::post('/itemCheck', 'itemCheckingController@itemCheck');

Route::post('/submitCheckout', 'CustomerCheckoutController@insert');

Route::post('/postEventProcessItems', 'PostEventNoBidItemsController@postEventProcessItems');

Route::get('/logout', 'LoginController@logout');


//GET
Route::get('/supplier', 'SupplierController@manageSupplier');

Route::get('/category', 'CategoryController@manageCategory');

Route::get('/subcategory', 'SubCategoryController@manageSubcategory');

Route::get('/accountType', 'AccountTypeController@manageAccountType');

Route::get('/item', 'ItemController@manageItem');

Route::get('/shipment', 'ShipmentController@manageShipment');

Route::get('/registerContainer', 'RegisterContainerController@manageRegContainer');

Route::get('/places', 'ProvinceController@manageProvince');

Route::get('/inventory', 'PageController@inventory');

Route::get('/discount', 'DiscountController@manageDiscount');

Route::get('/itemContainer', 'ContainerController@viewContainer');

Route::get('/postEventNoBidItems', 'PageController@postEventNoBidItems');

Route::get('/sampleGraph', 'GraphController@salesGraph');

//Route::get('/itemChecking', 'ItemCheckingController@viewItems');
//Route::get('/shipment', 'PageController@shipment');

//AJAX
Route::get('/cityOptions', 'AngularOutput@cityOptions');

Route::get('/subcatOptions', 'AngularOutput@subcatOptions');

Route::get('/status_Supplier', 'StatusUpdate@Supplier');

Route::get('/status_Item', 'StatusUpdate@Item');

Route::get('/status_AccountType', 'StatusUpdate@AccountType');

Route::get('/status_Category', 'StatusUpdate@Category');

Route::get('/status_SubCategory', 'StatusUpdate@SubCategory');

Route::get('/status_Warehouse', 'StatusUpdate@Warehouse');

Route::get('/status_ItemDefect', 'StatusUpdate@ItemDefect');

Route::get('/warehouse', 'WarehouseController@manageWarehouse');

Route::get('/category', 'CategoryController@manageCategory');

Route::get('/bidEvent', 'PageController@bidEvent');

Route::get('/register', 'PageController@register');

Route::get('/bidItems', 'BiddingEventController@viewEventItems');

//Route::get('/cart', 'PageController@cart');

Route::get('/admin', 'PageController@admin');


//Angular AngularOutput
Route::get('/provinces', 'AngularOutput@provinces');

Route::get('/accounttypes', 'AngularOutput@accounttypes');

Route::get('/suppliers', 'AngularOutput@suppliers');

Route::get('/itemModels', 'AngularOutput@itemModels');

Route::get('/itemModelsOfSubcat', 'AngularOutput@itemModelsOfSubcat');

Route::get('/warehouses', 'AngularOutput@warehouses');

Route::get('/itemsInContainer', 'AngularOutput@itemsInContainer');

Route::get('/containers', 'AngularOutput@containers');

Route::get('/allContainers', 'AngularOutput@allContainers');

Route::get('/singleItem', 'AngularOutput@singleItem');

Route::get('/itemsInbound', 'AngularOutput@itemsInbound');

Route::get('/itemsMissing', 'AngularOutput@itemsMissing');

Route::get('/unexpectedItems', 'AngularOutput@unexpectedItems');

Route::get('/itemsChecking', 'AngularOutput@itemsChecking');

Route::get('/itemsChecked', 'AngularOutput@itemsChecked');

Route::get('/itemsInventory', 'AngularOutput@itemsInventory');

Route::get('/itemsMoveSelect', 'AngularOutput@itemsMoveSelect');

Route::get('/itemsMoveApprovalRequests', 'AngularOutput@itemsMoveApprovalRequests');

Route::get('/itemmodelsInventory', 'AngularOutput@itemmodelsInventory');

Route::get('/itemsOfModelInventory', 'AngularOutput@itemsOfModelInventory');

Route::get('/categories', 'AngularOutput@categories');

Route::get('/currentTime', 'AngularOutput@currentTime');

Route::get('/itemModelsWithItems', 'AngularOutput@itemModelsWithItems');

Route::get('/colors', 'AngularOutput@colors');

Route::get('/accountsList', 'AngularOutput@accountsList');

Route::get('/itemModelsOfSubcat', 'AngularOutput@itemModelsOfSubcat');

Route::get('/salesGraph', 'AngularOutput@salesGraph');

//

Route::get('/eventList', 'BiddingEventController@eventList');

Route::get('/eventDetails', 'BiddingEventController@eventDetails');

Route::get('/getEventItems', 'BiddingEventController@getEventItems');

Route::get('/getOngoingEvent', 'CustomerDashboardController@getOngoingEvent');

Route::get('/deliveryRequests', 'PrepareCheckoutController@deliveryRequests');

Route::get('/pickupRequests', 'PrepareCheckoutController@pickupRequests');

Route::get('/unpaidRequests', 'PaymentCheckoutController@unpaidRequests');

Route::get('/readyForCheckoutDelivery', 'ItemOutboundController@readyForCheckoutDelivery');

Route::get('/readyForCheckoutPickup', 'ItemOutboundController@readyForCheckoutPickup');

Route::get('/itemsWon', 'CustomerCheckoutController@itemsWon');

Route::get('/shipmentFee', 'AngularOutput@shipmentFee');

Route::get('/postEventsList', 'PostEventNoBidItemsController@postEventsList');


//Angular Input

Route::get('/disposeItem', 'AngularInput@disposeItem');

Route::get('/cancelDisposeItem', 'AngularInput@cancelDisposeItem');

Route::get('/confirmDispose', 'AngularInput@confirmDispose');

Route::get('/approveAccount', 'AngularInput@approveAccount');

Route::get('/deleteOrderedItem', 'AngularInput@deleteOrderedItem');

//

Route::get('/addItemToAuction', 'BiddingEventController@addItemToAuction');

Route::get('/itemsToAddToEvent', 'BiddingEventController@itemsToAddToEvent');

Route::get('/removeFromEvent', 'BiddingEventController@removeFromEvent');

Route::get('/itemsOfSubcategory', 'CustomerBiddingEventController@itemsOfSubcategory');

Route::get('/hasJoinedThisEvent', 'CustomerBiddingEventController@hasJoinedThisEvent');

Route::get('/getHighestBid', 'CustomerBiddingEventController@getHighestBid');

Route::get('/getBidHistory', 'CustomerBiddingEventController@getBidHistory');

Route::get('/approveCheckoutRequest', 'PrepareCheckoutController@approveCheckoutRequest');

Route::get('/approvePayment', 'PaymentCheckoutController@approvePayment');

Route::get('/approveOutbound', 'ItemOutboundController@approveOutbound');

Route::get('/containerArrived', 'ContainerController@containerArrived');

Route::get('/itemMissing', 'ItemInboundController@itemMissing');

Route::get('/itemDelivered', 'ItemInboundController@itemDelivered');

Route::get('/itemFound', 'ItemInboundController@itemFound');


Route::post('/edit', 'ShipmentController@editShipment');

Route::get('/add', 'ShipmentController@addShipment');

Route::get('/accounts', 'PageController@manageAccounts');

Route::get('/tryLoad', 'SupplierController@tryLoad');

Route::get('/joinEvent', 'CustomerBiddingEventController@joinEvent');

Route::get('/bidItem', 'CustomerBiddingEventController@bidItem');


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


// new mainte
Route::get('/dashboard', 'PageController@dashboard');

Route::get('/announcements', 'PageController@announcements');

Route::get('/discount1', 'PageController@discount1');

//Route::get('/shipment1', 'PageController@shipment1');

Route::get('/warehouse1', 'PageController@warehouse1');

//Route::get('/inventory1', 'PageController@inventory1');

Route::get('/biddingEvent', 'BiddingEventController@view');

Route::get('/orderedItem', 'PageController@orderedItem');

Route::get('/itemInbound', 'ItemInboundController@view');

Route::get('/movingOfItems', 'PageController@movingItems');

Route::get('/approvalOfMovingItems', 'PageController@approvalOfMovingItems');

Route::get('/accountApproval', 'PageController@accountApproval');

Route::get('/itemPullouts', 'PageController@itemPullouts');

Route::get('/userProfile', 'PageController@userProfile');

Route::get('/bidHistory', 'PageController@bidHistory');

Route::get('/itemDefects', 'ItemDefectController@view');

Route::get('/deliveryStatus', 'PageController@deliveryStatus');

Route::get('/listOfBidders', 'PageController@listOfBidders');

Route::get('/itemChecking', 'PageController@itemChecking');

Route::get('/itemOutbound', 'PageController@itemOutbound');

Route::get('/prepareCheckout', 'PageController@prepareCheckout');

Route::get('/paymentCheckout', 'PageController@paymentCheckout');

Route::get('/expectedItemPercent', 'PageController@expectedItemPercent');

Route::get('/reportPage', 'PageController@reportPage');



//login restriction
Route::group(['middleware' => 'customer'], function () {
    Route::get('/eventsList', 'PageController@eventsList');

	Route::get('/items', 'CustomerBiddingEventController@eventItems');

	Route::get('/auction', 'CustomerBiddingEventController@auction');

	Route::get('/cart', 'CustomerCartController@view');

	Route::get('/bidList', 'CustomerBiddingEventController@bidList');

	Route::get('checkout', 'CustomerCheckoutController@view');
});


Route::get('/sad', function(){
	return view('customer.bidList');
});

Route::get('/angulardt', function(){
	return view('admin1.angulardt');
});