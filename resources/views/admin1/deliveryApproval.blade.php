@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
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
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class="item" href="/inventory">
          Inventory
        </a>       
        <a class="item" href="/movingOfItems">
          Moving of Items
        </a>
        <a class="item" href="/biddingEvent">
          Bidding Event
        </a>
        <a class="item" href="/accountApproval">
          Account Approval
        </a>
        <a class="active item" href="/accountApproval">
          Delivery/Pick-up Approval
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table class="ui definition celled selectable table">
        <thead>
          <tr>
          <th></th>
          <th>Customer Name</th>
          <th>Date requested</th>
          <th>Delivery/Pick-up place</th>
          <th>Status</th>
        </tr></thead>
        <tbody>
          <tr>
            <td class="collapsing">
              <button class="ui basic green button"><i class="checkmark icon"></i>Approve</button>
            </td>
            <td class="tableRow" style="cursor: pointer;"></td>
            <td class="tableRow" style="cursor: pointer;"></td>
            <td class="tableRow" style="cursor: pointer;"></td>
          </tr>
        </tbody>
      </table>

      <!-- account info modal -->
      <div class="ui small modal" id="infoModal">
        <i class="close icon"></i>
        <div class="header">
          Delivery Information
        </div>
        <div class="content">
          <div class="description">
            <table class="ui single line table">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Item Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John Lilki</td>
                  <td>John Lilki</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END account info modal -->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  //add modal
 $(document).ready(function(){
       $('.tableRow').click(function(){
          $('#infoModal').modal('show');    
       });
  }); 

</script>
@endsection