        <div class="four wide column">
          <div class="ui vertical fluid tabular menu">
            <div class="ui centered header">Transaction</div>
              <a class="item" href="/orderedItem">
                Ordered Items
              </a>
              <a class="item" href="/itemInbound">
                Item Inbound
              </a>
              <a class="item" href="/itemChecking">
                Item Checking
              </a>        
              <a class="item" href="/inventory">
                Inventory
              </a> 
              <a class="item" href="/itemPullouts">
                Item Pullouts
              </a>       
              <a class="item" href="/movingOfItems">
                Moving of Items
              </a>
              <a class="item" href="/approvalOfMovingItems">
                Approval Moving of Items
              </a>
              <a class="item" href="/biddingEvent">
                Bidding Event
              </a>
              <a class="item" href="/postEventNoBidItems">
                Post Event
              </a> 
              <a class="item" href="/accountApproval">
                Account Approval
              </a>
              <a class="item" href="/prepareCheckout">
                Prepare Checkout Items
              </a>
              <a class=" item" href="/paymentCheckout">
                Payment Checkout Items
              </a>
              <a class="item" href="/itemOutbound">
                Item Outbound
              </a>
              <a class="item" href="/deliveryStatus">
                Delivery Status
              </a>
          </div>
        </div>

        <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>