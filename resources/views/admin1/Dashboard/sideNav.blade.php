<div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header"><i class="home icon"></i>Dashboard</div>
        <a class="item" href="/dashboard">
          Home
        </a>
        <a class="item" href="/announceCustomer">
          Announcements
        </a>
    </div>
  </div>

   <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>