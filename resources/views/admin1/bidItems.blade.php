@extends('admin1.mainteParent')

@section('content')
  <div class="ui grid" ng-app="myApp" ng-controller="myController" ng-init="eventID = {{$eventID}}">
    <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="item" href="/itemInbound">
          Item Inbound
        </a>
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class=" item" href="/inventory">
          Inventory
        </a>
        <a class="active item" href="/biddingEvent">
          Bidding Event
        </a>
    </div>
  </div>

    <div class="twelve wide stretched column">
      <div class="ui segment">
         <h2 class="ui header centered" ng-bind="eventDetails.EventName"></h2>
         <div class="event">
          <div class="content">
            <div class="summary">
              <span>Start Time: <span ng-bind="eventDetails.StartDateTime"></span> </span>
            </div>
            <div class="summary">
              <span>End Time: <span ng-bind="eventDetails.EndDateTime"></span> </span>
            </div>
            <div class="summary">
              <span>Description: <span ng-bind="eventDetails.Description"></span></span>
            </div>
          </div>
          <div class="ui divider"></div>
          <h4 class="ui header centered">List of Items</h4>
          <a class="ui basic blue button" id="addBtn">
              <i class="Add to cart icon"></i>
              Add Items
            </a>

            <!-- add modal -->
          <div class="ui long modal" id="addModal">
            <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">

              <div class="ui form ">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Item</div>
                    <select name="itemModels" class="ui search selection dropdown" ng-model="itemmodelSelected" ng-change="loadItems()">
                        <option value="" disabled selected style="">Item</option>
                      <option ng-repeat="itemmodel in itemmodels" value="@{{itemmodel.ItemModelID}}">@{{itemmodel.ItemName}}</option>
                    </select>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Stock ID</div>
                    <select name="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loadItemInfo()">
                      <option ng-repeat="item in items" value="@{{item.ItemID}}">@{{item.ItemID}}</option>
                    </select>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Price</div>
                    <div class="ui input">
                      <input type="text" ng-model="price">
                    </div>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Points</div>
                    <div class="ui input">
                      <input type="text" ng-model="points">
                    </div>
                  </div>
                </div>

              </div>

              <table class="ui compact celled table">
                <thead>
                  <th>Defect</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Image</th>
                  <th>Warehouse</th>
                </thead>
                <tbody>
                  <tr>
                    <td>@{{itemInfo.DefectDescription}}</td>
                    <td>@{{itemInfo.size}}</td>
                    <td>@{{itemInfo.color}}</td>
                    <td><img src="@{{itemInfo.image_path}}" style="width:60px;height:60px;"/></td>
                    <td>@{{itemInfo.container.warehouse.Barangay_Street_Address}}, @{{itemInfo.container.warehouse.city.CityName}}, @{{itemInfo.container.warehouse.city.province.ProvinceName}}</td>
                  </tr>
                </tbody>
              </table>
              
            </div>
            <div class="actions">
              <button class="ui button" ng-click="addItemToAuction()">Confirm</button>
              
            </div>
          </div>
            <!-- END add modal -->
        </div>
         <table class="ui celled table">
          <thead>
            <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Points</th>
            <th>Manage</th>
          </tr></thead>
          <tbody>
            <tr ng-repeat="auctionitem in auctionitems">
              <td>@{{auctionitem.ItemID}}</td>
              <td>@{{auctionitem.item.item_model.ItemName}}</td>
              <td>@{{auctionitem.ItemPrice}}</td>
              <td>@{{auctionitem.Points}}</td>
              <td><div class="ui basic red button" ng-click="removeFromEvent($index)">Remove</div></td>
            </tr>
          </tbody>
        </table>
      </div><!-- segment -->
    </div><!-- column -->
  </div><!-- ui grid -->

<script>
//add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });


var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http, $timeout){
  //timeout for delay, waiting for eventID to initialize
  $timeout(function(){
    $http.get('/eventDetails?eventID=' + $scope.eventID)
    .then(function(response){
      $scope.eventDetails = response.data;
    });

    $http.get('/getEventItems?eventID='+$scope.eventID)
    .then(function(response){
      $scope.auctionitems = response.data;
    });

    $http.get('/itemModels')
    .then(function(response){
      $scope.itemmodels = response.data;
    });

    
  }, 1000);

  $scope.loadItems = function(){
    $http.get('/itemsToAddToEvent?itemID=' + $scope.itemmodelSelected + '&eventID=' + $scope.eventID)
    .then(function(response){
      $scope.items = response.data;

      //a loop workaround to remove items that are already in the said event
      for(var key = 0; key < $scope.items.length; key++){
        for(var key2 = 0; key2 < $scope.items[key].item_auction.length; key2++){
          if($scope.items[key].item_auction[key2].AuctionID == $scope.eventID){
            $scope.items.splice(key, 1);
            key--;
            break;
          } 
        }
      }
    });
  }

  $scope.loadItemInfo = function(){
    $http.get('/singleItem?itemID=' + $scope.itemSelected)
    .then(function(response){
      $scope.itemInfo = response.data;
    });
  }

  $scope.addItemToAuction = function(){
    $http.get('/addItemToAuction?eventID='+$scope.eventID+'&itemID='+$scope.itemSelected+'&price='+$scope.price+'&points='+$scope.points)
    .then(function(response){
      $('#addModal').modal('hide');
      //reset modal's data
      $scope.itemmodelSelected = "";
      $scope.itemSelected = "";
      $scope.price = "";
      $scope.points = "";

      return $http.get('/getEventItems?eventID='+$scope.eventID);
    })
    .then(function(response){
      $scope.auctionitems = response.data;
    });
  }

  $scope.removeFromEvent = function(index){
    $http.get('/removeFromEvent?itemID=' + $scope.auctionitems[index].ItemID)
    .then(function(response){
      if(response.data == 'success'){
        $scope.auctionitems.splice(index, 1);
        //reset modal's data
        $scope.itemmodelSelected = "";
        $scope.itemSelected = "";
        $scope.price = "";
        $scope.points = "";
      }
    });
  }
});


</script>
@endsection