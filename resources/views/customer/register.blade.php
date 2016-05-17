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
		<form class="ui form">
		  	<div class="equal width fields">
			  	<div class="field">
				    <label>First Name</label>
				    <input type="text" name="firstName" placeholder="First Name" pattern="([A-z '.-]){2,}" required>
				</div>
				<div class="field">
				    <label>Middle Name(optional)</label>
				    <input type="text" name="middleName" placeholder="Middle Name" pattern="([A-z '.-]){2,}">
			  	</div>
			  	<div class="field">
				    <label>Last Name</label>
				    <input type="text" name="lastName" placeholder="Last Name" pattern="([A-z '.-]){2,}" required>
			  	</div>
		  	</div>

		  	<div class="equal width fields">
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
				<div class="field">
					<label>Address</label>
					<input type="text" name="address" placeholder="#4 Wednesday St. Pacita 1 Brgy. San Vicente" required>
				</div>
		  	</div>

		  	<div class="equal width fields">
		  		
				<div class="field">
		  			<label>Gender</label>
					<div class="ui radio checkbox">
						<input type="radio" name="fruit" checked="" tabindex="0" class="hidden">
						<label>Male</label>
					</div>
					<div class="ui radio checkbox">
						<input type="radio" name="fruit" tabindex="0" class="hidden">
						<label>Female</label>
					</div>
				</div>
			  	<div class="field">
			  		<label>Birthdate</label>
			  		<input type="date" name="birthdate" max="1998-12-31" required>
			  	</div>

			  	<div class="field">
			  		<label>Occupation</label>
			  		<input type="text" name="occupation" required>
			  	</div>
		  	</div>

		  	<div class="equal width fields">
		  		<div class="field">
					<label>Email Address</label>
					<input type="email" name="email" placeholder="XXXXXX@yahoo.com" required>
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
					<label>Username</label>
					<input type="text" name="phoneNumber">
				</div>
				<div class="field">
					<label>Password</label>
					<input type="password" name="phoneNumber">
				</div>
				<div class="field">
	                <label>Attach Documents</label>
	                <i class="file icon"></i><input type="file" name="docu" multiple required>
				</div>
			</div>

			<div class="ui one column center aligned page grid">
				<div class="column">
					<div class="field">
				    	<div class="ui checkbox">
				      		<input type="checkbox" tabindex="0" class="hidden">
				      		<label>I agree to the Terms and Conditions</label>
				    	</div>
			  		</div>
		  			<button class="ui button" name="btn_upload" type="submit">Submit</button>
		  		</div>
		  	</div>
		</form>
	</div>

<script>
//gender
$('.ui.radio.checkbox')
  .checkbox()
;
//terms and condition
$('.ui.checkbox')
  .checkbox()
;

$('.ui.normal.dropdown')
  .dropdown()
;
</script>
@endsection

<?php
	if(isset($_POST['btn_upload'])){
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filetype = $_FILES["file_img"]["type"];
		$filepath = "images/".$filename;

		$allowed = array('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/JPEG', 'image/JPG',
			'image/X-PNG', 'image/PNG', 'image/png', 'image/GIF', 'image/gif');
		if(in_array($filetype, $allowed)){
			if(file_exists($filetmp) && is_file($filepath)){
				echo "File existed!";
				unlink ($filetmp);
			}
			else{
				move_uploaded_file($filetmp, $filepath);
			}
		} else{
			echo "Invalid filetype!";
		}
	}
?>