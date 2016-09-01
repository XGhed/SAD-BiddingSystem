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

                <div class="field">
                  <div class="ui sub header">Warehouse</div>
                  <select name="warehouse" id="warehouse" class="ui search selection dropdown" REQUIRED>
                    <option disabled selected>Warehouse</option>
                    <option ng-repeat="warehouse in addwarehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
                  </select>
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

            </div><!--content -->
            <div class="actions">
              <!-- <button class="ui button" onclick="modalClose()">Cancel</button>-->
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
              <form class="ui form" action="/editContainer" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="containerID" value="@{{edit_containerID}}">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Supplier</div>
                    <select name="supplier" id="edit_supplier" ng-model="edit_supplier" class="ui search selection dropdown" REQUIRED>
                      <option disabled selected>Supplier</option>
                      <option ng-repeat="supplier in suppliers" value="@{{supplier.SupplierID}}">@{{supplier.SupplierName}}</option>
                    </select>
                  </div>

                  <div class="equal width required fields">
                    <div class="field">
                      <div class="ui sub header">Warehouse</div>
                      <select name="warehouse" id="edit_warehouse" ng-model="edit_warehouse" class="ui search selection dropdown" REQUIRED>
                        <option disabled selected>Warehouse</option>
                        <option ng-repeat="warehouse in addwarehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
                      </select>
                    </div>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Container</div>
                    <input type="text" name="container" id="edit_container" ng-model="edit_container" placeholder="Container..." />
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Date</div>
                    <input type="date" name="date" id="edit_date" ng-model="edit_date" />
                  </div>
                  <div class="field">
                    <div class="ui sub header">Time</div>
                    <input type="time" name="time" id="edit_time" ng-model="edit_time" />
                  </div>
                </div>
                
              </div>
              <div class="actions">
                <button class="ui button" type="submit">Confirm</button>
              </div>
            </form>
        </div>
          <!-- END edit modal -->

          <table class="ui celled striped table" datatable="ng">
            <thead>
              <tr>
              <th></th>
              <th>Warehouse</th>
              <th>Container</th>
              <th>Expected Arrival</th>
              <th>Supplier</th>
            </tr></thead>
            <tbody>
              <tr ng-repeat="container in containers">
                <td class="collapsing inline field">
                  <div class="inline field">
                    <div class="ui vertical animated button"  ng-click="addItems(container.ContainerID)" style="width:50px">
                      <div class="hidden content">View Items</div>
                      <div class="visible content">
                        <i class="ordered list icon"></i>
                      </div>
                    </div>
                    <div class="ui vertical animated button"  ng-click="editModal(container)" style="width:50px">
                      <div class="hidden content">Edit</div>
                      <div class="visible content">
                        <i class=" edit icon"></i>
                      </div>
                    </div>
                    <p></p>
                    <div class="ui red vertical animated button" style="width:125px" ng-if="container.ActualArrival == null" ng-click="containerArrived(container.ContainerID)">
                      <div class="hidden content">Arrived</div>
                      <div class="visible content">
                        Not Yet
                      </div>
                    </div>
                    <div class="ui green vertical animated button" style="width:125px" ng-if="container.ActualArrival != null">
                      <div class="hidden content"><i class="checkmark icon"></i></div>
                      <div class="visible content">
                        Arrived
                      </div>
                    </div>
                  </div>
                </td>
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
  $('ui.dropdown')
  .dropdown();

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $window){
    $http.get('/suppliers')
    .then(function(response){
      $scope.suppliers = response.data;
    });

    $http.get('/allContainers')
    .then(function(response){
      $scope.containers = response.data;
    });

    $http.get('/warehouses')
    .then(function(response){
      $scope.addwarehouses = response.data;
    });

    $scope.addItems = function(containerID){
      $window.open("/itemContainer?containerID=" + containerID);
    }

    $scope.editModal = function(container){
      $('#editModal').modal('show');
      $scope.edit_containerID = container.ContainerID;
      $('#edit_supplier').val(container.SupplierID);
      $('#edit_warehouse').val(container.WarehouseNo);
      $scope.edit_container = container.ContainerName;

      var dateAndTime = container.Arrival.split(" ");
      $('#edit_date').val(dateAndTime[0]);
      $('#edit_time').val(dateAndTime[1]);
    }

    $scope.containerArrived = function(containerID){
      $http.get('/containerArrived?containerID=' + containerID)
      .then(function(response){
        if(response.data == 'success'){
          alert('success');
          $http.get('/allContainers')
          .then(function(response){
            $scope.containers = response.data;
          });
        }
      });
    }
  })
</script>
@endsection