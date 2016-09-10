@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  @include('admin1.Dashboard.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>

      <form class="ui form" action=" " method="POST">

        <div class="ui inverted segment">
          <div class="twelve wide field">
            <div class="ui subheader">SUBJECT:</div>
            <input type="text">
          </div>
          <div class="twelve wide field">
            <div class="ui subheader">MESSAGE:</div>
            <textarea>
              

            </textarea>
          </div>
          <button class="ui green button"><i class="send icon"></i>SEND</button>
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