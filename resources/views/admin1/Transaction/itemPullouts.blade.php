@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">

    <form action="/pulloutItem" method="POST">
      <table datatable="ng" class="ui compact celled definition inverted table">
        <thead>
          <tr>
            <th>Filters</th>
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.ItemID" ></th>
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.item_model.ItemName" ></th>
            <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.item_model.sub_category.category.CategoryName" ></th>
            <!--<th>Defect</th> -->
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.size" ></th>
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.color" ></th>
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.warehouse" ></th>
            <th><input type="text" style="width:95%" data-ng-model="filterDispose.requestDate" ></th>
            <!--<th>Image</th> -->
          </tr>
          <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Size</th>
            <th>Color</th>
            <th>Warehouse</th>
            <th>Request Date</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="item in items | filter: filterDispose" >
            <td> <input type="checkbox" name="items[]" value="@{{item.ItemID}}" /> </td>
            <td>@{{item.ItemID}}</td>
            <td id="tableRow">@{{item.item_model.ItemName}}</td>
            <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
            <td>@{{item.size}}</td>
            <td>@{{item.color}}</td>
            <td>@{{item.warehouse}}</td>
            <td>@{{item.requestDate}}</td>
          </tr>
        </tbody>
      </table>

      <button class="ui red button" type="submit" name="pullout" value="true">Pull Out</button>
      <button class="ui green button" type="submit" name="cancel" value="true">Cancel</button>
    </form>
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
  $http.get('requestedToDispose')
    .then(function(response){
      $scope.items = response.data;

      for(var i=0; i<$scope.items.length; i++){
          $scope.items[i].warehouse = $scope.items[i].container.warehouse.Barangay_Street_Address + ', '
            + $scope.items[i].container.warehouse.city.CityName + ', ' 
            + $scope.items[i].container.warehouse.city.province.ProvinceName;

          $scope.items[i].requestDate = $scope.items[i].pull_request[0].RequestDate;
        }
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