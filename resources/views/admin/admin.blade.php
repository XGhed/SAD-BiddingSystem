@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
	</div>
@endsection

@section('content')
	<div style="margin: 35px 0 0 0" class="ui container segment">
		<form class="ui form">
		  	<div class="ui one column center aligned">
				<div class="column">
					<h3 class="header">Admin</h3>
					<div class="fields">
				  		<div class="five wide field">
				  			<label>Username:</label>
				  			<input type="text" name="username">
				  		</div>
				  		<div class="field">
				  			<label>password:</label>
				  			<input type="password" name="password">
				  		</div>
				  	</div>
		  			<a class="ui button" type="submit" href="/supplier">Submit</a>
		  		</div>
		  	</div>
		</form>
	</div>

<script>

</script>



@endsection

