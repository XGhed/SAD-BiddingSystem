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
        <a class=" item" href="/inventory">
          Inventory
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
        <a class="item" href="/deliveryApproval">
          Delivery/Pick-up Approval
        </a>
        <a class="active item" href="/itemOutbound">
          Item Outbound
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Item Outbound</div>

        <div class="ui top attached tabular menu">
          <a class="active item" data-tab="first">Expected Item</a>
          <a class="item" data-tab="second">Unexpected Item</a>
        </div>

        
        <div class="ui bottom attached active tab segment" data-tab="first">
          <a class="ui basic blue button" id="modalBtn">
            <i class="add user icon"></i>
            modalBtn
          </a>

            <table class="ui celled table">
              <thead>
                <tr><th>Header</th>
                <th>Header</th>
                <th>Header</th>
              </tr></thead>
              <tbody>
               <tr>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>
              </tbody>
            </table>

            <!-- MODAL -->
            <div class="ui small modal" id="modalShow">
              <i class="close icon"></i>
                <div class="header">
                  Modal 1
                </div>
                <div class="content">
                <!-- laman here -->
                </div>
            </div>
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
                
              </div>
          </div>
            <!-- END add modal -->

            <table class="ui celled table">
              <thead>
                <tr><th>Header</th>
                <th>Header</th>
                <th>Header</th>
              </tr></thead>
              <tbody>
               <tr>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
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

  //add modal
  $(document).ready(function(){
       $('#modalBtn').click(function(){
          $('#modalShow').modal('show');    
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