@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
         <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="item" href="/itemInbound">
          Item Inbound
        </a>
        <a class="item" href="/itemChecking">
          Item Checking
        </a> 
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class="item" href="/inventory">
          Inventory
        </a>        
        <a class="active item" href="/movingOfItems">
          Moving of Items
        </a>
        <a class="item" href="/biddingEvent">
          Bidding Event
        </a>
        <a class="item" href="/accountApproval">
          Account Approval
        </a>
        <a class="item" href="/deliveryApproval">
          Delivery/Pick-up Approval
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <form action="itemMoveRequest" method="POST">
        <table class="ui celled table" datatable="ng">
          <thead>
            <tr>
              <th></th>
              <th>Warehouse</th>
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
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.size}}</td>
              <td>@{{item.DefectDescription}}</td>
            </tr>
          </tbody>
        </table>
        <select class="ui dropdown" name="warehouse">
          <option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
        </select>
        <button class="ui button" type="submit">Confirm</button>
      </form>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
$('.ui.dropdown').dropdown();

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http){
  $http.get('itemsMoveSelect')
  .then(function(response){
    $scope.items = response.data;
  });

  $http.get('warehouses')
  .then(function(response){
    $scope.warehouses = response.data;
  });
});

</script>
@endsection