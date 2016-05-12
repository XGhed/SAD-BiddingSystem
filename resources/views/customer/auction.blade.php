@extends('customer.items')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="/icons/icon.png">
        </a>

        <a class="item" href="/">
            <i class="home icon"></i>Home
        </a>

        <a class="item" href="/customer/cart">
            <i class="cart icon"></i>Cart
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

        <div class="ui grid"><div class="row"></div>
        <a href="/customer/items"><i class="arrow left icon"></i> back to previous page</a></div>

        <div class="ui grid">
            <div class="six wide column">
                <div class="ui card" style="height: 350px; width: 350px;">
                  <a class="image" id="imgModal">
                    <img src="/icons/cabinet.jpg">
                  </a>
                </div>
            </div>

            <div class="ten wide column">
               <div class="ui header">Item name</div>
               <div class="ui divider"></div>

               <div class="content">
                   Desription:<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                   Time left: <p>6h 9m 52s(exact date and time here)</p>

                   <div class="ui inverted segment">
                        <div class="ui header">Starting Bid: PHP 500.00</div>
                        <form class="ui form">
                            <div class="inline field">
                                <input type="text" placeholder="Place bid here..">
                                <button class="ui button" type="submit">Place bid</button>
                                <a href="#">[0 bids]</a>
                            </div>
                        </form>
                        <div class="ui divider"></div>
                        <div class="ui header">Current Price: Php 500.00</div>
                   </div>
                </div>
            </div>
        </div>
	</div>




    <!-- image modal -->
    <div class="ui small modal" id="imge">
        <i class="close icon"></i>
        <div class="ui segment center aligned" style="margin: 10px 10px 10px 10px;">
            <img src="/icons/cabinet.jpg" style="height: 350px; width: 350px;">
        </div>
    </div>


<script>
$(document).ready(function(){
     $('#imgModal').click(function(){
        $('#imge').modal('setting', 'transition', 'vertical flip').modal('show');    
     });
});
</script>
@endsection