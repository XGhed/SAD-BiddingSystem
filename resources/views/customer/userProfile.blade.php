@extends('customer.homepage')

@section('content')
<div style="margin: 100px 0 0 0" class="ui container segment">
	@include('customer.sidenav')
	<div class="ui grid">
		<div class="three wide column">
          @if(session('accountID') != "")
	          	<div class="ui vertical fluid tabular menu">
	          	  <div class="item">
				    <div class="ui tiny image">
				      <img src="/icons/avatar_2.jpg">
				    </div>
				    <div class="content">
				      <div class="header">Username</div>
				    </div>
				  </div>

			      <a class="active item" href="/userProfile">
			        Profile
			      </a>
			      <a class="item" href="/eventsList">
			        Events
			      </a>
			      <a class="item" href="/cart">
			        Cart
			      </a>
			      <a class="item">
			        Links
			      </a>
			    </div>
          @else
          	<div class="ui segment">
				<h2>Register now!</h2>
				<p><a href="/register">Click here</a> to register</p>
			</div>
	      @endif
		</div>

		<div class="ten wide column">
			@yield('profile')
		</div>
	</div>
</div>
@endsection