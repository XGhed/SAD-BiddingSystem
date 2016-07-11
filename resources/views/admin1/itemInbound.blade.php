@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="active item"href="/itemInbound">
          Item Inbound
        </a>
        <a class=" item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent1">
          Bidding Event
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui celled relaxed list">
       <div class="ui centered header">Ordered Items</div>

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







        <form action="/itemDelivered" method="POST"><input type="hidden" name="samp" value="sa">
        <table datatable="ng" class="ui compact celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Container</th>
              <th>Item</th>
              <th>Defect</th>
              <th>Color</th>
              <th>Size</th>
              <th>Image</th>
            </tr>
          </thead>
          <tbody>
              <tr ng-repeat="item in itemsInbound">
                <td>
                  <input type="checkbox" name="delivereditems[]" class="ui checkbox" value="@{{item.ItemID}}"/>
                </td>
                <td>@{{item.container.ContainerName}}</td>
                <td>@{{item.item_model.ItemName}}</td>
                <td>@{{item.DefectDescription}}</td>
                <td>@{{item.color}}</td>
                <td>@{{item.size}}</td>
                <td> <img src="@{{item.image_path}}" style="width:60px;height:60px;"/> </td>
              </tr>
          </tbody>
        </table>
        <input type="submit" class="ui button" value="Confirm"></input>
        </form>
      </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
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
  });
</script>
@endsection