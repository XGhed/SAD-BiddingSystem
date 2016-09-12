@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Utilities.sideNav')
  <div class="twelve wide stretched column">
    <div class="ui segment">
    <h1 class="ui centered header"><i class="mail icon"></i>Reply to messages</h1>
      <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>
      <form class="ui form">
        <div class="fields">
          <div class="five wide field ui compact segment">
            <!-- <a class="ui fluid green button" id="inboxBtn"><i class="mail icon"></i> Inbox</a><br>
            <a class="ui fluid blue button" id="sendBtn">Send Message</a> -->
            <div class="ui middle aligned selection list">
              <div class="item">
                <a class="ui basic blue button" id="addBtn">
                  <i class="mail icon"></i>
                  Create message
                </a>
              </div>
              <div class="item" id="shit">
                <div class="content">
                  <div class="header">Don't CLICK ME </div>
                </div>
              </div>
              <div class="item" id="shit1">
                <div class="content">
                  <div class="header">CLICK ME</div>
                </div>
              </div>
            </div>
          </div>  

          <div class="field"></div>

          <div class="ten wide field ui segment">
            <div class="ui segment" id="inbox">
              <div class="ui sub header">SUBJECT:</div>
                <div class="ui inverted segment">
                  <p>TITLE OF THE MESSAGE</p>
                </div>

              <div class="ui sub header">MESSAGE:</div>
                <div class="ui inverted segment">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

              <div class="field">
                <div class="ui sub header">REPLY:</div>
                <textarea></textarea>
                <p></p>
                <button type="submit" class="ui green button"><i class="send icon"></i>REPLY</button>
              </div>
            </div>
            <div class="ui segment" id="sendMessage" style="display:none">
              <div class="ui sub header">SUBJECT:</div>
                <div class="ui inverted segment">
                  <p>TITLE OF THE MESSAGE</p>
                </div>

              <div class="ui sub header">MESSAGE:</div>
                <div class="ui inverted segment">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

              <div class="field">
                <div class="ui sub header">REPLY:</div>
                <textarea></textarea>
                <p></p>
                <button type="submit" class="ui green button"><i class="send icon"></i>REPLY</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Create Message
            </div>
            <div class="content">
              <form class="ui form" action="" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="ui inverted segment">
                  <div class="field">
                    <div class="ui subheader">SUBJECT:</div>
                    <input type="text" name="subject">
                  </div>
                  <div class="field">
                    <div class="ui subheader">MESSAGE:</div>
                    <textarea name="content"> </textarea>
                  </div>
                  <div class="field">
                    <div class="ui subheader">TO:</div>
                      <div class="ui fluid multiple search normal selection dropdown">
                        <input type="hidden" name="country">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Customer</div>
                        <div class="menu">
                          <div class="item" data-value="ye"><i class="ye flag"></i>Yemen</div>
                          <div class="item" data-value="zm"><i class="zm flag"></i>Zambia</div>
                          <div class="item" data-value="zw"><i class="zw flag"></i>Zimbabwe</div>
                        </div>
                      </div>
                  </div>

                  <button class="ui green button"><i class="send icon"></i>Send Message</button>
                </div>
              </form>
            </div>
        </div>


<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();

  $('.ui.normal.dropdown').dropdown();

  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });
 
  $('#shit').click(function (){
    $('#sendMessage').hide();
    $('#inbox').show();
  })

  $('#shit1').click(function (){
    $('#sendMessage').show();
    $('#inbox').hide();
  })

</script>
@endsection