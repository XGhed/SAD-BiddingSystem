<div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Queries</div>
        <a class="item" href="/accountApproval">
          Customer Accounts
        </a>
        <a class="item" href="/listOfBidders">
          List of Bidders
        </a>
        <a class="item" href="/expectedItemPercent">
          Expect Item Percent
        </a>
        <a class="item" href="/salesGraph">
          Sales Graph
        </a>
        <a class="item" href="/mostBidItem">
          Sales Graph
        </a>
       
    </div>
  </div>

   <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>