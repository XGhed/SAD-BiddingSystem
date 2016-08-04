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
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class="active item" href="/inventory">
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

    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Per Stock</a>
      <a class="item" data-tab="second">Per Item</a>
      <a class="item" data-tab="third">Requested for Dispose</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
      <!-- table -->
        <table datatable="ng" class="ui celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Date Acquired</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in items" ng-if="item.pull_request.length == 0">
              <td class="collapsing">
                <div class="ui vertical animated button " tabindex="1" ng-click="viewItemHistory($index)">
                  <div class="hidden content">Item Logs</div>
                  <div class="visible content">
                    <i class="large history icon"></i>
                  </div>
                </div><br>
                <div class="ui vertical animated button" tabindex="0" ng-click="dispose($index)">
                  <div class="hidden content">Dispose</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td id="tableRow">@{{item.item_model.ItemName}}</td>
              <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
              <td><img src="@{{item.image_path}}" style="width:60px;height:60px;" /></td>
              <td>@{{item.size}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
              <td>@{{item.container.Arrival}}</td>
            </tr>
          </tbody>
        </table>
    </div>

    <!--2nd tab-->

    <div class="ui bottom attached tab segment" data-tab="second">
      <table class="ui celled table" datatable="ng">
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
            <td>
              <a class="ui basic blue button" ng-click="viewStocks($index)">
                <i class="add user icon"></i>
                View Stocks
              </a>              
            </td>
            <td>@{{itemmodel.ItemName}}</td>
            <td>@{{itemmodel.sub_category.category.CategoryName}}</td>
            <td>@{{itemmodel.sub_category.SubCategoryName}}</td>
            <td>@{{itemmodel.items.length}}</td>
          </tr>
        </tbody>
        <tfoot>
      </table>
    </div>

    <div class="ui bottom attached tab segment" data-tab="third">
      <!-- table -->
        <table datatable="ng" class="ui compact celled definition table">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Date Acquired</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in items" ng-if="item.pull_request.length > 0">
              <td class="collapsing">
                <div class="ui vertical animated button " tabindex="1" ng-click="viewItemHistory($index)">
                  <div class="hidden content">Item Logs</div>
                  <div class="visible content">
                    <i class="large history icon"></i>
                  </div>
                </div><br>
                <div class="ui vertical animated button" tabindex="0" ng-click="cancelDispose($index)">
                  <div class="hidden content">Cancel</div>
                  <div class="visible content">
                    <i class="large ban icon"></i>
                  </div>
                </div> 
              </td>
              <td id="tableRow">@{{item.item_model.ItemName}}</td>
              <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
              <td><img src="@{{item.image_path}}" style="width:60px;height:60px;" /></td>
              <td>@{{item.size}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
              <td>@{{item.container.Arrival}}</td>
            </tr>
          </tbody>
        </table>
    </div>

          <!--item History modal -->
        <div class="ui small modal" id="itemHistory">
           <i class="close icon"></i>
            <div class="header">
            Item Logs
            </div>
            <div class="content">
              <table class="ui celled table">
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
          <!-- END item history modal -->

             <!--item list modal -->
        <div class="ui modal" id="itemLists">
           <i class="close icon"></i>
            <div class="header">
            Item Logs
            </div>
            <div class="content">
              <table class="ui celled table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Warehouse</th>
                    <th>Supplier</th>
                    <th>Date Acquired</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in itemsOfModel">
                    <td class="collapsing">
                      <div class="ui vertical animated button " tabindex="1" ng-click="viewItemHistory($index)">
                        <div class="hidden content">Item Logs</div>
                        <div class="visible content">
                          <i class="large history icon"></i>
                        </div>
                      </div>
                      <div class="ui vertical animated button" tabindex="0">
                        <div class="hidden content">Dispose</div>
                        <div class="visible content">
                          <i class="large trash icon"></i>
                        </div>
                      </div> 
                    </td>
                    <td id="tableRow">@{{item.item_model.ItemName}}</td>
                    <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
                    <td><img src="@{{item.image_path}}" style="width:60px;height:60px;" /></td>
                    <td>@{{item.size}}</td>
                    <td>@{{item.color}}</td>
                    <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
                    <td>@{{item.container.supplier.SupplierName}}</td>
                    <td>@{{item.container.Arrival}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
          <!-- END itemLists modal -->
         
    </div>
  </div>
</div>


<div class="ui modal" id="history">
  <i class="close icon"></i>
  <div class="header">
    History Log
  </div>
  <div class="content">

  </div>
  <div class="actions">
    <div class="ui button" onclick="modalClose()">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>


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

      $(document).ready(function () {
        $('#test6').click(function () {
            var $this = $(this);
            if ($this.is(':checked')) {
                document.getElementById('defectDesc1').style.display = 'block';
            } else {
                document.getElementById('defectDesc1').style.display = 'none';
          }
        });
      });

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
  app.controller('myController', function($scope, $http){
    $http.get('itemsInventory')
    .then(function(response){
      $scope.items = response.data;
    });

    $http.get('itemmodelsInventory')
    .then(function(response){
      $scope.itemmodels = response.data;
    });

    $scope.viewStocks = function(index){
      var ItemModelID = $scope.itemmodels[index].ItemModelID;
      $('#itemLists').modal('show');    
      $http.get('itemsOfModelInventory?itemID=' + ItemModelID)
      .then(function(response){
        $scope.itemsOfModel = response.data;
      });
    }

    $scope.viewItemHistory = function(index){
      $scope.histories = $scope.items[index].item_history;
      $('#itemHistory').modal('show');
    }

    $scope.dispose = function(index){
      $http.get('disposeItem?itemID=' + $scope.items[index].ItemID)
      .then(function(response){
        if(response.data == "success"){
          alert('Requested for dispose');
          return $http.get('singleItem?itemID=' + $scope.items[index].ItemID);
        }
      })
      .then(function(response){
        $scope.items[index] = response.data;
      });
    }

    $scope.cancelDispose = function(index){
      $http.get('cancelDisposeItem?itemID=' + $scope.items[index].ItemID)
      .then(function(response){
        alert('Cancelled for disposal');
        return $http.get('singleItem?itemID=' + $scope.items[index].ItemID);
      })
      .then(function(response){
        $scope.items[index] = response.data;
      });
    }
  });
</script>
@endsection