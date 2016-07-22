@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="active item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="item" href="/itemInbound">
          Item Inbound
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
       <a class="ui basic blue button" id="addBtn">
          <i class="add user icon"></i>
          Add Container
        </a>

        <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Container
            </div>
            <div class="content">
              <form class="ui form" action="/addContainer" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">Supplier</div>
                  <select name="supplier" id="supplier" class="ui search selection dropdown" REQUIRED>
                    <option disabled selected>Supplier</option>
                    <option ng-repeat="supplier in suppliers" value="@{{supplier.SupplierID}}">@{{supplier.SupplierName}}</option>
                  </select>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Warehouse</div>
                    <select name="warehouse" id="warehouse" class="ui search selection dropdown" REQUIRED>
                      <option disabled selected>Warehouse</option>
                      <option ng-repeat="warehouse in addwarehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
                    </select>
                  </div>
                </div>

                <div class="field">
                  <div class="ui sub header">Container</div>
                  <input type="text" name="container" placeholder="Container..." />
                </div>
              </div>

              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">Date</div>
                  <input type="date" name="date" />
                </div>
                <div class="field">
                  <div class="ui sub header">Time</div>
                  <input type="time" name="time" />
                </div>
              </div>

                <!--<div class="field">
                  <div class="ui sub header">Item Name</div>
                  <input type="text" placeholder="Item name..." />
                  <div id="dynamicInput"></div>
                  <a value="Add" onclick="addInput('dynamicInput');">+ Add more item</a>
                </div> -->

            </div><!--content -->
            <div class="actions">
              <!-- <button class="ui button" onclick="modalClose()">Cancel</button>-->
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <table class="ui celled striped table">
            <thead>
              <tr>
              <th></th>
              <th>Warehouse</th>
              <th>Container</th>
              <th>Date And Time</th>
              <th>Supplier</th>
            </tr></thead>
            <tbody>
              <tr ng-repeat="container in containers">
                <td><a href="/itemContainer?containerID=@{{container.ContainerID}}" class="ui basic blue button"><i class="add square icon"></i> Add item</a></td>
                <td>@{{container.warehouse.Barangay_Street_Address}}, @{{container.warehouse.city.CityName}}, @{{container.warehouse.city.province.ProvinceName}}</td>
                <td>@{{container.ContainerName}}</td>
                <td>@{{container.Arrival}}</td>
                <td>@{{container.supplier.SupplierName}}</td>
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
  })

  //exit modal
  function modalClose() {
    $('.ui.modal').modal('hide'); 
  }

  //supplier dropdown
  $('#supplierSelect')
  .dropdown();

  //textbox
  function addInput(divName) {
      var newDiv = document.createElement('div');
      var inputHTML = "";
      inputHTML="<p></p><input type='text' placeholder='Item name...' />";
      newDiv.innerHTML = inputHTML;
      document.getElementById(divName).appendChild(newDiv);
  }

  var app = angular.module('myApp', []);
  app.controller('myController', function($scope, $http){
    $http.get('/suppliers')
    .then(function(response){
      $scope.suppliers = response.data;
    });

    $http.get('/containers')
    .then(function(response){
      $scope.containers = response.data;
    });

    $http.get('/warehouses')
    .then(function(response){
      $scope.addwarehouses = response.data;
    });
  })
</script>
@endsection