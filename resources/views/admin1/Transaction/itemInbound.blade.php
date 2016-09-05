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
           <!-- message -->
          <div class="ui icon message">
            <i class="info icon"></i>
            <div class="content">
              <div class="header">
                Info
              </div>
              <p>Check the items that arrived.</p>
            </div>
          </div>

          <table datatable="ng" class="ui compact celled table">
            <thead>
              <tr>
                <th>Arrived</th>
                <th>Missing?</th>
                <th>Container</th>
                <th>ItemID</th>
                <th>Item</th>
                <!--<th>Defect</th> -->
                <th>Color</th>
                <th>Size</th>
                <!--<th>Image</th> -->
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in itemsInbound">
                  <td>
                    <div class="ui green button" ng-click="itemDelivered(item, $index)">
                      <div class="content">Arrived</div>
                    </div>
                  </td>
                  <td>
                    <div class="ui red button" ng-click="itemMissing(item, $index)">
                      <div class="content">Missing</div>
                    </div>
                  </td>
                  <td>@{{item.container.ContainerName}}</td>
                  <td>@{{item.ItemID}}</td>
                  <td>@{{item.item_model.ItemName}}</td>
                  <!--<td>@{{item.DefectDescription}}</td> -->
                  <td>@{{item.color}}</td>
                  <td>@{{item.size}}</td>
                 <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
                </tr>
            </tbody>
          </table>
        </div>

        <div class="ui bottom attached tab segment" data-tab="second">
          <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Item
          </a>

                  <!-- add modal -->
          <div class="ui small modal" id="addModal">
            <form class="ui form" action="/addUnexpectedItem" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="containerID" value="">
              <i class="close icon"></i>
              <div class="header">
                Add Item
              </div>
              <div class="content">
                <div class="required fields">
                  <div class="five wide field">
                    <div class="ui sub header">Container</div>
                    <select name="containerID" id="item" class="ui search selection dropdown" ng-model="container" REQUIRED>
                      <option selected disabled value="">Containers</option>
                      <option ng-repeat="container in containers" value="@{{container.ContainerID}}">@{{container.ContainerName}}</option>
                    </select>
                  </div>
                </div>

                <div class="required fields">
                  <div class="five wide field">
                    <div class="ui sub header">Category</div>
                    <select name="category" id="item" class="ui search selection dropdown" ng-model="category" ng-change="loadSubcat()" REQUIRED>
                      <option selected disabled value="">Category</option>
                      <option ng-repeat="category in categories" value="@{{category.CategoryID}}">@{{category.CategoryName}}</option>
                    </select>
                  </div>

                  <div class="five wide field">
                    <div class="ui sub header">Subcategory</div>
                    <select name="subcategory" id="item" class="ui search selection dropdown" ng-model="subCategory" ng-change="loadItems()" REQUIRED>
                      <option selected disabled value="">Sub Category</option>
                      <option ng-repeat="subCategory in subCategories" value="@{{subCategory.SubCategoryID}}">@{{subCategory.SubCategoryName}}</option>
                    </select>
                  </div>

                  <div class="five wide required field">
                    <div class="ui sub header">Item</div>
                    <select name="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loadItemDetails()" REQUIRED>
                      <option selected disabled value="">Items</option>
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
                <button class="ui button" type="submit">Confirm</button>
                
              </div>
            </form>
          </div>
            <!-- END add modal -->
            <input type="hidden" name="samp" value="sa">
            <table datatable="ng" class="ui compact celled table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Container</th>
                  <th>Item</th>
                  <!--<th>Defect</th> -->
                  <th>Color</th>
                  <th>Size</th>
                  <!--<th>Image</th> -->
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="item in unexpectedItems">
                    <td>@{{item.ItemID}}</td>
                    <td>@{{item.container.ContainerName}}</td>
                    <td>@{{item.item_model.ItemName}}</td>
                    <!--<td>@{{item.DefectDescription}}</td> -->
                    <td>@{{item.color}}</td>
                    <td>@{{item.size}}</td>
                   <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
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

          <table datatable="ng" class="ui compact celled definition table">
            <thead>
              <tr>
                <th></th>
                <th>Container</th>
                <th>ItemID</th>
                <th>Item</th>
                <!--<th>Defect</th> -->
                <th>Color</th>
                <th>Size</th>
                <!--<th>Image</th> -->
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in itemsMissing">
                  <td>
                    <div class="ui vertical animated button" ng-click="itemFound(item, $index)">
                      <div class="content">Found/Arrived</div>
                    </div>
                  </td>
                  <td>@{{item.container.ContainerName}}</td>
                  <td>@{{item.ItemID}}</td>
                  <td>@{{item.item_model.ItemName}}</td>
                  <!--<td>@{{item.DefectDescription}}</td> -->
                  <td>@{{item.color}}</td>
                  <td>@{{item.size}}</td>
                 <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
                </tr>
            </tbody>
          </table>
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

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('itemsInbound')
    .then(function(response){
      $scope.itemsInbound = response.data;
    });

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

    $scope.itemMissing = function(item, index){
      $http.get('/itemMissing?itemID=' + item.ItemID)
      .then(function(response){
        alert(response.data);
        if(response.data == 'success'){
          $scope.itemsInbound.splice(index, 1);
        }
      });
    }

    $scope.itemDelivered = function(item, index){
      $http.get('/itemDelivered?itemID=' + item.ItemID)
      .then(function(response){
        alert(response.data);
        if(response.data == 'success'){
          $scope.itemsInbound.splice(index, 1);
        }
      });
    }

    $scope.itemFound = function(item, index){
      $http.get('/itemFound?itemID=' + item.ItemID)
      .then(function(response){
        alert(response.data);
        if(response.data == 'success'){
          $scope.itemsMissing.splice(index, 1);
        }
      });
    }

  });


$('.menu .item').tab();
</script>
@endsection