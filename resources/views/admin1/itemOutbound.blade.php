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
        <a class="active item" href="/itemOutbound">
          Item Outbound
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Item Outbound</div>

        <div class="ui top attached tabular menu">
          <a class="active item" data-tab="first">Deliver Items</a>
          <a class="item" data-tab="second">Pick up Items</a>
        </div>

        
        <div class="ui bottom attached active tab segment" data-tab="first">
            <table class="ui celled table">
              <thead>
                <tr>
                  <th>View Info</th>
                  <th>Checkout ID</th>
                  <th>Date Requested</th>
                  <th>Customer</th>
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat="deliveryRequest in deliveryRequests">
                  <td>
                    <a class="ui basic blue button" ng-click="viewRequest(deliveryRequest)">
                      <i class="add user icon"></i>
                      View
                    </a>
                  </td>
                  <td>@{{deliveryRequest.CheckoutRequestID}}</td>
                  <td>@{{deliveryRequest.RequestDate}}</td>
                  <td>@{{deliveryRequest.account.membership[0].FirstName + ' ' + deliveryRequest.account.membership[0].MiddleName + ' ' + deliveryRequest.account.membership[0].LastName}}</td>
                </tr>
              </tbody>
            </table>
        </div>

        <div class="ui bottom attached tab segment" data-tab="second">
          <table class="ui celled table">
              <thead>
                <tr>
                  <th>View Info</th>
                  <th>Checkout ID</th>
                  <th>Date Requested</th>
                  <th>Pick up Person</th>
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat="pickupRequest in pickupRequests">
                  <td>
                    <a class="ui basic blue button" ng-click="viewRequest(pickupRequest)">
                      <i class="add user icon"></i>
                      View
                    </a>
                  </td>
                  <td>@{{pickupRequest.CheckoutRequestID}}</td>
                  <td>@{{pickupRequest.RequestDate}}</td>
                  <td>@{{pickupRequest.FirstName + ' ' + pickupRequest.MiddleName + ' ' + pickupRequest.LastName}}</td>
                </tr>
              </tbody>
            </table>
        </div>  

        <!-- MODAL -->
        <div class="ui small modal" id="modalShow">
          <i class="close icon"></i>
            <div class="header">
              Checkout Request Info
            </div>
            <div class="content">
              <h3>Send these items to delivery:</h3>
              <table datatable="ng" class="ui compact celled definition table">
                <thead>
                  <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <th>Sub Category</th>
                    <th>Photo</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Warehouse</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="request_item in requestSelected.checkout_request__item">
                    <td>@{{request_item.item.ItemID}}</td>
                    <td>@{{request_item.item.item_model.ItemName}}</td>
                    <td>@{{request_item.item.item_model.sub_category.SubCategoryName}}</td>
                    <td><img src="@{{request_item.item.image_path}}" style="width:60px;height:60px;" /></td>
                    <td>@{{request_item.item.size}}</td>
                    <td>@{{request_item.item.color}}</td>
                    <td>@{{request_item.item.current_warehouse.Barangay_Street_Address}}, @{{request_item.item.current_warehouse.city.CityName}}, @{{request_item.item.current_warehouse.city.province.ProvinceName}}</td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <div class="ui actions">
                <button class="ui right floated basic green button large" ng-click="approveDeliver(requestSelected.CheckoutRequestID)">Deliver!</button>
              </div>
            </div>
        </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  $(document).ready(function(){
       $('#modalBtn').click(function(){
          $('#modalShow').modal('show');    
       });
  });

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('/readyForCheckoutDelivery')
    .then(function(response){
      $scope.deliveryRequests = response.data;
    });

    $http.get('/readyForCheckoutPickup')
    .then(function(response){
      $scope.pickupRequests = response.data;
    });

    $scope.viewRequest = function(request){
      $('#modalShow').modal('show');
      $scope.requestSelected = request;
      $timeout(function(){
        $('#modalShow').modal('refresh');
      }, 1000);
    }

    $scope.approveDeliver = function(checkoutRequestID){
      $('#modalShow').modal('hide');
      $http.get('/approveDeliveryItems?checkoutRequestID=' + checkoutRequestID)
      .then(function(response){
        if (response.data == "success"){
          alert('success');
        }
        else {
          alert('something went wrong');
        }
        //refresh
        $http.get('/readyForCheckoutDelivery')
        .then(function(response){
          $scope.deliveryRequests = response.data;
        });

        $http.get('/readyForCheckoutPickup')
        .then(function(response){
          $scope.pickupRequests = response.data;
        });
      });
    }
  });


$('.menu .item').tab();
</script>
@endsection