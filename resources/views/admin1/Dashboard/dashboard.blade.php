@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  <div class="sixteen wide stretched column">
    <div class="ui segment">
      <h1 class="ui centered header">DASHBOARD</h1>
      <p id="curDate" style="font-size:25px" class="ui basic right aligned segment"></p>
      <div class="ui segment">
        <div class="ui inverted segment">
          <div class="ui three statistics">
            <div class="ui inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Current Bidders
              </div>
            </div>
            <div class="ui red inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Current ongoing event
              </div>
            </div>
            <div class="ui orange inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Pending Delivery requests
              </div>
            </div>
            <div class="ui yellow inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Pending Pick-up requests
              </div>
            </div>
            <div class="ui yellow inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Pending Accounts to be approved
              </div>
            </div>
          </div><!-- statistics -->
        </div>
        <div class="ui divider"></div>
        <div class="ui inverted segment">
          <h2 class="ui center aligned icon header">
            <i class="circular building outline icon"></i>
            Company Details
          </h2>
          <div class="ui divider"></div>
          <div class="ui two column grid">
            <div class="column">
              <h2 class="ui header">
                <i class="circular building icon"></i>
                <div class="content">
                  Company Name
                </div>
              </h2>
              <h2 class="ui header">
                <i class="circular marker icon"></i>
                <div class="content">
                  Address
                </div>
              </h2>
              <h2 class="ui header">
                <i class="circular book icon"></i>
                <div class="content">
                  Contact Information
                </div>
              </h2>
            </div>
            <div class="column">
              <h2 class="ui header">
                <i class="circular photo icon"></i>
                <div class="content">
                  Company Logo
                </div>
              </h2>            
            </div><!--2nd column-->
          </div>

        </div><!--company details-->
      </div>
     
    </div><!-- segment -->
  </div><!-- column -->
</div><!-- grid -->



<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();
</script>
@endsection