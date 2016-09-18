@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <table class="ui celled table" datatable="ng">
        <thead>
          <th></th>
          <th>Request ID</th>
          <th>No. of Items</th>
          <th>Destination Warehouse</th>
        </thead>
        <tr ng-repeat="request in requests">
          <td>
            <div class="ui black button" ng-click="viewRequest(request.item_moving_request)">View</div>
          </td>
          <td>@{{request.MovingRequestID}}</td>
          <td>@{{request.item_moving_request.length}}</td>
          <td>
          @{{request.item_moving_request[0].item.requested_warehouse.Barangay_Street_Address + ', ' 
          + request.item_moving_request[0].item.requested_warehouse.city.CityName + ', ' 
          + request.item_moving_request[0].item.requested_warehouse.city.province.ProvinceName}}
          </td>
        </tr>
      </table>


      <div class="ui modal" id="showItems">
        <i class="close icon"></i>
          
        <div class="content">
         <input type="hidden" name="requestID" value="@{{requestID}}" />
          <form action="approveMovingOfItems" method="POST">
            <table class="ui celled table" datatable="ng">
              <thead>
                <tr>
                  <th></th>
                  <th>Current Warehouse</th>
                  <th>Requested Warehouse</th>
                  <th>Item ID</th>
                  <th>Item</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Defect</th>
              </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item_movingrequest in item_movingrequests" ng-if="item_movingrequest.item.RequestedWarehouse != 'null'">
                  <td>
                    <input name="approvedItems[]" value="@{{item_movingrequest.item.ItemID}}" type="checkbox" class="ui checkbox">
                  </td>
                  <td>@{{item_movingrequest.item.current_warehouse.Barangay_Street_Address}}, @{{item.current_warehouse.city.CityName}}, @{{item.current_warehouse.city.province.ProvinceName}}</td>
                  <td>@{{item_movingrequest.item.requested_warehouse.Barangay_Street_Address}}, @{{item.requested_warehouse.city.CityName}}, @{{item.requested_warehouse.city.province.ProvinceName}}</td>
                  <td>@{{item_movingrequest.item.ItemID}}</td>
                  <td>@{{item_movingrequest.item.item_model.ItemName}}</td>
                  <td>@{{item_movingrequest.item.color}}</td>
                  <td>@{{item_movingrequest.item.size}}</td>
                  <td>@{{item_movingrequest.item.DefectDescription}}</td>
                </tr>
              </tbody>
            </table>
          <div class="actions">
            <div class="ui right buttons">
              <button class="ui blue button" type="submit">Approve</button>
          </form>
              <div class="or"></div>
              <form action="approveAllMovingOfItems" method="POST">
                <input type="hidden" name="requestID" value="@{{requestID}}" />
                <button class="ui green button" type="submit">Approve All</button>
              </form>
            </div><!-- ui buttons -->
          </div><!-- actions -->
      </div><!-- modal -->


    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
$('.ui.dropdown').dropdown();

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http, $timeout){
  $http.get('itemsMoveApprovalRequests')
  .then(function(response){
    $scope.requests = response.data;
  });

  $scope.viewRequest = function(item_movingrequests){
    $scope.requestID = item_movingrequests[0].MovingRequestID;
    $scope.item_movingrequests = item_movingrequests;
    $('#showItems').modal('refresh');
    $timeout(function(){
      $('#showItems').modal('show');
    }, 200);
  }
});

</script>
@endsection