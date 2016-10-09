@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
        <h2 class="ui centered header">Checkout Payment (Delivery)</h2>

      <table class="ui definition celled inverted selectable table" datatable="ng">
        <thead>
          <tr>
          <th></th>
          <th>Account ID</th>
          <th>Account</th>
          <th>Request Date</th>
          <th>Proofs Given</th>
        </tr></thead>
        <tbody>
          <tr ng-repeat="request in requests">
            <td class="collapsing">           
              <button class="ui basic green button" ng-click="viewDetails(request)">Details</button> 
            </td>
            <td class="tableRow" >@{{request.AccountID}}</td>
            <td class="tableRow" >@{{request.LastName}}, @{{request.FirstName}} @{{request.MiddleName}}</td>
            <td class="tableRow" >@{{request.RequestDate}}</td>
            <td class="tableRow" >@{{request.proofs.length}}</td>
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
            <td>@{{customerDiscount }}</td>
          </tr>
          <tr class="positive">
            <td>Discounted Price:</td>
            <td></td>
            <td>@{{discountedPrice | currency : 'P' : 2}}</td>
          </tr>
          <tr><td></td><td></td><td></td></tr>
          <tr class="warning">
            <td>Service Fee (%):</td>
            <td></td>
            <td>@{{serviceFee}}</td>
          </tr>
          <tr class="positive">
            <td>Sub total:</td>
            <td></td>
            <td>@{{subTotalPrice | currency : 'P' : 2}}</td>
          </tr>
          <tr><td></td><td></td><td></td></tr>
          <tr class="warning" ng-if="selectedRequest.CheckoutType == 'Deliver'">
            <td>Shipping fee:</td>
            <td></td>
            <td>@{{shippingFee | currency : 'P' : 2}}</td>
          </tr>
          <tr class="warning">
            <td>Event fees:</td>
            <td></td>
            <td>@{{eventFee | currency : 'P' : 2}}</td>
          </tr>
          <tr class="positive">
            <td>Total fee:</td>
            <td></td>
            <td>@{{totalPrice | currency : 'P' : 2}}</td>
          </tr>
        </tbody>
      </table>

      <div class="ui divider"></div>
      <div class="ui centered sub header">Proofs</div>
      <table class="inverted table">
        <thead>
          <th></th>
        </thead>
        <tbody>
          <tr>
            <td ng-repeat="proof in selectedRequest.proofs">
              <div class="ui small images segment">
                 <img src="@{{proof.image_path}}" ng-click="viewPhoto(proof.image_path)" style="height:250px" />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="actions">
      <button class="ui basic green button" ng-click="approvePayment(selectedRequest.CheckoutRequestID)"><i class="checkmark icon"></i>Approve</button> 
    </div>

    <div class="ui basic modal" id="alert">
        <h1 class='ui green centered header'>
          Success!!
        </h1>
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
          $('#alert').modal('show');
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
      $scope.shippingFee = $scope.selectedRequest.ShippingFee;
      $scope.eventFee = $scope.selectedRequest.EventFee;
      $scope.serviceFee = $scope.selectedRequest.account.membership[0].accounttype.ServiceFee;
      $scope.discountedPrice = 0;
      $scope.subTotalPrice = 0;
      for(var i=0; i<$scope.selectedRequest.checkout_request__item.length; i++){
        $scope.discountedPrice += $scope.selectedRequest.checkout_request__item[i].item.bids[$scope.selectedRequest.checkout_request__item[i].item.bids.length - 1].Price;
      }

      //subTotal = subTotal - discountAmount;
      $scope.discountedPrice = $scope.discountedPrice - ($scope.discountedPrice * ($scope.customerDiscount / 100));

      $scope.subTotalPrice = Math.round(( ($scope.discountedPrice + ($scope.serviceFee*1/100 * $scope.discountedPrice)) + 0.00001) * 100) / 100;

      $scope.totalPrice = Math.round(( ($scope.shippingFee*1 + $scope.subTotalPrice*1 + $scope.selectedRequest.EventFee*1) + 0.00001) * 100) / 100
      
    }

    $scope.viewPhoto = function(url){
      $window.open(url);
    }
  });
</script>
@endsection