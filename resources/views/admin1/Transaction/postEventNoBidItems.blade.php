@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table datatable="ng" class="ui compact celled definition table">
        <thead>
          <tr>
            <th></th>
            <th>Event Name</th>
            <th>Event Start</th>
            <th>Event End</th>
            <th>Items w/o Bid</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="event in events" ng-if="event.noBidItems > 0">
            <td class="collapsing">
            	<div class="ui vertical animated button"  ng-click="showItems(event)" >
	            	<div class="hidden content">View Items</div>
	            	<div class="visible content">
	                <i class="ordered list icon"></i>
	            	</div>
	            </div>
            </td>
            <td>@{{event.EventName}}</td>
            <td>@{{event.StartDateTime}}</td>
            <td>@{{event.EndDateTime}}</td>
            <td>@{{event.noBidItems}}</td>
          </tr>
        </tbody>
      </table>

      <!-- account info modal -->
    	<div class="ui small modal" id="itemsModal">
	    	<form action="postEventProcessItems" method="POST">
		        <i class="close icon"></i>
		        <div class="header">
		          Items
		        </div>
		        <div class="content">
			    <table datatable="ng" class="ui compact celled definition table">
			        <thead>
				        <tr>
				            <th></th>
				            <th>Item ID</th>
				            <th>Item Name</th>
				        </tr>
				        </thead>
				    <tbody>
				        <tr ng-repeat="item_auction in selectedEvent.item_auction">
				            <td>
				            	<input type="checkbox" name="items[]" value="@{{item_auction.item.ItemID}}" />
				            </td>
				            <td>@{{item_auction.item.ItemID}}</td>
				            <td>@{{item_auction.item.item_model.ItemName}}</td>
				        </tr>
			        </tbody>
			    </table>
		        </div>

		        <div class="actions">
		        	<button class="ui button" type="submit" name="dispose">Dispose</button>
		        	<br>
		        	<button class="ui button" type="submit" name="return">Return to Inventory</button>
		        </div>
	    	</form>
      </div>
      <!-- END of modal -->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  //add modal
$(document).ready(function(){
      $('.tableRow').click(function(){
         $('#infoModal').modal('show');    
      });
 }); 

var app = angular.module('myApp', ['datatables']);
app.controller('myController', function($scope, $http, $timeout){
	$http.get('postEventsList')
	    .then(function(response){
	    $scope.events = response.data;
	});

	$scope.showItems = function(event){
		$scope.selectedEvent = event;
		$('#itemsModal').modal('refresh');
		$timeout(function(){
			$('#itemsModal').modal('show');
		}, 200);
	}
});

</script>
@endsection