@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
        
        <div class="right menu">
          <a class="ui item">
            help
            <i class="help icon"></i>
          </a>
        </div>
      </div>
@endsection

@section('content')
	<div style="margin: 35px 0 0 0" class="ui container segment">
		<h1 class="ui centered header">Registration</h1>
		<div class="ui info message">
			<i class="info icon"></i>
			Register here to bid on items.
		</div>
		<form class="ui form" action="/insertAccount" method="POST" enctype="multipart/form-data" ng-app="myApp" ng-controller="myController">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  	<div class="equal width fields">
			  	<div class="field">
				    <label>First Name</label>
				    <input type="text" name="firstName" placeholder="First Name" pattern="([A-z '.-]){2,}" >
				</div>
				<div class="field">
				    <label>Middle Name(optional)</label>
				    <input type="text" name="middleName" placeholder="Middle Name" pattern="([A-z '.-]){2,}">
			  	</div>
			  	<div class="field">
				    <label>Last Name</label>
				    <input type="text" name="lastName" placeholder="Last Name" pattern="([A-z '.-]){2,}" >
			  	</div>
		  	</div>

		  	<div class="equal width fields">
				<div class="field">
	                <div class="ui sub header">Province</div>
	                	<select name="province" class="ui search selection dropdown" ng-model="inputProvince" ng-change="reloadCities();" >
	                    	<option value="" disabled selected>Province</option>
	            	    	<option ng-repeat="province in provinces" value="@{{province.ProvinceID}}">@{{province.ProvinceName}}</option>
	                	</select>
	            </div>
				<div class="field">
	                <div class="ui sub header">City</div>
	                	<select name="city" class="ui search selection dropdown" >
	                    	<option value="" disabled selected>City</option>
	            	    	<option ng-repeat="city in cities" value="@{{city.CityID}}">@{{city.CityName}}</option>
	                	</select>
	            </div>
				<div class="field">
					<label>Address</label>
					<input type="text" name="address" >
				</div>
		  	</div>

		  	<div class="equal width fields">
		  		
				<div class="field">
		  			<label>Gender</label>
					<div class="ui radio checkbox">
						<input type="radio" name="gender" value="Male" checked="" tabindex="0" class="hidden">
						<label>Male</label>
					</div>
					<div class="ui radio checkbox">
						<input type="radio" name="gender" value="Female" tabindex="0" class="hidden">
						<label>Female</label>
					</div>
				</div>
			  	<div class="field">
			  		<label>Birthdate</label>
			  		<input type="date" name="birthdate" max="1998-12-31" >
			  	</div>

			  	<div class="field">
			  		<label>Occupation</label>
			  		<input type="text" name="occupation" >
			  	</div>
		  	</div>

		  	<div class="equal width fields">
		  		<div class="field">
					<label>Email Address</label>
					<input type="email" name="email" placeholder="XXXXXX@yahoo.com" >
				</div>
				<div class="field">
					<label>Cellphone Number</label>
					<input type="text" name="phoneNumber" pattern="([0-9 '.]){2,}" placeholder="+639 XX XXX XXXX">
				</div>
				<div class="field">
					<label>Telephone Number</label>
					<input type="text" name="telNumber" pattern="([0-9 '.]){2,}" placeholder="XXX XXXX XXX">
				</div>
			</div>

			<div class="equal width fields">
				<div class="field">
	                <div class="ui sub header">Account Type</div>
                	<select name="accounttype" class="ui search selection dropdown">
                    	<option value="" disabled selected>Account Type</option>
            	    	<option ng-repeat="accounttype in accounttypes" value="@{{accounttype.AccountTypeID}}">@{{accounttype.AccountTypeName}}</option>
                	</select>
	            </div>
				<div class="field">
					<label>Username</label>
					<input type="text" name="username">
				</div>
				<div class="field">
					<label>Password</label>
					<input type="password" name="password">
				</div>
				<div class="field">
					<label>Confirm Password</label>
					<input type="password" name="password_confirmation">
				</div>
			</div>

			<div class="equal width fields">
				<!-- <div class="field" id="desc1">
	                <label>Description</label>
	                <p>description shits</p>
				</div>

				<div class="field" id="desc2" style="display: none">
	                <label>Description</label>
	                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
				</div> -->

				<div class="field" id="documents">
	                <label>Valid ID</label>
	                <i class="file icon"></i>
	                <input type="file" name="ids" multiple >
				</div>

				<div class="field" id="dti">
	                <label>DTI</label>
	                <i class="file icon"></i>
	                <input type="file" name="dti" multiple >
				</div>
			</div>

			<div class="ui one column center aligned page grid">
				<div class="column">
					<!-- <div class="field">
				    	<div class="ui checkbox">
				      		<input type="checkbox" tabindex="0" class="hidden">
				      		<label>I agree to the Terms and Conditions</label>
				    	</div>
			  		</div>-->
		  			<button class="ui basic blue button" name="btn_upload" type="submit">Submit</button>
		  		</div>
		  	</div> 
		</form>
	</div>

<!--angularjs-->
<script>
	var app = angular.module('myApp', []);
	app.controller('myController', function($scope, $http) {
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

	    $http.get('/accounttypes')
	    .then(function(response){
	    	$scope.accounttypes = response.data;
	    });
	});
</script>
<!--angularjs end-->
<script>
//gender
$('.ui.radio.checkbox')
  .checkbox()
;
//terms and condition
$('.ui.checkbox')
  .checkbox()
;
//provinces
$('.ui.normal.dropdown')
  .dropdown()
;
//account type
$('.ui.search.dropdown')
  .dropdown();

  $(document).ready(function(){
    $('#shit').on('change', function() {
      if ( this.value == '1')
      {
        $("#documents").show();
        $("#desc1").show();
        $("#desc2").hide();
        $("#dti").hide();
      }
      else
      {
        $("#documents").show();
        $("#desc1").hide();
        $("#desc2").show();
        $("#dti").show();
      }
    });
});
</script>
@endsection
