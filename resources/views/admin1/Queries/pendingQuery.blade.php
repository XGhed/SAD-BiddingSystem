@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Pendings</div>
       <!--<div><a href = "\DeliveryPlaces">Print PDF</a></pdf>-->
      <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Container</a>
        <a class="item" data-tab="second">Item</a>
        <a class="item" data-tab="third">Checkout</a>
        <a class="item" data-tab="fourth">Account</a>
      </div>

      <div class="ui bottom attached active tab segment" data-tab="first">
       <div class="ui centered header">Container</div>
       
        <table class="ui celled definition inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Container Name</th>
              <th>Warehouse</th>
              <th>Expected Arrival</th>
              <th>Supplier</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="container in containers">
              <td class="collapsing">
              </td>
              <td>@{{container.ContainerName}}</td>
              <td>@{{container.warehouse.Barangay_Street_Address}}, @{{container.warehouse.city.CityName}}, @{{container.warehouse.city.province.ProvinceName}}</td>
              <td>@{{container.Arrival}}</td>
              <td>@{{container.supplier.SupplierName}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="ui bottom attached tab segment" data-tab="second">
       <div class="ui centered header">Item</div>
       
        <table class="ui celled definition inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Item Name</th>
              <th>Container Name</th>
              <th>Warehouse</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="item in items">
              <td class="collapsing">
              </td>
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.container.ContainerName}}</td>
              <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="ui bottom attached tab segment" data-tab="third">
       <div class="ui centered header">Checkout</div>
       
        <table class="ui celled definition inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Date Requested</th>
              <th>Receiver</th>
              <th>Type</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="request in checkouts">
              <td class="collapsing">
              </td>
              <td>@{{request.RequestDate}}</td>
              <td>@{{request.FirstName}} @{{request.MiddleName}} @{{request.LastName}}</td>
              <td>@{{request.CheckoutType}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="ui bottom attached tab segment" data-tab="fourth">
       <div class="ui centered header">Account</div>
       
        <table class="ui celled definition inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Username</th>
              <th>Name</th>
              <th>Date of Registration</th>
              <th>Email Address</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="account in pendingCustomer">
              <td class="collapsing">
              </td>
              <td>@{{account.Username}}</td>
              <td>@{{account.membership[0].FirstName}} @{{account.membership[0].LastName}}</td>
              <td>@{{account.membership[0].DateOfRegistration}}</td>
              <td>@{{account.membership[0].EmailAdd}}</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('pendingContainer')
    .then(function(response){
      $scope.containers = response.data;
    });

    $http.get('pendingItems')
    .then(function(response){
      $scope.items = response.data;
    });

    $http.get('pendingCheckout')
    .then(function(response){
      $scope.checkouts = response.data;
    });

    $http.get('pendingCustomer')
    .then(function(response){
      $scope.pendingCustomer = response.data;
    });
  });
$('.menu .item').tab();
</script>
@endsection