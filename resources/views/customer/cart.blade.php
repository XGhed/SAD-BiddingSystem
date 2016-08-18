@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="/icons/icon.png">
        </a>

        <a class="item" href="/">
            <i class="home icon"></i>Home
        </a>

        <a class="item" href="/cart">
            <i class="cart icon"></i>Cart
        </a>

        <a class="item" href="/bidList">
            <i class="list icon"></i>Items Bidded
        </a>
        
        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if($isLoggedIn == 'true')
            <a class="ui item" href="/logout">
              Logout
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
		 @if($isLoggedIn == 'true')
          	<div class="ui grid">
			<div class="ten wide column">
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
									<img class="ui small image" src="{{$itemWon->image_path}}">
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
						<!-- end loop -->
				</div>	
			</div>

			<div class="six wide column">
				<div class="ui segment">
					<h2 class="ui header">
				  <i class="payment icon"></i>
				  <div class="content">
				    Order Summary
				  </div>
				</h2>
				<div class="ui divider"></div>
				Subtotal: 500.00
				<div class="ui divider"></div>
				Total: 500.00
				</div>
				<a class="ui button" href="/checkout">Proceed to Checkout<i class="arrow right icon"></i></a>
			</div>
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