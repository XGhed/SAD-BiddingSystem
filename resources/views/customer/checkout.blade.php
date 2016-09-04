@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="/icons/icon.png">
        </a>

        <a class="item" href="/">
            <i class="home icon"></i>Home
        </a>

        <a class="item" href="/cart">
            <i class="cart icon"></i>Cart
        </a>

        <a class="item" href="/bidList">
            <i class="list icon"></i>Items Bidded
        </a>
        
        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if(session('accountID') != "")
            <a class="ui item" href="/logout">
              Logout
          </a>
          @else
            <a class="ui item" id="logIn">
              Register | Log in
          </a>
        @endif
        </div>
      </div>
@endsection

@section('content')
	<div style="margin: 35px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController">
		<a href="/cart/"><i class="arrow left icon"></i>back to cart</a>
		<div class="ui internally celled grid container">
				<div class="ui column nine wide segment" style="margin: 5px 5px 5px 15px;">
				<form class="ui form" action="/submitCheckout" method="POST">
				<h2 class="ui header">
				  <i class="shop icon"></i>
				  <div class="content">
				    Checkout
				    <div class="sub header">Re-check things that you've bid.</div>
				  </div>
				</h2>
				<div class="ui divider"></div>
				<div class="ui grid">
					<div class="row"></div>
					<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="checkoutType" id="radioDelivery" checked="checked" value="Deliver">
				        <label>Delivery</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="checkoutType" id="radioPickup" value="Pick up">
				        <label>Pick up</label>
				      </div>
				    </div>
				    <!--items modal-->
				    <div class="ui segment">
				    <table class="ui definition celled table">
					  <thead>
					    <tr>
					    	<th></th>
						    <th>Item ID</th>
						    <th>Item Name</th>
						    <th>Date Bidded</th>
						    <th>Price</th>
						</tr>
					  </thead>
					  <tbody>
					    @foreach($itemsWon as $key => $itemWon)
					    	<tr>
						      <td>
						      	<input type="checkbox" class="ui checkbox" name="items[]" value="{{$itemWon->ItemID}}" ng-click="addItem({{$itemWon}})"/>
						      </td>
						      <td>{{$itemWon->ItemID}}</td>
						      <td>{{$itemWon->itemModel->ItemName}}</td>
						      <td>{{$itemWon->winners->last()->bid->DateTime}}</td>
						      <td>{{$itemWon->winners->last()->bid->Price}}</td>
						    </tr>
					    @endforeach
					  </tbody>
					</table>
					</div>

				</div>
				<div class="ui grid"><div class="row"></div></div>
				  	<h4 class="ui dividing header">Delivery Information</h4>
				  	<div class="field">
					    <label>Name</label>
					    <div class="three fields">
					      <div class="field">
					        <input type="text" name="firstName" pattern="([A-z '.-]){2,}" placeholder="First Name">
					      </div>
					      <div class="field">
					        <input type="text" name="middleName" pattern="([A-z '.-]){2,}" placeholder="Middle Name">
					      </div>
					      <div class="field">
					        <input type="text" name="lastName" pattern="([A-z '.-]){2,}" placeholder="Last Name">
					      	</div>
					    </div>
					</div>

					<div class="equal width fields" id="pickupLocation">
						<div class="field">
						 	<div class="ui sub header">Pickup Location</div>
							<select class="ui fluid search normal selection dropdown" name="warehouse" id="warehouseLocation">
								<option value="" disabled selected>Select Warehouse</option>
								<option ng-repeat="warehouse in warehouses" value="@{{warehouse.WarehouseNo}}">@{{warehouse.Barangay_Street_Address}}, @{{warehouse.city.CityName}}, @{{warehouse.city.province.ProvinceName}}</option>
							</select>
						</div>
					</div>

					<div id="deliveryAddress" class="field">
						<div class="field">
						    <label>Complete Address</label>
							<input type="text" name="address" id="address" placeholder="Complete Address...">
						</div>

						<div class="equal width fields">
							<div class="field">
							 	<div class="ui sub header">Province</div>
								<select class="ui fluid search normal selection dropdown" ng-model="inputProvince" ng-change="reloadCities()">
									<option value="" disabled selected>Select Province</option>
									<option ng-repeat="province in provinces" value="@{{province.ProvinceID}}">@{{province.ProvinceName}}</option>
								</select>
							</div>
							<div class="field">
							 	<div class="ui sub header">City</div>
								<select class="ui fluid search normal selection dropdown" name="city" id="city">
									<option value="" disabled selected>Select City</option>
									<option ng-repeat="city in cities" value="@{{city.CityID}}">@{{city.CityName}}</option>
								</select>
							</div>
					  	</div>
					</div>
					  
					<div class="equal width fields"> 
					  	<div class="field">
							<label>Cellphone Number</label>
							<input type="text" name="phoneNumber" pattern="([0-9 '.]){2,}" placeholder="+639 XX XXX XXXX">
						</div>
						<div class="field">
							<label>Telephone Number</label>
							<input type="text" name="telNumber" pattern="([0-9 '.]){2,}" placeholder="XXX XXXX XXX">
						</div>
					</div>
					<div class="ui one column center aligned page grid">
						<div class="column">
				  			<button class="ui button" type="submit">Submit</button>
				  		</div>
				  	</div>
				</form>
			</div>

			<div class="ui column six wide right floated" style="margin: 5px 0 5px 15px;">
				<h2 class="ui header">
				  <i class="payment icon"></i>
				  <div class="content">
				    Order Summary
				  </div>
				</h2>
				<div class="ui divider"></div>

				<table class="ui selectable green table">
				  	<thead>
				    	<tr>
					    	<th>Item</th>
					    	<th>Price</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				    	<tr>
				      		<td>Mar Roxas</td>
				      		<td>100.00</td>
				    	</tr>
				    	<tr class="warning">
					      <td>Shipping fee:</td>
					      <td>75.00</td>
					    </tr>
					    <tr class="positive">
					      <td>Total fee:</td>
					      <td>275.00</td>
					    </tr>
				  	</tbody>
				</table>
				<div class="ui sub header">
					Standard Shipping/Delivery days: 2-3 working days
				</div>
			</div>
	  	</div>
	</div>

