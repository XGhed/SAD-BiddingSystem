@extends('customer.homepage')

@section('content')
<div style="margin: 100px 0 0 0" class="ui container segment">
	@include('customer.topnav')
	<div class="ui grid">
		<div class="four wide column">
	          	<div class="ui vertical fluid tabular menu">
	          	  <div class="item">
				    <div class="ui centered circular medium image">
				      <img src="/icons/avatar_3.png">
				    </div>
				    <div class="ui divider"></div>
				    <div class="ui subheader">Hello USERNAME HERE!! </div>
				  </div>

			      <a class="active item" href="/userProfile">
			        Transaction History
			      </a>
			      <a class="item" href="/eventsList">
			        Account Information
			      </a>
			    </div>
		</div>

		<div class="twelve wide column">
			@yield('profile')
		</div>
	</div>
</div>
@endsection