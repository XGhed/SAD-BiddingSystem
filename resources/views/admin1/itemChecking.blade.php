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
       <!-- info -->
          <div class="ui icon  info message">
            <i class="info icon"></i>
            <div class="content">
              <div class="header">
                Info
              </div>
              <p>Click the item to add Image and Defect.</p>
            </div>
          </div>

      <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Unchecked items</a>
        <a class="item" data-tab="second">Checked items</a>
      </div>

      <div class="ui bottom attached active tab segment" data-tab="first">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Item Name</th>
              <th>Container</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="item in itemsChecking" >
                    <td>
                      <button ng-click="showModal()" class="ui basic green button">View Item</button>
                    </td>
                    <td style="cursor: pointer;" ng-click="showModal()">@{{item.item_model.ItemName}}</td>
                    <td style="cursor: pointer;" ng-click="showModal()">@{{item.container.ContainerName}}</td>
                  </tr>
          </tbody>
        </table>
        <div class="ui small modal" id="mdl">
          <i class="close icon"></i>
          <h1 class="ui centered header">Add Image and Defect to the item</h1>
          <div class="content">
            <form class="ui form">
              <div class="field">
                <div class="four wide field">
                  <div class="field">
                    <div class="ui sub header">Image</div>
                    <input type="file" name="add_photo" REQUIRED>
                  </div>
                </div>

                <div class="fields">
                  <div class="three wide field">
                    <div class="ui checkbox">
                      <input type="checkbox" id="test5" name="defect" />
                      <label>Defect</label>
                    </div>
                  </div>

                  <div class="five wide field" style="display: none" id="defectDesc">
                    <input id="def" type="text" name="defectDesc" placeholder="Description" />
                  </div>
                </div>
              </div>
          </div>
          <div class="actions">
            <button class="ui basic blue button" type="submit">Confirm</button>
          </div>
            </form>
        </div>
      </div><!-- tab 1-->

      <div class="ui bottom attached tab segment" data-tab="second">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Item Name</th>
              <th>Container</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="item in itemsChecking" >
                    <td>
                      <button ng-click="showModal()" class="ui basic green button">View Item</button>
                    </td>
                    <td style="cursor: pointer;" ng-click="showModal()">@{{item.item_model.ItemName}}</td>
                    <td style="cursor: pointer;" ng-click="showModal()">@{{item.container.ContainerName}}</td>
                  </tr>
          </tbody>
        </table>
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


    $scope.showModal = function(index){
      $('#mdl').modal('show');
    }
  });

$('.menu .item').tab();


 //defect description
    $(document).ready(function () {
      $('#test5').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('defectDesc').style.display = 'block';
          } else {
              document.getElementById('defectDesc').style.display = 'none';
          }
     });
    });
</script>
@endsection