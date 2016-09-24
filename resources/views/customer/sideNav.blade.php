<div class="four wide column">
              <div class="ui vertical fluid tabular menu">
                <div class="item">
            <div class="ui centered circular medium image">
              <img src="/icons/avatar_3.png">
            </div>
            <div class="ui divider"></div>
            <div class="ui subheader">Hello @{{accountInfo.membership[0].FirstName}}!</div>
          </div>

            <a class="item" href="/userProfile">
              Transaction History
            </a>

            <a class="item" href="/customerStatus">
              Current Details
            </a>
          </div>
    </div>

   <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>