@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
        
        <a class="item" href="/"><i class="home icon"></i>Home</a>
        <a class="item" href="/customer/cart"><i class="shop icon"></i>Cart</a>

        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if(session('accountID') != "")
          	<a class="ui item" href="/logout">
	            Logout {{session('accountID')}}
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
<div style="margin: 35px 0 0 0" class="ui container segment">
	<div class="ui grid">
		<div class="three wide column">
			<div class="ui segment">
				<div class="ui list">
				  <div class="item">
				    <div class="ui tiny image">
				      <img src="/icons/avatar_2.jpg">
				    </div>
				    <div class="content">
				      <div class="header">Username</div>
				      <a href="#" style="font-size: 12px;">Edit Profile</a>
				    </div>
				  </div>
				  </br></br>
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
			</div>
		</div>
		<div class="ten wide column">
			<div class="ui segment">
				<h2>Today's Events</h2>
				<div class="ui raised link cards">
				  <a class="ui card" href="/customer/eventsList">
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
@endsection