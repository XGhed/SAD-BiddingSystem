@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Supplier Status</div>


       <div><a href = "\SuppliersItems" target = "_blank">Print PDF</a></pdf>
       <div class="ui basic left aligned segment"><a href = "/SuppliersItems" target="_blank">Click here to print PDF</a></div>

      <div class="ui segment">
        <table class="ui compact inverted celled table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Supplier Name</th>
              <th>Status</th>
              <th>Items Stocked</th>
              <th>Items Missing</th>
              <th>Items Found</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="supplier in supplierStat">
              <td></td>
              <td style="cursor: pointer;">@{{supplier.SupplierName}}</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==1">Active</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==0">Not Active</td>
              <td style="cursor: pointer;" ng-if="supplier.Status==0">Not Available</td>
              <td style="cursor: pointer;" ng-if="supplier.Found!=NULL">@{{supplier.Found}}</td>
              <td style="cursor: pointer;" ng-if="supplier.Found==NULL">0</td>
              <td style="cursor: pointer;" ng-if="supplier.Missing!=NULL">@{{supplier.Missing}}</td>
              <td style="cursor: pointer;" ng-if="supplier.Missing==NULL">0</td>
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