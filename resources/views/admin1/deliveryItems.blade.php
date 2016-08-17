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
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class="item" href="/inventory">
          Inventory
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
        <a class="active item" href="/deliveryApproval">
          Delivery/Pick-up Approval
        </a>
        <a class="item" href="/itemOutbound">
          Item Outbound
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
        <h2 class="ui centered header">Delivery/Pickup Approval</h2>

      <table class="ui definition celled selectable table">
        <thead>
          <tr>
          <th></th>
          <th>Account ID</th>
          <th>Request Date</th>
        </tr></thead>
        <tbody>
          <tr ng-repeat="request in requests">
            <td class="collapsing">           
              <button class="ui basic green button" ng-click="approveDeliver(request.CheckoutRequestID)"><i class="checkmark icon"></i>Deliver</button> 
              <button class="ui basic green button" ng-click="viewItems($index)"><i class="unhide icon"></i>View Items</button>
            </td>
            <td class="tableRow" >@{{request.AccountID}}</td>
            <td class="tableRow" >@{{request.RequestDate}}</td>
          </tr>
        </tbody>
      </table>

      <!-- account info modal -->
      <div class="ui small modal" id="infoModal">
        <i class="close icon"></i>
        <div class="header">
          Items Location
        </div>
        <div class="content">
          <table class="ui definition celled selectable table">
            <thead>
              <th>Item ID</th>
              <th>Item Name</th>
              <th>Current Warehouse</th>
              <th>Requested Warehouse</th>
            </thead>
            <tbody>
              <tr ng-repeat="requestItem in requestItems">
                <td>@{{requestItem.ItemID}}</td>
                <td>@{{requestItem.item.item_model.ItemName}}</td>
                <td>@{{requestItem.item.current_warehouse.Barangay_Street_Address}}, @{{requestItem.item.current_warehouse.city.province.ProvinceName}}, @{{requestItem.item.current_warehouse.city.CityName}}</td>
                <td>@{{requestItem.item.requested_warehouse.Barangay_Street_Address}}, @{{requestItem.item.requested_warehouse.city.province.ProvinceName}}, @{{requestItem.item.requested_warehouse.city.CityName}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- END account info modal -->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->

<script>
  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('/readyForDeliveryRequests')
    .then(function(response){
      $scope.requests = response.data;
    });

    $scope.viewItems = function(index){
      $scope.requestItems = $scope.requests[index].checkout_request__item;
      $('#infoModal').modal('show');
      $timeout(function(){
        $('#infoModal').modal('refresh');
        $('#infoModal').modal('show');
      }, 1000);
    }

    $scope.approveDeliver = function(checkoutRequestID){
      $http.get('/approveDeliveryItems?checkoutRequestID=' + checkoutRequestID)
      .then(function(response){
        if (response.data == "success"){
          alert('success');
        }
        else {
          alert('something went wrong');
        }
        return $http.get('/readyForDeliveryRequests');
      })
      .then(function(response){
        $scope.requests = response.data;
      });
    }
  });
</script>
@endsection