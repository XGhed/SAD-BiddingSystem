@extends('admin1.mainteParent')

@section('content')
  <div class="ui grid" ng-app="myApp" ng-controller="myController" ng-init="eventID = {{$eventID}}; ended = {{$ended}};">
     @include('admin1.Transaction.sideNav')

    <div class="twelve wide stretched column">
      <div class="ui segment">
         <h2 class="ui header centered" ng-bind="eventDetails.EventName"></h2>
         <div class="event">
          <div class="content">
            <timer class="ui centered header" countdown="eventDetails.timeBeforeStart" max-time-unit="'hour'" interval="1000" ng-if="eventDetails.timeBeforeStart > 0">
            <h2 class="ui centered header inverted segment">Countdown till event starts: @{{hhours}} hour@{{hourS}}, @{{mminutes}} minute@{{minutesS}}, @{{sseconds}} second@{{secondsS}}</h2></timer>
            <div class="ui centered header" ng-if="eventDetails.timeBeforeStart <= 0 && ended == false">Event has started</div>
            <div class="ui centered header" ng-if="ended == true">Event has ended</div>
            <div class="summary">
              <span>Start Time: <span ng-bind="eventDetails.StartDateTime"></span> </span>
            </div>
            <div class="summary">
              <span>End Time: <span ng-bind="eventDetails.EndDateTime"></span> </span>
            </div>
            <div class="summary">
              <span>Description: <span ng-bind="eventDetails.Description"></span></span>
            </div>
            <div class="ui middle aligned divided list">
            <div class="item" ng-if="ended == false">
              <div class="right floated content">
                <div class="ui green button" ng-click="editModal(eventID)">Edit Information</div>
              </div>
            </div>
          </div>
          </div>
          <div class="ui divider"></div>
          <h4 class="ui header centered">List of Items</h4>
          <a class="ui blue basic button" id="addBtn" ng-if="ended == false">
              <i class="add square icon"></i>
              Add Items
            </a>

            <!-- edit modal -->
          <div class="ui long modal" id="editModal">
            <i class="close icon"></i>
            <div class="ui centered header">
              Edit Event Information
            </div>
            <div class="content">
              <form class="ui form" action="/editBiddingEvent" method="POST">
                <input type="hidden" name="eventID" value="@{{eventDetails.AuctionID}}" />
                <div class="equal width fields">
                  <div class="field" ng-if="secondsLeft > 0">
                    <div class="ui sub header">Event Name</div>
                    <input type="text" name="eventname" id="edit_name" value="@{{eventDetails.EventName}}"/>
                  </div>
                  <div class="field" ng-if="secondsLeft > 0">
                    <div class="ui sub header">Start Day:</div>
                    <input type="date" id="startDate" name="startdate" value="@{{eventDetails.StartDateTime.split(' ')[0]}}">
                    <div class="ui sub header">Start Time</div>
                    <input type="time" name="starttime" required value="@{{eventDetails.StartDateTime.split(' ')[1]}}">
                  </div>
                  <div class="field">
                    <div class="ui sub header">End Day</div>
                    <input type="date" id="endDate" name="enddate" value="@{{eventDetails.EndDateTime.split(' ')[0]}}">
                    <div class="ui sub header">End Time</div>
                    <input type="time" name="endtime" value="@{{eventDetails.EndDateTime.split(' ')[1]}}">
                  </div>
                </div>

                  <div class="field">
                    <div class="ui sub header">Description</div>
                    <textarea type="text" name="description" id="edit_desc" rows="2">@{{eventDetails.Description}}</textarea>
                  </div>

                <button class="ui green basic button" type="submit">Confirm</button>
              </form>
              
            </div>
          </div>
            <!-- END edit modal -->

            <div class="ui long modal" id="addModal">
            <i class="close icon"></i>
            <div class="ui centered header">
              Add Item
            </div>
            <div class="content">

              <div class="ui form ">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Category</div>
                    <select name="item" id="item" class="ui search selection dropdown" ng-model="category" ng-change="loadSubcat()" style="height: 45px" REQUIRED>
                      <option value="" disabled selected>Category</option>
                      <option ng-repeat="category in categories" value="@{{category.CategoryID}}">@{{category.CategoryName}}</option>
                    </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">Subcategory</div>
                    <select name="item" id="item" class="ui search selection dropdown" ng-model="subCategory" ng-change="loadModels()" style="height: 45px" REQUIRED>
                      <option value="" disabled selected>Subcategory</option>
                      <option ng-repeat="subCategory in subCategories" value="@{{subCategory.SubCategoryID}}">@{{subCategory.SubCategoryName}}</option>
                    </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">Item</div>
                    <select name="itemModels" class="ui search selection dropdown" ng-model="itemmodelSelected" ng-change="loadItems()"style="height: 45px" >
                        <option value="" disabled selected style="">Item</option>
                      <option ng-repeat="itemmodel in itemmodels" value="@{{itemmodel.ItemModelID}}">@{{itemmodel.ItemName}}</option>
                    </select>
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Stock ID</div>
                    <select name="item" class="ui search selection dropdown" ng-model="itemSelected" ng-change="loadItemInfo()"style="height: 45px" >
                      <option ng-repeat="item in items" value="@{{item.ItemID}}">@{{item.ItemID}}</option>
                    </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">Price</div>
                    <div class="ui input">
                      <input type="number" ng-model="price" step="0.01">
                    </div>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Points</div>
                    <div class="ui input">
                      <input type="text" ng-model="points">
                    </div>
                  </div>
                </div>

              </div>

              <table class="ui compact celled table">
                <thead>
                  <th>Defect</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Image</th>
                  <th>Warehouse</th>
                </thead>
                <tbody>
                  <tr>
                    <td>@{{itemInfo.DefectDescription}}</td>
                    <td>@{{itemInfo.size}}</td>
                    <td>@{{itemInfo.color}}</td>
                    <td><img src="@{{itemInfo.image_path}}" style="width:60px;height:60px;"/></td>
                    <td>@{{itemInfo.container.warehouse.Barangay_Street_Address}}, @{{itemInfo.container.warehouse.city.CityName}}, @{{itemInfo.container.warehouse.city.province.ProvinceName}}</td>
                  </tr>
                </tbody>
              </table>
              
            </div>
            <div class="actions">
              <button class="ui blue button" ng-click="addItemToAuction()"><i class="checkmark icon"></i> Confirm</button>
              
            </div>
          </div>
            <!-- END add modal -->



        </div>
         <table class="ui celled table" datatable="ng">
          <thead>
            <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Points</th>
            <th ng-if="ended == false && eventDetails.timeBeforeStart > 0">Manage</th>
          </tr></thead>
          <tbody>
            <tr ng-repeat="auctionitem in auctionitems">
              <td>@{{auctionitem.ItemID}}</td>
              <td>@{{auctionitem.item.item_model.ItemName}}</td>
              <td>@{{auctionitem.ItemPrice}}</td>
              <td>@{{auctionitem.Points}}</td>
              <td><div class="ui basic red button" ng-click="removeFromEvent($index)" ng-if="ended == false && eventDetails.timeBeforeStart > 0">Remove</div></td>
            </tr>
          </tbody>
        </table>
      </div><!-- segment -->
    </div><!-- column -->
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

