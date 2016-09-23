@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">      

        <div class="ui top attached tabular menu">
          <a class="active item" data-tab="first">Expected Item</a>
          <a class="item" data-tab="second">Unexpected Item</a>
          <a class="item" data-tab="third">Missing Items</a>
        </div>
        
        <div class="ui bottom attached active tab segment" data-tab="first">
           
          <div class="ui success message" ng-show="showMessage">
            <i class='close icon'></i>
            <div class='ui centered header'>
              Item Arrived!!
            </div>
          </div>

          <div class="ui success message" ng-show="showMissing">
            <i class='close icon'></i>
            <div class='ui centered header'>
              Item moved to missing!!
            </div>
          </div>

          <table datatable="ng" class="ui compact celled inverted table">
            <thead>
              <tr>
                <th></th>
                <th>ContainerName</th>
                <th>Expected Arrival</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="container in containersWithPendingItems">
                <td class="collapsing">
                  <div class="ui basic yellow vertical animated button"  ng-click="loadContainerInbound(container)" style="width:50px">
                    <div class="hidden content">View Items</div>
                    <div class="visible content">
                      <i class="ordered list icon"></i>
                    </div>
                  </div>
                </td>
                <td>@{{container.ContainerName}}</td>
                <td>@{{container.Arrival}}</td>
              </tr>
            </tbody>
          </table>

          <div class="ui modal" id="expectedItemsModal">
            <i class="close icon"></i>
            <div class="ui centered header">
              @{{selectedContainer.ContainerName}}
            </div>
            <div class="content">
              <form action="/itemInbound" method="POST">
                <input type="hidden" name="containerID" value="@{{selectedContainer.ContainerID}}">
                <table datatable="ng" class="ui compact celled table">
                  <thead>
                    <tr>
                      <th>Filters</th>
                      <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
                      <th><input type="text" style="width:95%" data-ng-model="filterExpected.item_model.sub_category.category.CategoryName" ></th>
                      <th><input type="text" style="width:95%" data-ng-model="filterExpected.item_model.sub_category.SubCategoryName" ></th>
                      <th><input type="text" style="width:95%" data-ng-model="filterExpected.item_model.ItemName" ></th>
                      <!--<th>Defect</th> -->
                      <th><input type="text" style="width:95%" data-ng-model="filterExpected.color" ></th>
                      <th><input type="text" style="width:95%" data-ng-model="filterExpected.size" ></th>
                      <!--<th>Image</th> -->
                    </tr>
                    <tr>
                      <th></th>
                      <!--<th>Container</th> -->
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Item</th>
                      <!--<th>Defect</th> -->
                      <th>Color</th>
                      <th>Size</th>
                      <!--<th>Image</th> -->
                    </tr>
                  </thead>
                  <tbody>
                      <tr ng-repeat="item in itemsInbound | filter : filterExpected">
                        <td><input type="checkbox" name="items[]" value="@{{item.ItemID}}"></td>
                        <!--<td>@{{item.container.ContainerName}}</td>-->
                        <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
                        <td>@{{item.item_model.sub_category.SubCategoryName}}</td>
                        <td>@{{item.item_model.ItemName}}</td>
                        <!--<td>@{{item.DefectDescription}}</td> -->
                        <td>@{{item.color}}</td>
                        <td>@{{item.size}}</td>
                       <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
                      </tr>
                  </tbody>
                </table>
            </div>
            <div class="actions">
              <button class="ui green button" type="submit" name="inboundAll" value="true">Inbound All</button>
              <div class="ui buttons">
                <button class="ui green button" type="submit" name="inbound" value="true">Inbound</button>
                <div class="or"></div>
                <button class="ui red button" type="submit" name="missing" value="true">Missing</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="ui bottom attached tab segment" data-tab="second">
          <a class="ui basic blue button" id="addBtn">
            <i class="add square icon"></i>
            Add Item
          </a>

                  <!-- add modal -->
          <div class="ui small modal" id="addModal">
              <i class="close icon"></i>
              <div class="ui centered header">
                Add Item
              </div>
              <div class="content">
              <form class="ui form" action="/addUnexpectedItem" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="containerID" value="">
                <div class="required fields">
                  <div class="five wide field">
                    <div class="ui sub header">Container</div>
                    <select name="containerID" id="item" class="ui search selection dropdown" ng-model="container" style="height:45px" REQUIRED>
                      <option selected disabled value="">Choose Containers</option>
                      <option ng-repeat="container in containers" value="@{{container.ContainerID}}">@{{container.ContainerName}} (@{{container.ActualArrival.split(" ")[0]}})</option>
                    </select>
                  </div>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Category</div>
                    <select name="category" id="item" class="ui search selection dropdown" ng-model="category" ng-change="loadSubcat()" style="height:45px" REQUIRED>
                      <option selected disabled value="">Choose Category</option>
                      <option ng-repeat="category in categories" value="@{{category.CategoryID}}">@{{category.CategoryName}}</option>
                    </select>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Subcategory</div>
                    <select name="subcategory" id="item" class="ui search selection dropdown" ng-model="subCategory" ng-change="loadItems()" style="height:45px" REQUIRED>
                      <option selected disabled value="">Choose Subcategory</option>
                      <option ng-repeat="subCategory in subCategories" value="@{{subCategory.SubCategoryID}}">@{{subCategory.SubCategoryName}}</option>
                    </select>
                  </div>

                  <div class="required field">
                    <div class="ui sub header">Item</div>
                    <select name="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loadItemDetails()"style="height:45px"  REQUIRED>
                      <option selected disabled value="">Choose Items</option>
                      <option ng-repeat="item in additems" value="@{{item.ItemModelID}}">@{{item.ItemName}}</option>
                    </select>
                  </div>
                </div>                

                  <div class="equal width fields">
                    <div class="field">
                      <div class="ui sub header">size</div>
                      <input type="text" name="size" placeholder="dimensions" ng-model="unexpected_size" required>
                    </div>

                    <div class="field">
                      <div class="ui sub header">Color</div>
                      <select name="color" id="unexpected_color" class="ui fluid search selection dropdown">
                        <option value="" selected disabled>Color</option>
                          @foreach($colors as $key => $color)
                            <option value="{{$color->ColorName}}">{{$color->ColorName}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="field">
                      <div class="ui sub header">Quantity</div>
                      <input type="number" id="quantity" name="quantity" min="1" placeholder="1" value="1" required>
                    </div>
                  </div>
                </div>
              <div class="actions">
                <button class="ui blue button" type="submit"><i class="checkmark icon"></i> Add Item</button>
                
              </div>
            </form>
          </div>
          <!-- END modal -->

          <div class="ui modal" id="unexpectedItemOfContainer">
            <i class="close icon"></i>
            <div class="ui centered header">
              @{{unexpectedContainer.ContainerName}}
            </div>
            <div class="content">
              <form action="/removeUnexpectedItems" method="POST">
              <table datatable="ng" class="ui compact celled inverted table">
                <thead>
                  <tr>
                    <th>Filters</th>
                    <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
                    <th><input type="text" style="width:95%" data-ng-model="filterUnexpected.item_model.sub_category.category.CategoryName" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterUnexpected.item_model.sub_category.SubCategoryName" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterUnexpected.item_model.ItemName" ></th>
                    <!--<th>Defect</th> -->
                    <th><input type="text" style="width:95%" data-ng-model="filterUnexpected.color" ></th>
                    <th><input type="text" style="width:95%" data-ng-model="filterUnexpected.size" ></th>
                    <!--<th>Image</th> -->
                  </tr>
                  <tr>
                    <th></th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Item</th>
                    <!--<th>Defect</th> -->
                    <th>Color</th>
                    <th>Size</th>
                    <!--<th>Image</th> -->
                  </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in unexpectedContainer.item | filter: filterUnexpected">
                      <td><input type="checkbox" name="items[]" value="@{{item.ItemID}}" /> </td>
                      <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
                      <td>@{{item.item_model.sub_category.SubCategoryName}}</td>
                      <td>@{{item.item_model.ItemName}}</td>
                      <!--<td>@{{item.DefectDescription}}</td> -->
                      <td>@{{item.color}}</td>
                      <td>@{{item.size}}</td>
                     <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
                    </tr>
                </tbody>
              </table>
            </div>
            <div class="actions">
              <div class="ui buttons">
              <button class="ui red button" type="submit">Remove</button>
              </form>
              </div>
            </div>
          </div>
            <!-- END modal -->
            <input type="hidden" name="samp" value="sa">

          <table datatable="ng" class="ui compact celled inverted table">
            <thead>
              <tr>
                <th></th>
                <th>ContainerName</th>
                <th>Expected Arrival</th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="container in containersWithUnexpectedItems">
                  <td class="collapsing">
                    <div class="ui basic yellow vertical animated button"  ng-click="loadContainerUnexpected(container)" style="width:50px">
                      <div class="hidden content">View Items</div>
                      <div class="visible content">
                        <i class="ordered list icon"></i>
                      </div>
                    </div>
                  </td>
                  <td>@{{container.ContainerName}}</td>
                  <td>@{{container.Arrival}}</td>
                </tr>
            </tbody>
          </table>
        </div>  

        <div class="ui bottom attached tab segment" data-tab="third">
           <!-- message -->
          <div class="ui icon message">
            <i class="info icon"></i>
            <div class="content">
              <div class="header">
                Info
              </div>
              <p>Items missing from the containers.</p>
            </div>
          </div>
          
          <div class="ui success message" ng-show="showFound">
            <i class='close icon'></i>
            <div class='ui centered header'>
              Item Found!!
            </div>
          </div>

          <div class="ui success message" ng-show="showMissingRemove">
            <i class='close icon'></i>
            <div class='ui centered header'>
              Item Removed!!
            </div>
          </div>

          <table datatable="ng" class="ui compact celled inverted table">
            <thead>
              <tr>
                <th></th>
                <th>ContainerName</th>
                <th>Expected Arrival</th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="container in containersWithMissing">
                  <td class="collapsing">
                    <div class="ui basic yellow vertical animated button"  ng-click="loadContainerMissing(container)" style="width:50px">
                      <div class="hidden content">View Items</div>
                      <div class="visible content">
                        <i class="ordered list icon"></i>
                      </div>
                    </div>
                  </td>
                  <td>@{{container.ContainerName}}</td>
                  <td>@{{container.Arrival}}</td>
                </tr>
            </tbody>
          </table>

          <div class="ui modal" id="missingItemsInContainer">
            <i class="close icon"></i>
            <div class="ui centered header">
              @{{missingContainer.ContainerName}}
            </div>
            <form action="/missingItemsAction" method="POST">
            <table datatable="ng" class="ui compact celled definition table">
              <thead>
                <tr>
                  <th>Filters</th>
                  <!--<th><input type="text" style="width:20px" data-ng-model="filterExpected.container.ContainerName"></th> -->
                  <th><input type="text" style="width:95%" data-ng-model="filterMissing.item_model.sub_category.category.CategoryName" ></th>
                  <th><input type="text" style="width:95%" data-ng-model="filterMissing.item_model.sub_category.SubCategoryName" ></th>
                  <th><input type="text" style="width:95%" data-ng-model="filterMissing.item_model.ItemName" ></th>
                  <!--<th>Defect</th> -->
                  <th><input type="text" style="width:95%" data-ng-model="filterMissing.color" ></th>
                  <th><input type="text" style="width:95%" data-ng-model="filterMissing.size" ></th>
                  <!--<th>Image</th> -->
                </tr>
                <tr>
                  <th></th>
                  <th>Category</th>
                  <th>Subcategory</th>
                  <th>Item</th>
                  <!--<th>Defect</th> -->
                  <th>Color</th>
                  <th>Size</th>
                  <!--<th>Image</th> -->
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="item in missingContainer.item | filter: filterMissing">
                    <td class="collapsing">
                      <input type="checkbox" name="items[]" value="@{{item.ItemID}}" />
                    </td>
                    <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
                    <td>@{{item.item_model.sub_category.SubCategoryName}}</td>
                    <td>@{{item.item_model.ItemName}}</td>
                    <!--<td>@{{item.DefectDescription}}</td> -->
                    <td>@{{item.color}}</td>
                    <td>@{{item.size}}</td>
                   <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
                  </tr>
              </tbody>
            </table>
            <button type="submit" class="ui blue button" name="found" value="true">Found/Arrived</button>
            <button type="submit" class="ui blue button" name="remove" value="true">Remove</button>
            </form>
          </div>
        </div>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
//add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

  $('#unexpected_color')
  .dropdown({
    allowAdditions: true
  });

  $('.ui.dropdown').dropdown();

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('itemsMissing')
    .then(function(response){
      $scope.itemsMissing = response.data;
    });

    $http.get('unexpectedItems')
    .then(function(response){
      $scope.unexpectedItems = response.data;
    });

    $http.get('/categories')
    .then(function(response){
      $scope.categories = response.data;  
    });

    $http.get('/containers')
    .then(function(response){
      $scope.containers = response.data;  
    });

    $http.get('/containersWithPendingItems')
    .then(function(response){
      $scope.containersWithPendingItems = response.data;  
    });

    $http.get('/containersWithUnexpectedItems')
    .then(function(response){
      $scope.containersWithUnexpectedItems = response.data;  
    });

    $http.get('/containersWithMissing')
    .then(function(response){
      $scope.containersWithMissing = response.data;  
    });

    $scope.loadContainerInbound = function(container){
      $scope.selectedContainer = container;
      $http.get('itemsInbound?containerID=' + container.ContainerID)
      .then(function(response){
        $scope.itemsInbound = response.data;
        $('#expectedItemsModal').modal('refresh');    
        $timeout(function(){
          $('#expectedItemsModal').modal('show');
        }, 100);
      });
    }

    $scope.loadContainerUnexpected = function(container){
      $scope.unexpectedContainer = container;
      $('#unexpectedItemOfContainer').modal('refresh');    
      $timeout(function(){
        $('#unexpectedItemOfContainer').modal('show');
      }, 100);
    }

    $scope.loadContainerMissing = function(container){
      $scope.missingContainer = container;
      $('#missingItemsInContainer').modal('refresh');    
      $timeout(function(){
        $('#missingItemsInContainer').modal('show');
      }, 100);
    }

    $scope.loadSubcat = function(){
      $http.get('/subcatOptions?catID=' + $scope.category)
      .then(function(response){
        $scope.subCategories = response.data;  
      });
    }

    $scope.loadItems = function(){
      $http.get('/itemModelsOfSubcat?subcatID=' + $scope.subCategory)
      .then(function(response){
        $scope.additems = response.data;  
      });
    }

    $scope.loadItemDetails = function(){
      var item;
      for (var i = 0; i < $scope.additems.length; i++) {
        if($scope.additems[i].ItemModelID == $scope.itemSelected){
          item = $scope.additems[i];
          break;
        }
      }

      $scope.unexpected_size = item.size;
      $('#unexpected_color').dropdown('set selected', item.color);
    }

    $scope.itemFound = function(item, index){
      $http.get('/itemFound?itemID=' + item.ItemID)
      .then(function(response){alert(JSON.stringify(response.data));
        $scope.showFound = true;
        if(response.data == 'success'){
          $scope.itemsMissing.splice(index, 1);
        }
      });
    }

    $scope.itemMissingRemove = function(item, index){
      $http.get('/itemMissingRemove?itemID=' + item.ItemID)
      .then(function(response){
        $scope.showMissingRemove = true;
        if(response.data == 'success'){
          $scope.itemsMissing.splice(index, 1);
        }
      });
    }
  });


$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;

$('.menu .item').tab();
</script>
@endsection