<script>
$('.ui.normal.dropdown')
  .dropdown()
;

//Delivery/Pickup
/*$(document).ready(function () {
      $('#radioDelivery').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('delivery').style.display = 'block';
          } else {
              document.getElementById('delivery').style.display = 'none';
          }
     });
    });*/

	$(document).ready(function () {
		$('#pickupLocation').hide();
		$('#warehouseLocation').prop('required', false);
    	$('#address').prop('required', true);
    	$('#city').prop('required', true);

	    $("#radioDelivery").click(function () {
	       $('#deliveryAddress').show();
	       $('#pickupLocation').hide();

	       $('#warehouseLocation').prop('required', false);
	       $('#address').prop('required', true);
	       $('#city').prop('required', true);
	    });
	    $("#radioPickup").click(function () {
	    	$('#deliveryAddress').hide();
	    	$('#pickupLocation').show();

	    	$('#warehouseLocation').prop('required', true);
	       $('#address').prop('required', false);
	       $('#city').prop('required', false);
	    });
	});


	$(document).ready(function(){
	     $('#itemList').click(function(){
	        $('#itemModal').modal('show');    
	     });
	});

	var app = angular.module('myApp', []);
	app.controller('myController', function($scope, $http){
		$http.get('/provinces')
	    .then(function(response){
	    	$scope.provinces = response.data;
	    });

	    $scope.reloadCities = function(){
	    	$http.get('/cityOptions?provID=' + $scope.inputProvince)
	    	.then(function(response){
	    		$scope.cities = response.data;
	    	});
	    }

	    $http.get('/warehouses')
	    .then(function(response){
	      $scope.warehouses = response.data;
	    });

	    $scope.addItem = function(item){
	    	alert(JSON.stringify(item));
	    }
	})
</script>
@endsection