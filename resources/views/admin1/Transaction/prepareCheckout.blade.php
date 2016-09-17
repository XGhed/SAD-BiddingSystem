@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

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
               <a class="ui basic blue button" ng-click="viewDeliveryRequest($index, request)">
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
               <a class="ui basic blue button" ng-click="viewPickupRequest($index, request)">
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
                  Pick-up Details
                </div>
                <div class="content">
                  <form>
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

                    <div class="ui divider"></div>
                    <div class="field">
                      <br><br>
                      <div class="ui header">Move the following items to a common Warehouse:</div>

                      <div ng-if="selectedRequest.CheckoutType == 'Deliver'">
                        <select class="ui selection dropdown" ng-model="selectedWarehouse">
                          <option value="" disabled selected>Select Warehouse</option>
                          <option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">
                            @{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}
                          </option>
                        </select>
                      </div>
                      
                      <div ng-if="selectedRequest.CheckoutType == 'Pick up'" ng-repeat="warehouse in warehouses">
                        <span ng-if="warehouse.WarehouseNo == selectedRequest.WarehouseNo">
                          @{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}
                        </span>
                      </div>
                    </div>

                    <div class="actions">
                      <button class="ui right floated basic green button" ng-click="approve()">
                        <i class="green checkmark icon"></i>Confirm
                      </button>
                  </form>
                    <br><br>
                    </div>
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

    $scope.viewDeliveryRequest = function(index, request){
      $('.ui.modal').modal('show');
      $scope.requestItems = $scope.deliveryRequests[index].checkout_request__item;
      $scope.selectedRequest = request;
    }

    $scope.viewPickupRequest = function(index, request){
      $('.ui.modal').modal('show');
      $scope.requestItems = $scope.pickupRequests[index].checkout_request__item;
      $scope.selectedRequest = request;
      $scope.selectedWarehouse = $scope.selectedRequest.WarehouseNo;
    }

    $scope.approve = function(){alert($scope.selectedRequest.CheckoutRequestID);
      $http.get('/approveCheckoutRequest?warehouse=' + $scope.selectedWarehouse + '&checkoutRequestID=' + $scope.selectedRequest.CheckoutRequestID)
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