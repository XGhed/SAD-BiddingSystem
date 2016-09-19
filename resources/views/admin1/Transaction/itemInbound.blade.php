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

          <form action="/itemInbound" method="POST">
            <table datatable="ng" class="ui compact celled table">
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
                  <tr ng-repeat="item in itemsInbound">
                    <td><input type="checkbox" name="items[]" value="@{{item.ItemID}}"></td>
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
            <button class="ui green button" type="submit" name="inbound">Inbound</button>
            <button class="ui red button" type="submit" name="missing">Missing</button>
          </form>
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
                      <option ng-repeat="container in containers" value="@{{container.ContainerID}}">@{{container.ContainerName}}</option>
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
          
          <div class="ui success message" ng-show="showFound">
            <i class='close icon'></i>
            <div class='ui centered header'>
              Item Found!!
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
                  <td class="collapsing">
                    <div class="ui blue button" ng-click="itemFound(item, $index)">
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

    $scope.itemFound = function(item, index){
      $http.get('/itemFound?itemID=' + item.ItemID)
      .then(function(response){
        $scope.showFound = true;
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