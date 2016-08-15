@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
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
        <a class=" item" href="/inventory">
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
        <a class="item" href="/deliveryApproval">
          Delivery/Pick-up Approval
        </a>
        <a class="item" href="/itemOutbound">
          Item Outbound
        </a>
        <a class="active item" href="/deliveryItems">
          Delivery
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Delivery</div>
       
        <table class="ui celled definition table">
          <thead>
            <tr>
              <th></th>
              <th>Header</th>
              <th>Header</th>
            </tr></thead>
          <tbody>
            <tr>
              <td class="collapsing">
               <a class="ui basic blue button" id="addBtn">
                <i class="unhide icon"></i>
                View
              </a>
              </td>
              <td>Cell</td>
              <td>Cell</td>
            </tr>
          </tbody>
        </table>

            <div class="ui small modal" id="addModal">
              <i class="close icon"></i>
                <div class="header">
                  Modal 1
                </div>
                <div class="content">
                  <table class="ui celled table">
                    <thead>
                      <tr>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="ui selection dropdown">
                    <input type="hidden" name="gender">
                    <i class="dropdown icon"></i>
                    <div class="default text">Gender</div>
                    <div class="menu">
                      <div class="item" data-value="1">Male</div>
                      <div class="item" data-value="0">Female</div>
                    </div>
                  </div>

                  <button type="submit" class="ui basic green button"><i class="green checkmark icon"></i>Confirm</button>
                </div>
            </div>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('.ui.modal').modal('show');    
       });
  })

  $('.ui.modal').modal('show');

  $('.ui.dropdown')
  .dropdown()
;
</script>
@endsection