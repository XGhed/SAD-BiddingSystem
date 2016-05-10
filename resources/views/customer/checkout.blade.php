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
		<div class="ui internally celled grid container">
			
				<div class="ui column nine wide segment" style="margin: 5px 5px 5px 15px;">
				<h2 class="ui header">
				  <i class="shop icon"></i>
				  <div class="content">
				    Checkout
				    <div class="sub header">Re-check things that you've bid.</div>
				  </div>
				</h2>
				<div class="ui divider"></div>
				<form class="ui form">
				  	<h4 class="ui dividing header">Shipping Information</h4>
				  	<div class="field">
					    <label>Name</label>
					    <div class="two fields">
					      <div class="field">
					        <input type="text" name="firstName" pattern="([A-z '.-]){2,}" placeholder="First Name">
					      </div>
					      <div class="field">
					        <input type="text" name="lastName" pattern="([A-z '.-]){2,}" placeholder="Last Name">
					      	</div>
					    </div>
					</div>
					<div class="field">
					    <label>Complete Address</label>
						<input type="text" name="address" placeholder="Complete Address...">
					</div>

					<div class="equal width fields">
						<div class="field">
						 	<div class="ui sub header">Region</div>
							<div class="ui fluid search normal selection dropdown">
								<input type="hidden" name="region" required>
									<i class="dropdown icon"></i>
									<div class="default text">Select Region</div>
									<div class="menu">
										<div class="item">Miriam</div>
										<div class="item">Mar</div>
										<div class="item">Rody</div>
									</div>
							</div>
						</div>
						<div class="field">
						 	<div class="ui sub header">Province</div>
							<div class="ui fluid search normal selection dropdown">
								<input type="hidden" name="province" required>
									<i class="dropdown icon"></i>
								<div class="default text">Select Province</div>
									<div class="menu">
										<div class="item" value="0">Defensor</div>
										<div class="item" value="1">Bebe</div>
										<div class="item" value="2">"Digong"</div>
									</div>
							</div>
						</div>
						<div class="field">
						 	<div class="ui sub header">City</div>
							<div class="ui fluid search normal selection dropdown">
								<input type="hidden" name="city" required>
									<i class="dropdown icon"></i>
								<div class="default text">Select City</div>
									<div class="menu">
										<div class="item" value="0">Santiago</div>
										<div class="item" value="1">Roxas</div>
										<div class="item" value="2">Duterte</div>
									</div>
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

			<div class="ui column six wide right floated segment" style="margin: 5px 0 5px 15px;">
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
					    	<th>Quantity</th>
					    	<th>Price</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				    	<tr>
				      		<td>Mar Roxas</td>
				      		<td>5</td>
				      		<td>100.00</td>
				    	</tr>
				    	<tr>
				      		<td>Jejomar Binay</td>
				      		<td>2</td>
				      		<td>40.00</td>
				    	</tr>
				    	<tr>
				      		<td>Digong Duterte</td>
				      		<td>3</td>
				      		<td>60.00</td>
				    	</tr>
				    	<tr class="warning">
					      <td></td>
					      <td>Shipping fee:</td>
					      <td>75.00</td>
					    </tr>
					    <tr class="positive">
					      <td></td>
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
</script>
@endsection