@extends('customer.homepage')

@section('content')
	@include('customer.topnav')
	<div style="margin: 100px 0 0 0" class="ui container segment">
		@if(session('accountID') != "")
        <div class="ui grid">
			<div class="column">
				<div class="ui segment">
					<h2 class="ui header">
					  <i class="shop icon"></i>
					  <div class="content">
					    My items
					  </div>
					</h2>
					<div class="ui divider"></div>
						<!-- start loop -->
						@foreach($itemsWon as $key => $itemWon)
							<div class="ui grid">
								<div class="five wide column">
									<div class="ui inverted segment">
										<img class="ui small centered image" src="{{$itemWon->image_path}}">
									</div>
								</div>
								<div class="eight wide column">
									<div class="header">{{$itemWon->itemModel->ItemName}}</div>
									<div class="ui divider"></div>
									<div class="content">
										Price: {{$itemWon->bids->last()->Price}}
										<p></p>
									</div>
								</div>
							</div>
							
							<div class="ui divider"></div>
						@endforeach
						<div class="ui clearing basic segment">
							<a class="ui right floated blue button" href="/checkout">Proceed to Checkout<i class="arrow right icon"></i></a>
							</div>
				</div>	
			</div>

			<!--<div class="six wide column">
				<div class="ui segment">
					<h2 class="ui header">
				  <i class="payment icon"></i>
				  <div class="content">
				  	Transaction History
				  </div>
				</h2>
				<div class="ui divider"></div>
				Subtotal: 500.00
				<div class="ui divider"></div>
				Total: 500.00
				</div>
				
			</div> -->
		</div>
          @else
          <div class="ui small modal" id="login">
		    <i class="close icon"></i>
		    <div class="ui vertical divider"></div>
		    <div class="ui container two column middle aligned very relaxed stackable grid">
		      <div class="row"></div>
		      <div class="column">
		        <form action="/loginAccount" method="POST" class="ui form">
		          <input type="hidden" name="_token" value="{{ csrf_token() }}">
		          <div class="field">
		            <label>Username</label>
		            <div class="ui left icon input">
		              <input type="text" placeholder="Username" name="username" id="username">
		              <i class="user icon"></i>
		            </div>
		          </div>
		          <div class="field">
		            <label>Password</label>
		            <div class="ui left icon input">
		              <input type="password" placeholder="Password" name="password" id="password">
		              <i class="lock icon"></i>
		            </div>
		          </div>
		          <div class="ui grid">
		            <div class="row"></div>
		            <div class="five wide column"></div>
		            <input type="submit" class="ui blue submit button" value="Login"></input>
		          </div>
		        </form>
		      </div>
		      <div class="ui vertical divider">
		          Or
		      </div>
		      <div class="center aligned column">
		        <a class="ui big green labeled icon button" href='/register'>
		          <i class="signup icon"></i>Sign Up
		        </a>
		      </div>
		      <div class="row"></div>
		    </div>
		  </div>
          	<script>
          		$('#login').modal('show');
          	</script>
	      @endif

		
	</div>
@endsection