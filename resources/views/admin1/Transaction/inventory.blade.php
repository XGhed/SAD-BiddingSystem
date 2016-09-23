@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">

    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Per Stock</a>
      <a class="item" data-tab="second">Per Item</a>
      <a class="item" data-tab="third">Requested for Dispose</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
      <!-- table -->
        <table datatable="ng" class="ui celled very compact definition table" id="tableOutput">
          <thead>
            <tr>
              <th>Filters</th>
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.ItemID" ></th>
              <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.item_model.sub_category.SubCategoryName" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.item_model.sub_category.category.CategoryName" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.item_model.ItemName" ></th>
              <!--<th>Defect</th> -->
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.size" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.color" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.warehouse" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterPerStock.container.ActualArrival" ></th>
              <!--<th>Image</th> -->
            </tr>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Date Acquired</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in items | filter: filterPerStock">
              <td class="collapsing">
                <div class="ui blue basic vertical animated button " tabindex="1" ng-click="viewItemHistory($index, item)">
                  <div class="hidden content">Item Logs</div>
                  <div class="visible content">
                    <i class="large history icon"></i>
                  </div>
                </div><br>
                <div class="ui red basic vertical animated button" tabindex="0" ng-click="dispose($index)">
                  <div class="hidden content">Dispose</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td>@{{item.ItemID}}</td>
              <td id="tableRow">@{{item.item_model.ItemName}}</td>
              <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
              <td>@{{item.item_model.sub_category.SubCategoryName}}</td>
              <td>@{{item.size}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.warehouse}}</td>
              <td>@{{item.container.ActualArrival}}</td>
            </tr>
          </tbody>
        </table>
    </div>

    <!--2nd tab-->

    <div class="ui bottom attached tab segment" data-tab="second">
      <table class="ui celled inverted table" datatable="ng">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Stocks</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="itemmodel in itemmodels">
            <td class="collapsing">
              <a class="ui basic blue button" ng-click="viewStocks($index)">
                View Stocks
              </a>              
            </td>
            <td>@{{itemmodel.ItemName}}</td>
            <td>@{{itemmodel.sub_category.category.CategoryName}}</td>
            <td>@{{itemmodel.sub_category.SubCategoryName}}</td>
            <td>@{{itemmodel.stocksCount}}</td>
          </tr>
        </tbody>
        <tfoot>
      </table>
    </div>

    <div class="ui bottom attached tab segment" data-tab="third">
      <!-- table -->
        <table datatable="ng" class="ui compact celled definition inverted table">
          <thead>
            <tr>
              <th>Filters</th>
              <th><input type="text" style="width:95%" data-ng-model="filterDispose.ItemID" ></th>
              <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
              <th><input type="text" style="width:95%" data-ng-model="filterDispose.item_model.sub_category.SubCategoryName" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterDispose.item_model.sub_category.category.CategoryName" ></th>
              <th><input type="text" style="width:95%" data-ng-model="filterDispose.item_model.ItemName" ></th>
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
              <th>Subcategory</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Request Date</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in requestedToDispose | filter: filterDispose">
              <td class="collapsing">
                <div class="ui blue basic vertical animated button " tabindex="1" ng-click="viewItemHistory($index, item)">
                  <div class="hidden content">Item Logs</div>
                  <div class="visible content">
                    <i class="large history icon"></i>
                  </div>
                </div><br>
                <div class="ui red basic vertical animated button" tabindex="0" ng-click="cancelDispose($index)">
                  <div class="hidden content">Cancel</div>
                  <div class="visible content">
                    <i class="large ban icon"></i>
                  </div>
                </div> 
              </td>
              <td>@{{item.ItemID}}</td>
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
              <td>@{{item.item_model.sub_category.SubCategoryName}}</td>
              <td>@{{item.size}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.warehouse}}</td>
              <td>@{{item.requestDate}}</td>
            </tr>
          </tbody>
        </table>
    </div>

          <!--item History modal -->
        <div class="ui small modal" id="itemHistory">
           <i class="close icon"></i>
            <div class="ui centered header">
            Item Logs
            </div>
            <div class="content">
              <div class="ui message">
                <div class="header">
                  Details:
                </div>
                <div>
                  Date Arrived: @{{selectedItem.container.ActualArrival}}
                  <br>
                  Defect: <span ng-if="selectedItem.ItemDefectID == NULL">Others</span>@{{selectedItem.item_defect.DefectName}}
                  <br>
                  Defect Description: <span ng-if="selectedItem.DefectDescription == ''">None</span>@{{selectedItem.DefectDescription}}
                  <br>
                </div>
                <a id="prevPhoto" style="cursor:pointer;">Click to preview photo.</a>
              </div>
              <table class="ui celled inverted table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Log</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="history in histories">
                    <td>@{{history.Date}}</td>
                    <td>@{{history.Log}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>

        <div class="ui small modal" id="photoPreview">
           <i class="close icon"></i>
            <div class="content">
              <img src="@{{selectedItem.image_path}}" class="ui centered large image">
            </div>
        </div>
          <!-- END item history modal -->

             <!--item list modal -->
        <div class="ui modal" id="itemLists">
           <i class="close icon"></i>
            <div class="ui centered header">
            Item Logs
            </div>
            <div class="content">
              <table class="ui celled definition inverted table" datatable="ng">
                <thead>
                  <tr>
                    <th>Filters</th>
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.ItemID" ></th>
                    <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.item_model.ItemName" ></th>
                    <!--<th>Defect</th> -->
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.size" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.color" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.item_defect.DefectName" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.DefectDescription" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.warehouse" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterItemsOfModel.requestDate" ></th>
                    <!--<th>Image</th> -->
                  </tr>
                  <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Defect</th>
                    <th>Description</th>
                    <th>Warehouse</th>
                    <th>Date Acquired</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in itemsOfModel | filter: filterItemsOfModel">
                    <td class="collapsing">
                      <div class="ui blue basic vertical animated button " tabindex="1" ng-click="viewItemHistory($index, item)">
                        <div class="hidden content">Item Logs</div>
                        <div class="visible content">
                          <i class="large history icon"></i>
                        </div>
                      </div>
                      <div class="ui red basic vertical animated button" tabindex="0">
                        <div class="hidden content">Dispose</div>
                        <div class="visible content">
                          <i class="large trash icon"></i>
                        </div>
                      </div> 
                    </td>
                    <td>@{{item.ItemID}}</td>
                    <td id="tableRow">@{{item.item_model.ItemName}}</td>
                    <td>@{{item.size}}</td>
                    <td>@{{item.color}}</td>
                    <td>@{{item.item_defect.DefectName}}</td>
                    <td>@{{item.DefectDescription}}</td>
                    <td>@{{item.warehouse}}</td>
                    <td>@{{item.container.ActualArrival.split(' ')[0]}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
          <!-- END itemLists modal -->
         
    </div>
  </div>
</div>

          <div class="ui basic modal" id="alert">
            <h1 class='ui centered header'>
              Cancelled for disposal!!
             </h1>
          </div>

          <div class="ui basic modal" id="requestDispose">
            <h1 class='ui centered header'>
              Request for dispose!!
             </h1>
          </div>


<script>

  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

  $(document).ready(function(){
       $('#prevPhoto').click(function(){
          $('#photoPreview').modal('show');    
       });
  });


  //dropdowns
  $('.ui.normal.dropdown')
    .dropdown();

  //history
  $(document).ready(function(){
       $('#tableRow').click(function(){
          $('#history').modal('show');    
       });
  });

  //exit
  function modalClose() {
    $('.ui.modal').modal('hide'); 
    }


$('.menu .item').tab();


////////////////////////////////////////////////////////////////////////// 
  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $scope.reloadItems = function(){
      $http.get('itemsInventory')
      .then(function(response){
        $scope.items = response.data;

        for(var i=0; i<$scope.items.length; i++){
          $scope.items[i].warehouse = $scope.items[i].container.warehouse.Barangay_Street_Address + ', '
            + $scope.items[i].container.warehouse.city.CityName + ', ' 
            + $scope.items[i].container.warehouse.city.province.ProvinceName;
        }
      });

      $http.get('requestedToDispose')
      .then(function(response){
        $scope.requestedToDispose = response.data;

        for(var i=0; i<$scope.requestedToDispose.length; i++){
          $scope.requestedToDispose[i].warehouse = $scope.requestedToDispose[i].container.warehouse.Barangay_Street_Address + ', '
            + $scope.requestedToDispose[i].container.warehouse.city.CityName + ', ' 
            + $scope.requestedToDispose[i].container.warehouse.city.province.ProvinceName;

          $scope.requestedToDispose[i].requestDate = $scope.requestedToDispose[i].pull_request[0].RequestDate;
        }
      });
    }

    $http.get('itemmodelsInventory')
    .then(function(response){
      $scope.itemmodels = response.data;
    });

    $scope.viewStocks = function(index){
      var ItemModelID = $scope.itemmodels[index].ItemModelID; 
      $http.get('itemsOfModelInventory?itemID=' + ItemModelID)
      .then(function(response){
        $scope.itemsOfModel = response.data;

        for(var i=0; i<$scope.itemsOfModel.length; i++){
          $scope.itemsOfModel[i].warehouse = $scope.itemsOfModel[i].container.warehouse.Barangay_Street_Address + ', '
            + $scope.itemsOfModel[i].container.warehouse.city.CityName + ', ' 
            + $scope.itemsOfModel[i].container.warehouse.city.province.ProvinceName;
        }

        $('#itemLists').modal('refresh');    
        $timeout(function(){
          $('#itemLists').modal('show');
        }, 100);
      });
    }

    $scope.viewItemHistory = function(index, item){
      $scope.selectedItem = item;
      $scope.histories = $scope.items[index].item_history;
      $('#itemHistory').modal('refresh');
      $timeout(function(){
        $('#itemHistory').modal('show');
      }, 100);
    }

    $scope.dispose = function(index){
      $http.get('disposeItem?itemID=' + $scope.items[index].ItemID)
      .then(function(response){
        if(response.data == "success"){
        $('#requestDispose').modal('show');
          $scope.reloadItems();
        }
      })
    }

    $scope.cancelDispose = function(index){
      $http.get('cancelDisposeItem?itemID=' + $scope.requestedToDispose[index].ItemID)
      .then(function(response){
        $('#alert').modal('show');
        $scope.reloadItems();
      })
    }

    $scope.reloadItems();
  });
</script>
@endsection