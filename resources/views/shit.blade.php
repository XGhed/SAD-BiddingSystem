<!DOCTYPE html>
  <html>
    <head>
    <title>#PusoSystem</title>
      <!--CSS-->
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/materialize.css')!!}"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="{!!URL::asset('https://code.jquery.com/jquery-2.1.1.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/materialize.min.js')!!}"></script>
    </head>

    <body style="background-color: #212121"> 

<!--***************************************************** LOG IN *****************************************************-->
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper grey darken-4">
            <a href="/home" class="brand-logo center">BIDDING MANAGEMENT SYSTEM</a>
              <ul id="slide-out" class="side-nav">
                <div class="row">
                  <div class="col s12">
                    <h5 class="center white-text"><i class="medium material-icons">account_circle</i>Log In</h5>
                  </div>
                </div>

                <div class="row">
                      <form class="col s12">
                        <div class="row" style="border-bottom: 1px solid gray">
                          <div class="input-field col s10">
                            <input placeholder="Email Address" id="email" type="email" class="validate">
                          </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid gray">
                          <div class="input-field col s10">
                            <input placeholder="Password" id="password" type="password" class="validate">
                          </div>
                        </div>
                      </form>
                </div>

                  <div class="row">
                    <div class="col s7 push-s3">
                       <a href="/supplier"><button class="btn green waves-effect waves-light" type="submit" name="action">Log In</button></a>
                    </div>
                 </div>
              </ul>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>Log In</li>
                <li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                <i class="mdi-action-account-box show-on-large"></i>
                </a></li>
              </ul>

              <a href="#" data-activates="slide-out" class="button-collapse right"><i class="mdi-action-account-box show-on-large right"></i></a>
          </div>
        </nav>
      </div>
      
<!--***************************************************** SLIDER ***************************************************** -->
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="icons/Auction_pic5.jpg">
          <div class="caption center-align">
            <h3 class="white-text text-accent-2">Welcome to Online Bidding!</h3>
            <h5 class="light grey-text text-lighten-3">Join now at our site.</h5>
          </div>
        </li>
        <li>
          <img src="icons/Auction_pic4.jpg">
          <div class="caption left-align">
            <h3 >About Us</h3>
            <h5 class="light white-text text-lighten-3">The number 1 online bidding website</h5>
            <h5 class="light white-text text-lighten-3">Register and Bid now!</h5>
            <h5 class="light white-text text-lighten-3"></h5>
          </div>
        </li>
        <li>
          <img src="icons/home_screen3.png">
          <div class="caption left-align">
            <h3 class="black-text">Contact Us</h3>
            <h5 class="light black-text text-lighten-3">Tel: 838-5847-551 </h5>
            <h5 class="light black-text text-lighten-3">Website: localhost:8000. (hehehe)</h5>
            <h5 class="light black-text text-lighten-3">Site Address: #4 Wednesday St. Pacita 1</h5> 
            <h5 class="light black-text text-lighten-3">Brgy. San Vicente, San Pedro, Laguna</h5>
          </div>
        </li>
        <li>
          <img src="icons/hihi.png">
          <div class="caption center-align">
            <h3 class="red-text text-accent-4">Group Members:</h3>
            <h5 class="red-text text-accent-4">Joanne Dasig taga Pasig</h5>
            <h5 class="red-text text-accent-4">Tine tine tine tine Gallego </h5>
            <h5 class="red-text text-accent-4">Clarise Rosales, Asawa ni</h5> 
            <h5 class="red-text text-accent-4">Gelo, Boyao pambansang manliligaw</h5>
            <h5 class="red-text text-accent-4">Muming</h5>
            <h5 class="red-text text-accent-4">Ghed na hindi na niniwala sa forever</h5>
          </div>
        </li>
      </ul>
    </div>



<footer class="page-footer grey darken-4">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contact Us</h5>
                <p class="grey-text text-lighten-4"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
              </div>
            </div>
</footer>


<script>
  //SIDE NAV LOGIN
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );

  //SLIDER
  $(document).ready(function(){
      $('.slider').slider({full_width: false});
    });
</script>
    </body>
  </html>