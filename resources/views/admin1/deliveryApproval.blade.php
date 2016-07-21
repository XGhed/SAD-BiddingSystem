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
        <a class="item" href="/itemPullouts">
          Item Pullouts
        </a>        
        <a class="item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent">
          Bidding Event
        </a>
        <a class="item" href="/accountApproval">
          Account Approval
        </a>
        <a class="active item" href="/accountApproval">
          Delivery Approval
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table class="ui definition celled selectable table">
        <thead>
          <tr>
          <th></th>
          <th>Account</th>
          <th>Account Type</th>
          <th>Date Registered</th>
        </tr></thead>
        <tbody>
          <tr>
            <td class="collapsing">
              <button class="ui basic green button"><i class="checkmark icon"></i>Approve</button>
            </td>
            <td class="tableRow" style="cursor: pointer;">Username here</td>
            <td class="tableRow" style="cursor: pointer;"></td>
            <td class="tableRow" style="cursor: pointer;">Date here</td>
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
                  <th>Quantity</th>
                  <th>Paid</th>
                  <th>Delivery Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John Lilki</td>
                  <td>September 14, 2013</td>
                  <td>jhlilk22@yahoo.com</td>
                  <td>No</td>
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