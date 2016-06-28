<!DOCTYPE html>
<html>
  <head>
    <title>BiddingManagementSystem</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/Semantic-UI-CSS-master/semantic.css')!!}"/>
      <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.semanticui.min.css"/>

      <!--JAVASCRIPT -->
      <script type="text/javascript" src="{!!URL::asset('https://code.jquery.com/jquery-2.1.1.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.semanticui.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>


      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('jqueryscript')
  </head>

  <body style="background-image: url('icons/bg2.png');  background-repeat: no-repeat;
    background-attachment: fixed;">

    
      <div class="ui fixed secondary inverted pointing menu" id='nav'>
        <div class="ui container">
          <a href="#" class="header item">
            <img class="ui mini image" src="icons/icon.png">
          </a>
          <a href="/dashboard" class="item"><i class="large home icon"></i>Dashboard</a>
          <a href="/supplier1" class="item"><i class="large settings icon"></i>Maintenance</a>
          <a href="/inventory1" class="item"><i class="large exchange icon"></i>Transaction</a>
        </div>
      </div>

    <div class="ui segment container" style="top:70px;">
      @yield('content')
    </div>
  </body>

  <script>
   /* $(function(){
      $('a.item').click(function(){
        $('.item').removeClass('active');
        $(this).addClass('active');
      })
    });
    */
    $(function(){
        var current = location.pathname;
        $('#nav a.item').click(function(){
            var $this = $(this);
            if($this.attr('href').indexOf(current) !== -1){
                $('.item').removeClass('active');
                $this.addClass('active');
            }
        })
    })
  </script>
</html>