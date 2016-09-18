@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <div class="ui segment">
        <form class="ui form">
          <div class="field">
            <div class="ui sub header">From Warehouse (Source warehouse)</div>
            <select class="ui search selection dropdown" ng-model="warehouseTo" ng-change="loadItems()">
              <option disabled selected value="">Choose Warehouse</option>
              <option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
            </select>
          </div>
          <br>
          <div class="field">
            <div class="ui sub header">To Warehouse (Destination warehouse)</div>
            <select class="ui search selection dropdown" ng-model="warehouseFrom" ng-change="loadItems()">
              <option disabled selected value="">Choose Warehouse</option>
              <option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
            </select>
          </div>
        </form>
      </div>

      <h2 class="ui centered header">Request to move items</h2>
      <form class="ui form" action="itemMoveRequest" method="POST">
      
        <table class="ui definition celled inverted table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Warehouse</th>
              <th>Item ID</th>
              <th>Item</th>
              <th>Color</th>
              <th>Size</th>
              <th>Defect</th>
          </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in items">
              <td>
                <input name="movingItems[]" value="@{{item.ItemID}}" type="checkbox" class="ui checkbox">
              </td>
              <td>@{{item.current_warehouse.Barangay_Street_Address}}, @{{item.current_warehouse.city.CityName}}, @{{item.current_warehouse.city.province.ProvinceName}}</td>
              <td>@{{item.ItemID}}</td>
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.size}}</td>
              <td>@{{item.DefectDescription}}</td>
            </tr>
          </tbody>
        </table>

        <div class="ten wide field">
          <select class="ui search selection dropdown" name="warehouse">
            <option disabled selected value="">Destination Warehouse</option>
            <option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
          </select>
        </div>
        <div class="seven wide field">
          <div class="ui sub header">Remarks</div>
          <input type="text" name="remarks" placeholder="Remarks" />
        </div>
        <div class="actions">
          <button class="ui green button" type="submit">Confirm</button>
        </div>
      </form>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
$('.ui.dropdown').dropdown();

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http){
  $scope.loadItems = function(){
    $http.get('itemsMoveSelect?warehouseTo=' + $scope.warehouseTo + '&warehouseFrom=' + $scope.warehouseFrom)
    .then(function(response){
      $scope.items = response.data;
    });
  }

  $http.get('warehouses')
  .then(function(response){
    $scope.warehouses = response.data;
  });
});

</script>
@endsection