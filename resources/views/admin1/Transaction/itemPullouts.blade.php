@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table datatable="ng" class="ui compact celled definition inverted table">
        <thead>
          <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Size</th>
            <th>Color</th>
            <th>Warehouse</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="item in items" ng-if="item.pull_request.length > 0">
            <td class="collapsing">
              <div class="ui red basic vertical animated button " tabindex="1" ng-click="confirmDispose($index)">
                <div class="hidden content">Dispose</div>
                <div class="visible content">
                  <i class="large trash icon"></i>
                </div>
              </div>
            </td>
            <td>@{{item.ItemID}}</td>
            <td id="tableRow">@{{item.item_model.ItemName}}</td>
            <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
            <td>@{{item.size}}</td>
            <td>@{{item.color}}</td>
            <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
          </tr>
        </tbody>
      </table>

      <!-- account info modal -->
      <div class="ui small modal" id="infoModal">
        <i class="close icon"></i>
        <div class="header">
          Account Information
        </div>
        <div class="content">
          <div class="description">
            <p>Full Name:</p>
            <p>Address:</p>
            <p>Gender:</p>
            <p>Birthdate:</p>
            <p>Contact Number:</p>
            <p>Email Address:</p>
            <p>Username:</p>
            <p>Documents: </p>
          </div>
        </div>
      </div>
      <!-- END account info modal -->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  //add modal
$(document).ready(function(){
      $('.tableRow').click(function(){
         $('#infoModal').modal('show');    
      });
 }); 

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http){
  $http.get('itemsInventory')
    .then(function(response){
      $scope.items = response.data;
    });

  $scope.confirmDispose = function(index){
    $http.get('confirmDispose?itemID=' + $scope.items[index].ItemID)
    .then(function(response){
      if(response.data == 'success'){
        $scope.items.splice(index, 1);
      }
    });
  }
});

</script>
@endsection