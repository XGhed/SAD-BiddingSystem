@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  @include('admin1.Dashboard.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>


           <div class="ui card">
            <div class="content">
              <div class="statistic">
          <div class="text value">
            Three<br>
            Thousand
          </div>
          <div class="label">
            Signups
          </div>
        </div>
            
            </div>
            <div class="extra content">
              <a>
                <i class="user icon"></i>
                22 Friends
              </a>
            </div>
          </div>

      <div class="ui four statistics">
        <div class="statistic">
          <div class="value">
            22
          </div>
          <div class="label">
            Saves
          </div>



        </div>
        <div class="statistic">
          <div class="text value">
            Three<br>
            Thousand
          </div>
          <div class="label">
            Signups
          </div>
        </div>
        <div class="statistic">
          <div class="value">
            <i class="plane icon"></i> 5
          </div>
          <div class="label">
            Flights
          </div>
        </div>
        <div class="statistic">
          <div class="value">
            <i class="user icon"></i>
            42
          </div>
          <div class="label">
            Team Members
          </div>
        </div>
      </div>
      
      <div class="ui divider"></div>

    </div>
  </div>
</div>



<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();
</script>
@endsection