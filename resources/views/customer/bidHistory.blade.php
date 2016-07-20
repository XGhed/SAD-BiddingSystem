@extends('customer.items')

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

        <div class="ui grid"><div class="row"></div>
        <a href="/items"><i class="arrow left icon"></i> back to item description</a></div>

        <div class="ui grid">
            <div class="column">
               <h2 class="ui header centered">Bid History</h2>
               <div class="ui divider"></div>

               <div class="content">
                   Bidders:<span style="font-size:20px">7</span><br>
                   Bids:<span style="font-size:20px">7</span><br>
                   Time Left:<span style="font-size:20px">6h 9m 52s(exact date and time here)</span>
                        <table class="ui celled table">
                          <thead>
                            <tr>
                            <th>Bidder</th>
                            <th>Bid Amount</th>
                            <th>Bid Time</th>
                          </tr></thead>
                          <tbody>
                            <tr>
                              <td>C****4</td>
                              <td>2500</td>
                              <td>kanina lang</td>
                            </tr>
                            <tr>
                              <td>D***3</td>
                              <td>1500</td>
                              <td>kanina lang</td>
                            </tr>
                            <tr>
                              <td>4****X</td>
                              <td>500</td>
                              <td>kanina lang</td>
                            </tr>
                          </tbody>
                           <tfoot>
                            <tr>
                            <th colspan="3">
                            <i class="attention icon"></i>
                              Note: If two people bid the same amount, the first bid has priority. 
                            </th>
                          </tr></tfoot>
                        </table>
                </div>
            </div>
        </div>
	</div>





@endsection