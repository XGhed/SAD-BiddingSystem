@extends('customer.homepage')

@section('content')

<div class="ui compact segment" style="margin: 100px 0 0 35%;">
	<div class="ui warning message">
	  <div class="header">
	  <i class="large warning sign icon"></i>
	    You must log in first before you can do that!
	  </div>
	</div>
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
            <button type="submit" class="ui blue button">Log In</button>
          </div>
        </form>
        <br>
</div>
@endsection