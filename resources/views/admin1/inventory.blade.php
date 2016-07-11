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
        <a class=" active item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent1">
          Bidding Event
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">

    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">First</a>
      <a class="item" data-tab="second">Second</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
      <!-- table -->
        <table datatable="ng" class="ui compact celled definition table" id="tableOutput">
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
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in items">
              <td class="collapsing">
                <div class="ui vertical animated button " tabindex="1" id="editBtn">
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
            </tr>
          </tbody>
        </table>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
      <table class="ui celled table">
        <thead>
          <tr>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a class="ui basic blue button" id="addBtn">
                <i class="add user icon"></i>
                View Stocks
              </a>              
            </td>
            <td>Cell</td>
            <td>Cell</td>
          </tr>
        </tbody>
        <tfoot>
      </table>
    </div>

          <!-- view stocks modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
            </div>
        </div>
          <!-- END view stocks modal -->

          <!--item logs modal -->
        <div class="ui small modal" id="editModal">
           <i class="close icon"></i>
            <div class="header">
            Item Logs
            </div>
            <div class="content">
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
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
            </div>
        </div>
          <!-- END item logs modal -->
         
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

  //edit modal
  $(document).ready(function(){
       $('#editBtn').click(function(){
          $('#editModal').modal('show');    
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
  });
</script>
@endsection