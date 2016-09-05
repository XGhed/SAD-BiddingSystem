@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController" ng-init="containerID = {{$container->ContainerID}}">
  @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <h1 class="ui centered header">{{$container->ContainerName}}</h1>
        @if($container->ActualArrival == NULL)
          <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Item
          </a>
        @endif
        

        <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              <form class="ui form" action="/addItemToContainer" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="containerID" value="{{$container->ContainerID}}">
              
              <div class="required fields">
                <div class="five wide field">
                  <div class="ui sub header">Category</div>
                  <select name="item" id="item" class="ui search selection dropdown" ng-model="category" ng-change="loadSubcat()" REQUIRED>
                    <option value="" disabled selected>Category</option>
                    <option ng-repeat="category in categories" value="@{{category.CategoryID}}">@{{category.CategoryName}}</option>
                  </select>
                </div>
                <div class="five wide field">
                  <div class="ui sub header">Subcategory</div>
                  <select name="item" id="item" class="ui search selection dropdown" ng-model="subCategory" ng-change="loadItems()" REQUIRED>
                    <option value="" disabled selected>Subcategory</option>
                    <option ng-repeat="subCategory in subCategories" value="@{{subCategory.SubCategoryID}}">@{{subCategory.SubCategoryName}}</option>
                  </select>
                </div>
                <div class="five wide required field">
                  <div class="ui sub header">Item</div>
                  <select name="item" id="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loaditemDetails()" REQUIRED>
                    <option value="" disabled selected>Item</option>
                    <option ng-repeat="item in additems" value="@{{item.ItemModelID}}">@{{item.ItemName}}</option>
                  </select>
                </div>
              </div>                

                

                  

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Default Size</div>
                    <input type="text" name="size" placeholder="dimensions" ng-model="size" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Default Color</div>
                    <select class="ui fluid search selection dropdown" id="color" name="color" ng-model="color">
                      <option value="" disabled selected>Color</option>
                      <option ng-repeat="color in colors" value="@{{color.ColorName}}">@{{color.ColorName}}</option>
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
              </form>
            </div>
        </div>
          <!-- END add modal -->

           <!-- edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Item
            </div>
            <div class="content">
              <form class="ui form" action="/editItemToContainer" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="containerID" value="{{$container->ContainerID}}">
              <input type="hidden" name="itemID" value="@{{edit_itemID}}">
              <div class="required fields">
                <div class="five wide field">
                  <div class="ui sub header">Category</div>
                  @{{edit_category}}
                </div>
                <div class="five wide field">
                  <div class="ui sub header">Subcategory</div>
                  @{{edit_subcategory}}
                </div>
                <div class="five wide required field">
                  <div class="ui sub header">Item</div>
                  @{{edit_item}}
                </div>
              </div>
              <div class="ui header">Defaul Values</div>
              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">size</div>
                  <input type="text" name="size" placeholder="dimensions" ng-model="edit_size" id="edit_size" required>
                </div>

                <div class="field">
                  <div class="ui sub header">Color</div>
                  <select class="ui fluid search selection dropdown" id="edit_color" name="color" ng-model="edit_color">
                    <option value="" disabled selected>Color</option>
                    <option ng-repeat="color in colors" value="@{{color.ColorName}}">@{{color.ColorName}}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
            </div>
            </form>
        </div>
          <!-- END edit modal -->

          <table datatable="ng" class="ui compact celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Item ID</th>
              <th>Name</th>
              <th>Category</th>
             <!-- <th>Photo</th> -->
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in viewitems">
              <td class="collapsing">
                <div class="editBtn ui vertical animated button" tabindex="1" ng-click="editModal(item)">
                  <div class="hidden content">Edit</div>
                  <div class="visible content">
                    <i class="large edit icon"></i>
                  </div>
                </div>
                <div class="ui vertical animated button" tabindex="0" ng-if="{{$container->ActualArrival}} != NULL" ng-click="deleteOrderedItem($index)">
                  <div class="hidden content">Delete</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td>@{{item.ItemID}}</td>
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
              <!--<td><img src="@{{item.image_path}}" style="width:60px;height:60px;" /></td> -->
              <td>@{{item.size}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
            </tr>
          </tbody>
        </table>

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

  //dropdowns
  $('.ui.normal.dropdown')
    .dropdown();

  //exit
  function modalClose() {
    $('.ui.modal').modal('hide'); 
    }

  $('#color')
  .dropdown({
    allowAdditions: true
  });

   $('#edit_color')
  .dropdown({
    allowAdditions: true
  });


////////////////////////////////////////////////////////////////////////// 

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('/categories')
    .then(function(response){
      $scope.categories = response.data;
      $timeout(function(){
        $('.dropdown').dropdown('refresh');
      }, 1000);  
    });

    $http.get('/colors')
    .then(function(response){
      $scope.colors = response.data;
      $timeout(function(){
        $('.dropdown').dropdown('refresh');
      }, 1000);
    });

    $scope.editModal = function(item){
      $('#editModal').modal('setting', 'transition', 'vertical flip').modal('show'); 
      $scope.edit_itemID = item.ItemID; 
      $scope.edit_category = item.item_model.sub_category.category.CategoryName;
      $scope.edit_subcategory = item.item_model.sub_category.SubCategoryName;
      $scope.edit_item = item.item_model.ItemName;
      $scope.edit_size = item.size;
      $('#edit_color').dropdown('set selected', item.color);
    }

    $timeout(function(){
      $http.get('itemsInContainer?containerID=' + $scope.containerID)
      .then(function(response){
        $scope.viewitems = response.data;
      });
    } , 1000);

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

    $scope.loaditemDetails = function(){
      for(var key=0; key<$scope.additems.length; key++){
        if($scope.additems[key].ItemModelID == $scope.itemSelected){
          $scope.size = $scope.additems[key].size;
          $('#color').dropdown('set selected', $scope.additems[key].color);
        }
      }
    }

    $scope.deleteOrderedItem = function(index){
      $http.get('/deleteOrderedItem?itemID=' + $scope.viewitems[index].ItemID)
      .then(function(response){
        if(response.data == 'success'){
          $scope.viewitems.splice(index, 1);
          alert(response.data);
        }
        else {
          alert(response.data);
        }
      })
    }
  });
</script>
@endsection
