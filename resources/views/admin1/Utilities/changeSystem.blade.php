@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  @include('admin1.Utilities.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
    <h1 class="ui centered header">
      <i class="building outline icon"></i>Change Details
    </h1>
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>

      <form class="ui form" action="/confirmDetails" method="POST" enctype="multipart/form-data">

        <div class="ui inverted segment">
          <div class="nine wide field">
            <div class="ui subheader">Company Name</div>
            <input type="text" name="add_name">
          </div>
          <div class="twelve wide field">
            <div class="ui subheader">Address:</div>
            <input type="text" name="add_address">
          </div>
          <div class="seven wide field">
            <div class="ui subheader">Company Email:</div>
            <input type="text" name="add_email">
          </div>
          <div class="seven wide field">
            <div class="ui subheader">Company number:</div>
            <input type="text" name="add_telno">
          </div>
          <div class="field" id="dtiField">
            <label>Company Logo</label>
            <i class="file icon"></i>
            <input type="file" name="add_photo" id="add_photo">
          </div>

          <button class="ui green button" type="submit" name="add"><i class="checkmark icon"></i>Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();
</script>
@endsection