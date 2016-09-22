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

Route::post('/addProblemType', 'ProblemTypeController@insert');

Route::post('/editProblemType', 'ProblemTypeController@update');

Route::post('/deleteProblemType', 'ProblemTypeController@delete');

Route::post('/updateReward', 'DiscountController@updateReward');

Route::post('/updateShipment', 'ShipmentController@updateShipment');

Route::post('/updateShipmentFee', 'ShipmentController@updateShipmentFee');

Route::post('/insertAccount', 'RegisterController@insertRegister');

Route::post('/loginAccount', 'LoginController@login');

Route::post('/addContainer', 'OrderedController@addContainer');

Route::post('/editContainer', 'OrderedController@editContainer');

Route::post('/addItemToContainer', 'ContainerController@addItemToContainer');

Route::post('/editItemToContainer', 'ContainerController@editItemToContainer');

Route::post('/itemInbound', 'ItemInboundController@itemInbound');

Route::post('/removeUnexpectedItems', 'ItemInboundController@removeUnexpectedItems');

Route::post('/addUnexpectedItem', 'ContainerController@addUnexpectedItem');

Route::post('/itemMoveRequest', 'MovingController@itemMoveRequest');

Route::post('/approveMovingOfItems', 'MovingController@approveMovingOfItems');

Route::post('/approveAllMovingOfItems', 'MovingController@approveAllMovingOfItems');

Route::post('/addBiddingEvent', 'BiddingEventController@addBiddingEvent');

Route::post('/editBiddingEvent', 'BiddingEventController@editBiddingEvent');

Route::post('/itemCheck', 'itemCheckingController@itemCheck');

Route::post('/submitCheckout', 'CustomerCheckoutController@insert');

Route::post('/postEventProcessItems', 'PostEventNoBidItemsController@postEventProcessItems');

Route::post('/makeAnnouncement', 'AnnouncementController@makeAnnouncement');

Route::post('/sendMessageAdmin', 'MessageController@send');

Route::post('/sendMessageCustomer', 'CustomerMessageController@send');

Route::post('/sendMessageCustomer', 'CustomerMessageController@send');

Route::post('/sendProofPayment', 'ProofPaymentController@insert');

Route::post('/verifyDelivery', 'VerifyDeliveryController@verifyDelivery');

Route::get('/salesGraphReg', 'GraphController@salesGraphReg');

Route::any('/salesGraph', 'GraphController@salesGraph');

Route::any('/customer', 'GraphController@customer');

Route::get('/logout', 'LoginController@logout');

Route::get('pdfFile', 'CustomerCheckoutController@index');

Route::get('/customerStatus', 'CustomerStatusQueryController@Customerstatus');

//Route::get('/mostBidQuery', 'CustomerStatusQueryController@mostBids');

Route::get('/DeliveryPlaces', 'CustomerStatusQueryController@DeliveryPlaces');

Route::get('/SuppliersItems', 'CustomerStatusQueryController@SuppliersItems');

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

Route::get('/salesGraphCat', 'GraphController@salesGraphCat');

Route::any('/mostBid', 'GraphController@mostBid');

Route::get('/mostBidItem', 'GraphController@mostBidItem');

Route::get('/mostBidCat', 'GraphController@mostBidCat');

Route::get('/customerGraph', 'GraphController@customerGraph');

Route::get('/customerGraphReg', 'GraphController@customerGraphReg');

Route::get('/customerGraphArea', 'GraphController@customerGraphArea');

Route::get('/qcustomerStatus', 'PageController@qcustomerStatus');

Route::get('/deliveryList', 'PageController@deliveryList');

Route::get('/supplierStatus', 'PageController@supplierStatus');



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

Route::get('/status_ProblemType', 'StatusUpdate@ProblemType');

Route::get('/warehouse', 'WarehouseController@manageWarehouse');

Route::get('/category', 'CategoryController@manageCategory');

Route::get('/bidEvent', 'PageController@bidEvent');

Route::get('/register', 'PageController@register');

Route::get('/bidItems', 'BiddingEventController@viewEventItems');

//Route::get('/cart', 'PageController@cart');

Route::get('/admin', 'PageController@admin');

Route::get('/tryLang', 'AngularOutput@customerDiscount');


//Mainte data

Route::get('/mainte_Warehouses', 'AngularOutput@mainte_Warehouses');

Route::get('/mainte_Suppliers', 'AngularOutput@mainte_Suppliers');

Route::get('/mainte_Categories', 'AngularOutput@mainte_Categories');

Route::get('/mainte_SubcatOptions', 'AngularOutput@mainte_SubcatOptions');

Route::get('/mainte_ItemModelsOfSubcat', 'AngularOutput@mainte_ItemModelsOfSubcat');

Route::get('/mainte_ProblemTypesList', 'AngularOutput@mainte_ProblemTypesList');


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

Route::get('/containersWithPendingItems', 'AngularOutput@containersWithPendingItems');

Route::get('/containersWithUnexpectedItems', 'AngularOutput@containersWithUnexpectedItems');

Route::get('/containersWithMissing', 'AngularOutput@containersWithMissing');

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

