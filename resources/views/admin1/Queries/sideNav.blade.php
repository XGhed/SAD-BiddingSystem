<div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Queries</div>
        <a class="item" href="/salesGraph">
          Sales Graph
        </a>
        <a class="item" href="/mostBid">
          Most Bids
        </a>
        <a class="item" href="/customerGraph">
          Approved Customers
        </a>
       
    </div>
  </div>

   <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>