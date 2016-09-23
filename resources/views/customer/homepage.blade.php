<!DOCTYPE html>
  <html>
    <head>
    <title>Bidding</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/Semantic-UI-CSS-master/semantic.css')!!}"/>
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/dataTables.semanticui.min.css')!!}"/>

      <!--JAVASCRIPT -->
      <script type="text/javascript" src="{!!URL::asset('js/jquery-2.1.1.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/jquery-1.12.3.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/jquery.dataTables.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/dataTables.semanticui.min.js')!!}"></script>
      <script type="text/javascript" src="js/angular.min.js"></script>
      <script type="text/javascript" src="{!!URL::asset('js/angular-datatables.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/moment.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/locales.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/humanize-duration.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/angular-timer.min.js')!!}"></script>
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/angular-datatables.css')!!}"/>
    </head>

    <body style="background-image: url('/icons/bg2.png');  background-repeat: no-repeat;
    background-attachment: fixed;"> 

      
    @yield('content')

  <div class="ui small modal" id="login">
    <i class="close icon"></i>
    <div class="ui vertical divider"></div>
    <div class="ui container two column middle aligned very relaxed stackable grid">
      <div class="row"></div>
      <div class="column">
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
            <input type="submit" class="ui blue submit button" value="Login"></input>
          </div>
        </form>
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
YouBid is a modernized online bidding website. Whether you are buying appliances, 
electronics or clothings this website is the place to be. We always offer full and friendly support 
phone or email . Fast delivery with tracking number on purchased items. Offers reward ponts for retailer customers. 
The most fun you'll ever have shopping online.
    </div>
    </div>
  </div>

<a href="#" class="scrollToTop" style="background: url('icons/Arrow_up.png') no-repeat 0px 20px;"></a>

<script>
$(document).ready(function(){
     $('.logIn').click(function(){
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