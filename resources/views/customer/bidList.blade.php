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
					    Items Bidded
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
									Status: Currently on Bid
								</div>
							</div>
						</div>
						<div class="ui divider"></div>
						<!-- end loop -->
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
									Status: Item won
								</div>
							</div>
						</div>
				</div>	
			</div>

			<div class="six wide column">
				<div class="ui segment">
					<h2 class="ui header">
				  <i class="shopping cart icon"></i>
				  <div class="content">
				  	Items List
				  </div>
				</h2>
				<div class="ui divider"></div>
				Number of Items: 2
				<div class="ui divider"></div>
				Items won: 2
				<div class="ui divider"></div>
				Currently on Auction: 5
				</div>
			</div>
		</div>
	</div>

<script>
</script>
@endsection