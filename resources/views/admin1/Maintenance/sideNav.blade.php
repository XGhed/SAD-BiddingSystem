<div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier">
          Supplier
        </a>
        <a class="item" href="/category">
          Category
        </a>
        <a class="item" href="/item">
          Item
        </a>
        <a class="item" href="/itemDefects">
          Item Defects
        </a>
        <!-- <a class="item" href="/accountType">
          Account Type
        </a> -->
        <a class="item" href="/discount">
          Discount
        </a>
        <a class="item" href="/shipment">
          Shipment
        </a>
        <a class="item" href="/warehouse">
          Warehouse
        </a>
    </div>
  </div>

   <script>
          $(function() {
            $('a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
          }); 
        </script>