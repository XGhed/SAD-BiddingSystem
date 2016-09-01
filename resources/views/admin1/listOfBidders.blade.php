@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Queries</div>
        <a class=" active item" href="/listOfBidders">Customer Accounts</a>
        <a class=" item" href="/expectItemPercent">Expected Item Percentage</a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">

      <table class="ui definition celled selectable table" >
        <thead>
          <tr>
          <th></th>
          <th>Account</th>
          <th>Account Type</th>
          <th>Date Registered</th>
        </tr></thead>
        <tbody>
          <tr ng-repeat="account in accounts">
            <td class="collapsing">           
              <button class="ui basic green button" id="addBtn"><i class="unhide icon"></i>View Info</button> 
            </td>
            <td class="tableRow" ></td>
            <td class="tableRow" ></td>
            <td class="tableRow" ></td>
          </tr>
        </tbody>
      </table>

      <!-- account info modal -->
      <div class="ui small modal" id="infoModal">
        <i class="close icon"></i>
        <div class="header">
          Account Information
        </div>
        <div class="content">
          <div class="description">
            
          </div>
        </div>
      </div>
      <!-- END account info modal -->

    </div>
  </div>
</div>


<script>
$('#addBtn').click(function(){
  $('#infoModal').modal('show');    
});
</script>
@endsection