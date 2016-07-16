@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Queries</div>
        <a class="active item" href="/accountApproval">
          Account Approval
        </a>
        <a class="item" href="/itemPullouts">
          Item Pullouts
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
            <td class="tableRow" style="cursor: pointer;">Account type here</td>
            <td class="tableRow" style="cursor: pointer;">Date here</td>
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
            <p>Full Name:</p>
            <p>Address:</p>
            <p>Gender:</p>
            <p>Birthdate:</p>
            <p>Contact Number:</p>
            <p>Email Address:</p>
            <p>Username:</p>
            <p>Documents: </p>
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