//search dropdown
$('.ui.dropdown')
  .dropdown({
    useLabels: false,
    maxSelections: 3
  })
;

var app = angular.module('myApp', ['datatables', 'timer']);
app.controller('myController', function($scope, $http, $timeout){
  //timeout for delay, waiting for eventID to initialize
  $timeout(function(){
    $http.get('/eventDetails?eventID=' + $scope.eventID)
    .then(function(response){
      $scope.eventDetails = response.data;
    });

    $http.get('/getEventItems?eventID='+$scope.eventID)
    .then(function(response){
      $scope.auctionitems = response.data;
    });
    
  }, 1000);

  $scope.loadItems = function(){
    $http.get('/itemsToAddToEvent?itemID=' + $scope.itemmodelSelected + '&eventID=' + $scope.eventID)
    .then(function(response){
      $scope.items = response.data;
    });
  }

  $scope.loadItemInfo = function(){
    $http.get('/singleItem?itemID=' + $scope.itemSelected)
    .then(function(response){
      $scope.itemInfo = response.data;
    });
  }

  $scope.addItemToAuction = function(){
    $http.get('/addItemToAuction?eventID='+$scope.eventID+'&itemID='+$scope.itemSelected+'&price='+$scope.price+'&points='+$scope.points)
    .then(function(response){
      $('#addModal').modal('hide');
      //reset modal's data
      $scope.itemmodelSelected = "";
      $scope.itemSelected = "";
      $scope.price = "";
      $scope.points = "";

      return $http.get('/getEventItems?eventID='+$scope.eventID);
    })
    .then(function(response){
      $scope.auctionitems = response.data;
    });
  }

  $scope.removeFromEvent = function(index){
    $http.get('/removeFromEvent?itemID=' + $scope.auctionitems[index].ItemID)
    .then(function(response){
      if(response.data == 'success'){
        $scope.auctionitems.splice(index, 1);
        //reset modal's data
        $scope.itemmodelSelected = "";
        $scope.itemSelected = "";
        $scope.price = "";
        $scope.points = "";
      }
    });
  }

  $scope.editModal = function(container){
    $('#editModal').modal('show');
  }

  $scope.$on('timer-tick', function (event, data) {
    $scope.secondsLeft = data.millis;

    if(data.millis == 0){

    }
  });

  $http.get('/categories')
  .then(function(response){
    $scope.categories = response.data;
  });

  $scope.loadSubcat = function(){
    $http.get('/subcatOptions?catID=' + $scope.category)
    .then(function(response){
      $scope.subCategories = response.data;  
    });
  }

  $scope.loadModels = function(){
    $http.get('/itemModelsOfSubcat?subcatID=' + $scope.subCategory)
    .then(function(response){
      $scope.itemmodels = response.data;
    });
  }

});


  //min endDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("endDate").value = today;
      document.getElementById("endDate").min = today;

</script>
@endsection