@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="active item" href="/itemInbound">
          Item Inbound
        </a>
        <a class="item" href="/itemChecking">
          Item Checking
        </a>        
        <a class=" item" href="/inventory">
          Inventory
        </a> 
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>       
        <a class="item" href="/movingOfItems">
          Moving of Items
        </a>
        <a class="item" href="/biddingEvent">
          Bidding Event
        </a>
        <a class="item" href="/accountApproval">
          Account Approval
        </a>
        <a class="item" href="/prepareCheckout">
          Prepare Checkout Items
        </a>
        <a class=" item" href="/paymentCheckout">
          Payment Checkout Items
        </a>
        <a class="item" href="/itemOutbound">
          Item Outbound
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Ordered Items</div>

        <div class="ui top attached tabular menu">
          <a class="active item" data-tab="first">Expected Item</a>
          <a class="item" data-tab="second">Unexpected Item</a>
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

          <form action="/itemDelivered" method="POST">
            <input type="hidden" name="samp" value="sa">
            <table datatable="ng" class="ui compact celled definition table" id="tableOutput">
              <thead>
                <tr>
                  <th></th>
                  <th>Container</th>
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
                      <input type="checkbox" name="delivereditems[]" class="ui checkbox" value="@{{item.ItemID}}"/>
                    </td>
                    <td>@{{item.container.ContainerName}}</td>
                    <td>@{{item.item_model.ItemName}}</td>
                    <!--<td>@{{item.DefectDescription}}</td> -->
                    <td>@{{item.color}}</td>
                    <td>@{{item.size}}</td>
                   <!-- <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td> -->
                  </tr>
              </tbody>
            </table>
              <input type="submit" class="ui button" value="Confirm"></input>
          </form>
        </div>

        <div class="ui bottom attached tab segment" data-tab="second">
          <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Item
          </a>

                  <!-- add modal -->
          <div class="ui small modal" id="addModal">
            <i class="close icon"></i>
              <div class="header">
                Add Item
              </div>
              <div class="content">
                <form class="ui form" action="/addUnexpectedItem" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="containerID" value="">
                
                <div class="required fields">
                  <div class="five wide field">
                    <div class="ui sub header">Container</div>
                    <select name="containerID" id="item" class="ui search selection dropdown" ng-model="container" REQUIRED>
                      <option ng-repeat="container in containers" value="@{{container.ContainerID}}">@{{container.ContainerName}}</option>
                    </select>
                  </div>
                </div>

                <div class="required fields">
                  <div class="five wide field">
                    <div class="ui sub header">Category</div>
                    <select name="category" id="item" class="ui search selection dropdown" ng-model="category" ng-change="loadSubcat()" REQUIRED>
                      <option ng-repeat="category in categories" value="@{{category.CategoryID}}">@{{category.CategoryName}}</option>
                    </select>
                  </div>

                  <div class="five wide field">
                    <div class="ui sub header">Subcategory</div>
                    <select name="subcategory" id="item" class="ui search selection dropdown" ng-model="subCategory" ng-change="loadItems()" REQUIRED>
                      <option ng-repeat="subCategory in subCategories" value="@{{subCategory.SubCategoryID}}">@{{subCategory.SubCategoryName}}</option>
                    </select>
                  </div>

                  <div class="five wide required field">
                    <div class="ui sub header">Item</div>
                    <select name="item" id="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loaditemDetails()" REQUIRED>
                      <option ng-repeat="item in additems" value="@{{item.ItemModelID}}">@{{item.ItemName}}</option>
                    </select>
                  </div>
                </div>                

                  <div class="equal width fields">
                    <div class="field">
                      <div class="ui sub header">size</div>
                      <input type="text" name="size" placeholder="dimensions" ng-model="size" required>
                    </div>

                    <div class="field">
                      <div class="ui sub header">Color</div>
                      <div class="ui fluid search selection dropdown" id="color">
                        <input name="color" type="hidden" id="color">
                        <i class="dropdown icon"></i>
                        <div class="default text">Color</div>
                        <div class="menu">
                          @foreach($colors as $key => $color)
                            <div class="item" data-value="{{$color->ColorName}}">{{$color->ColorName}}</div>
                          @endforeach
                        </div>
                      </div>
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
            <input type="hidden" name="samp" value="sa">
            <table datatable="ng" class="ui compact celled table" id="tableOutput">
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

  $('.list .master.checkbox')
    .checkbox({
      // check all children
      onChecked: function() {
        var
          $childCheckbox  = $(this).closest('.checkbox').siblings('.list').find('.checkbox');
          $childCheckbox.checkbox('check');
      },
      // uncheck all children
      onUnchecked: function() {
        var
          $childCheckbox  = $(this).closest('.checkbox').siblings('.list').find('.checkbox')
        ;
        $childCheckbox.checkbox('uncheck');
      }
    })
  ;

  $('#color')
  .dropdown({
    allowAdditions: true
  });

  $('.list .child.checkbox')
    .checkbox({
      // Fire on load to set parent value
      fireOnInit : true,
      // Change parent state on each child checkbox change
      onChange   : function() {
        var
          $listGroup      = $(this).closest('.list'),
          $parentCheckbox = $listGroup.closest('.item').children('.checkbox'),
          $checkbox       = $listGroup.find('.checkbox'),
          allChecked      = true,
          allUnchecked    = true
        ;
        // check to see if all other siblings are checked or unchecked
        $checkbox.each(function() {
          if( $(this).checkbox('is checked') ) {
            allUnchecked = false;
          }
          else {
            allChecked = false;
          }
        });
        // set parent checkbox state, but dont trigger its onChange callback
        if(allChecked) {
          $parentCheckbox.checkbox('set checked');
        }
        else if(allUnchecked) {
          $parentCheckbox.checkbox('set unchecked');
        }
        else {
          $parentCheckbox.checkbox('set indeterminate');
        }
      }
    })
  ;

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('itemsInbound')
    .then(function(response){
      $scope.itemsInbound = response.data;
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
  });


$('.menu .item').tab();
</script>
@endsection