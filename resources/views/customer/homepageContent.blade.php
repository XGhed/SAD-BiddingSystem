@extends('customer.homepage')

@section('content')
<div style="margin: 100px 0 0 0" class="ui container segment">
	@include('customer.sidenav')
	<div class="ui grid">
		<div class="three wide column">
          @if(session('accountID') != "")
				<div class="ui list">
				  <div class="item">
				    <div class="ui tiny image">
				      <img src="/icons/avatar_2.jpg">
				    </div>
				    <div class="content">
				      <div class="header">Username</div>
				    </div>
				  </div>
				  <br><br>
				  <div class="item">
				    <i class="shop icon"></i>
				    <div class="content">
				      Current no of Items Bidded
				    </div>
				  </div>
				  <div class="item">
				    <i class="user icon"></i>
				    <div class="content">
				      account type
				    </div>
				  </div>
				  <div class="item">
				    <i class="mail icon"></i>
				    <div class="content">
				      <a href="mailto:jack@semantic-ui.com">jack@semantic-ui.com</a>
				    </div>
				  </div>
				</div>
          @else
          	<div class="ui segment">
				<h2>Register now!</h2>
				<p><a href="/register">Click here</a> to register</p>
			</div>
	      @endif
			
		</div>
		<div class="ten wide column">
			<div class="ui segment">
				<h2>Today's Events</h2>
				<div class="ui raised link cards">
				  <a class="ui card" href="/eventsList">
					  <div class="content">
					    <div class="header">Event Name</div>
					    <div class="meta">
					      <span class="category">Description</span>
					    </div>
					    <div class="description">
					      <div class="ui tiny images">
							  <img class="ui image" src="/icons/avatar_2.jpg">
							  <img class="ui image" src="/icons/avatar_2.jpg">
							  <img class="ui image" src="/icons/avatar_2.jpg">
							</div>
					    </div>
					  </div>
					  <div class="extra content">
					  	<i class="info circle icon"></i>
					  	Join this event to Bid.
					  </div>
					</a>
				</div>
			</div>
		</div>	
		<div class="three wide column">
			<div class="ui segment">
				<div class="ui sub header">
				Recent Events
				</div> 
			</div>
		</div>
	</div>
</div>

<script>
</script>
@endsection