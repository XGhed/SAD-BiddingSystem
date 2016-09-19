        @if(session('accountID') != "")
        <!-- Following Menu -->
        <div class="ui large top fixed hidden inverted menu">
          <div class="ui container">
            <a class="item" href="/userProfile">
              <img class="ui avatar image" src="/icons/avatar_3.png">
              Profile
            </a>
            <a class="item" href="/eventsList">
              <i class="list icon"></i>Bidding Event Lists
            </a>
            <a class="item" href="/cart">
                <i class="cart icon"></i>Cart
            </a>
            <a class="item" href="/inbox">
              <i class="mail icon"></i>Inbox
            </a>
            <div class="right menu">
              <div class="item">
                <a class="ui basic inverted button" href="/logout">Log out</a>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="ui medium top fixed secondary inverted hidden pointing menu">
          <div class="ui container">
              <a class="active item" href="/">Home</a>
              <div class="right menu">
                <a class="ui inverted button logIn">Log in</a>
                <a class="ui inverted basic button" href="/register">Sign Up</a>
              </div>
            </div>
          </div>
        @endif

       <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>