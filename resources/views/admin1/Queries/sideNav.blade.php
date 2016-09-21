<div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Reports</div>
        <a class="item" href="/qcustomerStatus">
          Customer Status
        </a>
        <a class="item" href="/deliveryList">
          List of Delivery Fees
        </a>
        <a class="item" href="/supplierStatus">
          Supplier Status
        </a>
       
    </div>
  </div>

   <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>