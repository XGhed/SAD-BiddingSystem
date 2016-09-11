@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  @include('admin1.Utilities.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
    <h1 class="ui centered header"><i class="mail icon"></i>Send announcements </h1>
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>
      <form class="ui form" action=" " method="POST">

        <div class="ui inverted segment">
          <div class="twelve wide field">
            <div class="ui subheader">SUBJECT:</div>
            <input type="text">
          </div>
          <div class="twelve wide field">
            <div class="ui subheader">MESSAGE:</div>
            <textarea> </textarea>
          </div>
          <div class="twelve wide field">
            <div class="ui subheader">TO:</div>
              <div class="ui fluid multiple search normal selection dropdown" id="selectUser">
                <input type="hidden" name="country">
                <i class="dropdown icon"></i>
                <div class="default text">Select Customer</div>
                <div class="menu">
                <div class="item" data-value="af"><i class="af flag"></i>Afghanistan</div>
                <div class="item" data-value="ax"><i class="ax flag"></i>Aland Islands</div>
                <div class="item" data-value="al"><i class="al flag"></i>Albania</div>
                <div class="item" data-value="dz"><i class="dz flag"></i>Algeria</div>
              </div>
              </div>
          </div>
          <div class="field">
            <div class="ui checkbox">
              <input type="checkbox" name="" id="sendToAll">
              <label>Send to all</label>
            </div>
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

  $('.ui.normal.dropdown').dropdown();

  $(document).ready(function () {
      $('#sendToAll').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('selectUser').style.display = 'none';
          } else {
              document.getElementById('selectUser').style.display = 'block';
          }
     });
    });
</script>
@endsection