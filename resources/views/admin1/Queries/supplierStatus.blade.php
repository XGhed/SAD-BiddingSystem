@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Supplier Status</div>

       <div><a href = "\SuppliersItems">Print PDF</a></pdf>

      <div class="ui bottom attached active tab segment">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Supplier Name</th>
              <th>Status</th>
              <th>Items Stocked</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="supplier in supplierStat">
              <td></td>
              <td style="cursor: pointer;">@{{supplier.SupplierName}}</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==1">Active</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==0">Not Active</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==0">Not Available</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==1">@{{supplier.Items}}</td>
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
    $http.get('supplierStat')
    .then(function(response){
      $scope.supplierStat = response.data;
    });
  });
$('.menu .item').tab();
</script>
@endsection