Route::get('/problemTypesList', 'AngularOutput@problemTypesList');

Route::get('/accountInfo', 'AngularOutput@accountInfo');

Route::get('/deliverList', 'AngularOutput@deliverList');

Route::get('/customerStat', 'AngularOutput@customerStat');

Route::get('/supplierStat', 'AngularOutput@supplierStat');

//Route::get('/salesGraph', 'AngularOutput@salesGraph');

//

Route::get('/eventDetails', 'BiddingEventController@eventDetails');

Route::get('/getEventItems', 'BiddingEventController@getEventItems');

Route::get('/getOngoingEvent', 'CustomerDashboardController@getOngoingEvent');

Route::get('/getUpcomingEvent', 'CustomerDashboardController@getUpcomingEvent');

Route::get('/deliveryRequests', 'PrepareCheckoutController@deliveryRequests');

Route::get('/pickupRequests', 'PrepareCheckoutController@pickupRequests');

Route::get('/unpaidRequests', 'PaymentCheckoutController@unpaidRequests');

Route::get('/readyForCheckoutDelivery', 'ItemOutboundController@readyForCheckoutDelivery');

Route::get('/readyForCheckoutPickup', 'ItemOutboundController@readyForCheckoutPickup');

Route::get('/itemsWon', 'CustomerCheckoutController@itemsWon');

Route::get('/checkoutList', 'CustomerCheckoutController@checkoutList');

Route::get('/shipmentFee', 'AngularOutput@shipmentFee');

Route::get('/postEventsList', 'PostEventNoBidItemsController@postEventsList');

Route::get('/latestAnnouncement', 'AnnouncementController@latestAnnouncement');

Route::get('/threadList', 'MessageController@threadList');

Route::get('/customerThreadList', 'CustomerMessageController@threadList');

Route::get('/getPendingCheckoutRequests', 'ProofPaymentController@getPendingCheckoutRequests');

Route::get('/getPendingCheckoutRequestsWithProof', 'ProofPaymentController@getPendingCheckoutRequestsWithProof');


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

Route::get('/allItemsInEvent', 'CustomerBiddingEventController@allItemsInEvent');

Route::get('/itemsOfSubcategory', 'CustomerBiddingEventController@itemsOfSubcategory');

Route::get('/hasJoinedThisEvent', 'CustomerBiddingEventController@hasJoinedThisEvent');

Route::get('/getHighestBid', 'CustomerBiddingEventController@getHighestBid');

Route::get('/getBidHistory', 'CustomerBiddingEventController@getBidHistory');

Route::get('/approveCheckoutRequest', 'PrepareCheckoutController@approveCheckoutRequest');

Route::get('/approvePayment', 'PaymentCheckoutController@approvePayment');

Route::get('/approveOutbound', 'ItemOutboundController@approveOutbound');

Route::get('/containerArrived', 'ContainerController@containerArrived');

Route::get('/itemFound', 'ItemInboundController@itemFound');

Route::get('/itemMissingRemove', 'ItemInboundController@itemMissingRemove');

Route::get('/replyMessageAdmin', 'MessageController@reply');

Route::get('/replyMessageCustomer', 'CustomerMessageController@reply');

Route::get('/removeProof', 'ProofPaymentController@delete');


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

Route::get('/messages', 'PageController@messages');



Route::get('/problemTypes', 'ProblemTypeController@view');

Route::get('/proofPayment', 'PageController@proofPayment');

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

Route::get('/bidHistory', 'PageController@bidHistory');

Route::get('/defects', 'ItemDefectController@view');

Route::get('/listOfBidders', 'PageController@listOfBidders');

Route::get('/itemChecking', 'PageController@itemChecking');

Route::get('/itemOutbound', 'PageController@itemOutbound');

Route::get('/prepareCheckout', 'PageController@prepareCheckout');

Route::get('/paymentCheckout', 'PageController@paymentCheckout');

Route::get('/expectedItemPercent', 'PageController@expectedItemPercent');

Route::get('/reportPage', 'PageController@reportPage');

Route::get('/customerInformation', 'PageController@reportPage');

Route::get('/deliveryStatus', 'PageController@deliveryStatusCust');

Route::get('/login', 'PageController@loginPage');

Route::get('/changeDetails', 'PageController@companyDetails');

Route::resource('/confirmDetails', 'adminDashboardController@addDetails');

Route::get('/latestCompanyDetails', 'adminDashboardController@latestCompanyDetails');





//login restriction
Route::group(['middleware' => 'customer'], function () {
    Route::get('/eventsList', 'PageController@eventsList');

	Route::get('/items', 'CustomerBiddingEventController@eventItems');

	Route::get('/auction', 'CustomerBiddingEventController@auction');

	Route::get('/cart', 'CustomerCartController@view');

	Route::get('/bidList', 'CustomerBiddingEventController@bidList');

	Route::get('checkout', 'CustomerCheckoutController@view');

	Route::get('/inbox', 'PageController@inbox');

		Route::get('/userProfile', 'PageController@userProfile');
});


Route::get('/sad', function(){
	return view('customer.bidList');
});

Route::get('/angulardt', function(){
	return view('admin1.angulardt');
});