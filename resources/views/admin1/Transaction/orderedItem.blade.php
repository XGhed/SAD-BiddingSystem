@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
          <i class="add square icon"></i>
          Add Container
        </a>

        <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Add Container
            </div>
            <div class="content">
              <form class="ui form" action="/addContainer" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">Supplier</div>
                  <select name="supplier" id="supplier" class="ui search selection dropdown" style="height: 45px;" REQUIRED>
                    <option disabled selected value="">Supplier</option>
                    <option ng-repeat="supplier in suppliers" value="@{{supplier.SupplierID}}">@{{supplier.SupplierName}}</option>
                  </select>
                </div>

                <div class="field">
                  <div class="ui sub header">Warehouse</div>
                  <select name="warehouse" id="warehouse" class="ui search selection dropdown" style="height: 45px;" REQUIRED>
                    <option disabled selected value="">Warehouse</option>
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
              <button class="ui blue button" type="submit"><i class="checkmark icon"></i> Add Container</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!-- edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Edit Container
            </div>
            <div class="content">
              <form class="ui form" action="/editContainer" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="containerID" value="@{{edit_containerID}}">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Supplier</div>
                    <select name="supplier" id="edit_supplier" ng-model="edit_supplier" class="ui search selection dropdown" style="height:45px" REQUIRED>
                      <option disabled selected>Supplier</option>
                      <option ng-repeat="supplier in suppliers" value="@{{supplier.SupplierID}}">@{{supplier.SupplierName}}</option>
                    </select>
                  </div>

                  <div class="equal width required fields">
                    <div class="field">
                      <div class="ui sub header">Warehouse</div>
                      <select name="warehouse" id="edit_warehouse" ng-model="edit_warehouse" class="ui search selection dropdown" style="height:45px" REQUIRED>
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
                <button class="ui blue button" type="submit"><i class="checkmark icon"></i> Confirm</button>
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
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="container in containers">
                <td class="collapsing inline field">
                  <div class="inline field">
                    <div class="ui basic violet vertical animated button"  ng-click="addItems(container.ContainerID)" style="width:50px">
                      <div class="hidden content">View Items</div>
                      <div class="visible content">
                        <i class="ordered list icon"></i>
                      </div>
                    </div>
                    <div class="ui green basic vertical animated button"  ng-click="editModal(container)" ng-if="container.ActualArrival == null" style="width:50px">
                      <div class="hidden content">Edit</div>
                      <div class="visible content">
                        <i class=" edit icon"></i>
                      </div>
                    </div>
                    <p></p>
                    <div class="ui red vertical animated button" style="width:125px" ng-if="container.ActualArrival == null" ng-click="containerArrived(container.ContainerID)">
                      <div class="hidden content">Click to Confirm</div>
                      <div class="visible content">
                        Not Yet Arrived
                      </div>
                    </div>
                    <div class="ui blue vertical animated button" style="width:125px" ng-if="container.ActualArrival != null" style="cursor: default;">
                      <div class="hidden content" style="cursor: default;">
                        Container Arrived!
                      </div>
                      <div class="visible content">
                        <i class="checkmark icon" ></i>Arrived
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

          

          <div class="ui basic modal" id="alert">
            <h1 class='ui centered header'>
              Container Arrived!!
             </h1>
          </div>

          <div class="ui basic modal" id="empty">
            <h1 class='ui centered header'>
              Container Empty!!
             </h1>
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
          $('#alert').modal('show');
          $http.get('/allContainers')
          .then(function(response){
            $scope.containers = response.data;
          });
        }
        else if (response.data == 'empty'){
          $('#empty').modal('show');
        }
      });
    }
  })
</script>
@endsection