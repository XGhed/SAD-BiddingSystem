@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController" ng-init="containerID = {{$container->ContainerID}}">
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
          Add Item
        </a>

        <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              <form class="ui form" action="/addItemToContainer" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="containerID" value="{{$container->ContainerID}}">
                <div class="ten wide required field">
                  <div class="ui sub header">Item</div>
                  <select name="item" id="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loaditemDetails()" REQUIRED>
                    <option disabled selected>Item</option>
                    <option ng-repeat="item in additems" value="@{{item.ItemModelID}}">@{{item.ItemName}}</option>
                  </select>
                </div>

                   <div class="five wide field">
                   <div class="field" id="dti">
                      <label>Photo</label>
                      <i class="file icon"></i>
                      <input type="file" name="add_photo">
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

                <div class="inline fields">
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
            <div class="actions">
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
              <form class="ui form" action="/addItemToContainer" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="containerID" value="{{$container->ContainerID}}">
                <div class="ten wide required field">
                  <div class="ui sub header">Item</div>
                  <select name="item" id="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loaditemDetails()" REQUIRED>
                    <option disabled selected>Item</option>
                    <option ng-repeat="item in additems" value="@{{item.ItemModelID}}">@{{item.ItemName}}</option>
                  </select>
                </div>

                   <div class="five wide field">
                   <div class="ui sub header">Upload photo</div>
                    <label for="file" class="ui icon button">
                        <i class="file icon"></i>
                        Attach photo</label>
                    <input type="file" id="file" name="add_photo" style="display:none" multiple>
                  </div> 

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">size</div>
                    <input type="text" name="size" placeholder="dimensions" ng-model="size" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <div class="ui fluid search selection dropdown" id="color2">
                      <input name="color" type="hidden" id="color" ng-model="color">
                      <i class="dropdown icon"></i>
                      <div class="default text">Color</div>
                      <div class="menu">
                        @foreach($colors as $key => $color)
                          <div class="item" data-value="{{$color->ColorName}}">{{$color->ColorName}}</div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="three wide field">
                    <div class="ui checkbox">
                      <input type="checkbox" id="test99" name="defect"/>
                      <label>Defect</label>
                    </div>
                  </div>

                  <div class="five wide field" style="display: none" id="defectDesc99">
                    <input id="def" type="text" name="defectDesc" ng-model="defect" placeholder="Description" />
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

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
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in viewitems">
              <td class="collapsing">
                <div class="editBtn ui vertical animated button" tabindex="1" ng-click="editModal($index)">
                  <div class="hidden content">Edit</div>
                  <div class="visible content">
                    <i class="large edit icon"></i>
                  </div>
                </div>
                <div class="ui vertical animated button" tabindex="0" ng-click="deleteOrderedItem($index)">
                  <div class="hidden content">Delete</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td>@{{item.item_model.ItemName}}</td>
              <td>@{{item.item_model.sub_category.category.CategoryName}}</td>
              <td><img src="@{{item.image_path}}" style="width:60px;height:60px;" /></td>
              <td>@{{item.size}}</td>
              <td>@{{item.color}}</td>
              <td>@{{item.container.warehouse.Barangay_Street_Address}}, @{{item.container.warehouse.city.CityName}}, @{{item.container.warehouse.city.province.ProvinceName}}</td>
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
      $('#test99').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('defectDesc99').style.display = 'block';
          } else {
              document.getElementById('defectDesc99').style.display = 'none';
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

  $('#color')
  .dropdown({
    allowAdditions: true
  });

   $('#color2')
  .dropdown({
    allowAdditions: true
  });


////////////////////////////////////////////////////////////////////////// 

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('/itemModels')
    .then(function(response){
      $scope.additems = response.data;  
    });

    $scope.editModal = function(index){
      $('#editModal').modal('setting', 'transition', 'vertical flip').modal('show');  
      $scope.itemSelected = $scope.viewitems[index].item_model.ItemModelID;
      $scope.size = $scope.viewitems[index].size;
      $scope.color = $scope.viewitems[index].color;
      $scope.defect = $scope.viewitems[index].DefectDescription;
    }

    $timeout(function(){
      $http.get('itemsInContainer?containerID=' + $scope.containerID)
      .then(function(response){
        $scope.viewitems = response.data;
      });
    } , 1000);

    $scope.loaditemDetails = function(){
      for(var key=0; key<$scope.additems.length; key++){
        if($scope.additems[key].ItemModelID == $scope.itemSelected){
          $scope.size = $scope.additems[key].size;
          $('#color').dropdown('set selected', $scope.additems[key].color);
        }
      }
    }

    $scope.deleteOrderedItem = function(index){
      $http.get('/deleteOrderedItem?itemID=' + $scope.viewitems[index].ItemID)
      .then(function(response){
        if(response.data == 'success'){
          $scope.viewitems.splice(index, 1);
          alert('success');
        }
        else {
          alert('error');
        }
      })
    }
  });
</script>
@endsection
