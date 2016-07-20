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
          <a class="ui item">
            help
            <i class="help icon"></i>
          </a>
        </div>
      </div>
@endsection

@section('content')
	<div style="margin: 35px 0 0 0" class="ui container segment">
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
						<div class="ui grid">
							<div class="five wide column">
								<img class="ui small image" src="/icons/cabinet.jpg">
							</div>
							<div class="eight wide column">
								<div class="header">Item Name</div>
								<div class="ui divider"></div>
								<div class="content">
									Price: 500.00
									<p></p>
									Quantity: 5 pcs
								</div>
							</div>
						</div>
						<div class="ui divider"></div>
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
	</div>

<script>
</script>
@endsection