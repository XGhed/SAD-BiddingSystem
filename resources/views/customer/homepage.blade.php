<!DOCTYPE html>
  <html>
    <head>
    <title>Bidding</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/Semantic-UI-CSS-master/semantic.css')!!}"/>
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="{!!URL::asset('https://code.jquery.com/jquery-2.1.1.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
    </head>

    <body style="background-image: url('icons/bg3.png');  background-repeat: no-repeat;
    background-attachment: fixed;" class="ui container"> 


    @yield('nav')
      <div class="ui grid">
      <div class="row">
      <div class="row">
      </div>
      </div>
      </div>
    @yield('content')
<div class="ui small modal" id="login">
  <i class="close icon"></i>
  <div class="ui vertical divider"></div>
  <div class="ui container two column middle aligned very relaxed stackable grid">
    <div class="row"></div>
    <div class="column">
      <div class="ui form">
        <div class="field">
          <label>Username</label>
          <div class="ui left icon input">
            <input type="text" placeholder="Username" id="username">
            <i class="user icon"></i>
          </div>
        </div>
        <div class="field">
          <label>Password</label>
          <div class="ui left icon input">
            <input type="password" placeholder="Password" id="password">
            <i class="lock icon"></i>
          </div>
        </div>
        <div class="ui grid">
          <div class="row"></div>
          <div class="five wide column"></div>
          <a href="/checkout"><div class="ui blue submit button">Login</div></a>
        </div>
      </div>
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


<div class="ui horizontal divider">Contact Us</div>
  <div class="ui grid">
    <div class="twelve wide column centered">
      <div class="ui inverted green segment">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
    </div>
  </div>

<a href="#" class="scrollToTop" style="background: url('icons/Arrow_up.png') no-repeat 0px 20px;"></a>

<script>
$(document).ready(function(){
     $('#logIn').click(function(){
        $('#login').modal('show');    
     });
});

  $('.menu .item')
    .popup({
    inline   : true,
    hoverable: true,
    transition: 'slide right',
    setFluidWidth: false,
    position : 'right center'
  });

$('.special.cards .image').dimmer({
  on: 'hover'
});


$(document).ready(function(){
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
});


</script>
    </body>
  </html>