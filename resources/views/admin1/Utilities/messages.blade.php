@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Utilities.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
    <h1 class="ui centered header"><i class="mail icon"></i>Reply to messages</h1>
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>
      <form class="ui form" action=" " method="POST">

        <div class="fields">
          <div class="five wide field ui compact segment">
            <a class="ui fluid green button" id="inboxBtn"><i class="mail icon"></i> Inbox</a><br>
            <a class="ui fluid blue button" id="sendBtn">Send Message</a>
          </div>  

          <div class="field"></div>

          <div class="eleven wide field ui segment" id="inbox">
            <div class="ui accordion">
              <div class="title">
                <i class="dropdown icon"></i>
                TITLE
              </div>
              <div class="content ui inverted segment">
                <p>A dog is a type of domesticated animal. Known for its loyalty and faithfulness, it can be found as a welcome guest in many households across the world.</p>
              </div>
            </div>
          </div>

          <div class="eleven wide field" id="sendMessage" style="display:none">
            <div class="ui subheader">MESSAGE:</div>
            <textarea cols="1"></textarea>
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
            <button class="ui green button">SEND</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();

  $('.ui.normal.dropdown').dropdown();
  $('.ui.accordion').accordion();

  $('#sendBtn').click(function (){
    $('#sendMessage').show();
    $('#inbox').hide();
  })

  $('#inboxBtn').click(function (){
    $('#sendMessage').hide();
    $('#inbox').show();
  })

</script>
@endsection