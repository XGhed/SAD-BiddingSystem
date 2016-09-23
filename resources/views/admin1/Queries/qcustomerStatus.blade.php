@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Customer Status</div>

       <div class="ui basic left aligned segment"><a href = "\customerStatus" target="_blank">Click here to print PDF</a></div>

      <div class="ui bottom attached active tab segment">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Username</th>
              <th>Status</th>
              <th>Date Approved</th>
              <th>Points</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="customer in customerStat">
              <td></td>
              <td style="cursor: pointer;">@{{customer.Username}}</td>
                <td style="cursor: pointer;" ng-if="customer.status==1">Approved</td>
                <td style="cursor: pointer;" ng-if="customer.status==0">Not yet Approved</td>
              <td style="cursor: pointer;" ng-if="customer.DateApproved!=NULL">@{{customer.DateApproved}}</td>
              <td style="cursor: pointer;" ng-if="customer.DateApproved==NULL">Not Available</td>
              <td style="cursor: pointer;" ng-if="customer.Points!=NULL">@{{customer.Points}}</td>
              <td style="cursor: pointer;" ng-if="customer.Points==NULL">Not Available</td>
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
    $http.get('customerStat')
    .then(function(response){
      $scope.customerStat = response.data;
    });
  });
$('.menu .item').tab();
</script>
@endsection