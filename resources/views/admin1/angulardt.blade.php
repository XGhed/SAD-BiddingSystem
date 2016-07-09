@extends('admin1.mainteParent')

@section('content')
<div ng-app="myApp" ng-controller="myController">
  <table datatable="ng" class="row-border hover">
    <thead>
      <tr>
          <th>no</th>
          <th>address</th>
      </tr>
      </thead>
      <tbody>
      <tr ng-repeat="warehouse in warehouses">
          <td>@{{warehouse.WarehouseNo}}</td>
          <td>@{{warehouse.Barangay_Street_Address}}</td>
      </tr>
      </tbody>
  </table>
</div>

<script>
  angular.module('myApp', ['datatables'])
.controller('myController', AngularWayCtrl);

function AngularWayCtrl($scope, $http) {
  $http.get('warehouses')
  .then(function(response){
    $scope.warehouses = response.data;
  });
}
</script>
@endsection