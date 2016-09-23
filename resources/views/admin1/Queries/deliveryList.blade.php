@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">List of Delivery Fees</div>
       <div><a href = "\DeliveryPlaces">Print PDF</a></pdf>
        <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Company</a>
        <a class="item" data-tab="second">Third Party</a>
      </div>

      <div class="ui bottom attached active tab segment" data-tab="first">
       <div class="ui centered header">Company Delivery Fees</div>
       
        <table class="ui celled definition inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Province</th>
              <th>Delivery Fee</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="delivery in company">
              <td class="collapsing">
              </td>
              <td>@{{delivery.province.ProvinceName}}</td>
              <td>@{{delivery.ShipmentFee}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="ui bottom attached tab segment" data-tab="second">
       <div class="ui centered header">Company Delivery Fees</div>
       
        <table class="ui celled definition inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Province</th>
              <th>Delivery Fee</th>
            </tr></thead>
          <tbody>
            <tr ng-repeat="delivery in party">
              <td class="collapsing">
              </td>
              <td>@{{delivery.province.ProvinceName}}</td>
              <td>@{{delivery.ShipmentFee}}</td>
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
    $http.get('deliverComList')
    .then(function(response){
      $scope.company = response.data;
    });

    $http.get('deliverList')
    .then(function(response){
      $scope.party = response.data;
    });
  });
$('.menu .item').tab();
</script>
@endsection