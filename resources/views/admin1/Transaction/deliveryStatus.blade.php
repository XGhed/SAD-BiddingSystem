@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
        <h2 class="ui centered header">Delivery Status Of Customers</h2>

        <table class="ui celled definition inverted table">
          <thead>
            <tr>
              <th></th>
              <th>Account Name</th>
              <th>Delivery Number</th>
              <th>Delivery Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="collapsing">
                <button class="ui blue button">
                  <i class="checkmark icon"></i>
                  Confirm
                </button>
              </td>
              <td>Cell</td>
              <td>Cell</td>
              <td style="color:red;">
                Pending
              </td>
            </tr>
          </tbody>
        </table>

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->

<script>
 
</script>
@endsection