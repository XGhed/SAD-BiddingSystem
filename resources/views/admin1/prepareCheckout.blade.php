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
        <a class=" item" href="/inventory">
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
        <a class="item" href="/deliveryApproval">
          Delivery/Pick-up Approval
        </a>
        <a class="item" href="/itemOutbound">
          Item Outbound
        </a>
        <a class="active item" href="/deliveryItems">
          Delivery
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <div class="ui centered header">Prepare Checkout Items</div>

      <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Delivery</a>
        <a class="item" data-tab="second">Pick up</a>
      </div>

      <div class="ui bottom attached active tab segment" data-tab="first">
       <div class="ui centered header">Prepare Delivery</div>
       
        <table class="ui celled definition table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Date Requested</th>
              <th>Receiver</th>
              <th>Delivery Address</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="request in deliveryRequests">
              <td class="collapsing">
               <a class="ui basic blue button" ng-click="viewDeliveryRequest($index)">
                <i class="unhide icon"></i>
                View
              </a>
              </td>
              <td>@{{request.RequestDate}}</td>
              <td>@{{request.FirstName}} @{{request.MiddleName}} @{{request.LastName}}</td>
              <td>@{{request.Barangay_Street_Address}}, @{{request.city.CityName}}, @{{request.city.province.ProvinceName}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="ui bottom attached tab segment" data-tab="second">
       <div class="ui centered header">Prepare Pick up</div>
       
        <table class="ui celled definition table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Date Requested</th>
              <th>Receiver</th>
              <th>Pick up Location</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="request in pickupRequests">
              <td class="collapsing">
               <a class="ui basic blue button" ng-click="viewPickupRequest($index)">
                <i class="unhide icon"></i>
                View
              </a>
              </td>
              <td>@{{request.RequestDate}}</td>
              <td>@{{request.FirstName}} @{{request.MiddleName}} @{{request.LastName}}</td>
              <td>@{{request.pickup_location.Barangay_Street_Address}}, @{{request.pickup_location.city.CityName}}, @{{request.pickup_location.city.province.ProvinceName}}</td>
            </tr>
          </tbody>
        </table>
      </div>
            <div class="ui small modal" id="addModal">
              <i class="close icon"></i>
                <div class="header">
                  Modal 1
                </div>
                <div class="content">
                  <form>
                    <input type="hidden" ng-model="selectedRequest">
                    <table class="ui celled table" datatable="ng">
                      <thead>
                        <tr>
                          <th>Item ID</th>
                          <th>Item Name</th>
                          <th>Current Warehouse</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="requestItem in requestItems">
                          <td>@{{requestItem.ItemID}}</td>
                          <td>@{{requestItem.item.item_model.ItemName}}</td>
                          <td>@{{requestItem.item.CurrentWarehouse}}</td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="field">
                      <div class="ui grid"><div class="row"></div></div>
                      <div class="ui header">Move the following items to a common Warehouse:</div>
                      <select class="ui selection dropdown" ng-model="selectedWarehouse">
                        <option value="" disabled selected>Select Warehouse</option>
                        <option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
                      </select>
                    </div>

                    <button class="ui right floated basic green button" ng-click="approve()"><i class="green checkmark icon"></i>Confirm</button>
                  </form>
                </div>
            </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  var app = angular.module('myApp', ['datatables']);

  app.controller('myController', function($scope, $http){
    $http.get('deliveryRequests')
    .then(function(response){
      $scope.deliveryRequests = response.data;
    });

    $http.get('pickupRequests')
    .then(function(response){
      $scope.pickupRequests = response.data;
    });

    $http.get('/warehouses')
    .then(function(response){
      $scope.warehouses = response.data;
    });

    $scope.viewDeliveryRequest = function(index){
      $('.ui.modal').modal('show');
      $scope.requestItems = $scope.deliveryRequests[index].checkout_request__item;
      $scope.selectedRequest = $scope.deliveryRequests[index].CheckoutRequestID;
    }

    $scope.viewPickupRequest = function(index){
      $('.ui.modal').modal('show');
      $scope.requestItems = $scope.pickupRequests[index].checkout_request__item;
      $scope.selectedRequest = $scope.pickupRequests[index].CheckoutRequestID;
    }

    $scope.approve = function(){
      $http.get('/approveCheckoutRequest?warehouse=' + $scope.selectedWarehouse + '&checkoutRequestID=' + $scope.selectedRequest)
      .then(function(response){
        if(response.data == "success"){
          alert('success');
          $('.ui.modal').modal('hide');

          //reload data
          $http.get('deliveryRequests')
          .then(function(response){
            $scope.deliveryRequests = response.data;
          });

          $http.get('pickupRequests')
          .then(function(response){
            $scope.pickupRequests = response.data;
          });
        }
      });
    }
  });

  $('.ui.dropdown').dropdown();
  $('.menu .item').tab();
</script>
@endsection