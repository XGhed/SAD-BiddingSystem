@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">List of Delivery Fees</div>

      <div class="ui bottom attached active tab segment">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Province</th>
              <th>Delivery Fee</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="deliver in deliverList">
              <td></td>
              <td style="cursor: pointer;">@{{deliver.province.ProvinceName}}</td>
              <td style="cursor: pointer;">@{{deliver.ShipmentFee}}</td>
             <tr>
          </tbody>
        </table>
      </div><!-- tab 1-->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('deliverList')
    .then(function(response){
      $scope.deliverList = response.data;
    });
  });
$('.menu .item').tab();
</script>
@endsection