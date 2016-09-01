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
              <button class="ui basic green button" ng-click="approvePayment(request.CheckoutRequestID)"><i class="checkmark icon"></i>Approve</button> 
            </td>
            <td class="tableRow" >@{{request.AccountID}}</td>
            <td class="tableRow" >@{{request.RequestDate}}</td>
            <td class="tableRow" >P@{{parseFloat(request.ItemPrice) + parseFloat(request.ShippingFee)}}</td>
          </tr>
        </tbody>
      </table>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->

<script>
  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('/unpaidRequests')
    .then(function(response){
      $scope.requests = response.data;
    });

    $scope.parseFloat = parseFloat;

    $scope.approvePayment = function(checkoutRequestID){
      $http.get('/approvePayment?checkoutRequestID=' + checkoutRequestID)
      .then(function(response){
        if (response.data == "success"){
          alert('success');
        }
        else {
          alert('something happened');
        }
        return $http.get('/unpaidRequests');
      })
      .then(function(response){
        $scope.requests = response.data;
      });
    }
  });
</script>
@endsection