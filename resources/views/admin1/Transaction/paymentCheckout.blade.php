@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
        <h2 class="ui centered header">Checkout Payment (Delivery)</h2>

      <table class="ui definition celled selectable table">
        <thead>
          <tr>
          <th></th>
          <th>Account ID</th>
          <th>Request Date</th>
          <th>Price</th>
        </tr></thead>
        <tbody>
          <tr ng-repeat="request in requests">
            <td class="collapsing">           
              <button class="ui basic green button" ng-click="viewDetails(request)">Details</button> 
            </td>
            <td class="tableRow" >@{{request.AccountID}}</td>
            <td class="tableRow" >@{{request.RequestDate}}</td>
            <td class="tableRow" >P@{{parseFloat(request.ItemPrice) + parseFloat(request.ShippingFee)}}</td>
          </tr>
        </tbody>
      </table>

    </div><!-- segment -->
  </div><!-- twelve wide column -->

  <div class="ui small modal" id="detailsModal">
    <i class="close icon"></i>
    <div class="header">
      Pick-up Details
    </div>
    <div class="content">
      <table class="ui selectable green table">
        <thead>
          <tr>
            <th></th>
            <th>Item</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="request_item in selectedRequest.checkout_request__item">
            <td></td>
            <td>@{{request_item.item.item_model.ItemName}}</td>
            <td>@{{request_item.item.bids[request_item.item.bids.length - 1].Price}}</td>
          </tr>
          <tr class="warning">
            <td>Discount (%):</td>
            <td></td>
            <td>@{{customerDiscount}}</td>
          </tr>
          <tr class="positive">
            <td>Sub total:</td>
            <td></td>
            <td>@{{subTotalPrice}}</td>
          </tr>
          <tr class="warning" ng-if="selectedRequest.CheckoutType == 'Deliver'">
            <td>Shipping fee:</td>
            <td></td>
            <td>@{{shippingFee}}</td>
          </tr>
          <tr class="positive">
            <td>Total fee:</td>
            <td></td>
            <td>@{{totalPrice}}</td>
          </tr>
        </tbody>
      </table>

      <div class="sub header">Proofs</div>
      <table>
        <thead>
          <th></th>
        </thead>
        <tbody>
          <tr ng-repeat="proof in selectedRequest.proofs">
            <td>
              <img class="ui small image" src="@{{proof.image_path}}" ng-click="viewPhoto(proof.image_path)"/>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="actions">
      <button class="ui basic green button" ng-click="approvePayment(selectedRequest.CheckoutRequestID)"><i class="checkmark icon"></i>Approve</button> 
    </div>
  </div>
</div><!-- ui grid -->

<script>
  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout, $window){
    $http.get('/unpaidRequests')
    .then(function(response){
      $scope.requests = response.data;
    });

    $scope.approvePayment = function(checkoutRequestID){
      $http.get('/approvePayment?checkoutRequestID=' + checkoutRequestID)
      .then(function(response){
        if (response.data == "success"){
          alert('success');
        }
        else {
          alert('something happened');
        }

        $('#detailsModal').modal('hide');
        
        return $http.get('/unpaidRequests');
      })
      .then(function(response){
        $scope.requests = response.data;
      });
    }

    $scope.viewDetails = function(request){
      $scope.selectedRequest = request;
      $('#detailsModal').modal('refresh');

      $timeout(function(){
        $('#detailsModal').modal('show');
      }, 100);

      $scope.computeReceiptPrice();
    }

    $scope.computeReceiptPrice = function(){

      $scope.customerDiscount = $scope.selectedRequest.discount;
      $scope.subTotalPrice = 0;
      $scope.shippingFee = $scope.selectedRequest.ShippingFee;
      for(var i=0; i<$scope.selectedRequest.checkout_request__item.length; i++){
        $scope.subTotalPrice += $scope.selectedRequest.checkout_request__item[i].item.bids[$scope.selectedRequest.checkout_request__item[i].item.bids.length - 1].Price;
      }

      //subTotal = subTotal - discountAmount;
      $scope.subTotalPrice = $scope.subTotalPrice - ($scope.subTotalPrice * ($scope.customerDiscount / 100));

      $scope.totalPrice = $scope.shippingFee*1 + $scope.subTotalPrice*1;
        
    }

    $scope.viewPhoto = function(url){
      $window.open(url);
    }
  });
</script>
@endsection