@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="active item"href="/itemInbound">
          Item Inbound
        </a>
        <a class=" item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent1">
          Bidding Event
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
      <form>
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
              <td>
                <input type="checkbox" class="ui checkbox">
              </td>
              <td>Cell</td>
              <td>Cell</td>
            </tr>
          </tbody>
        </table>
        <select class="ui dropdown">
          <option value="">nigguh</option>
          <option value="1">nigguh</option>
          <option value="0">nigguh</option>
        </select>
        <button class="ui button" type="submit">Confirm</button>
      </form>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
 $('.ui.dropdown').dropdown();

</script>
@endsection