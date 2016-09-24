@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  @include('admin1.Utilities.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
    <h1 class="ui centered header"><i class="mail icon"></i>Send announcements </h1>
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>
      <form class="ui form" action="makeAnnouncement" method="POST">

        <div class="ui inverted segment">
          <div class="twelve wide field">
            <div class="ui subheader">SUBJECT:</div>
            <input type="text" name="subject">
          </div>
          <div class="twelve wide field">
            <div class="ui subheader">MESSAGE:</div>
            <textarea name="content"> </textarea>
          </div>
          <button class="ui green button"><i class="send icon"></i>Make Announcement</button>

          <form>
            <input type="hidden" name="subject" value="null">
            <button type="submit" class="ui red button"><i class="send icon"></i>Remove Announcement</button>
          </form>
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