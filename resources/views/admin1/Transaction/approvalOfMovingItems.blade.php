@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <form action="approveMovingOfItems" method="POST">
        <table class="ui celled table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Current Warehouse</th>
              <th>Requested Warehouse</th>
              <th>Item</th>
              <th>Color</th>
              <th>Size</th>
              <th>Defect</th>
          </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in items">
              <td>
                <input name="approvedItems[]" value="@{{item.ItemID}}" type="checkbox" class="ui checkbox">
              </td>
              <td>@{{item.current_warehouse.Barangay_Street_Address}}, @{{item.current_warehouse.city.CityName}}, @{{item.current_warehouse.city.province.ProvinceName}}</td>
              <td>@{{item.requested_warehouse.Barangay_Street_Address}}, @{{item.requested_warehouse.city.CityName}}, @{{item.requested_warehouse.city.province.ProvinceName}}</td>
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.size}}</td>
              <td>@{{item.DefectDescription}}</td>
            </tr>
          </tbody>
        </table>
        <button class="ui button" type="submit">Approve</button>
      </form>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
$('.ui.dropdown').dropdown();

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http){
  $http.get('itemsMoveApproval')
  .then(function(response){
    $scope.items = response.data;
  });
});

</script>
@endsection