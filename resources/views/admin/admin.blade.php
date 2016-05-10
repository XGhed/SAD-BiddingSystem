@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
	</div>
@endsection

@section('content')
	<div style="margin: 35px 0 0 0" class="ui inverted segment">
		<form class="ui form">
		  	<div class="ui one column center aligned page grid">
				<div class="column">
					<h3 class="header"><i class="huge spy icon"></i> ADMIN</h3>
					<div class="inline equal width fields">
				  		<div class="five wide field">
				  			<label style="color: white">Username:</label>
				  			<input type="text" name="username" placeholder="admin">
				  		</div>
				  		<div class="five wide field">
				  			<label style="color: white">Password:</label>
				  			<input type="password" name="password" placeholder="*****">
				  		</div>
				  	</div>
		  			<a href="/supplier" class="ui button" type="submit">Enter</a>
		  		</div>
		  	</div>
		</form>
	</div>

<script>

</script>



@endsection


					