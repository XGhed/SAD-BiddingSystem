@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Customer Status</div>

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
              @if(customer.status==1)
                <td style="cursor: pointer;">Approved</td>
              @else
                <td style="cursor: pointer;">Not yet Approved</td>
              @endif
              <td style="cursor: pointer;">@{{customer.DateApproved}}</td>
              <td style="cursor: pointer;">@{{customer.Points}}</td>
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