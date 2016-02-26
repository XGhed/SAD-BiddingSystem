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
          </div>
        </nav>
      </div>
<!--***************************************************** END LOG IN *****************************************************-->
      
<!--***************************************************** SLIDER ***************************************************** -->
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="icons/Auction_pic3.png">
          <div class="caption center-align">
            <h3 class="white-text text-accent-2">Welcome to Online Bidding!</h3>
            <h5 class="light grey-text text-lighten-3">Join now at our site.</h5>
          </div>
        </li>
        <li>
          <img src="icons/Auction_pic4.jpg">
          <div class="caption left-align">
            <h3 >About Us</h3>
            <h5 class="light white-text text-lighten-3">Online kami kasi shit ka shit sila shit tong SAD</h5>
            <h5 class="light white-text text-lighten-3">Online kami kasi shit ka shit sila shit tong SAD</h5>
            <h5 class="light white-text text-lighten-3">Online kami kasi shit ka shit sila shit tong SAD</h5>
          </div>
        </li>
        <li>
          <img src="icons/home_screen3.png">
          <div class="caption left-align">
            <h3>About You</h3>
            <h5 class="light white-text text-lighten-3">fuck you fuck you fuck you</h5>
            <h5 class="light white-text text-lighten-3">fuck you fuck you fuck you</h5>
            <h5 class="light white-text text-lighten-3">fuck you fuck you fuck you</h5>
          </div>
        </li>
      </ul>
    </div>
<!--***************************************************** SLIDER ***************************************************** -->

<footer class="page-footer grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contact Us</h5>
                <p class="grey-text text-lighten-4">dito sa bahay. #4 wed street pacita 1 brgy san vicente san pedro laguna</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
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