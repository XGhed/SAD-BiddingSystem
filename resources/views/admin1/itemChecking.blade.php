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
        <a class="active item" href="/itemInbound">
          Item Checking
        </a>
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class=" item" href="/inventory">
          Inventory
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
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Item Checking</div>

      <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Unchecked items</a>
        <a class="item" data-tab="second">Checked items</a>
      </div>

      <div class="ui bottom attached active tab segment" data-tab="first">
        <table datatable="ng" class="ui compact celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Item Name</th>
              <th>Container</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="item in itemsChecking">
                    <td>
                      <input type="checkbox" name="delivereditems[]" class="ui checkbox" value="@{{item.ItemID}}"/>
                    </td>
                    <td>@{{item.item_model.ItemName}}</td>
                    <td>@{{item.container.ContainerName}}</td>
                  </tr>
          </tbody>
        </table>
      </div>

      <div class="ui bottom attached tab segment" data-tab="second">
        Di ko pa alam kung anong ilalagay ko kaya "Haha!" muna.
      </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>

var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('itemsChecking')
    .then(function(response){
      $scope.itemsChecking = response.data;
    });
  });
$('.menu .item').tab();
</script>
@endsection