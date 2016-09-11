<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="/icons/icon.png">
        </a>
        <a class="item" href="/">
            <i class="home icon"></i>Home
        </a>
        <a class="item" href="/bidList">
            <i class="list icon"></i>Items Bidded
        </a>
        <a class="item" href="/cart">
            <i class="cart icon"></i>Cart
        </a>
        <a class="item" href="/inbox">
            <i class="mail icon"></i>Inbox
        </a>
        
        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if(session('accountID') != "")
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

       <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>