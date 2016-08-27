@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="item" href="/itemInbound">
          Item Inbound
        </a>
        <a class="item" href="/itemChecking">
          Item Checking
        </a>       
        <a class=" item" href="/inventory">
          Inventory
        </a>  
        <a class="active item" href="/itemPullouts">
          Item Pullouts
        </a>       
        <a class="item" href="/movingOfItems">
          Moving of Items
        </a>
        <a class="item" href="/biddingEvent">
          Bidding Event
        </a>
        <a class="item" href="/accountApproval">
          Account Approval
        </a>
        <a class="item" href="/prepareCheckout">
          Prepare Checkout Items
        </a>
        <a class=" item" href="/paymentCheckout">
          Payment Checkout Items
        </a>
        <a class="item" href="/itemOutbound">
          Item Outbound
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table datatable="ng" class="ui compact celled definition table">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Category</th>
            <th>Size</th>
            <th>Color</th>
            <th>Warehouse</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="item in items" ng-if="item.pull_request.length > 0">
            <td class="collapsing">
              <div class="ui vertical animated button " tabindex="1" ng-click="confirmDispose($index)">
                <div class="hidden content">Dispose</div>
                <div class="visible content">
                  <i class="large trash icon"></i>
                </div>
              </div>
            </td>
            <td id="tableRow">@{{item.item_model.ItemName}}</td>
            <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
            <td>@{{item.size}}</td>
            <td>@{{item.color}}</td>
            <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
          </tr>
        </tbody>
      </table>

      <!-- account info modal -->
      <div class="ui small modal" id="infoModal">
        <i class="close icon"></i>
        <div class="header">
          Account Information
        </div>
        <div class="content">
          <div class="description">
            <p>Full Name:</p>
            <p>Address:</p>
            <p>Gender:</p>
            <p>Birthdate:</p>
            <p>Contact Number:</p>
            <p>Email Address:</p>
            <p>Username:</p>
            <p>Documents: </p>
          </div>
        </div>
      </div>
      <!-- END account info modal -->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  //add modal
$(document).ready(function(){
      $('.tableRow').click(function(){
         $('#infoModal').modal('show');    
      });
 }); 

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http){
  $http.get('itemsInventory')
    .then(function(response){
      $scope.items = response.data;
    });

  $scope.confirmDispose = function(index){
    $http.get('confirmDispose?itemID=' + $scope.items[index].ItemID)
    .then(function(response){
      if(response.data == 'success'){
        return $http.get('singleItem?itemID=' + $scope.items[index].ItemID);
      }
    })
    .then(function(response){
      $scope.items[index] = response.data;
    });
  }
});

</script>
@endsection